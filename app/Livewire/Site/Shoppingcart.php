<?php

namespace App\Livewire\Site;

use App\Models\{company, Payment, BankAccount, pacote};
use Livewire\Component;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Support\Facades\Http;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Shoppingcart extends Component
{
    use WithFileUploads, LivewireAlert;

    // Dados gerais do carrinho
    public $number = 0, $localizacao = 0, $cartContent, $getTotal, $getSubTotal,
           $getTotalQuantity, $cupon, $taxapb = 0, $finalCompra,
           $totalFinal = 0, $code, $delveryId, $receipt, $deliveryType;

    // Dados de checkout
    public $name, $lastname, $province, $municipality, $street, $phone, $otherPhone,
           $email, $deliveryPrice = 0, $taxPayer, $otherAddress, $deliveryUrl,
           $latitude, $longitude, $referenceNumber, $paymentType, $bankAccount, $package,$cart =0;

    // Guarda apenas o ID da empresa
    public $companyId, $cartQuantities = [];

    protected $listeners = ["updateQuantity", "setLocation"];

    public function mount()
    {
        $company = company::where("companyhashtoken", session("tokencompany"))->firstOrFail();
        $this->companyId = $company->id;

        $this->paymentType  = $company->payment_type;
        $this->deliveryType = $company->delivery_method;
        $this->package      = $this->loadPackage();
        
        $this->removeOtherCompanyItems();
    }

    public function render()
    {
        try {
            $company = $this->getCompany();

            $this->cartContent = Cart::getContent();
            $this->getTotal = Cart::getTotal();
            $this->getSubTotal = Cart::getSubTotal();
            $this->getTotalQuantity = Cart::getTotalQuantity();

            $this->finalCompra = $company->delivery_method === "Entregadores PB"
            ? $this->getSubTotal + $this->localizacao
            : $this->getSubTotal;

            $this->taxapb = ($this->finalCompra * 14) / 100;

            $this->totalFinal = $company->payment_type === "Referência"
                ? $this->finalCompra + $this->taxapb
                : $this->finalCompra;

            if (!$this->referenceNumber) {
                $this->referenceNumber = rand(100000000, 999999999);
            }

            $this->bankAccount = $this->bankAccountDetails();

            foreach ($this->cartContent as $item) {
                $this->cartQuantities[$item->id] = $item->quantity;

                \Log::info("Shopping@mount", [
                    "quantity" => $this->cartQuantities[$item->id]
                ]);
            }

            return view('livewire.site.shoppingcart', [
                'locations' => $this->getAllLocations()
            ]);
        } catch (\Throwable $th) {
            \Log::error("Erro no render carrinho: " . $th->getMessage());
        }
    }

    private function getCompany(): Company
    {
        return company::findOrFail($this->companyId);
    }

    private function loadPackage()
    {
        return pacote::where('company_id', $this->companyId)->where('is_active', true)
        ->where("package_name", "Transferência")->latest()->first();
    }

    private function bankAccountDetails()
    {
        return BankAccount::where('company_id', $this->companyId)->first();
    }

    private function getHeaders()
    {
        return [
            "Accept"        => "application/json",
            "Content-Type"  => "application/json",
            "Authorization" => $this->getCompany()->companytokenapi,
        ];
    }

    public function cuponDiscount()
    {
        try {
            $response = Http::withHeaders($this->getHeaders())
                ->post(env("LINK_KITUTES") . "/cupons", [
                    "code"  => $this->code,
                    "total" => $this->totalFinal,
                ]);

            $cupon = collect(json_decode($response));

            if (isset($cupon['discount'])) {
                session()->put('discountvalue', $cupon['discount']);
                $this->code = "";
            }
        } catch (\Throwable $th) {
            \Log::error("Erro ao aplicar cupom: " . $th->getMessage());
        }
    }

    public function checkout()
    {
        try {
            $company = $this->getCompany();

            // Upload do comprovativo
            $fileName = null;
            if ($company->payment_type === "Transferência" && $this->receipt && !is_string($this->receipt)) {
                $fileName = md5($this->receipt->getClientOriginalName()) . "." . $this->receipt->getClientOriginalExtension();
                $this->receipt->storeAs("public/recibos", $fileName);
            }

            // Itens do carrinho
            $items = [];
            foreach (Cart::getContent() as $item) {
                $items[] = [
                    "id"       => $item->id,
                    "name"     => $item->name,
                    "price"    => $item->price,
                    "quantity" => $item->quantity,
                ];
            }

            // Dados para API de entrega
            $data = [
                "clientName" => $this->name,
                "clientLastName"=> $this->lastname,
                "province" => $this->province,
                "municipality" => $this->municipality,
                "street" => $this->street,
                "cupon" => "",
                "deliveryPrice" => $this->localizacao ?? 0,
                "phone" => $this->phone,
                "otherPhone" => 999999999,
                "email" => $this->email,
                "taxPayer" => $this->taxPayer,
                "paymentType" => $company->payment_type,
                "receipt" => $fileName,
                "latitude" => $this->latitude,
                "longitude" => $this->longitude,
                "items" => $items,
            ];

            $response = Http::withHeaders($this->getHeaders())
            ->post("https://kytutes.com/api/deliveries", $data)->json();

            if ($response) {
                Payment::create([
                    'reference' => $this->referenceNumber,
                    'value' => $this->totalFinal,
                    'status' => "pendente",
                    'typeservice' => "Pagamento de Encomenda",
                    'company_id' => $this->companyId
                ]);

                session()->put("idDelivery", $response['reference']);
                session()->put("companyapi", $company->companyhashtoken);
            }

            Cart::clear();

            return redirect()->route("plataforma.produto.delivery.status", ["company" => $company->companyhashtoken]);

        } catch (\Throwable $th) {
            \Log::error("Erro ao finalizar encomenda: " . $th->getMessage());
        }
    }

    public function remove($id)
    {
        try {
            Cart::remove($id);
            $this->alert('success', '', [
                'toast'    => false,
                'position' => 'center',
                'timer'    => 1000,
                'text'     => 'Item Eliminado'
            ]);
        } catch (\Throwable $th) {
            \Log::error("Erro ao remover item: " . $th->getMessage());
        }
    }

    public function updateQuantity($id, $quantity, $name)
    {
        try {

            $product = Http::withHeaders($this->getHeaders())
            ->get("https://kytutes.com/api/items?description=$name")->json();

            if ((int) $quantity > (int) $product[0]["quantity"]) {

                $this->alert('info', 'Informação', [
                    'toast' => false,
                    'position' => 'center',
                    'showConfirmButton' => true,
                    'confirmButtonText' => 'OK',
                    'text' => 'Quantidade indisponível'
                ]);

                // Restaura quantidade original no estado
                $this->cartQuantities[$id] = $this->cartQuantities[$id];
                return;
            }

            // Atualiza quantidade no estado
            $this->cartQuantities[$id] = (int) $quantity;

            Cart::remove($id);
            Cart::add([
                'id'        => $product[0]["reference"],
                'name'      => $product[0]["name"],
                'price'     => $product[0]["price"],
                'quantity'  => (int) $quantity,
                'attributes'=> [
                    'image'      => $product[0]["image"],
                    'company_id' => $this->getCompany()->id
                ]
            ]);

        } catch (\Throwable $th) {
            \Log::info("message", [
                "message" => $th->getMessage(),
                "file" => $th->getFile(),
                "line" => $th->getLine()
            ]);
        }
    }

    public function getAllLocations()
    {
        try {
            return collect(Http::withHeaders($this->getHeaders())
                ->get("https://kytutes.com/api/locations")
                ->json());
        } catch (\Throwable $th) {
            \Log::error("Erro ao carregar localizações: " . $th->getMessage());
            return collect([]);
        }
    }

    public function selectLocation($price)
    {
        $this->localizacao = $price;
    }

    public function setLocation($latitude, $longitude)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        \Log::info("Geolocalização: $latitude, Longitude: $longitude");
    }

    private function removeOtherCompanyItems()
    {
        foreach (Cart::getContent() as $item) {
            if (isset($item->attributes['company_id']) && $item->attributes['company_id'] != $this->companyId) {
                Cart::remove($item->id);
            }
        }
    }
}