<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/site/routes.php';
require __DIR__ . '/login/routes.php';
require __DIR__ . '/admin/routes.php';
require __DIR__ . '/superadmin/routes.php';
require __DIR__ . '/subscription/routes.php';

Route::get('/senha/a', function () {
    return Hash::make(123);
});

Route::get('taxa/banco', function () {
    $taxaBanco = 0.005; // 0.5%
    $taxaMinBanco = 200; // valor mínimo
    $totalCompra = 10000000; // valor da compra = subtotal + taxaPB + entrega

    /** Verificação para aplicar a taxa minima pelo banco, se for verdadeiro */
    if ($taxaMinBanco >= ($taxaBanco * $totalCompra)) {
        //aplicar a taxa minima aceitavel pelo banco no total de compra
        $bankValue = round($totalCompra + $taxaMinBanco2);
        dd("Verdadeiro". $bankValue);
    } else {
        //aplicar a taxa do banco ao total de compra
        $bankValue = round(( $totalCompra / (1-$taxaBanco)) - $totalCompra, 2);
        
        dd("Falso: ". $bankValue);
        //** Aplicar arredondamento em bankValue para duas casa decimais */
    }
});