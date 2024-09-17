<?php

namespace App\Http\Controllers;

use App\Http\Requests\CriarPublicacaoRequest;
use App\Models\Categoria;
use App\Models\Publicacao;
use Illuminate\Http\Request;

class PublicacaoController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        $publicacoes = Publicacao::where('user_id', auth()->user()->id)->get();
        return view('publicacao.index', compact('publicacoes', 'categorias'));
    }

    public function criarPublicacao(CriarPublicacaoRequest $request)
    {
        $request->merge(['user_id' => Auth()->user()->id]);
        Publicacao::create($request->all());
        return redirect()->route('publicacao.index');
    }

    public function formularioAtualizarPublicacao(Publicacao $publicacao)
    {
        $categorias = Categoria::all();
        return view('publicacao.atualizar-publicacao', compact('publicacao', 'categorias'));
    }

    public function atualizarPublicacao (Request $request, Publicacao $publicacao) {
        $publicacao->update($request->all());
        return redirect()->route('publicacao.index');
    }

    public function deletarPublicacao($publicacao){
        $publicacao = Publicacao::find($publicacao);
        $publicacao->delete();
        return redirect()->route('publicacao.index');
    }

    
}
