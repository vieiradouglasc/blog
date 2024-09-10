@extends('adminlte::page')

@section('title', 'Publicações')

@section('content_header')
    <h1>Publicações</h1>
@stop

@php
    $heads = [
        // representa o thead da table
        'ID',
        'Título',
        'Descrição',
        'Categoria',
        'Autor',
        'Ações',
    ];
@endphp

@section('content')
    <a href="{{ route('publicacao.criar.get') }}" class="btn btn-success"><i class="fa fa-plus"></i> Criar Publicação</a>
    <br>
    <br>
    <x-adminlte-datatable id="table1" :heads="$heads">
        @foreach ($publicacoes as $publicacao)
            <tr>
                <td>{{ $publicacao->id }}</td>
                <td>{{ $publicacao->titulo }}</td>
                <td>{{ $publicacao->descricao_formatado }}</td>
                <td>{{ $publicacao->categoria->nome_categoria }}</td>
                <td>{{ $publicacao->user->name }}</td>
                <td>
                    <a href="{{ route('publicacao.atualizar.get', $publicacao->id) }}" class="btn btn-info btn-sm">Atualizar</a>
                    <form action="{{ route('publicacao.delete', $publicacao->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Excluir</button>
                    </form>
                    </form>
                </td>
            </tr>
        @endforeach
    </x-adminlte-datatable>
@stop
