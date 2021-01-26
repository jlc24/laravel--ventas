<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use Illuminate\Support\Facades\Route;

Route::get('/',function(){
    return view('inicio');
});

Route::Resources([
    'categoria' => CategoriaController::class,
    'producto' => ProductoController::class,
    'cliente' => ClienteController::class,
    'pedido' => PedidoController::class,
    'proveedor' => ProveedorController::class,
]);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
