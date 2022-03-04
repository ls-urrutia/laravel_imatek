@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear Rol</h1>
@stop

@section('content')



  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="..\..\vendor\adminlte\dist\img\AdminLTELogo.png" alt="AdminLTELogo" height="60"
        width="60">
</div>




@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
@if ($message = Session::get('error'))
    <div class="alert alert-danger">
        <p>{{ $message }}</p>
    </div>
@endif

<div class="card">
    <div class="card-body">
        {!! Form::open(['route'=> 'roles.store']) !!}
            <div class="form group">
                {!! Form::label('name', 'Nombre del rol:') !!}
                <span class="form-span">*</span>
                {!! Form::text('name', null, ['class'=>'form-control','required']) !!}
                @error('name')
                <small class="text-danger">
                    {{$message}}
                </small>
                @enderror


            </div>


            <h2>Lista de Permisos</h2>
            @foreach ($permissions as $permission)
                <div>
                    <label for="">
                        {!! Form::checkbox('permissions[]', $permission->id, null, ['class'=>'mr-1']) !!}
                        {{$permission->name}}
                    </label>
                </div>
            @endforeach


            {!! Form::submit('Crear Rol', ['class'=>'btn btn-primary']) !!}

        {!! Form::close() !!}
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
