<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('cod_mantencion') }}
            {{ Form::text('cod_mantencion', $mantencione->cod_mantencion, ['class' => 'form-control' . ($errors->has('cod_mantencion') ? ' is-invalid' : ''), 'placeholder' => 'Cod Mantencion']) }}
            {!! $errors->first('cod_mantencion', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('n_despacho') }}
            {{ Form::text('n_despacho', $mantencione->n_despacho, ['class' => 'form-control' . ($errors->has('n_despacho') ? ' is-invalid' : ''), 'placeholder' => 'N Despacho']) }}
            {!! $errors->first('n_despacho', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha_mantencion') }}
            {{ Form::text('fecha_mantencion', $mantencione->fecha_mantencion, ['class' => 'form-control' . ($errors->has('fecha_mantencion') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Mantencion']) }}
            {!! $errors->first('fecha_mantencion', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('descripcion') }}
            {{ Form::text('descripcion', $mantencione->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('validacion') }}
            {{ Form::text('validacion', $mantencione->validacion, ['class' => 'form-control' . ($errors->has('validacion') ? ' is-invalid' : ''), 'placeholder' => 'Validacion']) }}
            {!! $errors->first('validacion', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Codigo_Equipo') }}
            {{ Form::select('id_equipo', $equipos, $mantencione->id_equipo, ['class' => 'form-control' . ($errors->has('id_equipo') ? ' is-invalid' : ''), 'placeholder' => 'Id Equipo']) }}
            {!! $errors->first('id_equipo', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('imagen') }}
            {{ Form::file('imagen', $imagen, $mantencione->id_equipo, ['class' => 'form-control' . ($errors->has('id_equipo') ? ' is-invalid' : ''), 'placeholder' => 'Id Equipo', 'multiple']) }}
            {!! $errors->first('imagen', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
