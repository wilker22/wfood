@include('admin.includes.alerts')

<div class="form-group">
    <label for="name">* Título do Produto:</label>
    <input type="text" name="title" class="form-control" placeholder="Título do Produto:" value="{{ $product->title ?? old('title') }}">
</div>

<div class="form-group">
    <label for="price">* Preço do Produto:</label>
    <input type="text" name="price" class="form-control" placeholder="Preço do Produto:" value="{{ $product->price ?? old('price') }}">
</div>

<div class="form-group">
    <textarea cols="30" rows="5" name="description" class="form-control" placeholder="Descrição:">
        {{ $product->description ?? old('description') }}
    </textarea>
</div>

<div class="form-group">
    <label for="price">* Imagem:</label>
    <input type="file" name="image" id="image" class="form-control">
</div>




<div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>
