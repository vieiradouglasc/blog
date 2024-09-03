<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index() {
        $categorias = Categoria::all();
        return view('categoria.index', compact('categorias'));
    }

    public function formularioCriarCategoria() {
        return view('categoria.criar-categoria');
    }

    public function criarCategoria(Request $request) {
        Categoria::create($request->all());
        return redirect()->route('categoria.index');
    }

    public function formularioAtualizarCategoria (Categoria $categorias) {
        return view('categoria.atualizar-categoria', compact('categorias'));
    }

    public function atualizarCategoria (Request $request, Categoria $categorias) {
        $categorias->update($request->all());
        return redirect()->route('categoria.index');
    }
}