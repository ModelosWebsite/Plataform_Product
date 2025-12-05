<?php

namespace App\Livewire\Site;

use App\Models\Marking;
use Livewire\Component;

class CalendarMarkingComponent extends Component
{
    public function render()
    {
        return view('livewire.site.calendar-marking-component', ["calendar" => Marking::query()->find(Session("idCalendar"))->first()]);
    }
}