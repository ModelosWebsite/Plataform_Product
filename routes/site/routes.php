<?php

use App\Http\Controllers\Site\SiteController;
use App\Livewire\Site\Deliverystatus;
use App\Models\User;
use App\Livewire\Auth\AccountVerifyComponent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::controller(SiteController::class)->group(function()
{
    Route::get("/{company}", "index")->name("plataforma.produto.index");
    Route::get("/send/{company}", "sendEmail"); 
    Route::get("/{company}/loja/online", "getShopping")->name("plataforma.produto.shopping"); 
    Route::get("/{company}/carrinho/compra", "getShoppingCart")->name("produto.shoppingcart");    
});

Route::get("/{company}/encomeda/estado/", Deliverystatus::class)->name("plataforma.produto.delivery.status");

Route::get('/email/verify/{id}/{hash}', function () {
    $auth = Request("id");
    if ($auth != null) {
        $user = User::find($auth);
        Auth::login($user);
        $user->email_verified_at = now();
        $user->save();
        return redirect()->route("plataform.product.admin.index",
        ["id"=>auth()->user()->id]);
    }
})->name('verification.verify');

Route::get('/verificar/conta', AccountVerifyComponent::class)->name('account.verify');