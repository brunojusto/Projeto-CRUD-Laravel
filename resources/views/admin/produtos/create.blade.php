@extends('adminlte::page')

@section('title', 'Produtos')

@section('content_header')
    <h1 class="m-0 text-dark">Cadastrar novo produto</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card ">
                @include('admin.includes.alerts')
                <form action="{{ route('produtos.store') }}" class="form g-3 mb-3 mt-3 ml-3 mr-3" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nome</label>
                        <input type="text" class="form-control" value="{{ $produtos->nome ?? old('nome') }}" name="nome" id="nome" placeholder="Ex: Camisa da Nike">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Categoria</label>
                        <select name="categorias_id" class="custom-select">
                            <option value="">Escolher categoria...</option>
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput2">Preço</label>
                        <input type="text" class="form-control" value="{{ $produtos->preco ?? old('preco') }}" name="preco" id="preco" placeholder="Ex: 199,90">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Descrição</label>
                        <textarea class="form-control" name="descricao" id="descricao" placeholder="Ex: Camisa confortável, com tecido 100% algodão" rows="5">{{ $produtos->descricao ?? old('descricao') }}</textarea>
                    </div>
                    <div class="form-group">
                        <button type ="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
