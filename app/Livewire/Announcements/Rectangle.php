<?php

namespace App\Livewire\Announcements;

use Illuminate\Support\Facades\Http;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Rectangle extends Component
{
    use LivewireAlert;

    public function render()
    {
        return view('livewire.announcements.rectangle', ["announcements" => $this->announcements()]);
    }

    public function announcements()
    {
        try {
            $url = 'https://fortcodedev.com/api/announcements';
            //$url = 'http://127.0.0.2:8000/api/announcements';
            $response = Http::get($url)->json();

            if ($response != null) {
                return $response;
            }

        } catch (\Throwable $th) { 
            $this->alert('error', 'FALHA', [
                'position' => 'center',
                'toast' => false,
                'timer' => 2000,
                'text' => 'Falha ao realizar operação',
            ]);
        }
    }
}