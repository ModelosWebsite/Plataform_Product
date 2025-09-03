<?php

namespace App\Livewire\Config;

use App\Models\About as ModelsAbout;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class About extends Component
{
    public $getAbout, $p1, $p2, $itemId, $nome, $perfil, $image;
    public $editMode = false;
    use WithFileUploads;
    use LivewireAlert;

    public function toggleEditMode()
    {
        $this->editMode = !$this->editMode;
    }

    public function mount()
    {
        $getAbout = ModelsAbout::where("company_id", auth()->user()->company_id)->first();
        if ($getAbout) {
            $this->itemId = $getAbout->id;
            $this->nome = $getAbout->nome;
            $this->perfil = $getAbout->perfil;
            $this->p1 = $getAbout->p1;
            $this->p2 = $getAbout->p2;
            $this->image = $getAbout->image;
        } else {
            // Defina valores padrão caso $user seja null (nenhum contato encontrado)
            $this->itemId = null;
            $this->nome = null;
            $this->perfil = null;
            $this->p1 = null;
            $this->p2 = null;
            $this->image = null;
        }
    }

    public function save()
    {
        try {
            $getAbout = ModelsAbout::find($this->itemId);
            if (!$getAbout) {
                $getAbout = new ModelsAbout();
            }

                        // Manipulação de imagem
            if ($this->image && !is_string($this->image)) {
                // $upload = new \App\Services\UploadGoogleDrive(
                //     $this->company->companyname,
                //     $this->company->companynif,
                //     "Fundo",
                //     $this->image
                // );
                // $fundo->image = $upload->sendFile();

                $fileName = date('YmdHis') . "." . $this->image->getClientOriginalExtension();
                $this->image->storeAs("arquivos/background", $fileName);
                $getAbout->image = $fileName;
            } elseif (!$this->fundoId) {
                $getAbout->image = $this->image;
            }


            $getAbout->nome = $this->nome;
            $getAbout->perfil = $this->perfil;
            $getAbout->p1 = $this->p1;
            $getAbout->p2 = $this->p2;
            $getAbout->company_id = auth()->user()->company_id;

            $getAbout->save();

            $this->alert('success', 'SUCESSO', [
                'toast' => false,
                'position' => 'center',
                'showConfirmButton' => false,
                'confirmButtonText' => 'OK',
                'text' => 'Informação Criada'
            ]);
            
            $this->toggleEditMode();
        
        } catch (\Throwable $th) {
            $this->alert('error', 'ERRO', [
                'toast' => false,
                'position' => 'center',
                'showConfirmButton' => false,
                'confirmButtonText' => 'OK',
                'text' => 'Falha na operação: '
            ]);
        }
    }

    public function deleteAbout($id)
    {
        ModelsAbout::destroy($id);
        $this->mount(); // Atualiza a lista
    }

    public function render()
    {
        return view('livewire.config.about');
    }
}