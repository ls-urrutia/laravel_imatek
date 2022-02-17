

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Sistema de registro</h1>
@stop

@section('content')


    <section class="content">
        <div class="container-fluid">
          <!-- Info boxes -->
          <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-podcast"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Lámparas</span>
                  <span class="info-box-numbipo_equipoer">
                    {{$nlamparas}}
                   </span>
                </div>

                <div class="info-box-content">
                    <span class="info-box-text">En Revisión</span>
                    <span class="info-box-number">

                      <small>{{$nlamparasrep}}</small>
                    </span>
                  </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
           <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box">
                <span class="info-box-icon bg-danger elevation-1"><i class="	fa fa-laptop"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Cámaras</span>
                  <span class="info-box-numbipo_equipoer">
                    {{$ncamaras}}
                   </span>
                </div>

                <div class="info-box-content">
                    <span class="info-box-text">En Revisión</span>
                    <span class="info-box-number">

                      <small>{{$ncamarasrep}}</small>
                    </span>
                  </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-3">
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">

              <!-- /.info-box -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->





 <!-- TABLA: Usuarios-->
 <div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Usuario') }}
                        </span>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="users2ub" class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>{{-- 
                                    <th>Correo electrónico</th> --}}
                                    <th>Ubicación</th>
                                    <th>Actualizar Ubicación</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users2 as $usuario)
                                <tr>
                                <form method="POST"  action="{{ action('App\Http\Controllers\User2Controller@ubicacion' , $usuario->id )}}"
                                          enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <th scope="row">{{ $usuario->id}}</th>
                                        <td>{{ $usuario->name}}</td>
                                        <td>
                                            {{ $usuario->email }}
                                        </td>
                                        <td> {{ $usuario->estado }}
                                        </td>

                                        <td>
                                             <div class="form-group">

                                                        {{ Form::text('estado', $usuario->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Ubicación']) }}
                                                        {!! $errors->first('estado', '<div class="invalid-feedback">:message</p>') !!}
                                                    </div>


                                                </td>
                                        <td>
                                            @can('Editar Usuarios')
                                            <input type="submit" value="Confirmar" class="btn btn-sm btn-success">
                                            @endcan
                                        </td>

                                    </form>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>



@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js">  </script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js">  </script>



<script>

$(document).ready(function() {
    $('#users2ub').DataTable({
        "lengthMenu": [[5,10, 50, -1],[5, 10, 50,"All"]],
        "language": {
        "lengthMenu": "Mostrar _MENU_ registros por pagina",
        "zeroRecords": "Ningun registro encontrado",
        "info": "Mostrando pagina _PAGE_ de _PAGES_",
        "infoEmpty": "Sin registros",
        "infoFiltered": "(filtrado de _MAX_ registros totales)",
        'search':'Buscar:'
    }

    });
} );

</script>
@stop
