<?php
namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\company;
use Illuminate\Support\Facades\{DB, Http};
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use App\Services\{Grouping, SubCategoryKytutes};

class Itens extends Component
{
    use LivewireAlert, WithFileUploads;

    public $cost, $description, $longdescription, $price,$imagePath,
    $image, $category_id, $qtd, $editing = false, $getItens = [],
    $itemId, $company;
    //agrupamentos
    public $groupcategories, $subcategories, $classifications, $subclassifications, $origins, $naturezas;
    //ids dos agrupamento para enviar na api
    public $idcat, $idsubcat, $idclass, $idsubclass, $idorigen, $idnature, $idnatureza;

    protected $listeners = ['refreshItems' => 'getItens'];

    public function mount()
    {
        $this->company = company::find(auth()->user()->company_id);
        // endpoint: api/categories
        $this->groupcategories = array_merge(
            Grouping::getGrouping("categories")['categories'], 
            $this->getCategories()
        );

        // endpoint: api/subcategories
        $this->subcategories = array_merge(
            Grouping::getGrouping("subcategories")['subcategories'], 
            SubCategoryKytutes::getSubcategory($this->company->companytokenapi)
        );
        // endpoint: api/classifications
        $this->classifications = Grouping::getGrouping("classifications")['classifications'];
        // endpoint: api/subclassifications
        $this->subclassifications = Grouping::getGrouping("subclassifications")['subclassifications'];
        // endpoint: api/origins
        $this->origins = Grouping::getGrouping("origins")['origins'];
        // endpoint: api/origins
        $this->naturezas = Grouping::getGrouping("naturezas")['naturezas'];
    }

    public function render()
    {
        $this->getItens = $this->getItens();
        return view('livewire.admin.itens')->layout('layouts.config.app');
    }

    public function getToken()
    {
        return [
            "Accept" => "application/json",
            "Content-Type" => "application/json",
            "Authorization" => "Bearer " . auth()->user()->company->companytokenapi
        ];
    }

    public function getItens()
    {
        try {
            $response = Http::withHeaders($this->getToken())
            ->get("https://shop.xzero.live/api/items")->json();

            if ($response != null) {
                return $response;
            } 
        } catch (\Throwable $th) {
            $this->alert('error', 'ERRO', [
                'toast' => false,
                'position' => 'center',
                'showConfirmButton' => true,
                'confirmButtonText' => 'OK',
                'text' => 'Falha ao realizar operação. Por favor, tente novamente.'
            ]);
        }
    }

    public function getCategories()
    {
        try {
            $response = collect(Http::withHeaders($this->getToken())
            ->get("https://shop.xzero.live/api/categories")->json())->sortBy(function ($delivery) {return $delivery->name ?? ''; })->values()->all();

            if ($response != null) {
                return $response;
            } else {
                $this->alert('error', 'Erro ao carregar categorias!', [
                    'toast' => false,
                    'position' => 'center',
                    'showConfirmButton' => true,
                    'confirmButtonText' => 'OK',
                ]);
            }
        } catch (\Throwable $th) {
            $this->alert('error', 'ERRO', [
                'toast' => false,
                'position' => 'center',
                'showConfirmButton' => true,
                'confirmButtonText' => 'OK',
                'text' => 'Falha ao realizar operação. Por favor, tente novamente.'
            ]);
        }
    }

    public function createItem()
    {
        DB::beginTransaction();
        try {
            // Upload do arquivo
            if ($this->image != null && !is_string($this->image)) {
                $filename = rand(2000, 3000) .".".$this->image->getClientOriginalExtension();
                $this->image->storeAs('items', $filename, 'public');
            }

            $infoItem = [
                "iva" => 0,
                "cost" => $this->cost ?? 0,
                "price" => $this->price,
                "quantity" => $this->qtd,
                "description" => $this->description,
                "longDescription" => $this->longdescription,
                "image" => $filename ?? null,
                "category" => $this->idcat,
                "subcategory" => $this->idsubcat,
                "classificationId" => $this->idclass,
                "subclassificationId" => $this->idsubclass,
                "naturezaId" => $this->idnatureza,
                "originId" => $this->idorigen,
            ];

            \Log::info("Informações do item a ser criado", $infoItem);

            $response = Http::withHeaders($this->getToken())
            ->post("https://shop.xzero.live/api/items", $infoItem);

            \Log::info("Resposta da API ao criar produto", $response->json());

            if ($response->failed()) {
                $errors = $response->json('errors') ?? [];
                $message = $response->json('message') ?? 'Erro ao criar produto.';

                foreach ($errors as $campo => $msgs) {
                    foreach ($msgs as $msg) {
                        $this->addError($campo, $msg);
                    }
                }

                DB::rollBack();
                return;
            }else{
                // sucesso
                $this->resetForm();
                $this->editing = false;

                DB::commit();

                $this->alert('success', 'Item Cadastrado!', [
                    'toast' => false,
                    'position' => 'center',
                    'showConfirmButton' => false,
                ]);
            }

        } catch (\Throwable $th) {
            \Log::error("Erro ao criar item", [
                "message" => $th->getMessage(),
                "file" => $th->getFile(),
                "line" => $th->getLine()
            ]);

            DB::rollBack();

            $this->alert('error', 'ERRO', [
                'toast' => false,
                'position' => 'center',
                'showConfirmButton' => true,
                'text' => 'Falha ao realizar operação. Por favor, tente novamente.'
            ]);
        }
    }

