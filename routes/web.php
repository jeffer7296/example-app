<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\AlmacenController;

Route::get('/', [UsuarioController::class, 'index'])->name('usuarios.index');

Route::resource('/productos', ProductosController::class);

Route::resource('almacenes', AlmacenController::class)
    ->only(['index', 'store', 'destroy'])
    ->parameters(['almacenes' => 'almacen']);