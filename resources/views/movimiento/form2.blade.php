

<script type="text/javascript" src="{{ asset('/vendor/jquery/jquery.js') }}"></script>

<h4>Equipo IM{{ $movimiento->equipo->id_equipo }}</h4>

<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('Id Equipo') }}
            {{ Form::text('id_equipo', $movimiento->id_equipo, ['class' => 'form-control' . ($errors->has('id_equipo') ? ' is-invalid' : ''),'placeholder' => 'Código Equipo', 'readonly']) }}
            {!! $errors->first('id_equipo', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha_movimiento') }}
            {{ Form::date('fecha_movimiento', $movimiento->fecha_movimiento, ['class' => 'form-control' . ($errors->has('fecha_movimiento') ? ' is-invalid' : ''),'placeholder' => 'Fecha Movimiento']) }}
            {!! $errors->first('fecha_movimiento', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('n_documento') }}
            {{ Form::text('n_documento', $movimiento->n_documento, ['class' => 'form-control' . ($errors->has('n_documento') ? ' is-invalid' : ''),'placeholder' => 'N Documento']) }}
            {!! $errors->first('n_documento', '<div class="invalid-feedback">:message</p>') !!}
        </div>



        <div class="form-group" id="div_cliente">
            {{ Form::label('Cliente') }}
            <select class="form-control" id="clientes" name="clientes">
                <option value="">Seleccione Cliente</option>
                @foreach ($clientes as $cliente)
                    <option value="{{ $cliente->id_cliente }}">{{ $cliente->nombre_empresa }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group" id="div_centro">
            {{ Form::label('Centro') }}
            <select class="form-control" id="id_centro" name="id_centro" required>
                <option value="">Seleccione Centro</option>
            </select>

        </div>


    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>

<script type="text/javascript">


    $(function() {

        $('#clientes').on('change', onSelectClienteChange);

    });




    function onSelectClienteChange() {

        var id_cliente = $(this).val();

        // AJAX
        $.get('/movimiento/' + id_cliente + '/centros', function(data) {




            var html_select = '<option value="">Seleccione Centro</option>';
            for (var i = 0; i < data.length; ++i)
                html_select += '<option value="' + data[i].id_centro + '">' + data[i]
                .nombre_centro +
                '</option>';
            $('#id_centro').html(html_select);


        });

    }
</script>
