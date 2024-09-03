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
    <x-adminlte-datatable id="table1" :heads="$heads">
        @foreach ($categorias as $categoria)
            <tr>
                <td>{{$categoria->id}}</td>
                <td>{{$categoria->nome_categoria}}</td>
                <td>-</td>
            </tr>
        @endforeach
    </x-adminlte-datatable>
@stop
