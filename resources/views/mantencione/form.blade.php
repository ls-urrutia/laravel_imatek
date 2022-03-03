<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="..\..\vendor\adminlte\dist\img\AdminLTELogo.png" alt="AdminLTELogo" height="60"
        width="60">
</div>

<script type="text/javascript" src="{{ asset('/vendor/jquery/jquery.js') }}"></script>



<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('Codigo_Equipo:') }}
            <select name="id_equipo" class="form-control" onchange="onSelectMantenimientoChangeFecha(this.value)">
                <option value=""> Seleccionar Equipo</option>
                @foreach ($equipos2 as $equipo)
                    <option value="{{ $equipo->id_equipo }}"> im{{ $equipo->id_equipo }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('Operación:') }}
        {!! Form::select('Operacion', ['Diagnostico' => 'Diagnostico', 'Mantención' => 'Mantención', 'Dar de baja' => 'Dar de baja'], null, ['class' => 'form-control' . ($errors->has('Operacion') ? 'is-invalid' : ''), 'placeholder' => 'Seleccione', 'id' => 'select-operacion']) !!}
        {!! $errors->first('Operacion', '<div class="invalid-feedback">:message</p>') !!}
    </div>
    {{-- ///////////////////////////////////////diagnostico --}}
    <div class="form-group" id="fecha_diagnostico">
        {{ Form::label('fecha_diagnostico:') }}
        {{ Form::date('fecha_diagnostico', $mantencione->fecha_diagnostico, ['class' => 'form-control' . ($errors->has('fecha_diagnostico') ? ' is-invalid' : ''),'placeholder' => 'Fecha Diagnostico','id' => 'fecha-diagnostico2']) }}
        {!! $errors->first('fecha_diagnostico', '<div class="invalid-feedback">:message</p>') !!}
    </div>

    <div class="form-group" id="descripcion-diagnostico">
        {{ Form::label('descripción_diagnostico:') }}
        {{ Form::text('descripcion_diagnostico', $mantencione->descripcion_diagnostico, ['value' => '22','class' => 'form-control' . ($errors->has('descripcion_diagnostico') ? ' is-invalid' : ''),'placeholder' => 'Descripción diagnostico','id' => 'descripcion-diagnostico']) }}
        {!! $errors->first('descripcion_diagnostico', '<div class="invalid-feedback">:message</p>') !!}
    </div>
    <div class="form-group" id="diagnostico-corriente">
        {{ Form::label('Corriente:') }}
        {{ Form::text('diagnostico_corriente', $mantencione->diagnostico_corriente, ['class' => 'form-control' . ($errors->has('diagnostico_corriente') ? ' is-invalid' : ''),'placeholder' => 'Corriente recibida','id' => 'diagnostico-corriente']) }}
        {!! $errors->first('diagnostico_corriente', '<div class="invalid-feedback">:message</p>') !!}
    </div>
    <div class="form-group" id="fecha-mantencion">
        {{ Form::label('fecha_mantención:') }}
        {{ Form::date('fecha_mantencion', $mantencione->fecha_mantencion, ['class' => 'form-control' . ($errors->has('fecha_mantencion') ? ' is-invalid' : ''),'placeholder' => 'Fecha Mantención','id' => 'fecha-mantencion2']) }}
        {!! $errors->first('fecha_mantencion', '<div class="invalid-feedback">:message</p>') !!}
    </div>
    <div class="form-group" id="descripcion-mantencion">
        {{ Form::label('descripción:') }}
        {{ Form::text('descripcion_mantencion', $mantencione->descripcion_mantencion, ['class' => 'form-control' . ($errors->has('descripcion_mantencion') ? ' is-invalid' : ''),'placeholder' => 'Descripcion','id' => 'descripcion-mantencion']) }}
        {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</p>') !!}
    </div>
    <div class="form-group" id="fecha-dado-baja">
        {{ Form::label('fecha_dado de baja:') }}
        {{ Form::date('fecha_dado_baja', $mantencione->fecha_dado_baja, ['class' => 'form-control' . ($errors->has('fecha_dado_baja') ? ' is-invalid' : ''),'placeholder' => 'Fecha dado de baja','id' => 'fecha-dado-baja2']) }}
        {!! $errors->first('fecha_dado_baja', '<div class="invalid-feedback">:message</p>') !!}
    </div>
    <div class="form-group" id="descripcion-dado-baja">
        {{ Form::label('descripción dado de baja:') }}
        {{ Form::text('descripcion_dado_baja', $mantencione->descripcion_dado_baja, ['class' => 'form-control' . ($errors->has('descripcion_dado_baja') ? ' is-invalid' : ''),'placeholder' => 'Descripcion','id' => 'descripcion_dado_baja']) }}
        {!! $errors->first('descripcion_dado_baja', '<div class="invalid-feedback">:message</p>') !!}
    </div>
    <div class="form-group" id="imagen1">
        {{ Form::label('imagen1') }}
        {{ Form::file('imagen1', $mantencione->imagen1, ['class' => 'form-control' . ($errors->has('imagen1') ? ' is-invalid' : ''),'placeholder' => 'Id Equipo','id' => 'imagen1']) }}
        {!! $errors->first('imagen1', '<div class="invalid-feedback">:message</p>') !!}
    </div>
    <div class="form-group" id="imagen2">
        {{ Form::label('imagen2') }}
        {{ Form::file('imagen2', $mantencione->imagen2, ['class' => 'form-control' . ($errors->has('imagen2') ? ' is-invalid' : ''),'placeholder' => 'Id Equipo','id' => 'imagen2']) }}
        {!! $errors->first('imagen2', '<div class="invalid-feedback">:message</p>') !!}
    </div>

    <div class="form-group" id="imagen3">
        {{ Form::label('imagen3') }}
        {{ Form::file('imagen3', $mantencione->imagen3, ['class' => 'form-control' . ($errors->has('imagen3') ? ' is-invalid' : ''),'placeholder' => 'Id Equipo','id' => 'imagen3']) }}
        {!! $errors->first('imagen3', '<div class="invalid-feedback">:message</p>') !!}
    </div>



    <div class="componentes-mantencion" id="componentes-mantencion">

        <table>
            <tbody>
                <tr>
                    <td> </td>
                    <td class="espacio"> Buena </td>
                    <td class="espacio"> Mala</td>

                </tr>
                <tr>
                    <td>Placa</td>
                    <td class="espacio"><input type="radio" class=" radios" name="componente1" value="1">
                    </td>
                    <td class="espacio"> <input type="radio" class=" radios" name="componente1" value="0">
                    </td>
                </tr>


                <tr>
                    <td>Acrilico</td>
                    <td class="espacio"><input type="radio" class=" radios" name="componente2" value="1">
                    </td>
                    <td class="espacio"><input type="radio" class="radios" name="componente2" value="0">
                    </td>

                </tr>
                <tr>
                    <td>Tapas</td>
                    <td class="espacio"><input type="radio" class=" radios" name="componente3" value="1">
                    </td>
                    <td class="espacio"><input type="radio" class="radios" name="componente3" value="0">
                    </td>

                </tr>
                <tr>
                    <td>enchufe</td>
                    <td class="espacio"><input type="radio" class=" radios" name="componente4" value="1">
                    </td>
                    <td class="espacio"><input type="radio" class="radios" name="componente4" value="0">
                    </td>
                </tr>
                <tr>
                    <td>Cable</td>
                    <td class="espacio"><input type="radio" class=" radios" name="componente5" value="1">
                    </td>
                    <td class="espacio"><input type="radio" class="radios" name="componente5" value="0">
                    </td>
                </tr>
            </tbody>



        </table>
    </div>
    <br>

</div>
<div class="box-footer mt20">
    <button type="submit" class="btn btn-primary">Guardar</button>
</div>



</div>
<style>
    .espacio {
        text-align: center
    }

    . {}

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

        $('#fecha-dado-baja').hide();
        $('#descripcion-dado-baja').hide();
        $('#imagen1').hide();
        $('#imagen2').hide();
        $('#imagen3').hide();

        $('#id_equipo').on('change', onSelectMantenimientoChangeFecha);


    });





    function onSelectMantenimientoChangeFecha(val) {

        $.get('/movimiento/' + val + '/fechas', function(data) {

            var ult_fecha_equipo = new Date(data[0].fecha_movimiento);


            /*          ult_fecha_equipo.setDate(ult_fecha_equipo_fecha_equipo.getDate() + 1); */

            month = '' + (ult_fecha_equipo.getMonth() + 1),
                day = '' + (ult_fecha_equipo.getDate() + 2),
                year = ult_fecha_equipo.getFullYear();

            if (month.length < 2)
                month = '0' + month;
            if (day.length < 2)
                day = '0' + day;

            ult_fecha_equipo = [year, month, day].join('-');



            $('#fecha-mantencion2').attr('min' , ult_fecha_equipo);
            $('#fecha-diagnostico2').attr('min' , ult_fecha_equipo);
            $('#fecha-dado-baja2').attr('min' , ult_fecha_equipo);



         /*    document.getElementById("fecha-mantencion").setAttribute("min", ult_fecha_equipo);
            document.getElementById("fecha-diagnostico").setAttribute("min", ult_fecha_equipo);
            document.getElementById("fecha-dado-baja").setAttribute("min", ult_fecha_equipo); */

            alert("Se ha limitado la fecha a el último registro del equipo")



            /*                  var isInvisibleM = $('#fecha_mantencion').is(':visible');
                    var isInvisibleD = $('#fecha_diagnostico').is(':visible');
                    var isInvisibleB = $('#fecha_dado_baja').is(':visible');

                    if (isInvisibleM) {
                        fecha_actual = document.getElementById("fecha_mantencion").value;
                    } else if (isInvisibleD) {
                        fecha_actual = document.getElementById("fecha_diagnostico").value;
                    } else if (isInvisibleB) {
                        fecha_actual = document.getElementById("fecha_dado_baja").value;
                    }

                    if (fecha_actual < ult_fecha_equipo) {
                        document.getElementById("fecha_movimiento").setAttribute("min", ult_fecha_equipo);
                        $('#fecha_movimiento').val(ult_fecha_equipo);
                        alert("Se ha actualizado la fecha al último registro de la fecha del equipo")
                    }
 */
        });

    }




    function onSelectMovimientoChangeHide() {

        if ($(this).val() == 'Diagnostico') {
            $('#fecha_diagnostico').show();
            $('#descripcion-diagnostico').show();
            $('#diagnostico-corriente').show();

            $('#fecha-mantencion').hide();
            $('#componentes-mantencion').hide();
            $('#descripcion-mantencion').hide();


            $('#fecha-dado-baja').hide();
            $('#descripcion-dado-baja').hide();
            $('input[type=text]').val('');



            $('#div_centro').hide();

        } else if ($(this).val() == 'Mantención') {
            $('#fecha_diagnostico').hide();
            $('#descripcion-diagnostico').hide();
            $('#diagnostico-corriente').hide();
            $('#fecha-mantencion').show();
            $('#componentes-mantencion').show();
            $('#descripcion-mantencion').show();

            $('#fecha-dado-baja').hide();
            $('#descripcion-dado-baja').hide();
            $('input[type=text]').val('');


        } else if ($(this).val() == 'Dar de baja') {



            $('input[type=text]').val('');
            $('#fecha_diagnostico').hide();
            $('#descripcion-diagnostico').hide();
            $('#diagnostico-corriente').hide();
            $('#fecha-mantencion').hide();
            $('#componentes-mantencion').hide();
            $('#descripcion-mantencion').hide();

            $('#fecha-dado-baja').show();
            $('#descripcion-dado-baja').show();
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
