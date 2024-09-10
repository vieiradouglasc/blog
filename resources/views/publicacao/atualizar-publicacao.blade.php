@extends('adminlte::page')

@section('title', 'Atualizar Publicação')

@section('content_header')
    <h1>Atualizar Publicação</h1>
@stop

@section('content')
    <form method="post" action="{{ route('publicacao.atualizar.post', $publicacao->id) }}">
        @csrf
        <x-adminlte-input name="titulo" label="Título" placeholder="Título" fgroup-class="col-md-6" disable-feedback
            value="{{ $publicacao->titulo }}" />
        <x-adminlte-select name="categoria_id" label="Categoria" fgroup-class="col-md-6">
            <option class="d-none">Selecione uma Categoria</option>
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}" @if ($categoria->id == $publicacao->categoria_id) selected @endif>
                    {{ $categoria->nome_categoria }}</option>
            @endforeach
        </x-adminlte-select>
        <x-adminlte-textarea name="descricao" label="Descrição" placeholder="Insira seu texto..." fgroup-class="col-md-6">
            {{ $publicacao->descricao }}
        </x-adminlte-textarea>
        <x-adminlte-button class="btn-flat" type="submit" label="Salvar Publicação" theme="success"
            icon="fas fa-lg fa-save" />
    </form>
@stop
