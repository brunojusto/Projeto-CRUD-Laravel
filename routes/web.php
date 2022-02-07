<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProdutoController;

Route::resource('admin/categorias', CategoriaController::class);
Route::resource('admin/produtos', ProdutoController::class);

Route::post('admin/categorias/pesquisa', [CategoriaController::class, 'pesquisa'])->name('categorias.pesquisa');
Route::post('admin/produtos/pesquisa', [ProdutoController::class, 'pesquisa'])->name('produtos.pesquisa');

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');
