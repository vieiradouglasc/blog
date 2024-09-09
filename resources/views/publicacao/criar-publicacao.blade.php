@extends('adminlte::page')

@section('title', 'Criar Publicação')

@section('content_header')
    <h1>Criar Publicação</h1>
@stop

@section('content')
    <form method="post" action="{{ route('publicacao.criar.post') }}">
        @csrf
        <x-adminlte-button class="btn-flat" type="submit" label="Salvar Publicação" theme="success" icon="fas fa-lg fa-save" />
        <br>
        <br>
        <x-adminlte-input name="titulo" label="Título" placeholder="Título" fgroup-class="col-md-6" disable-feedback />
        <x-adminlte-select name="selBasic" label="Categoria" fgroup-class="col-md-6">
            <option selected>Selecione uma Categoria</option>
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->nome_categoria }}</option>
            @endforeach
        </x-adminlte-select>
        <x-adminlte-textarea name="taBasic" label="Descrição" placeholder="Insert description..." fgroup-class="col-md-6" />
    </form>
@stop
