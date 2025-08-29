<?php

namespace App\Livewire\Config;

use Livewire\Component;
use App\Models\Skill;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Hability extends Component
{
    use LivewireAlert;

    public $habilityId, $hability, $level, $gethability;

    public function mount()
    {
        $this->refreshHabilities();
    }

    private function refreshHabilities(): void
    {
        $this->gethability = Skill::where("company_id", auth()->user()->company_id)->get();
    }

    private function showAlert(string $type, string $text): void
    {
        $this->alert($type, strtoupper($type), [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => false,
            'confirmButtonText' => 'OK',
            'text' => $text,
        ]);
    }

    public function habilityCriar(): void
    {
        try {
            if ($this->habilityId) {
                // Atualizar
                $hability = Skill::findOrFail($this->habilityId);
                $hability->update([
                    'hability' => $this->hability,
                    'level' => $this->level,
                ]);

                $this->showAlert('success', 'Habilidade Atualizada');
            } else {
                // Criar
                Skill::create([
                    'hability'   => $this->hability,
                    'level'      => $this->level,
                    'company_id' => auth()->user()->company_id,
                ]);

                $this->showAlert('success', 'Habilidade Cadastrada');
            }

            $this->reset(['habilityId', 'hability', 'level']);
            $this->refreshHabilities();

        } catch (\Throwable $th) {
            \Log::error("Habilidade@Criar/Atualizar", [
                "message" => $th->getMessage(),
                "file" => $th->getFile(),
                "line" => $th->getLine()
            ]);
            $this->showAlert('error', 'Falha na operação');
        }
    }

    public function editHability($id): void
    {
        $hability = Skill::findOrFail($id);
        $this->habilityId = $hability->id;
        $this->hability   = $hability->hability;
        $this->level      = $hability->level;
    }

    public function deleteHability($id): void
    {
        Skill::destroy($id);
        $this->refreshHabilities();
        $this->showAlert('success', 'Habilidade Eliminada');
    }

    public function render()
    {
        return view('livewire.config.hability');
    }
}