    public function editItem($id)
    {
        // Filtra o item na lista de dados vindos da API
        $existingItem = collect($this->getItens())->firstWhere('reference', $id);

        if ($existingItem) {
            // Carrega os dados do item no formulário
            $this->itemId = $existingItem['reference'];
            $this->description = $existingItem['name'];
            $this->longdescription = $existingItem['description'];
            $this->price = $existingItem['price'];
            $this->qtd = $existingItem['quantity'];
            $this->idcat = $existingItem['categoryId'];
            $this->idsubcat = $existingItem['subcategoryId'];
            $this->idclass = $existingItem['classification_id'];
            $this->idsubclass = $existingItem['subclassification_id'];
            $this->idnatureza = $existingItem['natureza_id'];
            $this->idorigen = $existingItem['origin_id'];
            $this->image = $existingItem['image'];
            $this->editing = true;

        } else {
            $this->alert('error', 'Item não encontrado!', [
                'toast' => false,
                'position' => 'center',
                'showConfirmButton' => true,
                'confirmButtonText' => 'OK',
            ]);
        }
    }

    public function deleteItem($getId)
    {
        try {
            $response = Http::withHeaders($this->getToken())
            ->delete("https://shop.xzero.live/api/items", ["reference" => $getId])->json();

            if ($response != null) {
                $this->alert('success', 'Item Eliminado', [
                    'toast' => false,
                    'position' => 'center',
                    'showConfirmButton' => false,
                    'confirmButtonText' => 'OK',
                ]);
            }

        } catch (\Throwable $th) {
            $this->alert('error', 'ERRO', [
                'toast' => false,
                'position' => 'center',
                'showConfirmButton' => true,
                'confirmButtonText' => 'OK',
                'text' => 'Falha ao realizar operação. Por favor, tente novamente.'
            ]);
        }
    }

    public function resetForm()
    {
        $this->price = "";
        $this->qtd = "";
        $this->description = "";
        $this->category_id = "";
        $this->longdescription = "";
        $this->image = null;
        $this->itemId = "" ;
        $this->idcat= "";
        $this->idsubcat= "";
        $this->idclass = "";
        $this->idsubclass = "";
        $this->idnatureza = "";
        $this->idorigen = "";
        $this->itemId = "";
    }

    public function updateItem()
    {
        DB::beginTransaction();
        try {
            // Upload do arquivo
            $filename = "";
            if ($this->image != null && !is_string($this->image)) {
                $filename = rand(2000, 3000) .".".$this->image->getClientOriginalExtension();
                $this->image->storeAs('items', $filename, 'public');
            }else{
                $filename = $this->image;
            }
        
            $infoItem = [
                "iva" => 0,
                "cost" => $this->cost ?? 0,
                "price" => $this->price,
                "quantity" => $this->qtd,
                "description" => $this->description,
                "longDescription" => $this->longdescription,
                //"image" => $upload->sendFile()
                "image" =>  $filename,
                "category" => $this->idcat,
                "subcategory" => $this->idsubcat,
                "classificationId" => $this->idclass,
                "subclassificationId" => $this->idsubclass,
                "naturezaId" => $this->idnatureza,
                "originId" => $this->idorigen,
                "reference" => $this->itemId
            ];

            \Log::info("Produto a actualizar", ["produto" => $infoItem]);
            
            $response = Http::withHeaders($this->getToken())
            ->put("https://shop.xzero.live/api/items", $infoItem);
            
            \Log::info("Produtos@Update", $response->json());
            
            if ($response->failed()) {
                $errors = $response->json('errors') ?? [];
                $message = $response->json('message') ?? 'Erro ao criar produto.';

                foreach ($errors as $campo => $msgs) {
                    foreach ($msgs as $msg) {
                        $this->addError($campo, $msg);
                    }
                }

                DB::rollBack();
                return;
            }else{
                // sucesso
                $this->resetForm();
                $this->editing = false;

                DB::commit();

                $this->alert('success', 'Item Cadastrado!', [
                    'toast' => false,
                    'position' => 'center',
                    'showConfirmButton' => false,
                ]);
            }
            
            DB::commit();

        } catch (\Throwable $th) {
            \Log::error("Produtos@Update", [
                'message' => $th->getMessage(), 
                'file' => $th->getFile(),
                'line' => $th->getLine()
            ]);
            DB::rollBack();
            $this->alert('error', 'ERRO!', [
                'toast' => false,
                'position' => 'center',
                'showConfirmButton' => false,
                'confirmButtonText' => 'OK',
            ]);
        }
    }
}