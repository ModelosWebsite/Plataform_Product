<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\V\CreateWebsiteController;
use App\Http\Controllers\API\V\PaymentUpdateController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(CreateWebsiteController::class)->group(function(){
    Route::post("/create/website", "createCompany")->name("create.account.website");
    Route::post("/get/company", "getCompanyByNif")->name("capturar.dados");
});

Route::post('/payment/update', [PaymentUpdateController::class, 'updatePayment'])->name('payment.update');