<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\PedidosController;

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

//CRUD de produtos
Route::resource('produtos', ProdutosController::class);
Route::resource('clientes', ClientesController::class);
Route::resource('pedidos', PedidosController::class);

require __DIR__.'/auth.php';


