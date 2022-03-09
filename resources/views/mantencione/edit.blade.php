@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Mantenciones</h1>
@stop
@section('js')
<script type="text/javascript" src="{{ asset('/vendor/jquery/jquery.js') }}"></script>
@endsection
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
                           
                           
                           <input type="text" name="id_equipo" value="{{$mantencione->id_equipo}}" class="form-control" hidden >
                           <input type="text" name="isdasd" value="IM{{$mantencione->id_equipo}}" class="form-control" readonly >

                         

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
                                {{ Form::text('descripcion_diagnostico', $mantencione->descripcion_diagnostico, ['class' => 'form-control' . ($errors->has('descripcion_diagnostico') ? ' is-invalid' : ''), 'placeholder' => 'Descripción diagnostico','id'=>'descripcion_diagnostico']) }}
                                {!! $errors->first('descripcion_diagnostico', '<div class="invalid-feedback">:message</p>') !!}
                            </div>
                            <div class="form-group" id="diagnostico-corriente">
                                {{ Form::label('Corriente:') }}
                                {{ Form::text('diagnostico_corriente', $mantencione->diagnostico_corriente, ['class' => 'form-control' . ($errors->has('diagnostico_corriente') ? ' is-invalid' : ''), 'placeholder' => 'Corriente recibida','id'=>'diagnostico_corriente']) }}
                                {!! $errors->first('diagnostico_corriente', '<div class="invalid-feedback">:message</p>') !!}
                            </div>
                            <div class="form-group" id="fecha-mantencion">
                                {{ Form::label('fecha_mantención:') }}
                                {{ Form::date('fecha_mantencion', $mantencione->fecha_mantencion, ['class' => 'form-control' . ($errors->has('fecha_mantencion') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Mantención','id'=>'fecha-mantencion2']) }}
                                {!! $errors->first('fecha_mantencion', '<div class="invalid-feedback">:message</p>') !!}
                            </div>


                            <div class="form-group" id="descripcion-mantencion">
                                {{ Form::label('descripción:') }}
                                {{ Form::text('descripcion_mantencion', $mantencione->descripcion_mantencion, ['class' => 'form-control' . ($errors->has('descripcion_mantencion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion','id'=>'descripcion_mantencion']) }}
                                {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</p>') !!}
                            </div>
                            <div class="form-group" id="fecha-dado-baja">
                                {{ Form::label('fecha_dado de baja:') }}
                                {{ Form::date('fecha_dado_baja', $mantencione->fecha_dado_baja, ['class' => 'form-control' . ($errors->has('fecha_dado_baja') ? ' is-invalid' : ''), 'placeholder' => 'Fecha dado de baja','id'=>'fecha-dado-baja2']) }}
                                {!! $errors->first('fecha_dado_baja', '<div class="invalid-feedback">:message</p>') !!}
                            </div>
                            <div class="form-group" id="descripcion-dado-baja">
                                {{ Form::label('descripción dado de baja:') }}
                                {{ Form::text('descripcion_dado_baja', $mantencione->descripcion_dado_baja, ['class' => 'form-control' . ($errors->has('descripcion_dado_baja') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion','id'=>'descripcion_dado_baja']) }}
                                {!! $errors->first('descripcion_dado_baja', '<div class="invalid-feedback">:message</p>') !!}
                            </div>

                          
                            
                            

                            

                           {{--  <div class="row">
                            <form class="md-form">
                                <div class="file-field">
                                  <div class="btn btn-primary btn-sm float-left">
                                   
                                    <input type="file" name="imagen1" >
                                    @if(isset($mantencione->imagen1))
                                    <img src="{{asset('imagenes/fmantenciones/'.$mantencione->imagen1)}}" width="70px" height="70px" alt="Image">
                                    
                                    @else <span class="p text-secondary p font-italic">no aplica</span>
                                    @endif
                                  </div>
                                 
                                </div>
                            </form>
                            </div>
                            <div class="row">
                                <form class="md-form">
                                    <div class="file-field">
                                      <div class="btn btn-primary btn-sm float-left">
                                       
                                        <input type="file" name="imagen2" >
                                        @if(isset($mantencione->imagen2))
                                        <img src="{{asset('imagenes/fmantenciones/'.$mantencione->imagen2)}}" width="70px" height="70px" alt="Image">
                                        
                                        @else <span class="p text-secondary p font-italic">no aplica</span>
                                        @endif
                                      </div>
                                     
                                    </div>
                                </form>
                                </div>
                                <div class="row">
                                    <form class="md-form">
                                        <div class="file-field">
                                          <div class="btn btn-primary btn-sm float-left">
                                           
                                            <input type="file" name="imagen3" >
                                            @if(isset($mantencione->imagen3))
                                            <img src="{{asset('imagenes/fmantenciones/'.$mantencione->imagen3)}}" width="70px" height="70px" alt="Image">
                                            
                                            @else <span class="p text-secondary p font-italic">no aplica</span>
                                            @endif
                                          </div>
                                         
                                        </div>
                                    </form>
                                </div>
                             --}}

                            {{-- <div class="form-group" id="imagen1">
                                {{ Form::label('imagen1') }}
                                {{ Form::file('imagen1',$mantencione->imagen1[0], ['class' => 'form-control' . ($errors->has('imagen1') ? ' is-invalid' : ''), 'placeholder' => 'Id Equipo','id'=>'imagen1']) }}
                                {!! $errors->first('imagen1', '<div class="invalid-feedback">:message</p>') !!}
                            </div> 
                            <div class="form-group" id="imagen2">
                                {{ Form::label('imagen2') }}
                                {{ Form::file('imagen2',  $mantencione->imagen2[0], ['class' => 'form-control' . ($errors->has('imagen2') ? ' is-invalid' : ''), 'placeholder' => 'Id Equipo','id'=>'imagen2']) }}
                                {!! $errors->first('imagen2', '<div class="invalid-feedback">:message</p>') !!}
                            </div>
                           
                            <div class="form-group" id="imagen3">
                                {{ Form::label('imagen3') }}
                                {{ Form::file('imagen3', $mantencione->imagen3[0], ['class' => 'form-control' . ($errors->has('imagen3') ? ' is-invalid' : ''), 'placeholder' => 'Id Equipo','id'=>'imagen3']) }}
                                {!! $errors->first('imagen3', '<div class="invalid-feedback">:message</p>') !!}
                            </div>

 --}}


                      {{--        mantencion --}}

                            
                            <div class="form-group"id="componentes2-targeta">
                                {{ Form::label('Targetas malas:') }}<span class="form-span">*</span>
                               {!!Form::select('componentes2_targeta',['0'=>'0','1' => '1', '2' => '2','3'=>'3'],$mantencione->componentes2_targeta, [ 'class' => 'form-control'. ($errors->has('componentes2_targeta') ? 'is-invalid' : ''), 'placeholder' => 'Seleccione','id'=>'componentes2-targeta']) !!}
                                {!! $errors->first('componentes2_targeta', '<div class="invalid-feedback">:message</p>') !!}
                            </div>

                            <div  id="probado-bajo-agua">

                                <p class="mb-2">Probado bajo agua<p>
                                    <div class="row">
                                <div class="mr-3 ml-2"><input type="radio"  class="radios " name="probado_bajo_agua" value="Si" >Si</div>
                                <div class=""><input type="radio" class="radios " name="probado_bajo_agua" value="No">No</div>
                                </div>
                                </div>
                                <div id="verificacion-reparacion">
                                    <p class="mb-2">Reparado<p>
                                        <div class="row">
                                    <div class="mr-3 ml-2"><input type="radio"  class="radios " name="verificacion_reparacion" value="Si" >Si</div>
                                    
                                    </div>
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
                                            <td>Acrilico</td>
                                            @if($arr[0]==1)
                                            <td class="espacio"><input type="radio"  class=" radios" name="componente2" value="1"></td>
                                            <td class="espacio"><input type="radio" class="radios" name="componente2" value="0" checked></td>
                                            @elseif($arr[0]==0)
                                            <td class="espacio"><input type="radio"  class=" radios" name="componente2" value="1" checked></td>
                                            <td class="espacio"><input type="radio" class="radios" name="componente2" value="0" ></td>
                                            @else
                                            <td class="espacio"><input type="radio"  class=" radios" name="componente2" value="1" ></td>
                                            <td class="espacio"><input type="radio" class="radios" name="componente2" value="0" ></td>
                                            @endif

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
                            <div class="row pl-2" id="imagen1">
                               
                                <div class="form-group btn btn-primary btn-sm ">
                                    Editar 
                                    <label for=""></label>
                                    <input type="file" name="imagen1" class="">
                                    @if(isset($mantencione->imagen1))
                                        <img src="{{asset('imagenes/fmantenciones/'.$mantencione->imagen1)}}" width="70px" height="70px" alt="Image">
                                         
                                    @else <span class="p text-secondary p font-italic">no aplica</span>
                                    @endif
    
                                </div>
                            </div>
                            <div class="row pl-2" id="imagen2">
                                <div class="form-group btn btn-primary btn-sm ">
                                    Editar 
                                    <label for=""></label>
                                    <input type="file" name="imagen2" class=""> @if(isset($mantencione->imagen2))
                                        <img src="{{asset('imagenes/fmantenciones/'.$mantencione->imagen2)}}" width="70px" height="70px" alt="Image">
                                         
                                        @else <span class="p text-secondary p font-italic">no aplica</span>
                                        @endif
    
                                </div>
                            </div>
                            <div class="row pl-2" id="imagen3">
                                <div class="form-group btn btn-primary btn-sm ">
                                    Editar 
                                    <label for=""></label>
                                    <input type="file" name="imagen3" class="">
                                    @if(isset($mantencione->imagen3))
                                    <img src="{{asset('imagenes/fmantenciones/'.$mantencione->imagen3)}}" width="70px" height="70px" alt="Image">
                                     
                                    @else <span class="p text-secondary p font-italic">no aplica</span>
                                    @endif
                                 
    
                                </div>
                            </div>

                    {{-- ------------------------------------------------------------------------ --}}

                          



                            

                            {{-- <div class="form-group">
                                {{ Form::label('estado_mantención:') }}
                               {!!Form::select('estado_mantencion',['Operativo' => 'Operativo', 'Dado de baja' => 'Dado de baja'], null, [ 'class' => 'form-control'. ($errors->has('estado_mantencion') ? 'is-invalid' : ''), 'placeholder' => 'Seleccione']) !!}
                                {!! $errors->first('estado_mantencion', '<div class="invalid-feedback">:message</p>') !!}
                            </div>
                         --}}


                            



                            
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
<script type="text/javascript" src="{{ asset('/vendor/jquery/jquery.js') }}"></script>
<script type="text/javascript">
    
   
$(function() {
    $('#select-operacion').on('change', onSelectMovimientoChange);
    $('#select-operacion').on('change', onSelectMovimientoChangeHide);
    $('#fecha_diagnostico').hide();
    $('#descripcion-diagnostico').hide();
    $('#diagnostico-corriente').hide();
    $('#fecha-mantencion').hide();
    $('#componentes-mantencion').hide();
    $('#descripcion-mantencion').hide();
    $('#verificacion-reparacion').hide();
    $('#componentes2-targeta').hide();
    $('#probado-bajo-agua').hide();
    $('#fecha-dado-baja').hide();
    $('#descripcion-dado-baja').hide();
    $('#imagen1').hide();
    $('#imagen2').hide();
    $('#imagen3').hide();
});
function onSelectMovimientoChangeHide() {
if ($(this).val() == 'Diagnostico') {
    $('#fecha_diagnostico').show();
    $('#descripcion-diagnostico').show();
    $('#diagnostico-corriente').show();
    $('#fecha-mantencion').hide();
    $('#componentes-mantencion').show();
    $('#descripcion-mantencion').hide();
    $('#componentes2-targeta').show();
    $('#probado-bajo-agua').hide();
    $('#verificacion-reparacion').hide();
    $('#fecha-dado-baja').hide();
    $('#descripcion-dado-baja').hide();
    $('#imagen1').hide();
    $('#imagen2').hide();
    $('#imagen3').hide();
   
$('#div_centro').hide();
} else if($(this).val() == 'Mantención'){
    $('#fecha_diagnostico').hide();
    $('#descripcion-diagnostico').hide();
    $('#diagnostico-corriente').hide();
    $('#fecha-mantencion').show();
    $('#componentes-mantencion').hide();
    $('#componentes2-targeta').hide();
    $('#descripcion-mantencion').show();
    $('#fecha-dado-baja').hide();
    $('#descripcion-dado-baja').hide();
    $('#probado-bajo-agua').show();
    $('#verificacion-reparacion').show();
    $('#imagen1').show();
    $('#imagen2').show();
    /* $('input[type=text]').val(''); */
}else if($(this).val() == 'Dar de baja'){
    /* $('input[type=text]').val(''); */
    $('#fecha_diagnostico').hide();
    $('#descripcion-diagnostico').hide();
    $('#diagnostico-corriente').hide();
    $('#fecha-mantencion').hide();
    $('#componentes-mantencion').hide();
    $('#descripcion-mantencion').hide();
    $('#fecha-dado-baja').show();
    $('#descripcion-dado-baja').show();
    $('#imagen3').show();
    $('#imagen1').hide();
    $('#imagen2').hide();
}
}
function onSelectMovimientoChange() {
    var tipo_movimiento = $(this).val();
    // AJAX
    $.get('/movimiento/' + tipo_movimiento + '/equipos', function(data) {
        var html_select = '<option value="">Seleccione Equipo</option>';
        for (var i = 0; i < data.length; ++i)
            html_select += '<option value="' + data[i].id_equipo + '">' + data[i].cod_equipo +
            '</option>';
        $('.select-e').html(html_select);
    });
}
</script>
