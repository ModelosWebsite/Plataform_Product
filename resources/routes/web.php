<?php
use Illuminate\Support\Facades\Route;

require __DIR__ . "/site/routes.php";
require __DIR__ . "/login/routes.php";
require __DIR__ . "/admin/routes.php";
require __DIR__ . "/superadmin/routes.php";
require __DIR__ . "/subscription/routes.php";

Route::get("/senha/a", function(){
    return Hash::make(123);
});