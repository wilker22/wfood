
@include('admin.includes.alerts')
@csrf

<div class="form-group">
    <label for="name">* Nome:</label>
    <input type="text" name="name" class="form-control" placeholder="Nome:" value="{{ $profile->name ?? old('name') }}">
</div>


<div class="form-group">
    <label for="description">Descrição:</label>
    <input type="text" name="description" class="form-control" placeholder="Descrição   :" value="{{ $profile->description ?? old('description') }}">
</div>

<div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>
