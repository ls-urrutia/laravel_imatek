@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
    <h1>Asignar un </h1>
@stop

@section('content')

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{ URL::asset('imagenes/AdminLTELogo.png')}}"    alt="AdminLTELogo" height="60"
            width="60">
    </div>


    @if (session('info'))
        <div class="alert alert-succes">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif


    <div class="card">
        <div class="card-body">
            <p class="h5">Nombre</p>
            <p class="form-control">{{ $user->name }}</p>

            <h2 class="h5">Listado de roles </h2>
            {!! Form::model($user, ['route' => ['users.update', $user], 'method' => 'put']) !!}
            @foreach ($roles as $role)
                <div>
                    <label>
                        {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                        {{ $role->name }}

                    </label>
                </div>
            @endforeach
            {!! Form::submit('Asignar rol', ['class' => 'btn btn-primary mt-2']) !!}
            {!! Form::close() !!}
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
