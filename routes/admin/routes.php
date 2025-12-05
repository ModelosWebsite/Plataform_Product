<?php

use App\Http\Controllers\Admin\{AboutController, BackgroudImageController, ColorController, ConfigSiteController, DeliveryController, ElementController, HabilidadeController};
use App\Http\Controllers\Admin\{DetailController, FooterController, HeroController, ConditionsController, ShoopingController};
use App\Http\Controllers\Admin\{HomeController, PortalPbCOntroller, ProductsController, ProfileController, QuestionControll, QuestionController, StatusDeliveryController};
use App\Livewire\Admin\{Category, Premium, GeneralShopping, Itens, VerifyDelivery, CustomDomainForm, MarkingsComponent};
use App\Livewire\Config\Hero;
use App\Livewire\Definition\DefinitionGeneral;
use App\Livewire\Site\DeliveryStatusComponent;
use App\Livewire\StatusDelivery;
use Illuminate\Support\Facades\Route;

Route::middleware("auth")->prefix("/painel/admin")->group(function()
{
    Route::controller(HomeController::class)->group(function()
    {
        Route::get("/principal", "index")->name("plataform.product.admin.index");
    });

    Route::controller(HeroController::class)->group(function()
    {
        Route::get("/hero", "heroview")->name("plataform.product.admin.hero");
        Route::post("/hero/salvar", "heroSave")->name("plataform.product.admin.hero.save");
        Route::post("/hero/update/{id}", "heroUpdate")->name("plataform.product.admin.hero.update");
        Route::get("/hero/eliminar/{id}", "heroDelete")->name("plataform.product.admin.hero.delete");
    });

    Route::controller(AboutController::class)->group(function()
    {
        Route::get("/sobre", "index")->name("plataform.product.admin.about");
        Route::post("/sobre/store", "storeAbout")->name("plataform.product.admin.about.store");
        Route::post("/sobre/actualizar", "actualizarAbout")->name("plataform.product.admin.about.update");
        Route::get("/sobre/eliminar/{id}", "sobreDelete")->name("plataform.product.admin.about.delete");
    });

    Route::controller(FooterController::class)->group(function()
    {
        Route::get("/rodape", "index")->name("plataform.product.admin.footer");
        Route::post("/rodape/store", "contactStore")->name("plataform.product.admin.footer.store");
        Route::post("/contact/update/{id}", "actualizarContact")->name("plataform.product.admin.footer.update");
        Route::get("/dodape/eliminar/{id}", "contactDelete")->name("plataform.product.admin.footer.delete");
    });

    Route::controller(QuestionController::class)->group(function()
    {
        Route::get("/question", "index")->name("plataform.product.admin.question");
        Route::post("/question/store", "questionStore")->name("plataform.product.admin.question.store");
        Route::post("/question/update/{id}", "questionUpdate")->name("plataform.product.admin.question.update");
        Route::get("/question/delete/{id}", "questionDelete")->name("plataform.product.admin.question.delete");
    });

    Route::controller(DetailController::class)->group(function()
    {
        Route::get("/detalhes", "index")->name("plataform.product.admin.detail");
        Route::post("/detalhes/store", "storeDetail")->name("plataform.product.admin.datail.store");
        Route::post("/detalhes/update/{id}", "actualizarDetalhes")->name("plataform.product.admin.datail.update");
        Route::get("/detalhes/delete/{id}", "detailDelete")->name("plataform.product.admin.datail.delete");
    });

    Route::controller(ColorController::class)->group(function()
    {
        Route::get("/cores/inicial", "index")->name("plataform.product.admin.color");
        Route::post("/cores/store", "storeColor")->name("plataform.product.admin.color.store");
    });

    Route::controller(BackgroudImageController::class)->group(function()
    {
        Route::get("/imagem/fundo", "index")->name("plataform.product.admin.background.image");
        Route::post("/imagem/store", "imagebackgroundstore")->name("plataform.product.admin.background.image.store");
        Route::post("/imagem/update", "imageBackgroundUpdate")->name("plataform.product.admin.background.image.update");
        Route::get("/imagem/delete/{id}", "imageBackgroundDelete")->name("plataform.product.admin.background.image.delete");
    });

    Route::controller(ProfileController::class)->group(function()
    {
        Route::get("/perfil/usuario", "index")->name("plataform.product.admin.background.profile.user");
        Route::post("/perfil/update/{id}", "updateProfile")->name("plataform.product.admin.background.profile.update");
    });

    Route::controller(ConditionsController::class)->group(function(){
        Route::get("termos/condições", "conditionsView")->name("admin.conditions.view");
        Route::post("termos/condições/save", "conditionsCreate")->name("admin.conditions.create");
        Route::put('/items/update-status', 'termoStatus')->name('items.updateStatus');
    });

    Route::controller(ConfigSiteController::class)->group(function(){
        Route::get("/config/site", "configView")->name("admin.config.view");
        Route::put("/config/status", "updateStatus")->name("admin.update.status.company");
    });

    Route::controller(QuestionControll::class)->group(function(){
        Route::get("/perguntas/frequentes", "index")->name("admin.panel.question");
    });

    Route::controller(ShoopingController::class)->group(function(){
        Route::get("/elementos/premium", "index")->name("plataform.product.admin.loja.online");
        Route::get("/add/cart/{id}", "addCart")->name("loja.add.cart");
        Route::get("/lista/Carrinho/", "getTotalCart")->name("loja.get.cart.total");
    });

    Route::controller(PortalPbCOntroller::class)->group(function(){
        Route::get("/portal/pb", "index")->name("admin.portal.pb");
    });

    Route::controller(HabilidadeController::class)->group(function(){
        Route::get("/habilidades/ver", "habilityview")->name("admin.hability.view");
        Route::post("/criar/habilidade", "habilityCriar")->name("admin.hability.criar");
    });

    Route::controller(StatusDeliveryController::class)->group(function(){
        Route::get("/delivery/status", "index")->name("plataform.product.admin.delivery.status");
        Route::get("/delivery/status/reference", "deliveryReference")->name("plataform.product.admin.delivery.reference");
    });

    Route::controller(ProductsController::class)->group(function(){
        Route::get("/produtos", "index")->name("plataform.product.admin.products");
        Route::post("/produtos/adicionar", "storeProduct")->name("plataform.product.admin.products.save");
        Route::post("/produtos/actualizar", "updateProduct")->name("plataform.product.admin.products.update");
        Route::get("/eliminar/produto/{id?}", "productDelete")->name("plataform.product.admin.delete.product");
    });

    Route::controller(ElementController::class)->group(function(){
        Route::get("/elemento/inicial", "index")->name("plataform.product.admin.elements");
        Route::post("/elemento/save", "storeElement")->name("plataform.product.admin.elements.store");
    });

    Route::controller(DeliveryController::class)->group(function(){
        Route::get("/encomendas/lista", "index")->name("shoppind.list.deliveries");
    });

    //configurações
    Route::get("/encomenda/estado/{id}", DeliveryStatusComponent::class)->name("delivery.status");
    Route::get("/definicao/geral/", DefinitionGeneral::class)->name("definition.general");
    Route::get("config/", Hero::class)->name("admin.management.config");

    //movimentação da loja
    Route::get("/categorias", Category::class)->name("admin.shopping.category");
    Route::get("/itens", Itens::class)->name("admin.shopping.itens");
    Route::get("/verificar", VerifyDelivery::class)->name("admin.verify.delivery");
    Route::get("/loja", GeneralShopping::class)->name("admin.general.shopping");
    Route::get("/loja/premium", Premium::class)->name("admin.shopping.premium");
    Route::get("personalized/domain", CustomDomainForm::class)->name('admin.domain');
    Route::get("/marcações", MarkingsComponent::class)->name('admin.markings');
});