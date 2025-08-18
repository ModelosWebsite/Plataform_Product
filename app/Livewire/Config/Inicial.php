<?php

namespace App\Livewire\Config;

use App\Models\Documentation;
use App\Models\{hero, company};
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\Component;

class Inicial extends Component
{
    public $title,$hero_id,$company, $img,$databout, $description, $image, $hero = [];
    
    use LivewireAlert;
    use WithFileUploads;

    public function render()
    {
        $this->mount();
        return view('livewire.config.inicial');
    }

    public function loadHeroData($itemId)
    {
        $item = hero::find($itemId);
        $this->hero_id = $item->id;
        $this->title = $item->title;
        $this->description = $item->description;
        $this->img = $item->img;
    }

    public function mount()
    {
        $this->hero = hero::where("company_id", auth()->user()->company->id)->get();
        $this->company = company::find(auth()->user()->company->id);
        $this->databout = Documentation::where("panel", "PAINEL DO ADMINISTRADOR")->where("section", "SOBRE")->get();
    }

    public function heroSave()
    {
        try {
            // Se existir um ID, atualiza o registro; caso contrário, cria um novo
            $data = $this->hero_id ? hero::find($this->hero_id) : new hero();

            // Manipulação de imagem
            // if ($this->image && !is_string($this->image)) {
            //     $upload = new \App\Services\UploadGoogleDrive(
            //         $this->company->companyname,
            //         $this->company->companynif,
            //         "Hero",
            //         $this->image
            //     );

            //     $data->img = $upload->sendFile();
            // } else {
            //     $data->img = $this->img;
            // }

            // Manipulação de imagem
            if ($this->image && !is_string($this->image)) {
                $fileName = date('YmdHis') . "." . $this->image->getClientOriginalExtension();
                $this->image->storeAs("arquivos/hero", $fileName);
                $data->img = $fileName;
            } else {
                $data->img = $this->img;
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
                'text' => $this->hero_id ? 'Informações do Hero Atualizadas' : 'Informações do Hero Registradas'
            ]);

            // Reseta o ID após o salvamento
            $this->hero_id = null;

        } catch (\Throwable $th) {
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