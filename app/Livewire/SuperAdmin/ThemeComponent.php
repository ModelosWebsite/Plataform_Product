<?php

namespace App\Livewire\SuperAdmin;

use Livewire\Component;
use App\Models\Theme;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Illuminate\Support\Facades\DB;

class ThemeComponent extends Component
{
    use LivewireAlert, WithFileUploads;
    public $editMode = false, $selectedId = null;
    public $image, $name, $description, $version, $themes, $author, $folder;

    public function mount()
    {
        $this->themes = Theme::query()->orderBy('name', 'asc')->get();
    }

    public function render()
    {
        $this->mount();
        return view('livewire.super-admin.theme-component')->layout('layouts.superadmin.app');
    }

    public function edit($id)
    {
        $this->editMode = true;
        $this->selectedId = $id;

        $item = Theme::findOrFail($id);
        $this->name = $item->name;
        $this->author = $item->author;
        $this->folder = $item->name;
        $this->description = $item->description;
        $this->version = $item->version;
        $this->image = $item->image;
    }


    public function saveTheme()
    {
        DB::beginTransaction();
        try {
            $filename = null;
            $existing = $this->selectedId ? Theme::find($this->selectedId) : null;

            if ($this->image && !is_string($this->image)) {
                $filename = rand(2000, 3000) .".".$this->image->getClientOriginalExtension();
                $this->image->storeAs('theme', $filename, 'public');
            } elseif ($existing) {
                $filename = $existing->image;
            }

            Theme::updateOrCreate(
                ['id' => $this->selectedId],
                [
                    "name" => $this->name,
                    "folder" => $this->name,
                    "author" => $this->author,
                    "version" => $this->version,
                    "description" => $this->description,
                    "image" => $filename
                ]
            );

            $this->reset('name', 'description', 'version', 'image', 'folder', 'selectedId', 'editMode');
            $this->mount();
            $this->alert('success', 'SUCESSO', [
                'toast' => false,
                'text' => $this->editMode ? 'Tema atualizado' : 'Tema criado',
                'position' => 'center',
                'showConfirmButton' => false,
                'confirmButtonText' => 'OK',
            ]);

            DB::commit();

        } catch (\Throwable $th) {
            DB::rollBack();
            \Log::error($th);
            $this->alert('error', 'ERRO', [
                'toast'=>false,
                'position'=>'center',
                'text' => 'Falha ao realizar operação'
            ]);
        }
    }

    public function deleteTheme($id)
    {
        try {
            Theme::find($id)->delete();

            $this->mount();
            $this->alert('success', 'SUCESSO', [
                'toast' => false,
                'text' => 'Tema Eliminado',
                'position' => 'center',
                'showConfirmButton' => false,
                'confirmButtonText' => 'OK',
            ]);

        } catch (\Throwable $th) {
            \Log::error("");
        }
    }
}