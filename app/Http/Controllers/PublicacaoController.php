<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Publicacao;
use Illuminate\Http\Request;

class PublicacaoController extends Controller
{
    public function index()
    {
        $publicacoes = Publicacao::all();
        return view('publicacao.index', compact('publicacoes'));
    }

    public function formularioCriarPublicacao()
    {
        $categorias = Categoria::all();
        return view('publicacao.criar-publicacao', compact('categorias'));
    }

    public function criarPublicacao(Request $request)
    {
        Publicacao::create($request->all());
        return redirect()->route('publicacao.index');
    }
}