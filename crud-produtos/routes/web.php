<?php

use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;

// Esta única linha cria TODAS as 7 rotas do CRUD automaticamente!
Route::resource('produtos', ProdutoController::class);

// Redireciona a raiz do site para a listagem
Route::get('/', function () {
    return redirect()->route('produtos.index');
});
