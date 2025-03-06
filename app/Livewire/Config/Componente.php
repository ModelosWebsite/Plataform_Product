<?php

namespace App\Livewire\Config;

use App\Models\Element;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Componente extends Component
{
    public $elements, $getComponents, $level, $selectedComponentId = null;
    use LivewireAlert;

    public function mount()
    {
        $this->getComponents = Element::where('company_id', auth()->
        user()->company_id)->get();
    }

    public function storeOrUpdateComponent()
    {
        try {
            if ($this->selectedComponentId) {
                // Atualiza o componente existente
                $component = Element::find($this->selectedComponentId);
                $component->update([
                    'element' => $this->elements,
                    'level' => $this->level,
                ]);
    
                $this->alert('success', 'SUCESSO', [
                    'toast'=>false,
                    'position'=>'center',
                    'showConfirmButton' => false,
                    'confirmButtonText' => 'OK',
                    'text'=>'Elemento Actualizada'
                ]);
            } else {
                // Cria um novo componente
                Element::create([
                    'element' => $this->elements,
                    'level' => $this->level,
                    'company_id' => auth()->user()->company_id,
                ]);
    
                $this->alert('success', 'SUCESSO', [
                    'toast'=>false,
                    'position'=>'center',
                    'showConfirmButton' => false,
                    'confirmButtonText' => 'OK',
                    'text'=>'Elemento Inserido'
             ]);

            }

            $this->mount();
         
            $this->reset(['selectedComponentId', 'elements', 'level']);
        } catch (\Throwable $th) {
            dd($th->getMessage());
            $this->alert('error', 'ERRO', [
                'toast'=>false,
                'position'=>'center',
                'showConfirmButton' => false,
                'confirmButtonText' => 'OK',
                'text'=>'Falha na operação'
            ]);
        }
    }

    public function editComponent($id)
    {
        $component = Element::find($id);
        $this->selectedComponentId = $component->id;
        $this->elements = $component->element;
        $this->level = $component->level;
    }

    public function render()
    {
        $this->mount();
        return view('livewire.config.componente');
    }
}