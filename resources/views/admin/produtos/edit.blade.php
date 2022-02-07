@extends('adminlte::page')

@section('title', 'Editar produto')

@section('content_header')
    <h1 class="m-0 text-dark">Editar produto: {{ $produtos->nome }}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                @include('admin.includes.alerts')
                <form action="{{ route('produtos.update', $produtos->id ) }}" class="form  g-3 mb-3 mt-3 ml-3 mr-3" method="POST">
                    @method('PUT')
                    @include('admin.produtos._partials.form')
                </form>
            </div>
        </div>
    </div>
@stop