<?php

namespace App\Livewire\Config;

use App\Models\Detail;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Service extends Component
{
    public $mvv, $title, $description,$editMode = false, $mvvId;
    use LivewireAlert;

    public function mount()
    {
        $this->mvv = Detail::where("company_id", auth()->user()->company->id)->get(); // Carrega os serviços do banco
    }

    public function storeService()
    {
        try {
    
            Detail::create([
                'title' => $this->title,
                'description' => $this->description,
                "company_id" => auth()->user()->company_id,
            ]);
    
            $this->resetFields();
            $this->mount(); // Atualiza a lista de serviços
            
            $this->alert('success', 
                'CADASTRADO', [
                'toast' => false,
                'position' => 'center',
                'showConfirmButton' => false,
                'confirmButtonText' => 'OK',
            ]);

        } catch (\Throwable $th) {
            $this->alert('error', 'ERRO', [
                'toast'=>false,
                'position'=>'center',
                'showConfirmButton' => false,
                'confirmButtonText' => 'OK',
                'text'=>'Falha na operação'
            ]);
        }
    }

    public function editService($id)
    {
        $mvv = Detail::find($id);
        $this->mvvId = $mvv->id;
        $this->title = $mvv->title;
        $this->description = $mvv->description;
        $this->editMode = true;
    }

    public function updateService()
    {
        try {

            $service = Detail::find($this->mvvId);
            $service->update([
                'title' => $this->title,
                'description' => $this->description,
            ]);
    
            $this->resetFields();
            $this->mount(); // Atualiza a lista de serviços
            $this->alert('success', 
                'CADASTRADO', [
                'toast' => false,
                'position' => 'center',
                'showConfirmButton' => false,
                'confirmButtonText' => 'OK',
            ]);
            $this->editMode = false;
        } catch (\Throwable $th) {
            $this->alert('error', 'ERRO', [
                'toast'=>false,
                'position'=>'center',
                'showConfirmButton' => false,
                'confirmButtonText' => 'OK',
                'text'=>'Falha na operação'
            ]);
        }
    }

    public function deleteService($id)
    {
        Detail::destroy($id);
        $this->mount(); // Atualiza a lista de serviços
    }

    public function resetFields()
    {
        $this->title = '';
        $this->description = '';
        $this->editMode = false;
    }

    public function render()
    {
        return view('livewire.config.service');
    }
}