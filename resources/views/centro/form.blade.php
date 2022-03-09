

         <!-- Preloader -->
         <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake"   src="{{ URL::asset('imagenes/AdminLTELogo.png')}}"    alt="AdminLTELogo" height="60" width="60">
          </div>



<div class="box box-info padding-1">
    <div class="box-body">


        <div class="form-group">
            {{ Form::label('nombre_centro:') }}<span class="form-span">*</span>
            {{ Form::text('nombre_centro', $centro->nombre_centro, ['class' => 'form-control' . ($errors->has('nombre_centro') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Centro','required']) }}
            {!! $errors->first('nombre_centro', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('teléfono_empresa:') }}<span class="form-span">*</span>
            {{ Form::text('telefono_empresa', $centro->telefono_empresa, ['class' => 'form-control' . ($errors->has('telefono_empresa') ? ' is-invalid' : ''), 'placeholder' => 'Telefono Empresa','required']) }}
            {!! $errors->first('telefono_empresa', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('descripción:') }}
            {{ Form::text('descripcion', $centro->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripción']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cliente:') }}<span class="form-span">*</span>
            {{ Form::select('id_cliente', $clientes, $centro->id_cliente, ['class' => 'form-control' . ($errors->has('id_cliente') ? 'is-invalid' : ''),'placeholder' => 'Lista Clientes','required']) }}
            {!! $errors->first('id_cliente', '<div class="invalid-feedback">:message</p>') !!}
          </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>
<link rel="stylesheet" href="{{ asset('css/all.css') }}">
