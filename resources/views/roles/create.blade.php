@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">
        {!! Form::open(['route'=> 'roles.store']) !!}
            <div class="form group">
                {!! Form::label('name', 'Nombre') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
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
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
