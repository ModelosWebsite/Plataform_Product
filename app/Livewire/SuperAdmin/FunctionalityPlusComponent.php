<?php

namespace App\Livewire\SuperAdmin;

use Livewire\Component;
use App\Models\FunctionalityPlus;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Illuminate\Support\Facades\DB;

class FunctionalityPlusComponent extends Component
{
    use LivewireAlert, WithFileUploads;
    public $editMode = false, $selectedId = null;
    public $image, $title, $description, $price, $view_description;

    public function render()
    {
        return view('livewire.super-admin.functionality-plus-component', 
        ["packages" => FunctionalityPlus::query()->orderBy('title', 'asc')->get()])
        ->layout('layouts.superadmin.app');
    }

    public function edit($id)
    {
        $this->editMode = true;
        $this->selectedId = $id;

        $item = FunctionalityPlus::findOrFail($id);
        $this->title = $item->title;
        $this->description = $item->description;
        $this->price = $item->amount;
        $this->image = $item->image;
        $this->view_description = $item->view_description;
    }

    public function saveFunctionality()
    {
        DB::beginTransaction();
        try {
            $filename = null;
            $existing = $this->selectedId ? FunctionalityPlus::find($this->selectedId) : null;

            if ($this->image && !is_string($this->image)) {
                $filename = rand(2000, 3000) .".".$this->image->getClientOriginalExtension();
                $this->image->storeAs('premium', $filename, 'public');
            } elseif ($existing) {
                $filename = $existing->image;
            }

            FunctionalityPlus::updateOrCreate(
                ['id' => $this->selectedId],
                [
                    "title" => $this->title,
                    "description" => $this->description,
                    "amount" => $this->price,
                    "view_description" => $this->view_description,
                    "image" => $filename
                ]
            );

            $this->reset('title', 'description', 'price', 'image', 'selectedId', 'editMode', 'view_description');

            $this->alert('success', 'SUCESSO', [
                'toast' => false,
                'text' => $this->editMode ? 'Elemento premium atualizado' : 'Elemento premium criado',
                'position' => 'center',
                'showConfirmButton' => false,
                'confirmButtonText' => 'OK',
            ]);

            DB::commit();

        } catch (\Throwable $th) {
            dd($th->getMessage());
            DB::rollBack();
            \Log::error($th);
            $this->alert('error', 'ERRO', [
                'toast'=>false,
                'position'=>'center',
                'text' => 'Falha ao realizar operação'
            ]);
        }
    }
}