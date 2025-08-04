<?php

namespace App\Livewire\Site;

use App\Models\{company, Payment, BankAccount};
use Livewire\Component;
use Darryldecode\Cart\Facades\CartFacade;
use Illuminate\Support\Facades\Http;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Shoppingcart extends Component
{
    use WithFileUploads;
    use LivewireAlert;

    public $number = 0, $localizacao, $cartContent, $getTotal, $getSubTotal,
    $getTotalQuantity, $location, $cupon, $taxapb = 0, $finalCompra,
    $totalFinal = 0, $code, $delveryId;

    //propriedades de checkout
    public $name, $lastname, $province, $municipality, $street, $phone, $otherPhone,
    $email, $deliveryPrice =0,  $taxPayer,$otherAddress;
    public $company, $latitude, $longitude, $referenceNumber, $paymentType, $bankAccount;

    protected $listeners = ["updateQuantity", "setLocation"];

    public function render()
    {
        try {
            $this->cartContent = CartFacade::getContent();
            $this->getTotal = CartFacade::getTotal();
            $this->getSubTotal = CartFacade::getSubTotal();
            $this->getTotalQuantity = CartFacade::getTotalQuantity();
            $this->finalCompra = $this->getSubTotal + $this->localizacao;
            $this->taxapb = ($this->finalCompra * 14) / 100;
            if ($this->getCompany()->payment_type == "Referência") {
                $this->totalFinal = $this->finalCompra + $this->taxapb;
            }else {
                $this->totalFinal = $this->finalCompra;
                $this->taxapb = 0;
            }
            $this->referenceNumber = rand(100000000, 999999999);
            $this->paymentType = $this->getCompany()->payment_type;
            $this->bankAccount = $this->bankAccountDetails();

            return view('livewire.site.shoppingcart', ['locations' => $this->getAllLocations()]);
        } catch (\Throwable $th) {
            
        }
    }

    public function bankAccountDetails()
    {
        return BankAccount::where('company_id', $this->getCompany()->id)->first();
    }

    public function getCompany()
    {
        return company::where("companyhashtoken", session("tokencompany"))->first();
    }

    //Dados de autenticação a API
    public function getHeaders()
    {
        return [
            "Accept" => "application/json",
            "Content-Type" => "application/json",
            "Authorization" => $this->getCompany()->companytokenapi,
        ];
    }

    //logica para aplicar cupon de desconto
    public function cuponDiscount()
    {   
       try {
            $response = Http::withHeaders($this->getHeaders())
            ->post("https://kytutes.com/api/cupons",[
                "code"=>$this->code,
                "total"=>$this->totalFinal,
            ]);
            
            $cupon = collect(json_decode($response));
                
            if (isset($cupon['discount'])) {
                session()->put('discountvalue',$cupon['discount']);
                $this->code = "";
            }
       } catch (\Throwable $th) {
        //throw $th;
       }
    }
        
    public function checkout()
    {
        try {    
            //Acesso a API com um token
            $items = [];
            if (count(CartFacade::getContent()) > 0) {
                foreach(CartFacade::getContent() as $key => $item) {
                    array_push($items,[
                        "name"=>$item->name,
                        "price"=>$item->price,
                        "quantity"=>$item->quantity,
                    ]);
                }
            }
            
            $data = [
                "clientName" => $this->name,
                "clientLastName" => $this->lastname,
                "province" => $this->province,
                "municipality" => $this->municipality,
                "street" => $this->street,
                "cupon" => "",
                "deliveryPrice" => 0,
                "phone" => $this->phone,
                "otherPhone" => $this->otherPhone,
                "email" => $this->email,
                "taxPayer" => $this->taxPayer,
                "paymentType" => "Referência",
                "latitude" => $this->latitude,
                "longitude" => $this->longitude,
                "items" => $items,
            ];
            
            //Chamada a API
            $response = Http::withHeaders($this->getHeaders())
            ->post("https://kytutes.com/api/deliveries",$data)->json();
    
            $infoReference = [
                'amount' => $this->totalFinal,
                'referenceCode' => $this->referenceNumber,
            ];

            //$responsePayment = Http::post('https://fortcodedev.com/api/payment/website', $infoReference)->json();

            if ($response) {
            // if ($responsePayment != null) {
                Payment::create([
                    'reference' => $this->referenceNumber,
                    'value' => $this->totalFinal,
                    'status' => "pendente",
                    'typeservice' => "Pagamento de Encomenda",
                    'company_id' => $this->getCompany()->id
                ]);
            }

            CartFacade::clear();
            $this->reset([
                'name', 'lastname', 'province', 'municipality', 'street', 
                'phone', 'otherPhone', 'email', 'taxPayer', 'otherAddress',
                'latitude', 'longitude'
            ]);
    
            $this->alert('success', 'SUCESSO', [
                'toast'=>false,
                'position'=>'center',
                'timer'=>1000,
                'text'=>'Encomenda Finalizada'
            ]);

        } catch (\Throwable $th) {
            $this->alert("error", 
            [
                'toast'=>false,
                'position'=>'center',
                'timer'=>1000,
                "Falha na encomenda"
            ]
        );
        }
    }
    
    public function remove($id)
    {
        try {
            $itenDelete = CartFacade::remove($id);
            $this->alert('success', '', [
                'toast'=>false,
                'position'=>'center',
                'timer'=>1000,
                'text'=>'Item Eliminado'
            ]);
            return redirect()->back();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    
    public function updateQuantity($id, $quantity)
    {
        CartFacade::update($id, [
            'quantity' => 1,
        ]);
    }

    public function getAllLocations()
    {
        try {
            return Http::withHeaders($this->getHeaders())
            ->get("https://kytutes.com/api/locations")->json();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    
    public function selectLocation($price)
    {
        $this->localizacao = $price;
    }

    public function setLocation($latitude, $longitude)
    {
        try {
            $this->latitude = $latitude;
            $this->longitude = $longitude;
            \Log::info("Geolocalização: $latitude, Longitude: $longitude");
        } catch (\Throwable $th) {
            return [];
        }
    }
}