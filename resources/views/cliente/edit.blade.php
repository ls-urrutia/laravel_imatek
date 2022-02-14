@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
    <h1>Clientes</h1>
@stop

@section('content')


         <!-- Preloader -->
         <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="..\..\vendor\adminlte\dist\img\AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
          </div>

<h2>Editar Cliente</h2>




<form action="/clientes/{{$cliente->id_cliente}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="" class="form-label">Nombre Empresa</label>
        <input id="nombre_empresa" name="nombre_empresa" type="text"  class="form-control" tabindex="1" value="{{$cliente->nombre_empresa}}">
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Rut Empresa</label>
        <input id="rut_empresa" name="rut_empresa" type="text"  class="form-control" tabindex="2" value="{{$cliente->rut_empresa}}">
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Descripción</label>
        <input id="descripcion" name="descripcion" type="text"  class="form-control" tabindex="3" value="{{$cliente->descripcion}}">
      </div>
  <a href="/clientes" class="btn btn-secondary">Cancelar</a>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>

@endsection
