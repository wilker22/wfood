@include('admin.includes.alerts')

<div class="form-group">
    <label for="name">Identificador:</label>
    <input type="text" name="identify" class="form-control" placeholder="Identificador:" value="{{ $table->identify ?? old('identify') }}">
</div>

<div class="form-group">
    <label for="price">Descrição:</label>
    <textarea cols="30" rows="5" name="description" class="form-control" placeholder="Descrição:">
        {{ $table->description ?? old('description') }}
    </textarea>
</div>


<div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>
