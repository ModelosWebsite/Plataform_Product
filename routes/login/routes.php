<?php

use App\Http\Controllers\Login\loginController;
use Illuminate\Support\Facades\Route;

Route::controller(loginController::class)->group(function()
{
    Route::get("/login/view", "loginview")->name("plataform.product.login.view");
    Route::post("/login/enter", "login")->name("plataform.product.login");
    Route::get("/terminar/sessão", "logout")->name("plataform.product.logout");
});