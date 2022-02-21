@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Mantenciones</h1>
@stop
@section('content')





         <!-- Preloader -->
         <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="..\..\vendor\adminlte\dist\img\AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
          </div>




    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar Mantención</span>
                    </div>

                   


                    <div class="card-body">
                        <form method="POST" action="{{ route('mantenciones.update', $mantencione->id_mantencion) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf
                            @method('PUT')
{{-- 
                            @include('mantencione.form') --}}
                            <div  class="form-group mb-3">
                                <label for="">Fecha mantencion</label>
                                <input class="form-control" type="date" name="fecha_mantencion" id="fecha_mantencion" value="{{$mantencione->fecha_mantencion}}" >
                            </div>
                            <div  class="form-group mb-3">
                                <label for="">Diagnostico</label>
                                <input class="form-control" type="text" name="diagnostico" id="diagnostico" value="{{$mantencione->diagnostico}}">
                            </div>
                            <select  class="form-control" name="choose" id="choose" onchange="mifuncion()">
                              <option value="diagnosticoc">Diagnostico</option>
                              <option value="mantencionc">Mantencion</option>
                            </select>
                            <button onchange="mifuncion()"></button>

                            
                            <div  class="form-group mb-3">
                                <label for="">descripcion</label>
                                <input class="form-control" type="text" name="descripcion" id="descripcion" value="{{$mantencione->descripcion}}"  class="form control">
                            </div>
                            <div  class="form-group mb-3">
                                <label for="">validacion</label>
                                <input  class="form-control" type="text" name="validacion" id="validacion" value="{{$mantencione->validacion}}" >
                            </div>
                            <div class="form-group">
                                {{ Form::label('estado_mantención:') }}
                               {!!Form::select('estado_mantencion',['Operativo' => 'Operativo', 'Dado de baja' => 'Dado de baja'], $mantencione->estado_mantencion, [ 'class' => 'form-control'. ($errors->has('estado_mantencion') ? 'is-invalid' : ''), 'placeholder' => 'Seleccione']) !!}
                                {!! $errors->first('estado_mantencion', '<div class="invalid-feedback">:message</p>') !!}
                            </div>
                            <div  class="form-group mb-3">
                                <label for="">codigo equipo</label>
                                <input class="form-control" type="text" name="id_equipo" id="id_equipo" value="{{$mantencione->id_equipo}}"  class="form control">
                            </div>
                            <div  class="form-group mb-3">
                                <label for="">imagen1</label>
                                <input type="file" name="imagen1" id="imagen1"  class="form control">
                                <img src="{{asset('imagenes/fmantenciones/'.$mantencione->imagen1)}}" alt="" width="70px" height="70px">
                            </div>
                            <div  class="form-group mb-3">
                                <label for="">imagen2</label>
                                <input type="file" name="imagen2" id="imagen2" class="form control">
                                <img src="{{asset('imagenes/fmantenciones/'.$mantencione->imagen2)}}" alt="" width="70px" height="70px">
                            </div>
                            <div  class="form-group mb-3">
                                <label for="">imagen3</label>
                                <input type="file" name="imagen3" id="imagen3" class="form control">
                                <img src="{{asset('imagenes/fmantenciones/'.$mantencione->imagen3)}}" alt="" width="70px" height="70px">
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                            </div>



                            
                           {{--  <div class="box-body">
                                <div class="form-group">
                                    {{ Form::label('diagnostico:') }}
                                    {{ Form::text('diagnostico', $mantencione->diagnostico, ['class' => 'form-control' . ($errors->has('diagnostico') ? ' is-invalid' : ''), 'placeholder' => 'Diagnostico']) }}
                                    {!! $errors->first('diagnostico', '<div class="invalid-feedback">:message</p>') !!}
                                </div>
                        
                                <div class="form-group">
                                    {{ Form::label('fecha_mantención:') }}
                                    {{ Form::date('fecha_mantencion', $mantencione->fecha_mantencion, ['class' => 'form-control' . ($errors->has('fecha_mantencion') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Mantención']) }}
                                    {!! $errors->first('fecha_mantencion', '<div class="invalid-feedback">:message</p>') !!}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('descripción:') }}
                                    {{ Form::text('descripcion', $mantencione->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
                                    {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</p>') !!}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('estado_mantención:') }}
                                   {!!Form::select('estado_mantencion',['Operativo' => 'Operativo', 'Dado de baja' => 'Dado de baja'], $mantencione->estado_mantencion, [ 'class' => 'form-control'. ($errors->has('estado_mantencion') ? 'is-invalid' : ''), 'placeholder' => 'Seleccione']) !!}
                                    {!! $errors->first('estado_mantencion', '<div class="invalid-feedback">:message</p>') !!}
                                </div>
                            
                                <div class="form-group">
                                    {{ Form::label('Codigo_Equipo:') }}
                                    {{ Form::select('id_equipo', $equipos,$mantencione->id_equipo,['class' => 'form-control' . ($errors->has('id_equipo') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione']) }}
                                    {!! $errors->first('id_equipo', '<div class="inval id-feedback">:message</p>') !!}
                                        
                                        
                                        {{-- <select name="id_equipo" id="id_equipo" class ="form-control">
                                            <option value="" >Seleccione</option>
                                            @foreach($equipos2 as $e)
                                                 <option value="{{$e->cod_equipo}}">{{$e->cod_equipo}}</option>
                                            @endforeach
                                       </select>   --}}
                           
                               {{--  </div>
                                
                                <div class="form-group">
                                    {{ Form::label('imagen1') }}
                                    {{ Form::file('imagen1',$mantencione->imagen1, ['class' => 'form-control' . ($errors->has('imagen1') ? ' is-invalid' : ''), 'placeholder' => 'Id Equipo']) }}
                                    {!! $errors->first('imagen1', '<div class="invalid-feedback">:message</p>') !!}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('imagen2') }}
                                    {{ Form::file('imagen2',  $mantencione->imagen2, ['class' => 'form-control' . ($errors->has('imagen2') ? ' is-invalid' : ''), 'placeholder' => 'Id Equipo']) }}
                                    {!! $errors->first('imagen2', '<div class="invalid-feedback">:message</p>') !!}
                                </div>
                        
                                <div class="form-group">
                                    {{ Form::label('imagen3') }}
                                    {{ Form::file('imagen3', $mantencione->imagen3, ['class' => 'form-control' . ($errors->has('imagen3') ? ' is-invalid' : ''), 'placeholder' => 'Id Equipo']) }}
                                    {!! $errors->first('imagen3', '<div class="invalid-feedback">:message</p>') !!}
                                </div> --}} 
                           
                        
                        
                            </div>
                            {{-- <div class="box-footer mt20">
                                <button type="submit" class="btn btn-primary">Enviar</button>
                            </div> --}}


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
<script>
    function mifuncion(){
        var twerkers = document.getElementById("choose").value;
    }
</script>
