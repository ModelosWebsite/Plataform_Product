<?php

use App\Http\Controllers\Site\SiteController;
use App\Livewire\Site\Deliverystatus;
use Illuminate\Support\Facades\Route;


Route::controller(SiteController::class)->group(function()
{
    Route::get("/{company}", "index")->name("plataforma.produto.index");
    Route::get("/send/{company}", "sendEmail"); 
    Route::get("/{company}/loja/online", "getShopping")->name("plataforma.produto.shopping"); 
    Route::get("/{company}/carrinho/compra", "getShoppingCart")->name("plataforma.produto.shoppingcart");    
});

Route::get("/encomeda/estado/{id}", Deliverystatus::class)->name("plataforma.produto.delivery.status");