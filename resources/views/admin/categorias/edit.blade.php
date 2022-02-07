@extends('adminlte::page')

@section('title', 'Editar categorias')

@section('content_header')
    <h1 class="m-0 text-dark">Editar categoria: {{ $categorias->nome }}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                @include('admin.includes.alerts')
                <form action="{{ route('categorias.update', $categorias->id ) }}" class="form  g-3 mb-3 mt-3 ml-3 mr-3" method="POST">
                    @method('PUT')
                    @include('admin.categorias._partials.form')
                </form>
            </div>
        </div>
    </div>
@stop