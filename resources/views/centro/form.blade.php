

         <!-- Preloader -->
         <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="..\..\vendor\adminlte\dist\img\AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
          </div>



<div class="box box-info padding-1">
    <div class="box-body">


        <div class="form-group">
            {{ Form::label('nombre_centro') }}
            {{ Form::text('nombre_centro', $centro->nombre_centro, ['class' => 'form-control' . ($errors->has('nombre_centro') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Centro']) }}
            {!! $errors->first('nombre_centro', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('telefono_empresa') }}
            {{ Form::text('telefono_empresa', $centro->telefono_empresa, ['class' => 'form-control' . ($errors->has('telefono_empresa') ? ' is-invalid' : ''), 'placeholder' => 'Telefono Empresa']) }}
            {!! $errors->first('telefono_empresa', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('descripcion') }}
            {{ Form::text('descripcion', $centro->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_cliente') }}
            {{ Form::select('id_cliente', $clientes, $centro->id_cliente, ['class' => 'form-control' . ($errors->has('id_cliente') ? 'is-invalid' : ''),'placeholder' => 'Lista Clientes']) }}
            {!! $errors->first('id_cliente', '<div class="invalid-feedback">:message</p>') !!}
          </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>
