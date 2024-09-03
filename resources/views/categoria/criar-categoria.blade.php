@extends('adminlte::page')

@section('title', 'Criar Categoria')

@section('content_header')
    <h1>Criar Categoria</h1>
@stop

@section('content')
    <form method="post" action="{{route('categoria.criar.post')}}">
        @csrf
        <div class="row">
            <x-adminlte-input name="nome_categoria" label="Nome da Categoria" placeholder="Nome da Categoria"
                fgroup-class="col-md-6" disable-feedback/>
        </div>
        <x-adminlte-button class="btn-flat" type="submit" label="Salvar" theme="success" icon="fas fa-lg fa-save"/>
    </form>
@stop