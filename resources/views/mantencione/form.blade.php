<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="..\..\vendor\adminlte\dist\img\AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

<script type="text/javascript" src="{{ asset('/vendor/jquery/jquery.js') }}"></script>



<div class="box box-info padding-1">
<form>
<div class="box-body">
<div class="form-group">
    {{  Form::label('Codigo_Equipo:')}}<span class="form-span">*</span>
    <select name="id_equipo" class="form-control">
        @foreach ($equipos2 as $equipo)
            <option value="{{$equipo->id_equipo}}"> IM{{$equipo->id_equipo}}</option>
        @endforeach
    </select>
</div>
</div>

<div class="form-group">
    {{ Form::label('Operación:') }}<span class="form-span">*</span>
   {!!Form::select('Operacion',['Diagnostico' => 'Diagnostico', 'Mantención' => 'Mantención','Dar de baja'=>'Dar de baja'], null, [ 'class' => 'form-control'. ($errors->has('Operacion') ? 'is-invalid' : ''), 'placeholder' => 'Seleccione','id'=>'select-operacion','required']) !!}
    {!! $errors->first('Operacion', '<div class="invalid-feedback">:message</p>') !!}
</div>
{{-- ///////////////////////////////////////diagnostico --}}
<div class="form-group" id="fecha_diagnostico">
    {{ Form::label('fecha_diagnostico:') }}<span class="form-span">*</span>
    {{ Form::date('fecha_diagnostico', $mantencione->fecha_diagnostico, ['class' => 'form-control' . ($errors->has('fecha_diagnostico') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Diagnostico','id'=>'fecha-diagnostico']) }}
    {!! $errors->first('fecha_diagnostico', '<div class="invalid-feedback">:message</p>') !!}
</div>

<div class="form-group" id="descripcion-diagnostico">
    {{ Form::label('descripción_diagnostico:') }}
    {{ Form::text('descripcion_diagnostico', $mantencione->descripcion_diagnostico, ['value'=>'22','class' => 'form-control' . ($errors->has('descripcion_diagnostico') ? ' is-invalid' : ''), 'placeholder' => 'Descripción diagnostico','id'=>'descripcion_diagnostico']) }}
    {!! $errors->first('descripcion_diagnostico', '<div class="invalid-feedback">:message</p>') !!}
</div>
<div class="form-group" id="diagnostico-corriente">
    {{ Form::label('Corriente:') }}<span class="form-span">*</span>
    {{ Form::text('diagnostico_corriente', $mantencione->diagnostico_corriente, ['class' => 'form-control' . ($errors->has('diagnostico_corriente') ? ' is-invalid' : ''), 'placeholder' => 'Corriente recibida','id'=>'diagnostico_corriente']) }}
    {!! $errors->first('diagnostico_corriente', '<div class="invalid-feedback">:message</p>') !!}
</div>
<div class="form-group" id="fecha-mantencion">
    {{ Form::label('fecha_mantención:') }}<span class="form-span">*</span>
    {{ Form::date('fecha_mantencion', $mantencione->fecha_mantencion, ['class' => 'form-control' . ($errors->has('fecha_mantencion') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Mantención','id'=>'fecha-mantencion2']) }}
    {!! $errors->first('fecha_mantencion', '<div class="invalid-feedback">:message</p>') !!}
</div>
<div class="form-group" id="descripcion-mantencion">
    {{ Form::label('descripción:') }}
    {{ Form::text('descripcion_mantencion', $mantencione->descripcion_mantencion, ['class' => 'form-control' . ($errors->has('descripcion_mantencion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion','id'=>'descripcion_mantencion']) }}
    {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</p>') !!}
</div>





<div class="form-group" id="fecha-dado-baja">
    {{ Form::label('fecha_dado de baja:') }}<span class="form-span">*</span>
    {{ Form::date('fecha_dado_baja', $mantencione->fecha_dado_baja, ['class' => 'form-control' . ($errors->has('fecha_dado_baja') ? ' is-invalid' : ''), 'placeholder' => 'Fecha dado de baja','id'=>'fecha-dado-baja2']) }}
    {!! $errors->first('fecha_dado_baja', '<div class="invalid-feedback">:message</p>') !!}
</div>
<div class="form-group" id="descripcion-dado-baja">
    {{ Form::label('descripción dado de baja:') }}
    {{ Form::text('descripcion_dado_baja', $mantencione->descripcion_dado_baja, ['class' => 'form-control' . ($errors->has('descripcion_dado_baja') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion','id'=>'descripcion_dado_baja']) }}
    {!! $errors->first('descripcion_dado_baja', '<div class="invalid-feedback">:message</p>') !!}
</div>
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



{{-- mantencion --}}
<div class="form-group"id="componentes2-targeta">
    {{ Form::label('Targetas malas:') }}<span class="form-span">*</span>
   {!!Form::select('componentes2_targeta',['0'=>'0','1' => '1', '2' => '2','3'=>'3'], null, [ 'class' => 'form-control'. ($errors->has('componentes2_targeta') ? 'is-invalid' : ''), 'placeholder' => 'Seleccione','id'=>'componentes2-targeta']) !!}
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

    <label><input type="radio" class="mr-2" id="verificacion_reparacion" value="" name="verificacion_reparacion">Reparado</label><br>
</div>




<div class="componentes-mantencion" id="componentes-mantencion">

    <table>
        <tbody>
            <tr>
                <td> </td>
                <td class="espacio">  Buena </td>
                <td class="espacio">  Mala</td>

            </tr>



            <tr>
                <td>Acrilico<span class="form-span">*</span></td>
                <td class="espacio"><input type="radio"  class=" radios" name="componente2" value="1" ></td>
                <td class="espacio"><input type="radio" class="radios" name="componente2" value="0"></td>

            </tr>
            <tr>
                <td>Tapas<span class="form-span">*</span></td>
                <td class="espacio"><input type="radio"  class=" radios" name="componente3" value="1" ></td>
                <td class="espacio"><input type="radio" class="radios" name="componente3" value="0"></td>

            </tr>
            <tr>
                <td>Enchufe<span class="form-span">*</span></td>
                <td class="espacio"><input type="radio"  class=" radios" name="componente4" value="1" ></td>
                <td class="espacio"><input type="radio" class="radios" name="componente4" value="0"></td>
            </tr>
            <tr>
                <td>Cable<span class="form-span">*</span></td>
                <td class="espacio"><input type="radio"  class=" radios" name="componente5" value="1" ></td>
                <td class="espacio"><input type="radio" class="radios" name="componente5" value="0"></td>
            </tr>
        </tbody>



    </table>
</div>
<br>

</div>
<div class="box-footer mt20">
<button type="submit" class="btn btn-primary">Guardar</button>
</div>
</form>




</div>
<style>
.espacio{
text-align: center
}
.{
}
</style>
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
$('#fecha-dado-baja').hide();
$('#descripcion-dado-baja').hide();
$('#probado-bajo-agua').hide();
$('#componentes2-targeta').hide();
$('#imagen1').hide();
$('#imagen2').hide();
$('#imagen3').hide();
});
function onSelectMovimientoChangeHide() {
if ($(this).val() == 'Diagnostico') {
$('#fecha_diagnostico').show();
$('#descripcion-diagnostico').show();
$('#diagnostico-corriente').show();
$('#componentes-mantencion').show();
$('#componentes2-targeta').show();
$('#probado-bajo-agua').hide();
$('#verificacion-reparacion').hide();
$('#fecha-mantencion').hide();
$('#descripcion-mantencion').hide();
$('#fecha-dado-baja').hide();
$('#descripcion-dado-baja').hide();
$('input[type=text]').val('');
$('#imagen1').hide();
$('#imagen2').hide();
/*  document.getElementById("fecha_diagnostico").required = true;
document.getElementById("descripcion-diagnostico").required = true;
document.getElementById("diagnostico-corriente").required = true; */
$("#fecha-diagnostico2").attr('required', true);
$("#descripcion_diagnostico").attr('required', true);
$("#diagnostico_corriente").attr('required', true);
$("#componentes2_targeta").attr('required', true);
$("#fecha-mantencion2").attr('required', false);
$("#verificacion-reparacion").attr('required', false);
$("#componentes-mantencion").attr('required', true);
$("#descripcion_mantencion").attr('required', false);
$("#fecha-dado-baja2").attr('required', false);
$("#descripcion_dado_baja").attr('required', false);
$('#div_centro').hide();
} else if($(this).val() == 'Mantención'){
$('#fecha_diagnostico').hide();
$('#descripcion-diagnostico').hide();
$('#diagnostico-corriente').hide();
$('#fecha-mantencion').show();
$('#componentes-mantencion').hide();
$('#descripcion-mantencion').show();
$('#componentes2-targeta').hide();
$('#probado-bajo-agua').show();
$('#verificacion-reparacion').show();
$('#imagen1').show();
$('#imagen2').show();
$('#imagen3').hide();
$("#fecha-diagnostico").attr('required', false);
$("#descripcion_diagnostico").attr('required', false);
$("#diagnostico_corriente").attr('required', false);
$("#componentes-mantencion").attr('required', false);
$("#fecha_mantencion").attr('required', true);
$("#verificacion-reparacion").attr('required', true);
$("#probado-bajo-agua").attr('required', true);
$("#descripcion_mantencion").attr('required', true);
$("#fecha_dado_baja").attr('required', false);
$("#descripcion_dado_baja").attr('required', false);
$('#fecha-dado-baja').hide();
$('#descripcion-dado-baja').hide();
$('input[type=text]').val('');
}else if($(this).val() == 'Dar de baja'){
$('input[type=text]').val('');
$('#fecha_diagnostico').hide();
$('#descripcion-diagnostico').hide();
$('#diagnostico-corriente').hide();
$('#fecha-mantencion').hide();
$('#componentes-mantencion').hide();
$('#descripcion-mantencion').hide();
$('#componentes2-targeta').hide();
$('#probado-bajo-agua').hide();
$('#verificacion-reparacion').hide();
$('#fecha-dado-baja').show();
$('#descripcion-dado-baja').show();
$("#fecha-diagnostico").attr('required', false);
$("#descripcion_diagnostico").attr('required', false);
$("#diagnostico_corriente").attr('required', false);
$("#verificacion-reparacion").attr('required', false);
$("#componentes2_targeta").attr('required', false);
$("#probado-bajo-agua").attr('required', false );
$("#fecha_mantencion").attr('required', false);
$("#componentes-mantencion").attr('required', false);
$("#descripcion_mantencion").attr('required', false);
$("#fecha_dado_baja").attr('required', true);
$("#descripcion_dado_baja").attr('required', true);
$('#imagen1').hide();
$('#imagen2').hide();
$('#imagen3').show();
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
<link rel="stylesheet" href="{{ asset('css/all.css') }}">

