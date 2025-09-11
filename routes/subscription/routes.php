<?php

use App\Livewire\Site\StatusAccount;
use App\Livewire\Site\VerifyEmail;
use App\Livewire\Subscription\Home;
use Illuminate\Support\Facades\Route;

Route::get("/criar/site", Home::class)->name("site.subscription");
Route::get("/created/site", StatusAccount::class)->name("site.status.account");
Route::get("/verify/email", VerifyEmail::class)->name("site.verify.email");