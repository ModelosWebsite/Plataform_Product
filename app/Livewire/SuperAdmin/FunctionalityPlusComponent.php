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
    public $editMode = false;
    public $image, $title, $description, $price;

    public function render()
    {
        return view('livewire.super-admin.functionality-plus-component', 
        ["packages" => FunctionalityPlus::query()->orderBy('title', 'asc')->get()])
        ->layout('layouts.superadmin.app');
    }

    public function createFunctionality()
    {
        DB::beginTransaction();
        try {
            //manipulacao de arquivo;
            if ($this->image != null and !is_string($this->image)) {
                $filename = rand(2000, 3000) .".".$this->image->getClientOriginalExtension();
                $this->image->storeAs('premium', $filename, 'public');
            }

            FunctionalityPlus::create([
                "title" => $this->title,
                "description" => $this->description,
                "amount" => $this->price,
                "image" => $filename,
            ]);

            $this->reset('title', 'description', 'price', 'image');

            $this->alert('success', 'SUCESSO', [
                'toast' => false,
                'text' => 'Elemento premium criado',
                'position' => 'center',
                'showConfirmButton' => false,
                'confirmButtonText' => 'OK',
            ]);
            DB::commit();
            return;

        } catch (\Throwable $th) {
            \Log::error("Erro ao criar premium", [
                "message" => $th->getMessage(),
                "file" => $th->getFile(),
                "line" => $th->getLine()
            ]);
            DB::rollBack();
            $this->alert('error', 'ERRO', [
                'toast'=>false,
                'position'=>'center',
                'showConfirmButton' => false,
                'confirmButtonText' => 'OK',
                'text' => 'Falha ao realizar operação'
            ]);
        }
    }
}