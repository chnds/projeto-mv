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

//Exclusão em massa
Route::post('/excluirProdutos', [App\Http\Controllers\ProdutosController::class, 'excluirProdutos'])->name('excluirProdutos');
Route::post('/excluirClientes', [App\Http\Controllers\ClientesController::class, 'excluirClientes'])->name('excluirClientes');
Route::post('/excluirPedidos', [App\Http\Controllers\PedidosController::class, 'excluirPedidos'])->name('excluirPedidos');

require __DIR__.'/auth.php';


