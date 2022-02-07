@csrf
    <div class="form-group">
        <label for="exampleFormControlInput1" class="form-label">Nome</label>
        <input type="text" class="form-control" value="{{ $categorias->nome ?? old('nome') }}" name="nome" id="nome" placeholder="Ex: Camisetas">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput2" class="form-label">URL</label>
        <input type="text" class="form-control" value="{{ $categorias->url ?? old('url') }}" name="url" id="url" placeholder="Ex: Camisetas">
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1" class="form-label">Descrição</label>
        <textarea class="form-control" name="descricao" id="descricao" placeholder="Ex: Camisetas de futebol 100% originais de clubes nacionais e internacionais." rows="5">{{ $categorias->descricao ?? old('descricao') }}</textarea>
    </div>
    <div class="form-group">
        <button type ="submit" class="btn btn-primary">Salvar</button>
    </div>