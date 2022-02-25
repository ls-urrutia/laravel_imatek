
         <!-- Preloader -->
         <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="..\..\vendor\adminlte\dist\img\AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
          </div>

 <script type="text/javascript" src="{{ asset('/vendor/jquery/jquery.js') }}"></script>



<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('Codigo_Equipo:') }}
            {{ Form::select('id_equipo', $equipos,$mantencione->id_equipo,['id' => 'select-equipos','class' => 'form-control' . ($errors->has('id_equipo') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione']) }}
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
            {!! $errors->first('fecha_mantencion', '<div class="invalid-feedback">:message</p>') !!}
        </div>

        <div class="form-group" id="descripcion-diagnostico">
            {{ Form::label('descripción_diagnostico:') }}
            {{ Form::text('descripcion_diagnostico', $mantencione->descripcion_diagnostico, ['class' => 'form-control' . ($errors->has('descripcion_diagnostico') ? ' is-invalid' : ''), 'placeholder' => 'Descripción diagnostico','id'=>'descripcion-diagnostico']) }}
            {!! $errors->first('diagnostico', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group" id="diagnostico-corriente">
            {{ Form::label('Corriente:') }}
            {{ Form::text('diagnostico_corriente', $mantencione->diagnostico_corriente, ['class' => 'form-control' . ($errors->has('diagnostico_corriente') ? ' is-invalid' : ''), 'placeholder' => 'Corriente recibida','id'=>'diagnostico-corriente']) }}
            {!! $errors->first('diagnostico_corriente', '<div class="invalid-feedback">:message</p>') !!}
        </div>

{{-- ------------------------------------------------------------------------ --}}

        <div class="form-group" id="fecha-mantencion">
            {{ Form::label('fecha_mantención:') }}
            {{ Form::date('fecha_mantencion', $mantencione->fecha_mantencion, ['class' => 'form-control' . ($errors->has('fecha_mantencion') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Mantención']) }}
            {!! $errors->first('fecha_mantencion', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group" id="componentes-descripcion">
            {{ Form::label('Componentes:') }}
            {{ Form::text('componentes_descripcion', $mantencione->componentes_descripcion, ['class' => 'form-control' . ($errors->has('componentes_descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Componentes']) }}
            {!! $errors->first('componentes_descripcion', '<div class="invalid-feedback">:message</p>') !!}
        </div>

        <div class="form-group" id="descripcion-mantencion">
            {{ Form::label('descripción:') }}
            {{ Form::text('descripcion_mantencion', $mantencione->descripcion_mantencion, ['class' => 'form-control' . ($errors->has('descripcion_mantencion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</p>') !!}
        </div>



        <div class="form-group" id="fecha-dado-baja">
            {{ Form::label('fecha_dado de baja:') }}
            {{ Form::date('fecha_dado_baja', $mantencione->fecha_dado_baja, ['class' => 'form-control' . ($errors->has('fecha_dado_baja') ? ' is-invalid' : ''), 'placeholder' => 'Fecha dado de baja']) }}
            {!! $errors->first('fecha_dado_baja', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group" id="descripcion-dado-baja">
            {{ Form::label('descripción dado de baja:') }}
            {{ Form::text('descripcion_dado_baja', $mantencione->descripcion_dado_baja, ['class' => 'form-control' . ($errors->has('descripcion_dado_baja') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
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
            {{ Form::file('imagen1',$mantencione->imagen1, ['class' => 'form-control' . ($errors->has('imagen1') ? ' is-invalid' : ''), 'placeholder' => 'Id Equipo']) }}
            {!! $errors->first('imagen1', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group" id="imagen2">
            {{ Form::label('imagen2') }}
            {{ Form::file('imagen2',  $mantencione->imagen2, ['class' => 'form-control' . ($errors->has('imagen2') ? ' is-invalid' : ''), 'placeholder' => 'Id Equipo']) }}
            {!! $errors->first('imagen2', '<div class="invalid-feedback">:message</p>') !!}
        </div>

        <div class="form-group" id="imagen3">
            {{ Form::label('imagen3') }}
            {{ Form::file('imagen3', $mantencione->imagen3, ['class' => 'form-control' . ($errors->has('imagen3') ? ' is-invalid' : ''), 'placeholder' => 'Id Equipo']) }}
            {!! $errors->first('imagen3', '<div class="invalid-feedback">:message</p>') !!}
        </div>




    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>
<script type="text/javascript">

    $(function() {


        $('#select-operacion').on('change', onSelectMovimientoChange);
        $('#select-operacion').on('change', onSelectMovimientoChangeHide);

        $('#fecha_diagnostico').hide();
        $('#descripcion-diagnostico').hide();
        $('#diagnostico-corriente').hide();

        $('#fecha-mantencion').hide();
        $('#componentes-descripcion').hide();
        $('#descripcion-mantencion').hide();

        $('#fecha-dado-baja').hide();
        $('#descripcion-dado-baja').hide();
        $('#imagen1').hide();
        $('#imagen2').hide();
        $('#imagen3').hide();

        id = {{ request()->id }};

        $("#select-equipos").val(id);


    });


    function onSelectMovimientoChangeHide() {

    if ($(this).val() == 'Diagnostico') {
        $('#fecha_diagnostico').show();
        $('#descripcion-diagnostico').show();
        $('#diagnostico-corriente').show();

        $('#fecha-mantencion').hide();
        $('#componentes-descripcion').hide();
        $('#descripcion-mantencion').hide();

        $('#fecha-dado-baja').hide();
        $('#descripcion-dado-baja').hide();

    /*
        $("select#ids_centro option[value='1']").show();
        $("select#ids_centro").val("1");
    */
    $('#div_centro').hide();

    } else if($(this).val() == 'Mantención'){

        $('#fecha_diagnostico').hide();
        $('#descripcion-diagnostico').hide();
        $('#diagnostico-corriente').hide();
        $('#fecha-mantencion').show();
        $('#componentes-descripcion').show();
        $('#descripcion-mantencion').show();

        $('#fecha-dado-baja').hide();
        $('#descripcion-dado-baja').hide();



        /* $('#div_centro').show();
        $("select#ids_centro option[value='1']").hide();
        $("select#ids_centro").val("2");
    } */
    }else if($(this).val() == 'Dar de baja'){
        $('#fecha_diagnostico').hide();
        $('#descripcion-diagnostico').hide();
        $('#diagnostico-corriente').hide();
        $('#fecha-mantencion').hide();
        $('#componentes-descripcion').hide();
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



