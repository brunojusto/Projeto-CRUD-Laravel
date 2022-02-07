@extends('adminlte::page')

@section('title', 'Produtos')

@section('content_header')
    <h1 class="m-0 text-dark">Produtos</h1>
@stop

@section('content')
    <div class="row">
      <div class="col-12 box-body">
        <a href="{{ route('produtos.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Adicionar</a>
        
        <br>
        
      </div>
    
        <div class="col-12">
          <br>
            <div class="card">
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Preço</th>
                        <th scope="col">Descrição</th>
                        <th scope="col" class="text-right">Ações</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($produtos as $p)
                      <tr>
                        <th scope="row">{{ $p->id }}</th>
                        <td>{{ $p->nome }}</td>
                        <td>{{ $p->categorias->nome }}</td>
                        <td>R$ {{ $p->preco }}</td>
                        <td>{{ $p->descricao }}</td>
                        <td class="text-right">
                          <a href="{{ route('produtos.show', $p->id) }}" class="badge bg-primary"><i class="fas fa-eye"></i></a></button>
                          <a href="{{ route('produtos.edit', $p->id) }}" class="badge bg-success"><i class="fas fa-pencil-alt"></i></a></button>
                          <a href="{{ route('produtos.destroy', $p->id) }}" class="badge bg-danger"><i class="fas fa-trash"></i></a></button>
                        </td>
                        
                      </tr>
                      @endforeach
                    </tbody>
                </table>
                
            </div>
            {{ $produtos->links() }}
        </div>
        
    </div>
@stop

