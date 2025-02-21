<?php

namespace App\Livewire\Config;

use App\Models\Documentation;
use App\Models\hero;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\Component;

class Inicial extends Component
{
    public $title,$databout, $description, $image, $hero = [];
    
    use LivewireAlert;
    use WithFileUploads;

    public function render()
    {
        // $this->mount();
        return view('livewire.config.inicial');
    }

    // public function loadHeroData($itemId)
    // {
    //     $item = hero::find($itemId);
    //     $this->title = $item->title;
    //     $this->description = $item->description;
    //     $this->image = $item->image;
    // }

    // public function mount()
    // {
    //     $this->hero = hero::where("company_id", auth()->user()->company->id)->get();
    //     $this->databout = Documentation::where("panel", "PAINEL DO ADMINISTRADOR")->where("section", "SOBRE")->get();
    // }

    public function heroSave()
    {
        try {      
            $data = new hero();

            // Manipulação de arquivo
            if ($this->image != null && !is_string($this->image)) {
                $fileName = date('YmdHis') . "." . $this->image->getClientOriginalExtension();
                $this->image->storeAs("arquivos/hero", $fileName, 'public');
                $data->image = "arquivos/hero/" . $fileName;
            }

            $data->title = $this->title;
            $data->description = $this->description;
            $data->company_id = auth()->user()->company_id;
        
            $data->save();
            $this->mount();
                
            $this->alert('success', 'SUCESSO', [
                'toast' => false,
                'position' => 'center',
                'showConfirmButton' => false,
                'confirmButtonText' => 'OK',
                'text' => 'Informações do Hero Registradas'
            ]);

        } catch (\Throwable $th) {
            logger()->error($th->getMessage());
            $this->alert('error', 'ERRO', [
                'toast' => false,
                'position' => 'center',
                'showConfirmButton' => false,
                'confirmButtonText' => 'OK',
                'text' => 'Falha na operação'
            ]);
        }
    }

}