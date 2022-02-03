<title>Multiple data send</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">


<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('tipo_documento') }}
            {{ Form::text('tipo_documento', $equipo->tipo_documento, ['class' => 'form-control' . ($errors->has('tipo_documento') ? ' is-invalid' : ''), 'placeholder' => 'N° Documento']) }}
            {!! $errors->first('n_documento', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('n_documento') }}
            {{ Form::text('n_documento', $equipo->n_documento, ['class' => 'form-control' . ($errors->has('n_documento') ? ' is-invalid' : ''), 'placeholder' => 'N° Factura']) }}
            {!! $errors->first('n_documento', '<div class="invalid-feedback">:message</p>') !!}
        </div>
                <div class="form-group">
           {{ Form::label('tipo_equipo') }}
           {!!Form::select('tipo_equipo',['Camara' => 'Camara', 'Lampara' => 'Lampara'], null, [ 'class' => 'form-control'. ($errors->has('tipo_equipo') ? 'is-invalid' : ''), 'placeholder' => 'Selección','id'=>'tipoequipo']) !!}
        </div>
        <div class="form-group">
            {{ Form::label('modelo') }}
            {{ Form::text('modelo', $equipo->modelo, ['class' => 'form-control' . ($errors->has('modelo') ? ' is-invalid' : ''), 'placeholder' => 'Modelo']) }}
            {!! $errors->first('modelo', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('ciclos') }}
            {{ Form::text('ciclos', $equipo->ciclos, ['class' => 'form-control' . ($errors->has('ciclos') ? ' is-invalid' : ''), 'placeholder' => 'ciclos']) }}
            {!! $errors->first('ciclos', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('descripcion') }}
            {{ Form::text('descripcion', $equipo->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</p>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('estado') }}
            {!! Form::select('estado', [null => 'Seleccionar estado'] + ['Operativa' => 'Operativa','Dado de baja'=>'Dado de baja','En mantenimiento'=>'En mantenimiento'], $equipo->estado, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'estado', 'id'=>'estado', 'onchange'=>'verificar(this)']) !!}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha_ingreso') }}
            {{ Form::text('fecha_ingreso', $equipo->fecha_ingreso, ['class' => 'form-control' . ($errors->has('fecha_ingreso') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Compra']) }}
            {!! $errors->first('fecha_ingreso', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('proveedor') }}
            {{ Form::text('proveedor', $equipo->proveedor, ['class' => 'form-control' . ($errors->has('proveedor') ? ' is-invalid' : ''), 'placeholder' => 'Proveedor']) }}
            {!! $errors->first('proveedor', '<div class="invalid-feedback">:message</p>') !!}

        </div>


        <div class="box box-info padding-1">
            <form>
                <section>
                    <div class="form-group" >
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th><a class="addRow"> <i class="bi bi-plus-circle"></i></a></th>
                                </tr>
                            </thead>
                            <tbody>
                <tr>
                <td><input type="text" name="cod_equipo[]" class="form-control" required=""></td>
                <td><a href="#" class="btn btn-danger remove"><i class="bi bi-x-octagon"></i></a></td>
                </tr>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td style="border: none"></td>
                                    <td style="border: none"></td>
                                    <td style="border: none"></td>
                                    <td><input type="submit" name="" value="Submit" class="btn btn-success"></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </section>
            </form>
       </div>
       <script type="text/javascript">
           $('.addRow').on('click',function(){
               addRow();
           });
           function addRow()
           {
               var tr='<tr>'+
               '<td><input type="text" name="cod_equipo[]" class="form-control" required=""></td>'+
               '<td><a href="" class="btn btn-danger remove"><i class="bi bi-x-octagon"></i></a></td>'+
               '</tr>';
               $('tbody').append(tr);
           };
           $('.remove').live('click',function(){
               var last=$('tbody tr').length;
               if(last==1){
                   alert("No esta permitido remover la última fila");
               }
               else{
                    $(this).parent().parent().remove();
               }

           });
       </script>

    </div>


