<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductoController;
use App\Http\Controllers\Api\AlmacenController;
use App\Http\Controllers\Api\ProveedorController;

Route::apiResource('productos', ProductoController::class)
    ->names('api.productos');

Route::apiResource('almacenes', AlmacenController::class)
    ->parameters(['almacenes' => 'almacen'])
    ->names('api.almacenes');

Route::apiResource('proveedores', ProveedorController::class)
    ->parameters(['proveedores' => 'proveedor'])
    ->names('api.proveedores');