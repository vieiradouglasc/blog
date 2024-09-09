@extends('adminlte::page')

@section('title', 'Atualizar Categoria')

@section('content_header')
    <h1>Atualizar Categoria</h1>
@stop

@section('content')
    <form method="POST" action="{{ route('categoria.atualizar.post', $categoria->id) }}">
        @csrf
        <div class="row">
            <x-adminlte-input name="nome_categoria" label="Nome da Categoria" placeholder="Nome da Categoria"
                fgroup-class="col-md-6" disable-feedback />
        </div>
        <x-adminlte-button class="btn-flat" type="submit" label="Salvar" theme="success" icon="fas fa-lg fa-save" />
    </form>
@stop
