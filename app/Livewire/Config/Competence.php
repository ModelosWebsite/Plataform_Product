<?php

namespace App\Livewire\Config;

use App\Models\infowhy;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Competence extends Component
{
    public $habilityId,$editMode = false, $title, $description, $gethability;
    use LivewireAlert;

    public function mount() 
    {
        $this->gethability = infowhy::where("company_id", auth()->user()->company->id)->get();
    }

    public function habilityCriar() {
        try {
            if ($this->habilityId) {
                // Atualizar
                $hability = infowhy::find($this->habilityId);
                $hability->update(['title' => $this->title, 'description' => $this->description]);
    
                $this->alert('success', 'SUCESSO', [
                    'toast'=>false,
                    'position'=>'center',
                    'showConfirmButton' => false,
                    'confirmButtonText' => 'OK',
                ]);
    
            } else {
                // Adicionar
                infowhy::create([
                    'title' => $this->title, 
                    'description' => $this->description, 
                    'company_id' => auth()->user()->company_id
                ]);
    
                $this->alert('success', 'SUCESSO', [
                    'toast'=>false,
                    'position'=>'center',
                    'showConfirmButton' => false,
                    'confirmButtonText' => 'OK',
                ]);
            }
    
            // Limpar os campos
            $this->reset(['habilityId', 'title', 'description']);
            $this->mount();
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

    public function editHability($id) {
        $hability = infowhy::find($id);
        $this->habilityId = $hability->id;
        $this->title = $hability->title;
        $this->description = $hability->description;
        $this->editMode = true;
    }

    public function deleteHability($id) {
        infowhy::destroy($id);
        $this->gethability = infowhy::where("company_id", auth()->user()->company->id)->get();
        $this->alert('success', 'SUCESSO', [
            'toast'=>false,
            'position'=>'center',
            'showConfirmButton' => false,
            'confirmButtonText' => 'OK',
            'text'=>'Habilidade Eliminada'
        ]);
    }

    public function render()
    {
        $this->mount();

        return view('livewire.config.competence');
    }

}