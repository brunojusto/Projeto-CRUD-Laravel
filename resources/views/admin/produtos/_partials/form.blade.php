@csrf
    <div class="form-group">
        <label for="exampleFormControlInput1">Nome</label>
        <input type="text" class="form-control" value="{{ $produtos->nome ?? old('nome') }}" name="nome" id="nome" placeholder="Ex: Camisa da Nike">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Categoria</label>
        <select name="categorias_id" class="custom-select">
            <option value="">Escolha...</option>
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}"
                    @if ($categoria->id == $produtos->categorias_id) selected @endif
                    >{{ $categoria->nome }}</option>
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