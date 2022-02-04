<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('fecha_mantencion') }}
            {{ Form::date('fecha_mantencion', $mantencione->fecha_mantencion, ['class' => 'form-control' . ($errors->has('fecha_mantencion') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Mantencion']) }}
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
            {{ Form::label('estado_mantencion') }}
            {{ Form::text('estado_mantencion', $mantencione->validacion, ['class' => 'form-control' . ($errors->has('estado_mantencion') ? ' is-invalid' : ''), 'placeholder' => 'Estado Mantención']) }}
            {!! $errors->first('estado_mantencion', '<div class="invalid-feedback">:message</p>') !!}
        </div>


        <div class="form-group">
            {{ Form::label('Codigo_Equipo') }}
            {{ Form::select('id_equipo', $equipos, $mantencione->id_equipo, ['class' => 'form-control' . ($errors->has('id_equipo') ? ' is-invalid' : ''), 'placeholder' => 'Id Equipo']) }}
            {!! $errors->first('id_equipo', '<div class="inval id-feedback">:message</p>') !!}
        </div>
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
        </div>


    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
