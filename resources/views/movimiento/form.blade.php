<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('Código Equipo') }}
            {{ Form::select('id_equipo', $equipos, $movimiento->id_equipo, ['class' => 'form-control' . ($errors->has('id_equipo') ? ' is-invalid' : ''), 'placeholder' => 'Código Equipo']) }}
            {!! $errors->first('id_equipo', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tipo_movimiento') }}
            {{ Form::text('tipo_movimiento', $movimiento->tipo_movimiento, ['class' => 'form-control' . ($errors->has('tipo_movimiento') ? ' is-invalid' : ''), 'placeholder' => 'Tipo Movimiento']) }}
            {!! $errors->first('tipo_movimiento', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha_movimiento') }}
            {{ Form::text('fecha_movimiento', $movimiento->fecha_movimiento, ['class' => 'form-control' . ($errors->has('fecha_movimiento') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Movimiento']) }}
            {!! $errors->first('fecha_movimiento', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tipo_documento') }}
            {{ Form::text('tipo_documento', $movimiento->tipo_documento, ['class' => 'form-control' . ($errors->has('tipo_documento') ? ' is-invalid' : ''), 'placeholder' => 'Tipo Documento']) }}
            {!! $errors->first('tipo_documento', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('n_documento') }}
            {{ Form::text('n_documento', $movimiento->n_documento, ['class' => 'form-control' . ($errors->has('n_documento') ? ' is-invalid' : ''), 'placeholder' => 'N Documento']) }}
            {!! $errors->first('n_documento', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Centro') }}
            {{ Form::select('id_centro', $centros, $movimiento->id_centro, ['class' => 'form-control' . ($errors->has('id_equipo') ? ' is-invalid' : ''), 'placeholder' => 'Centros']) }}
            {!! $errors->first('id_centro', '<div class="invalid-feedback">:message</p>') !!}
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
