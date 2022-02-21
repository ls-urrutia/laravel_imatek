@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear Usuario</h1>
@stop

@section('content')
{{-- @if($errors->any())
  @foreach($errors->all() as $error)
  <li>{{$error}}</li>
  @endforeach
@endif   --}}

<div class="p-5 bg-blue rounded shadow-lg">

<form action="/users2" method="POST">
    @csrf
  <div class="mb-3">
    <label for="" class="form-label">Nombre:</label>
    <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror" tabindex="1" value="{{old('name')}}">
    @error('name')
        <span class="invalid-feedback">
          <strong>{{$message}}</strong>

        </span>
    @enderror
   {{--  @if($errors->has('name'))
       
       <h6 style="color: red">{{$errors->first('name')}}</h6>
    @endif --}}
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Correo:</label>
    <input id="email" name="email" type="text" class="form-control @error('name') is-invalid @enderror" tabindex="2" value="{{old('email')}}">
    @error('email')
      <span class="invalid-feedback">
        <strong>{{$message}}</strong>

      </span>
    @enderror
  
  </div>
  



  
    <label for="" class="form-label">Contraseña:</label>
    <div class="form-row">
            <div class="col-11">
              <input id="password" name="password" type="password" class="form-control @error('name') is-invalid @enderror" tabindex="9">
            </div>
          
          <div class="col-1">
            
              <button class="btn btn-primary btn-xs" type="button" onclick="mostrarContrasena()"><i class="fa fa-eye-slash"></i></button>
            
          </div>
         

    </div> 
    <label for="" class="form-label">Confirma la Contraseña:</label>
    <div class="form-row">
            <div class="col-11">
              <input id="password_confirmation" name="password_confirmation" type="password" class="form-control @error('name') is-invalid @enderror" tabindex="9">
              @error('password')
                  <span class="invalid-feedback">
                    <strong>{{$message}}</strong>
          
                  </span>
              @enderror
            </div>
          
          <div class="col-1">
            
              <button class="btn btn-primary btn-xs" type="button" onclick="mostrarContrasena2()"><i class="fa fa-eye-slash"></i></button>
            
          </div>
          
          

    </div> 
    <br>



  <a href="/users2" class="btn btn-secondary" tabindex="5">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
</form>

</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
   {{--  <link rel="stylesheet" href="{!!asset('css/all.css')!!}"> --}}
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">

@stop

@section('js')
<script type="text/javascript" src="{{ asset('js/user.js') }}"></script>
@stop
