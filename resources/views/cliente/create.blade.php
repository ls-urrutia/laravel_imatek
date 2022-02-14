@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear Cliente</h1>
@stop

@section('content')

<form action="/clientes" method="POST">
    @csrf
  <div class="mb-3">
    <label for="" class="form-label">Nombre Empresa:</label>
    <input id="nombre_empresa" name="nombre_empresa" type="text"  class="form-control" tabindex="1">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Rut Empresa:</label>
    <input id="rut_empresa" name="rut_empresa" type="text"  class="form-control" tabindex="2">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Descripción:</label>
    <input id="descripcion" name="descripcion" type="text"  class="form-control" tabindex="3">
  </div>
  <a href="/clientes" class="btn btn-secondary" tabindex="5">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

























