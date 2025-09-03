<?php

namespace App\Livewire\Announcements;

use Illuminate\Support\Facades\Http;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Square extends Component
{
    use LivewireAlert;
    
    public function render()
    {
        return view('livewire.announcements.square',["announcements" => $this->announcements()]);
    }

    public function announcements()
    {
        try {
            $url = 'https://xzero.live/api/announcements';
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