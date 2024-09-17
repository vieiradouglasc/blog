<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return view('categoria.index', compact('categorias'));
    }

    public function criarCategoria(Request $request)
    {
        Categoria::create($request->all());
        return redirect()->route('categoria.index');
    }

    public function formularioAtualizarCategoria(Categoria $categoria)
    {
        return view('categoria.atualizar-categoria', compact('categoria'));
    }

    public function atualizarCategoria(Request $request, Categoria $categoria)
    {
        $categoria->update($request->all());
        return redirect()->route('categoria.index');
    }

    public function deletarCategoria($categoria){
        $categoria = Categoria::find($categoria);
        $categoria->delete();
        return redirect()->route('categoria.index');
    }
}
