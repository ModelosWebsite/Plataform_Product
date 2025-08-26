<?php

namespace App\Livewire\Definition;

use Livewire\Component;
use App\Models\company;

class DefinitionGeneral extends Component
{
    public function render()
    {
        return view('livewire.definition.definition-general')->layout('layouts.config.app');
    }
}