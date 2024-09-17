@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
    <h1>
        <x-adminlte-button icon="fas fa-plus" data-toggle="modal" data-target="#modalCriarCategoria" class="bg-success" />
        Categorias
    </h1>
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
    <x-adminlte-modal id="modalCriarCategoria" title="Criar Categoria" theme="success" icon="fas fa-plus" size='md'
        disable-animations v-centered static-backdrop scrollable>
        <form method="post" action="{{ route('categoria.criar.post') }}">
            @csrf
            <div class="row">
                <x-adminlte-input name="nome_categoria" label="Nome da Categoria" placeholder="Nome da Categoria"
                    fgroup-class="col-md-12" enable-old-support/>
            </div>

            <x-adminlte-button class="mr-auto" type="submit" theme="success" label="Salvar" />
            <x-adminlte-button theme="danger" label="Fechar" data-dismiss="modal" />
            <x-slot name="footerSlot">
            </x-slot>
        </form>
    </x-adminlte-modal>
    <br>
    <br>
    <x-adminlte-datatable id="table1" :heads="$heads">
        @foreach ($categorias as $categoria)
            <tr>
                <td>{{ $categoria->id }}</td>
                <td>{{ $categoria->nome_categoria }}</td>
                <td>
                    <div class="row">
                        <a href="{{ route('categoria.atualizar.get', $categoria->id) }}"
                            class="btn btn-info btn-sm mr-1">Atualizar</a>

                        <form action="{{ route('categoria.delete', $categoria->id) }}" method="POST">
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
