<?php

use App\Http\Controllers\SuperAdmin\{DocumentationController, PacoteController, RegisterCompanyController, VisitorController};
use App\Http\Controllers\SuperAdmin\{SuperAdminController, TermosController, UserController};
use App\Livewire\SuperAdmin\{FunctionalityPlusComponent, ThemeComponent};
use Illuminate\Support\Facades\Route;

Route::middleware("auth")->prefix("/super/admin")->group(function()
{
    Route::controller(SuperAdminController::class)->group(function(){
        Route::get("/inicial", "index")->name("super.admin.index");
        Route::get("/contas", "accountView")->name("super.admin.account.view");
    });

    Route::controller(RegisterCompanyController::class)->group(function(){
        Route::post("/registrar/empresa", "companyRegister")->name("super.admin.register.company");
        Route::post("/actualizar/empresa", "companyUpdate")->name("super.admin.update.empresa");
        Route::get("/eliminar/comapany/{companyid}", "deleteCompany")->name("super.admin.delete.company");
    });

    Route::controller(UserController::class)->group(function(){
        Route::get("/utilizadores/lista", "userView")->name("super.admin.user.view");
    });

    Route::controller(PacoteController::class)->group(function(){
        Route::get("/pacote/premium", "mainView")->name("super.admin.pacote.view");
        Route::post("/pacote/store", "store")->name("super.admin.pacote.store");
        Route::post("/pacote/actualizar/{id}", "updatePacote")->name("super.admin.pacote.update");
    });

    Route::controller(TermosController::class)->group(function(){
        Route::get("/politica", "privacyView")->name("super.privacy.view");
        Route::post("/politica/save", "privacyStore")->name("super.privacy.store");
    });

    Route::controller(DocumentationController::class)->group(function(){
        Route::get("/documentação/incial", "index")->name("super.admin.documentation.index");
        Route::post("/documentação/criar", "store")->name("super.admin.documentation.store");
    });

    Route::controller(VisitorController::class)->group(function(){
        Route::get("/metrics/incial", "index")->name("super.admin.visitor.index");
    });

    Route::get("/recursos", FunctionalityPlusComponent::class)->name("super.admin.functionality.plus");
    Route::get("/get/temas", ThemeComponent::class)->name("super.admin.gest.theme");
});