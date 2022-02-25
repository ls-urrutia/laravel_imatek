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
                            {{-- <div  class="form-group mb-3">
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
                            </div> --}}



                            
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
                           
                        
                        
                           {{--  </div> --}}
                            {{-- <div class="box-footer mt20">
                                <button type="submit" class="btn btn-primary">Enviar</button>
                            </div> --}}

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
                       
                            </div>
                    
                            <div class="form-group">
                                {{ Form::label('Operación:') }}
                               {!!Form::select('Operacion',['Diagnostico' => 'Diagnostico', 'Mantención' => 'Mantención','Dar de baja'=>'Dar de baja'], null, [ 'class' => 'form-control'. ($errors->has('Operacion') ? 'is-invalid' : ''), 'placeholder' => 'Seleccione','id'=>'select-operacion']) !!}
                                {!! $errors->first('Operacion', '<div class="invalid-feedback">:message</p>') !!}
                            </div>
                            {{-- ///////////////////////////////////////diagnostico --}}
                            <div class="form-group" id="fecha_diagnostico">
                                {{ Form::label('fecha_diagnostico:') }}
                                {{ Form::date('fecha_diagnostico', $mantencione->fecha_diagnostico, ['class' => 'form-control' . ($errors->has('fecha_diagnostico') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Diagnostico','id'=>'fecha-diagnostico']) }}
                                {!! $errors->first('fecha_diagnostico', '<div class="invalid-feedback">:message</p>') !!}
                            </div>
                    
                            <div class="form-group" id="descripcion-diagnostico">
                                {{ Form::label('descripción_diagnostico:') }}
                                {{ Form::text('descripcion_diagnostico', $mantencione->descripcion_diagnostico, ['class' => 'form-control' . ($errors->has('descripcion_diagnostico') ? ' is-invalid' : ''), 'placeholder' => 'Descripción diagnostico','id'=>'descripcion-diagnostico']) }}
                                {!! $errors->first('descripcion_diagnostico', '<div class="invalid-feedback">:message</p>') !!}
                            </div>
                            <div class="form-group" id="diagnostico-corriente">
                                {{ Form::label('Corriente:') }}
                                {{ Form::text('diagnostico_corriente', $mantencione->diagnostico_corriente, ['class' => 'form-control' . ($errors->has('diagnostico_corriente') ? ' is-invalid' : ''), 'placeholder' => 'Corriente recibida','id'=>'diagnostico-corriente']) }}
                                {!! $errors->first('diagnostico_corriente', '<div class="invalid-feedback">:message</p>') !!}
                            </div>
                    
                    {{-- ------------------------------------------------------------------------ --}}
                    
                            <div class="form-group" id="fecha-mantencion">
                                {{ Form::label('fecha_mantención:') }}
                                {{ Form::date('fecha_mantencion', $mantencione->fecha_mantencion, ['class' => 'form-control' . ($errors->has('fecha_mantencion') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Mantención','id'=>'fecha-mantencion']) }}
                                {!! $errors->first('fecha_mantencion', '<div class="invalid-feedback">:message</p>') !!}
                            </div>
                           
                    
                            <div class="form-group" id="descripcion-mantencion">
                                {{ Form::label('descripción:') }}
                                {{ Form::text('descripcion_mantencion', $mantencione->descripcion_mantencion, ['class' => 'form-control' . ($errors->has('descripcion_mantencion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion','id'=>'descripcion-mantencion']) }}
                                {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</p>') !!}
                            </div>
                    
                          
                    
                            <div class="form-group" id="fecha-dado-baja">
                                {{ Form::label('fecha_dado de baja:') }}
                                {{ Form::date('fecha_dado_baja', $mantencione->fecha_dado_baja, ['class' => 'form-control' . ($errors->has('fecha_dado_baja') ? ' is-invalid' : ''), 'placeholder' => 'Fecha dado de baja','id'=>'fecha-dado-baja']) }}
                                {!! $errors->first('fecha_dado_baja', '<div class="invalid-feedback">:message</p>') !!}
                            </div>
                            <div class="form-group" id="descripcion-dado-baja">
                                {{ Form::label('descripción dado de baja:') }}
                                {{ Form::text('descripcion_dado_baja', $mantencione->descripcion_dado_baja, ['class' => 'form-control' . ($errors->has('descripcion_dado_baja') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion','id'=>'descripcion_dado_baja']) }}
                                {!! $errors->first('descripcion_dado_baja', '<div class="invalid-feedback">:message</p>') !!}
                            </div>
                    
                            {{-- <div class="form-group">
                                {{ Form::label('estado_mantención:') }}
                               {!!Form::select('estado_mantencion',['Operativo' => 'Operativo', 'Dado de baja' => 'Dado de baja'], null, [ 'class' => 'form-control'. ($errors->has('estado_mantencion') ? 'is-invalid' : ''), 'placeholder' => 'Seleccione']) !!}
                                {!! $errors->first('estado_mantencion', '<div class="invalid-feedback">:message</p>') !!}
                            </div>
                         --}}
                            
                            
                            <div class="form-group" id="imagen1">
                                {{ Form::label('imagen1') }}
                                {{ Form::file('imagen1',$mantencione->imagen1, ['class' => 'form-control' . ($errors->has('imagen1') ? ' is-invalid' : ''), 'placeholder' => 'Id Equipo','id'=>'imagen1']) }}
                                {!! $errors->first('imagen1', '<div class="invalid-feedback">:message</p>') !!}
                            </div>
                            <div class="form-group" id="imagen2">
                                {{ Form::label('imagen2') }}
                                {{ Form::file('imagen2',  $mantencione->imagen2, ['class' => 'form-control' . ($errors->has('imagen2') ? ' is-invalid' : ''), 'placeholder' => 'Id Equipo','id'=>'imagen2']) }}
                                {!! $errors->first('imagen2', '<div class="invalid-feedback">:message</p>') !!}
                            </div>
                    
                            <div class="form-group" id="imagen3">
                                {{ Form::label('imagen3') }}
                                {{ Form::file('imagen3', $mantencione->imagen3, ['class' => 'form-control' . ($errors->has('imagen3') ? ' is-invalid' : ''), 'placeholder' => 'Id Equipo','id'=>'imagen3']) }}
                                {!! $errors->first('imagen3', '<div class="invalid-feedback">:message</p>') !!}
                            </div>
                           
                            
                              
                            <div class="componentes-mantencion" id="componentes-mantencion">
                        
                                <table>
                                    <tbody>
                                        <tr>
                                            <td> </td>
                                            <td class="espacio">  Buena</td>
                                            <td class="espacio">  Mala</td>
                    
                                        </tr>
                                        <tr>
                                            <td>Placa</td>
                                            <td class="espacio"><input type="radio"  class=" radios" name="componente1" value="1" ></td>
                                            <td class="espacio"> <input type="radio" class=" radios" name="componente1" value="0"></td>
                                        </tr>
                    
                    
                                        <tr>
                                            <td>Acrilico</td>
                                            <td class="espacio"><input type="radio"  class=" radios" name="componente2" value="1" ></td>
                                            <td class="espacio"><input type="radio" class="radios" name="componente2" value="0"></td>
                    
                                        </tr>
                                        <tr>
                                            <td>Tapas</td>
                                            <td class="espacio"><input type="radio"  class=" radios" name="componente3" value="1" ></td>
                                            <td class="espacio"><input type="radio" class="radios" name="componente3" value="0"></td>
                                            
                                        </tr>
                                        <tr>
                                            <td>enchufe</td>
                                            <td class="espacio"><input type="radio"  class=" radios" name="componente4" value="1" ></td>
                                            <td class="espacio"><input type="radio" class="radios" name="componente4" value="0"></td>
                                        </tr>
                                        <tr>
                                            <td>Cable</td>
                                            <td class="espacio"><input type="radio"  class=" radios" name="componente5" value="1" ></td>
                                            <td class="espacio"><input type="radio" class="radios" name="componente5" value="0"></td>
                                        </tr>
                                    </tbody>
                                        
                                
                            
                                </table>
                            </div>
                           <br>
                           <div class="box-footer mt20">
                               <button type="submit" class="btn btn-primary">Guardar</button>
                           </div>


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
