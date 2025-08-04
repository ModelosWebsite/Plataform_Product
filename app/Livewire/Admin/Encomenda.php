<?php

namespace App\Livewire\Admin;

use App\Models\Company;
use Illuminate\Support\Facades\Http;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Encomenda extends Component
{
    use LivewireAlert;

    public $company;
    public $deliveries = [];
    public $itens = [];

    protected $listeners = [
        'changeStatus' => 'changeStatus'
    ];

    public function mount()
    {
        $this->company = Company::find(auth()->user()->company_id);

        try {
            $this->deliveries = $this->apiRequest("deliveries");
        } catch (\Throwable $th) {
        }
    }

    public function render()
    {
        return view('livewire.admin.encomenda');
    }

    private function apiHeaders(): array
    {
        return [
            "Accept" => "application/json",
            "Content-Type" => "application/json",
            "Authorization" => "Bearer {$this->company->companytokenapi}"
        ];
    }

    private function apiRequest(string $endpoint, string $method = 'GET', array $payload = [])
    {
        $url = "https://kytutes.com/api/$endpoint";
        $response = Http::withHeaders($this->apiHeaders());

        return match (strtoupper($method)) {
            'GET'    => $response->get($url)->json(),
            'POST'   => $response->post($url, $payload)->json(),
            'PUT'    => $response->put($url, $payload)->json(),
            default  => throw new \Exception("Método HTTP inválido")
        };
    }

    public function updateStatus($reference, $newStatus)
    {
        try {
            $deliveryData = $this->apiRequest("deliveries?reference={$reference}");
            $delivery = collect($deliveryData);

            foreach ($delivery as $item) {
                if ($item['delivery']['status'] === 'PENDENTE') {
                    $updateResponse = Http::withHeaders($this->apiHeaders())
                        ->put("https://kytutes.com/api/deliveries?reference={$reference}", [
                            'switch' => $newStatus
                        ]);

                    if ($updateResponse->successful()) {
                        $this->alert('success', 'Estado atualizado com sucesso');
                    } else {
                        $this->alert('error', 'Falha ao atualizar o estado');
                    }
                }
            }
        } catch (\Throwable $th) {
            $this->alert('error', 'Erro ao atualizar estado', [
                'text' => $th->getMessage(),
                'toast' => false,
                'position' => 'center'
            ]);
        }
    }

    public function download($reference)
    {
        try {
            $deliveryData = $this->apiRequest("deliveries?reference={$reference}");
            $delivery = collect($deliveryData)->first();

            $receipt = $delivery['delivery']['receipt'] ?? null;

            if (!$receipt) {
                throw new \Exception("Recibo não encontrado.");
            }

            $this->alert('info', 'A processar download...', ['timer' => 1000]);

            return response()->download(storage_path("app/public/recibos/{$receipt}"));
        } catch (\Throwable $th) {
            $this->alert('error', 'Erro ao realizar download', ['text' => $th->getMessage()]);
        }
    }

    public function deliveryItens($reference)
    {
        try {
            $this->itens = collect($this->apiRequest("deliveries?reference={$reference}"));
        } catch (\Throwable $th) {
            $this->alert('error', 'Erro ao carregar itens da entrega', [
                'text' => $th->getMessage()
            ]);
        }
    }
}