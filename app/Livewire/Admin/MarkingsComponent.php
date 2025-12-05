<?php

namespace App\Livewire\Admin;

use App\Models\{Marking, pacote};
use Illuminate\Support\Facades\Log;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class MarkingsComponent extends Component
{
    use LivewireAlert;

    public $title, $description, $cost, $html_embed, $appointment_id, $type;

    public function resetInputFields()
    {
        $this->title = '';
        $this->description = '';
        $this->cost = '';
        $this->html_embed = '';
        $this->appointment_id = null;
    }

    public function store()
    {
        // Validações dinâmicas
        $rules = [
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'html_embed'  => 'required|string',
            'type'        => 'required|in:free,paid',
        ];

        $messages = [
            'title.required' => 'O titulo é obrigatório',
            'html_embed.required' => 'O link é obrigatório'
        ];

        // Se o tipo for pago, validar cost >= 1000
        if ($this->type === 'paid') {
            $rules['cost'] = 'required|numeric|min:1000';
            $messages['cost.min'] = 'O custo não deve ser abaixo de 1000 Kz';
            $messages['cost.required'] = 'O custo é obrigatório';
        }

        // Se for grátis, cost NÃO deve ser obrigatório
        $this->validate($rules,$messages);

        try {
            // Se for FREE, cost deve ser zero
            if ($this->type === 'free') {
                $this->cost = 0;
            }

            $package = pacote::where("package_name", "Marcações")
            ->where("company_id", auth()->user()->company_id)
            ->value('is_active') ?? null;

            if ($package) {

                Marking::updateOrCreate(
                    ['id' => $this->appointment_id], 
                    [
                        'title'       => $this->title,
                        'description' => $this->description,
                        'cost'        => $this->cost,
                        'html_embed'  => $this->html_embed,
                        'type'        => $this->type,
                        'company_id'  => auth()->user()->company_id
                    ]
                );

                $this->alert('success', 'SUCESSO', [
                    'position' => 'center',
                    'toast' => false,
                    'timer' => 2000,
                    'text' => $this->appointment_id ? 'Marcação actualizada' : 'Marcação criada',
                ]);

                $this->resetInputFields();

            }else{

                $this->alert('warning', 'ATENÇÃO', [
                    'position' => 'center',
                    'toast' => false,
                    'timer' => 9000,
                    'html' => '<p>Para criar marcações grátuitas por favor clique no botão para activar o Elemento Premium necessário <br><br> <a href="' . route('admin.shopping.premium') . '" class="btn btn-sm btn-primary font-bold">Activar</a></p>',
                ]);

                return;
            }

        } catch (\Throwable $th) {

            Log::error("MarkingsComponent@store",[
                "message" => "Falha ao realizar operação",
                "error" => $th->getMessage(),
                "file" => $th->getFile(),
                "line" => $th->getLine(),
            ]);

            return [];
        }
    }

    public function edit($id)
    {
        $appointment = Marking::findOrFail($id);
        $this->appointment_id = $appointment->id;
        $this->title = $appointment->title;
        $this->html_embed = $appointment->html_embed;
        $this->description = $appointment->description;
        $this->cost = $appointment->cost;
    }

    public function render()
    {
        return view('livewire.admin.markings-component', [
        'appointments' => Marking::orderBy('title', 'asc')->get()
        ])->layout('layouts.config.app');
    }
}