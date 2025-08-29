<?php

namespace App\Livewire\Definition;

use App\Models\{Color as ModelsColor, Theme, company, ThemeHasCompany};
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Color extends Component
{
    public $codigo, $letra, $themes, $theme_id;
    use LivewireAlert;

    public function mount()
    {
        $this->themes = Theme::query()->orderBy('name', 'asc')->get();
    }

    public function render()
    {
        return view('livewire.definition.color');
    }

    public function storecolor()
    {
        try {
            // Verifica se existe uma cor cadastrada para a empresa autenticada
            $selectColor = ModelsColor::where('company_id', auth()->user()->company->id)->first();

            if ($selectColor) {
                // Atualiza a cor existente
                $selectColor->codigo = $this->codigo;
                $selectColor->letra = $this->letra;
                $selectColor->save();

                $this->alert('success', 'SUCESSO', [
                    'toast' => false,
                    'position' => 'center',
                    'showConfirmButton' => false,
                    'confirmButtonText' => 'OK',
                    'text' => 'Cores Atualizadas'
                ]);
            } else {
                // Cria uma nova cor para a empresa
                $color = new ModelsColor();
                $color->codigo = $this->codigo;
                $color->letra = $this->letra;
                $color->company_id = auth()->user()->company->id;
                $color->save();

                $this->alert('success', 'SUCESSO', [
                    'toast' => false,
                    'position' => 'center',
                    'showConfirmButton' => false,
                    'confirmButtonText' => 'OK',
                    'text' => 'Cores Adicionadas'
                ]);
            }
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

    public function setTheme($theme_id)
    {
        try {
            // Garantir que o tema existe
            $theme = Theme::find($theme_id);

            // Buscar empresa do usuário autenticado
            $company = company::find(auth()->user()->company_id);

            // Atualizar info da empresa (se realmente quiser salvar o nome do tema como companybusiness)
            $company->update([
                'companybusiness' => $theme->name
            ]);

            // Associar empresa ao tema (cria ou atualiza)
            ThemeHasCompany::updateOrCreate(
                ['company_id' => $company->id],
                ['theme_id' => $theme->id]
            );

            // Alerta de sucesso
            $this->alert('success', 'SUCESSO', [
                'toast' => false,
                'position' => 'center',
                'showConfirmButton' => false,
                'confirmButtonText' => 'OK',
                'text' => 'Tema atualizado com sucesso!'
            ]);

        } catch (\Throwable $th) {
            // Logar erro para debug
            \Log::error("Erro ao atualizar tema: " . $th->getMessage());

            $this->alert('error', 'ERRO', [
                'toast' => false,
                'position' => 'center',
                'showConfirmButton' => false,
                'confirmButtonText' => 'OK',
                'text' => 'Falha na operação. Tente novamente mais tarde.'
            ]);
        }
    }
}