<?php

namespace App\Livewire\Admin;

use App\Models\company;
use Illuminate\Support\Facades\Http;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Encomenda extends Component
{
    use LivewireAlert;
    public $company, $deliveries, $response, $id,
    $itens, $delivery, $item, $newStatus, $pending;
    
    protected $listeners = ['confirmedUpdateStatus'];

    public function render()
    {
        $this->mount();
        return view('livewire.admin.encomenda');
    }

    public function mount()
    {
        try {
            $this->company = company::where("id", auth()->user()->company_id)->first();
            
            $headers = [
                "Accept" => "application/json",
                "Content-Type" => "application/json",
                "Authorization" => "Bearer {$this->company->companytokenapi}",
            ];
    
            //Chamada a API
            $this->deliveries = collect(Http::withHeaders($headers)->get("https://kytutes.com/api/deliveries")
            ->json())->sortBy(function ($delivery) {return $delivery['delivery']['client'] ?? ''; })->values()->all();

        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function updateStatus($id, $newStatus, $pending)
    {
        $this->confirm('Tem certeza?', [
            'icon' => 'question',
            'text' => $pending === "PENDENTE"
            ? 'Informamos que se aceitar, não é de nossa responsabilidade aferir a originalidade do comprovativo de pagamento por transferência.'
            : '',
            'confirmButtonText' => 'Sim, aceitar',
            'cancelButtonText' => 'Cancelar',
            'onConfirmed' => 'confirmedUpdateStatus',
            'inputAttributes' => [
                'id' => $id,
                'status' => $newStatus
            ]
        ]);
    }

    public function confirmedUpdateStatus($data)
    {
        try {
            $id = $data['inputAttributes']['id'];
            $newStatus = $data['inputAttributes']['status'];

            $headers = [
                "Accept" => "application/json",
                "Content-Type" => "application/json",
                "Authorization" => "{$this->company->companytokenapi}",
            ];

            // Chamada à API para obter a entrega
            $response = Http::withHeaders($headers)
            ->get("https://kytutes.com/api/deliveries?reference=$id");

            $delivery = collect(json_decode($response, true));

            if ($delivery->isEmpty()) {
                $this->alert('error', 'ERRO', [
                    'toast' => false,
                    'position' => 'center',
                    'showConfirmButton' => true,
                    'confirmButtonText' => 'OK',
                    'text' => 'Entrega não encontrada'
                ]);
                return;
            }

            foreach ($delivery as $item) {

                $estado = $item['delivery']['status'];
                $this->pending = $estado;
                $estadosPendentes = ['PENDENTE', 'ACEITE', 'EM PREPARAÇÃO', 'PRONTO', 'A CAMINHO'];

                if (in_array($estado, $estadosPendentes)) {
                    $updateResponse = Http::withHeaders($headers)
                        ->put("https://kytutes.com/api/deliveries?reference=$id", [
                            'switch' => $newStatus
                        ]);

                    if ($updateResponse->successful()) {
                        $this->alert('success', 'Encomeda Aceite', [
                            'toast' => false,
                            'position' => 'center',
                            'showConfirmButton' => false,
                            'confirmButtonText' => 'OK',
                        ]);
                    } else {
                        $this->alert('error', 'ERRO', [
                            'toast' => false,
                            'position' => 'center',
                            'showConfirmButton' => true,
                            'confirmButtonText' => 'OK',
                            'text' => 'Falha ao atualizar status'
                        ]);
                    }
                }
            }

        } catch (\Throwable $th) {
            \Log::info("Erro Trocar Estado da Encomenda", [
                "message" => $th->getMessage(),
                "line" => $th->getLine()
            ]);
            $this->alert('error', 'ERRO', [
                'toast' => false,
                'position' => 'center',
                'showConfirmButton' => true,
                'confirmButtonText' => 'OK',
                'text' => 'Falha ao realizar operação: '
            ]);
        }
    }

    public function download($id)
    {
        try {
            $headers = [
                "Accept" => "application/json",
                "Content-Type" => "application/json",
                "Authorization" => "{$this->company->companytokenapi}",
            ];
    
            //Chamada a API
            $response = Http::withHeaders($headers)
            ->get("https://kytutes.com/api/deliveries?reference=$id");
            
            $datas = collect(json_decode($response, true));

            foreach ($datas as $item) {
                $receipt = $item['delivery']['receipt'];
            }

            $this->alert('info', '', [
                'toast'=>false,
                'position'=>'center',
                'timer'=>1000,
                'timerProgressBar'=> true,
                'text'=>'A PROCESSAR DOWNLOAD...'
            ]);

            return response()->download(storage_path('app/public/recibos/' . $receipt));

        } catch (\Throwable $th) {
            \Log::error("Encomenda@download", [
                "message" => $th->getMessage(),
                "file" => $th->getFile(),
                "line" => $th->getLine(),
            ]);
            $this->alert('error', 'ERRO', [
                'toast'=>false,
                'position'=>'center',
                'showConfirmButton' => false,
                'confirmButtonText' => 'OK',
                'text'=>'Falha ao realizar operação'
            ]);
        }
    }

    public function deliveryItens($id)
    {
        try {
            $headers = [
                "Accept" => "application/json",
                "Content-Type" => "application/json",
                "Authorization" => "{$this->company->companytokenapi}",
            ];
    
            //Chamada a API
            $response = Http::withHeaders($headers)
            ->get("https://kytutes.com/api/deliveries?reference=$id");
            
            $this->itens = collect(json_decode($response));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}