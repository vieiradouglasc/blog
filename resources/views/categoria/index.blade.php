@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
    <h1>Categorias</h1>
@stop

@php
    $heads = [
        // representa o thead da table
        'ID',
        'Nome',
        'Ações',
    ];
@endphp

@section('content')
    <a href="{{ route('categoria.criar.get') }}" class="btn btn-success"><i class="fa fa-plus"></i> Criar Categoria</a>
    <x-adminlte-datatable id="table1" :heads="$heads">
        @foreach ($categorias as $categoria)
            <tr>
                <td>{{ $categoria->id }}</td>
                <td>{{ $categoria->nome_categoria }}</td>
                <td>
                    <a href="{{ route('categoria.atualizar.get', $categoria->id) }}" class="btn btn-info btn-sm">Atualizar</a>
                    <form action="{{ route('categoria.delete', $categoria->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Excluir</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </x-adminlte-datatable>
@stop
