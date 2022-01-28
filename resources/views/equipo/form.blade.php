
<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
           {{ Form::label('tipo_equipo') }}
           {!!Form::select('tipo_equipo',['Camara' => 'Camara', 'Lampara' => 'Lampara'], null, [ 'class' => 'form-control'. ($errors->has('tipo_equipo') ? 'is-invalid' : ''), 'placeholder' => 'Selección', ]) !!}
        </div>
        <div class="form-group">
            {{ Form::label('cod_equipo') }}
            {{ Form::text('cod_equipo', $equipo->cod_equipo, ['class' => 'form-control' . ($errors->has('cod_equipo') ? ' is-invalid' : ''), 'placeholder' => 'Cod Equipo']) }}
            {!! $errors->first('cod_equipo', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('n_factura') }}
            {{ Form::text('n_factura', $equipo->n_factura, ['class' => 'form-control' . ($errors->has('n_factura') ? ' is-invalid' : ''), 'placeholder' => 'N Factura']) }}
            {!! $errors->first('n_factura', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('modelo') }}
            {{ Form::text('modelo', $equipo->modelo, ['class' => 'form-control' . ($errors->has('modelo') ? ' is-invalid' : ''), 'placeholder' => 'Modelo']) }}
            {!! $errors->first('modelo', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('ubicacion') }}
            {{ Form::text('ubicacion', $equipo->ubicacion, ['class' => 'form-control' . ($errors->has('ubicacion') ? ' is-invalid' : ''), 'placeholder' => 'Ubicacion']) }}
            {!! $errors->first('ubicacion', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('descripcion') }}
            {{ Form::text('descripcion', $equipo->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estado') }}
            {{ Form::text('estado', $equipo->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha_compra') }}
            {{ Form::text('fecha_compra', $equipo->fecha_compra, ['class' => 'form-control' . ($errors->has('fecha_compra') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Compra']) }}
            {!! $errors->first('fecha_compra', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('proveedor') }}
            {{ Form::text('proveedor', $equipo->proveedor, ['class' => 'form-control' . ($errors->has('proveedor') ? ' is-invalid' : ''), 'placeholder' => 'Proveedor']) }}
            {!! $errors->first('proveedor', '<div class="invalid-feedback">:message</p>') !!}

        </div>
        <div class="form-group">
            {{ Form::label('id_centro') }}
            {{ Form::select('id_centro', $centros, $equipo->id_centro, ['class' => 'form-control' . ($errors->has('id_centro') ? 'is-invalid' : ''),'placeholder' => 'Lista Clientes']) }}
            {!! $errors->first('id_centro', '<div class="invalid-feedback">:message</p>') !!}
          </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
