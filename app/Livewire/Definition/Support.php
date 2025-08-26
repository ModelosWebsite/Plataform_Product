<?php

namespace App\Livewire\Definition;

use Livewire\Component;
use App\Models\company;

class Support extends Component
{
    public $dataCompanies;

    public function mount()
    {
        $this->dataCompanies = company::query()->find(auth()->user()->company_id);
    }

    public function render()
    {
        return view('livewire.definition.support');
    }
}
