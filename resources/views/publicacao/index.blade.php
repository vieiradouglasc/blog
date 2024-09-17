@extends('adminlte::page')

@section('title', 'Publicações')

@section('content_header')
    <h1>
        <x-adminlte-button icon="fas fa-plus" data-toggle="modal" data-target="#modalCriarPublicacao" class="bg-success" />
        Publicações
    </h1>
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
    <x-adminlte-modal id="modalCriarPublicacao" title="Criar Categoria" theme="success" icon="fas fa-plus" size='md'
        disable-animations v-centered static-backdrop scrollable>
        <form method="post" action="{{ route('publicacao.criar.post') }}">
            @csrf
            <x-adminlte-input name="titulo" label="Título" placeholder="Título" fgroup-class="col-md-12"
                disable-feedback />
            <x-adminlte-select name="categoria_id" label="Categoria" fgroup-class="col-md-12">
                <option selected class="d-none">Selecione uma Categoria</option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nome_categoria }}</option>
                @endforeach
            </x-adminlte-select>
            <x-adminlte-textarea name="descricao" label="Descrição" placeholder="Insira seu texto..."
                fgroup-class="col-md-12" />
            <x-adminlte-button class="mr-auto" type="submit" theme="success" label="Salvar" />
            <x-adminlte-button theme="danger" label="Fechar" data-dismiss="modal" />
            <x-slot name="footerSlot">
            </x-slot>
        </form>
    </x-adminlte-modal>
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
                    <div class="row">
                        <a href="{{ route('publicacao.atualizar.get', $publicacao->id) }}"
                            class="btn btn-info btn-sm  btn-sm mr-1">Atualizar</a>
                        <form action="{{ route('publicacao.delete', $publicacao->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Excluir</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </x-adminlte-datatable>
@stop
