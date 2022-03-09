@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
    <h1>Crear Cliente</h1>

@stop

@section('content')


         <!-- Preloader -->
         <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake"  src="{{ URL::asset('imagenes/AdminLTELogo.png')}}"  alt="AdminLTELogo" height="60" width="60">
          </div>
<div class="card card-default">
  <div class="card-body">          
    <div class="box box-info padding-1">

           <form method="POST" action="{{ route('clientes.store') }}" role="form"
        enctype="multipart/form-data">
            @csrf
          <div class="mb-3">
            <label for="" class="form-label">Nombre Empresa:</label><span class="form-span">*</span>
            <input id="nombre_empresa" name="nombre_empresa" type="text"  class="form-control" tabindex="1" required>
          </div>
          <div class="mb-3">
            <label for="" class="form-label">Rut Empresa:</label><span class="form-span">*</span>
            <input id="rut_empresa" name="rut_empresa" type="text"  class="form-control" tabindex="2" required>
          </div>
          <div class="mb-3">
            <label for="" class="form-label">Descripción:</label>
            <input id="descripcion" name="descripcion" type="text"  class="form-control" tabindex="3">
          </div>
          <a href="{{ route('clientes.index') }}"  class="btn btn-secondary" tabindex="5">Cancelar</a>
          <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
        </form>
    </div>
  </div>
</div>    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">
@stop

























