@extends('adminlte::page')

@section('title', 'Detalhes do produto')

@section('content_header')
    <h1 class="m-0 text-dark">Produto: {{ $produtos->nome }}</h1>
@stop

@section('content')
    <div class="card mb-3 row">
        <div class="col-12">
            <div class="box box-success">
                <div class="card mb-3 mt-3 ml-3" style="max-width: 540px;">
                    <div class="row g-0">
                      <div class="col-md-8">
                        <div class="card-body">
                            <p class="">ID: <strong class="">{{ $produtos->id }}</strong></p>
                            <p class="">Nome: <strong class="">{{ $produtos->nome }}</strong></p>
                            <p class="">Categoria: <strong class="">{{ $produtos->categorias->nome }}</strong></p>
                            <p class="">Preço: <strong class="">{{ $produtos->preco }}</strong></p>
                            <p class="">Descrição: <strong class="">{{ $produtos->descricao }}</strong></p>
                            <hr>
                            <form action="{{ route('produtos.destroy', $produtos->id ) }}" class="form" method="POST">
                              
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