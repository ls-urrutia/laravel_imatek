<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('nombre_proveedor:') }}<span class="form-span">*</span>
            {{ Form::text('nombre_proveedor', $proveedore->nombre_proveedor, ['class' => 'form-control' . ($errors->has('nombre_proveedor') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Proveedor','required']) }}
            {!! $errors->first('nombre_proveedor', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>
<link rel="stylesheet" href="{{ asset('css/all.css') }}">
