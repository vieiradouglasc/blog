<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicacaoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');     
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

//Rotas Categoria
Route::get('categorias', [CategoriaController::class, 'index'])->name('categoria.index');
Route::post('categorias/criar', [CategoriaController::class, 'criarCategoria'])->name('categoria.criar.post');
Route::get('categorias/{categoria}/atualizar', [CategoriaController::class, 'formularioAtualizarCategoria'])->name('categoria.atualizar.get');
Route::post('categorias/{categoria}/atualizar', [CategoriaController::class, 'atualizarCategoria'])->name('categoria.atualizar.post');
Route::delete('categorias/{categoriaid}', [CategoriaController::class, 'deletarCategoria'])->name('categoria.delete');

//Rotas Publicação
Route::get('publicacoes', [PublicacaoController::class, 'index'])->name('publicacao.index');
Route::post('publicacoes/criar', [PublicacaoController::class, 'criarPublicacao'])->name('publicacao.criar.post');
Route::get('publicacoes/{publicacao}/atualizar', [PublicacaoController::class,'formularioAtualizarPublicacao'])->name('publicacao.atualizar.get');
Route::post('publicacoes/{publicacao}/atualizar', [PublicacaoController::class,'atualizarPublicacao'])->name('publicacao.atualizar.post');
Route::delete('publicacoes/{publicacaoid}', [PublicacaoController::class,'deletarPublicacao'])->name('publicacao.delete');