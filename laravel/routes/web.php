<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\PedidosController;

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/produtos', [ProdutosController::class, 'index'])->name('produtos');
Route::get('/produtos/novo', [ProdutosController::class, 'create']);
Route::post('/produtos/novo', [ProdutosController::class, 'store'])->name('registrar_produto'); 
Route::get('/produtos/editar/{id}', [ProdutosController::class, 'edit']);
Route::patch('produtos/{id}', [ProdutosController::class, 'update']);
Route::delete('produtos/{id}', [ProdutosController::class, 'destroy']);

require __DIR__.'/auth.php';


