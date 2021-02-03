<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use Illuminate\Routing\RouteBinding;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/',function(){
    return view('inicio');
});

Route::get('categoria/{id}/productos', [CategoriaController::class, 'categoria_por_producto'])->name('categoria.mostrar_productos');

Route::Resources([
    // 'categoria' => CategoriaController::class,
    'producto' => ProductoController::class,
    'cliente' => ClienteController::class,
    'pedido' => PedidoController::class,
    'proveedor' => ProveedorController::class,
]);

// Route::resource('categoria', CategoriaController::class);

Route::get('categoria', [CategoriaController::class, 'index'])->name('categoria.index');
Route::post('categoria/store', [CategoriaController::class, 'store'])->name('categoria.store');
Route::put('categoria/{categoria}', [CategoriaController::class, 'update'])->name('categoria.update');
Route::delete('categoria/{categoria}', [CategoriaController::class, 'destroy'])->name('categoria.destroy');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
