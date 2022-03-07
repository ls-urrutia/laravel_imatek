<title>Multiple data send</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
@php
use Illuminate\Support\Carbon;
$dateho = Carbon::now();
$dateho = $dateho->format('Y-m-d');
@endphp



         <!-- Preloader -->
         <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="..\..\vendor\adminlte\dist\img\AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
          </div>

<h4>Equipo IM{{ $equipo->id_equipo }}</h4>

<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('id_equipo:') }}
            {{ Form::text('id_equipo', $equipo->id_equipo, ['class' => 'form-control' . ($errors->has('id_equipo') ? ' is-invalid' : ''), 'placeholder' => 'Código Equipo','readonly']) }}
            {!! $errors->first('id_equipo', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
           {{ Form::label('tipo_documento:') }}
           {!!Form::select('tipo_documento',['Factura' => 'Factura', 'Guía Despacho' => 'Guía Despacho'],$equipo->tipo_documento, [ 'class' => 'form-control'. ($errors->has('tipo_equipo') ? 'is-invalid' : ''), 'placeholder' => 'Selección']) !!}
           {!! $errors->first('tipo_documento', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('n°_documento:') }}
            {{ Form::text('n_documento', $equipo->n_documento, ['class' => 'form-control' . ($errors->has('n_documento') ? ' is-invalid' : ''), 'placeholder' => 'N° Factura']) }}
            {!! $errors->first('n_documento', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
           {{ Form::label('tipo_equipo:') }}
           {!!Form::select('tipo_equipo',['Camara' => 'Camara', 'Lampara' => 'Lampara'],$equipo->tipo_equipo, [ 'class' => 'form-control'. ($errors->has('tipo_equipo') ? 'is-invalid' : ''), 'placeholder' => 'Selección','id'=>'tipoequipo']) !!}
        </div>
        <div class="form-group">
            {{ Form::label('modelo:') }}
            {{ Form::text('modelo', $equipo->modelo, ['class' => 'form-control' . ($errors->has('modelo') ? ' is-invalid' : ''), 'placeholder' => 'Modelo']) }}
            {!! $errors->first('modelo', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('descripción:') }}
            {{ Form::text('descripcion', $equipo->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha_ingreso:') }}
            {{ Form::date('fecha_ingreso', $equipo->fecha_ingreso, ['class' => 'form-control' . ($errors->has('fecha_ingreso') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Compra','value'=> $dateho]) }}
            {!! $errors->first('fecha_ingreso', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Proveedor:') }}
            <select class="form-control" id="proveedor" name="proveedor">
                <option disabled selected value>Seleccione Proveedor</option>
                @foreach ($proveedores as $proveedor)
                    <option value="{{ $proveedor->nombre_proveedor }}">{{ $proveedor->nombre_proveedor }}</option>
                @endforeach
            </select>

        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>
