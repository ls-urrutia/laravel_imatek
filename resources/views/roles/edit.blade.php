@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Roles</h1>
@stop

@section('content')
<h2>Edicion Roles</h2>

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="..\..\vendor\adminlte\dist\img\AdminLTELogo.png" alt="AdminLTELogo" height="60"
        width="60">
</div>




@if(session('info'))
<div class="alert alert-succes">
  {{session('info')}}
</div>
@endif
     <div class="card">
       <div class="card-body">
          {!! Form::model($role, ['route'=>['roles.update',$role], 'method'=> 'put']) !!}

                <div class="form group">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', null, ['class'=>'form-control']) !!}
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
                {!! Form::submit('Editar Rol', ['class'=>'btn btn-primary']) !!}
          {!! Form::close() !!}



        </div>
     </div>


@endsection
