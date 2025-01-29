<?php

use App\Livewire\Subscription\Home;
use Illuminate\Support\Facades\Route;

Route::get("/criar/site", Home::class)->name("site.subscription");