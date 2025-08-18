<?php

namespace App\Livewire\Definition;

use App\Models\{Fundo, company};
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Background extends Component
{
    public $fundo, $image, $type, $fundoId, $currentImage, $company;
    use LivewireAlert;
    use WithFileUploads;
    
    public function mount()
    {
        $this->fundo = Fundo::where("company_id", auth()->user()->company->id)->get();
        $this->company = company::find(auth()->user()->company->id);
    }

    public function render()
    {
        return view('livewire.definition.background');
    }

    public function load($id) 
    {
        $background = Fundo::find($id);
        $this->fundoId = $background->id;
        $this->currentImage = $background->image;  // Carrega a imagem atual
        $this->type = $background->tipo;
    }

    public function imagebackgroundstore()
    {
        try {
            // Se fundoId estiver definido, é uma atualização, caso contrário, é uma criação
            if ($this->fundoId) {
                $fundo = Fundo::find($this->fundoId);
            } else {
                $fundo = new Fundo();
                $fundo->company_id = auth()->user()->company->id;
            }

            $fundo->tipo = $this->type;

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
                $this->image->storeAs("public/arquivos/background", $fileName);
                $fundo->image = $fileName;
            } elseif (!$this->hero_id) {
                $fundo->image = $this->img;
            }


            $fundo->save();
            $this->resetform();
            $this->mount();

            $this->alert('success', 'SUCESSO', [
                'toast' => false,
                'position' => 'center',
                'showConfirmButton' => false,
                'confirmButtonText' => 'OK',
                'text' => $this->fundoId ? 'Imagem Atualizada' : 'Imagem Cadastrada'
            ]);

        } catch (\Throwable $th) {
            \Log::error("DefiniçõesGerais@Add Imagem", [
                "message" => $th->getMessage(),
                "file" => $th->getFile(),
                "line" => $th->getLine()
            ]);
            $this->alert('error', 'ERRO', [
                'toast' => false,
                'position' => 'center',
                'showConfirmButton' => false,
                'confirmButtonText' => 'OK',
                'text' => 'Falha na operação'
            ]);
        }
    }

    public function resetform()
    {
        $this->image = null;
        $this->type = "";
        $this->fundoId = null;
    }
}