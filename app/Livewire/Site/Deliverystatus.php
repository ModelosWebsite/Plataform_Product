<?php

namespace App\Livewire\Site;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class DeliveryStatus extends Component
{
    public ?string $deliveryNumber = null;
    public ?string $phoneNumber = null;
    public ?array $deliveries = null;

    public function mount(): void
    {
        session()->put('tokencompany', request()->input('company'));
    }

    /**
     * Fetch delivery status from the API.
     *
     * @return array|null
     */
    private function fetchDeliveryStatus(?string $deliveryNumber, ?string $phoneNumber): ?array
    {
        try {
            $headers = [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ];

            $response = Http::withHeaders($headers)
                ->get('https://kytutes.com/api/filter', [
                    'reference' => $deliveryNumber,
                    'phone' => $phoneNumber,
                ])->json();

            Log::info('DeliveryStatus@fetchDeliveryStatus', [
                'deliveryNumber' => $deliveryNumber,
                'phoneNumber' => $phoneNumber,
                'response' => $response,
            ]);

            return $response;
        } catch (\Throwable $th) {
            Log::error('DeliveryStatus@fetchDeliveryStatus', [
                'message' => $th->getMessage(),
                'file' => $th->getFile(),
                'line' => $th->getLine(),
            ]);

            session()->flash('error', 'Unable to fetch delivery status. Please try again later.');

            return null;
        }
    }

    /**
     * Get delivery status based on delivery number and phone number.
     *
     * @return array|null
     */
    public function status(): ?array
    {
        $deliveryNumber = $this->deliveryNumber ?? session('idDelivery');
        $phoneNumber = $this->phoneNumber ?? session('phoneNumber');

        if (empty($deliveryNumber) || empty($phoneNumber)) {
            session()->flash('error', 'Delivery number and phone number are required.');
            return null;
        }

        return $this->fetchDeliveryStatus($deliveryNumber, $phoneNumber);
    }

    /**
     * Set delivery details and fetch status.
     *
     * @return void
     */
    public function setDelivery(): void
    {
        $this->validate([
            'deliveryNumber' => 'required|string',
            'phoneNumber' => 'required|string',
        ]);

        $this->deliveries = $this->status();

        if ($this->deliveries) {
            session()->flash('success', 'Delivery status retrieved successfully.');
        }
    }

    /**
     * Render the component view.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.site.deliverystatus', [
            'data' => $this->deliveries ?? $this->status(),
        ])->layout('layouts.site.status');
    }
}