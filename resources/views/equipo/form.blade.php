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
    <img class="animation__shake" src="..\vendor\adminlte\dist\img\AdminLTELogo.png" alt="AdminLTELogo" height="60"
        width="60">
</div>



<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('tipo_equipo:') }}<span class="form-span">*</span>
            {!! Form::select('tipo_equipo', ['Camara' => 'Camara', 'Lampara' => 'Lampara'], null, ['class' => 'form-control' . ($errors->has('tipo_equipo') ? 'is-invalid' : ''), 'placeholder' => 'Selección', 'id' => 'tipoequipo','required']) !!}
        </div>
        <div class="form-group">
            {{ Form::label('tipo_documento:') }}<span class="form-span">*</span>
            {!! Form::select('tipo_documento', ['Factura' => 'Factura', 'Guía Despacho' => 'Guía Despacho'], null, ['class' => 'form-control' . ($errors->has('tipo_equipo') ? 'is-invalid' : ''), 'placeholder' => 'Selección','required']) !!}
            {!! $errors->first('tipo_documento', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('n°_documento:') }}<span class="form-span">*</span>
            {{ Form::input('number','n_documento', $equipo->n_documento, ['class' => 'form-control' . ($errors->has('n_documento') ? ' is-invalid' : ''),'placeholder' => 'N° Documento','required']) }}
            {!! $errors->first('n_documento', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('modelo:') }}<span class="form-span">*</span>
            {{ Form::text('modelo', $equipo->modelo, ['class' => 'form-control' . ($errors->has('modelo') ? ' is-invalid' : ''),'placeholder' => 'Modelo','required']) }}
            {!! $errors->first('modelo', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('descripción:') }}
            {{ Form::text('descripcion', $equipo->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''),'placeholder' => 'Descripción','required']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Fecha_ingreso:') }}<span class="form-span">*</span>
            {{ Form::date('fecha_ingreso', $equipo->fecha_ingreso, ['class' => 'form-control' . ($errors->has('fecha_ingreso') ? ' is-invalid' : ''),'placeholder' => 'Fecha Compra','required']) }}
            {!! $errors->first('fecha_ingreso', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Proveedor:') }}<span class="form-span">*</span>
            <select class="form-control" id="proveedor" name="proveedor" >
                <option disabled selected value>Seleccione Proveedor</option>
                @foreach ($proveedores as $proveedor)
                    <option value="{{ $proveedor->nombre_proveedor }}">{{ $proveedor->nombre_proveedor }}</option>
                @endforeach
            </select>

        </div>


        <div class="box box-info padding-1">
            <form>
                <section>
                    <div class="form-group">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Cantidad Equipos (Ingresar código de fábrica)</th>
                                    <th><a class="addRow"> <i class="bi bi-plus-circle-fill"></i></a> Agregar
                                        Equipo Adicional</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Equipos: 1<input type="text" name="cod_fabrica[]" class="form-control" required="">
                                    </td>
                                    <td><a class="btn btn-danger remove"><i class="bi bi-x-circle-fill"></i></a></td>
                                </tr>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td style="border: none"></td>
                                    <td style="border: none"></td>
                                    <td style="border: none"></td>
                                    <td><input type="submit" name="" value="Guardar" class="btn btn-success"></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </section>
            </form>
        </div>
        <script type="text/javascript">

            var num = 1;



            $('.addRow').on('click', function() {
                addRow();
            });

            function addRow() {
                num += 1;
                var tr = '<tr>' +
                    '<td>Equipos: ' + num + '<input type="text" name="cod_fabrica[]" class="form-control" required=""></td>' +
                    '<td><a class="btn btn-danger remove"><i class="bi bi-x-octagon"></i></a></td>' +
                    '</tr>';
                $('tbody').append(tr);

            };
            $('.remove').live('click', function() {

                var last = $('tbody tr').length;
                if (last == 1) {
                    alert("No esta permitido remover la última fila");
                } else {
                    $(this).parent().parent().remove();
                    num -= 1;
                }

            });
        </script>

    </div>
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">
