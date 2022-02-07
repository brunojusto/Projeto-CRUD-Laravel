@extends('adminlte::page')

@section('title', 'Detalhes categorias')

@section('content_header')
    <h1 class="m-0 text-dark">Categoria: {{ $categorias->nome }}</h1>
@stop

@section('content')
<div class="card mb-3 row">
    <div class="col-12">
        <div class="box box-success">
            <div class="card mb-3 mt-3 ml-3" style="max-width: 540px;">
                <div class="row g-0">
                  <div class="col-md-8">
                    <div class="card-body">
                        <p class="">ID: <strong class="">{{ $categorias->id }}</strong></p>
                        <p class="">Nome: <strong class="">{{ $categorias->nome }}</strong></p>
                        <p class="">Preço: <strong class="">{{ $categorias->url }}</strong></p>
                        <p class="">Descrição: <strong class="">{{ $categorias->descricao }}</strong></p>
                        <hr>
                        <form action="{{ route('categorias.destroy', $categorias->id ) }}" class="form  g-3 mb-3 mt-3 ml-3 mr-3" method="POST">
                          
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Deletar</button>
                        </form>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop