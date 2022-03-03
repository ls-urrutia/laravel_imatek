@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h1>Edicion</h1>
@stop

@section('content')
<form action="/users2/{{$user2->id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="" class="form-label">Nombre</label>
        <input id="nombreu" name="nombreu" type="text" class="form-control" tabindex="1" value="{{$user2->name}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Correo</label>
        <input id="correo" name="correo" type="text" class="form-control" tabindex="2" value="{{$user2->email}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Ubicación</label>
        <input id="correo" name="correo" type="text" class="form-control" tabindex="2" value="{{$user2->ubicacion}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Contraseña</label>
        <input id="passw" name="passw" type="password" class="form-control" tabindex="3" >
    </div>

  <a href="/users2" class="btn btn-secondary">Cancelar</a>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>

@endsection
