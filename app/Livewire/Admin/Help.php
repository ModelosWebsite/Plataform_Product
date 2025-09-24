<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Services\HelpXzero;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Help extends Component
{
    use LivewireAlert;
    public $typehelp, $message;

    public function getCategory()
    {
        try {
            $helpCategory = HelpXzero::getCategories();
            \Log::info("help@getCategory", [
                "categories" => $helpCategory
            ]);
            return $helpCategory ?? [];
        } catch (\Throwable $th) {
            \Log::error("help@getCategory error", [
                "message" => $th->getMessage(),
                "file" => $th->getFile(),
                "line" => $th->getLine()
            ]);
        }  
    }

    public function saveHelp()
    {
        try {

            HelpXzero::storeHelp([
                "topic" => $this->typehelp,
                "origin" => "Website Clássico - ". auth()->user()->company->companyname,
                "message" => $this->message
            ]);

            $this->reset(['typehelp', 'message']);

            $this->alert('success', 'SUCESSO', [
                'toast' => false,
                'position' => 'center',
                'showConfirmButton' => false,
                'confirmButtonText' => 'OK',
            ]);

        } catch (\Throwable $th) {
            \Log::error("help@save",[
                "message" =>$th->getMessage(),
                "file" =>$th->getFile(),
                "line" =>$th->getLine(),
            ]);
            $this->alert('error', 'ERRO', [
                'toast'=>false,
                'position'=>'center',
                'showConfirmButton' => false,
                'confirmButtonText' => 'OK',
                'text' => 'Falha ao realizar operação'
            ]);
        }
    }

    public function render()
    {
        return view('livewire.admin.help', [
            "categories" => $this->getCategory()
        ]);
    }
}