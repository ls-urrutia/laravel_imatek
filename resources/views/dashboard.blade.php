@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Sistema de registro</h1>
@stop

@section('content')


    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-podcast"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Lámparas</span>
                        <span class="info-box-numbipo_equipoer">
                            {{ $nlamparas }}
                        </span>
                    </div>


                    <div class="info-box-content">

                        <span class="info-box-text">En Revisión</span>
                        <span class="info-box-number">

                            <small>{{ $nlamparasrep }}</small>
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
                            {{ $ncamaras }}
                        </span>
                    </div>

                    <div class="info-box-content">
                        <span class="info-box-text">En Revisión</span>
                        <span class="info-box-number">

                            <small>{{ $ncamarasrep }}</small>
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
                            @can('Validar mantenciones')
                                <div style="display: flex; justify-content: space-between; align-items: center;">

                                    <span id="card_title">
                                        {{ __('Validaciones') }}
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
                                    <table id="validaciones" class="table table-striped table-hover">
                                        <thead class="thead">
                                            <tr>

                                                <th>Equipo</th>
                                                <th>Usuario Diagnostico</th>
                                                <th>Usuario Mantención</th>
                                                <th>Usuario Dado de baja</th>
                                                <th>Fecha Diagnostico</th>
                                                <th>Fecha Mantención</th>
                                                <th></th>

                                            </tr>{{-- ['event'=>$eventId,'user'=>$userId --}}
                                        </thead>
                                        <tbody>
                                            @foreach ($mantenciones2 as $mantencione)
                                                <tr>
                                                    <form method="POST"
                                                        action="{{ action('App\Http\Controllers\MantencioneController@validacion', [$mantencione->id_mantencion,'id_equipo' => $mantencione->id_equipo]) }}"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')


                                                        <td>IM{{ $mantencione->id_equipo }}</td>
                                                       	                                            <td>
                                                            @if ($mantencione->id_usuario0 != null)
                                                                {{ $usuarios[$mantencione->id_usuario0]->name }}
                                                            @else
                                                            @endif
                                                        </td>

                                                        <td>
                                                            @if ($mantencione->id_usuario != null)
                                                                {{ $usuarios[$mantencione->id_usuario]->name }}
                                                            @else
                                                            @endif
                                                        </td>

                                                        <td>
                                                            @if ($mantencione->id_usuario2 != null)
                                                                {{ $usuarios[$mantencione->id_usuario2]->name }}
                                                            @else
                                                            @endif
                                                        </td>
                                                        <td> {{ $mantencione->fecha_diagnostico }}
                                                        </td>
                                                        <td> {{ $mantencione->fecha_mantencion }}
                                                        </td>
                                                        <td>
                                                        </td>
                                                        <td>
                                                            <input type="submit" value="Validar" class="btn btn-sm btn-success">
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
        @endcan
        @can('Vista tecnico')

            <ul class="nav nav-tabs">

                <li><a role="presentation" class="nav-link active" data-toggle="tab" href="#menu1" aria-controls="menu1"
                        role="tab">Equipos en revisión</a></li>
                <li><a role="presentation" class="nav-link" data-toggle="tab" href="#menu2" aria-controls="menu2"
                        role="tab">Diagnosticos registrados</a></li>
                <li><a role="presentation" class="nav-link" data-toggle="tab" href="#menu3" aria-controls="menu3"
                        role="tab">Mantenciones registradas</a></li>
                <li><a role="presentation" class="nav-link" data-toggle="tab" href="#menu4" aria-controls="menu4"
                        role="tab">Equipos dados de baja</a></li>
            </ul>

            <div class="tab-content">

                <div id="menu1" class="tab-pane active ">

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="equipos" class="table table-striped table-hover">
                                <thead class="thead">

                                    <tr>

                                        {{-- <th>Id Equipo</th> --}}
                                        <th>Cod Equipo</th>
                                        {{-- <th>Tipo Documento</th> --}}
                                        <th>N° Documento</th>
                                        <th>Tipo Equipo</th>
                                        <th>Modelo</th>
                                        {{-- <th>Descripcion</th> --}}
                                        <th>Estado</th>
                                        {{-- <th>Fecha Compra</th> --}}
                                        <th>Proveedor</th>
                                        <th> Centro</th>


                                        <th align="right"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($enrevision as $equipoenrevision)
                                        <tr>

                                            {{-- <td>{{ $equipo->id_equipo }}</td> --}}
                                            <td>{{ $equipoenrevision->cod_equipo }}{{ $equipoenrevision->id_equipo }}
                                            </td>
                                            {{-- <td>{{ $equipo->tipo_documento }}</td> --}}
                                            <td>{{ $equipoenrevision->n_documento }}</td>
                                            <td>{{ $equipoenrevision->tipo_equipo }}</td>
                                            <td>{{ $equipoenrevision->modelo }}</td>
                                            {{-- <td>{{ $equipo->descripcion }}</td> --}}
                                            <td>{{ $equipoenrevision->estado }}</td>

                                            <td>{{ $equipoenrevision->proveedor }}</td>
                                            <td>
                                                {{ $equipo->centro->nombre_centro ?? 'Sin centro' }}
                                            </td>

                                            <td align="right">

                                                @can('Ver equipo')
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('equipos.show', $equipoenrevision->id_equipo) }}"><i
                                                            class="fa fa-fw fa-eye"></i> </a>
                                                @endcan
                                                @can('Editar equipos')
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('equipos.edit', $equipoenrevision->id_equipo) }}"><i
                                                            class="fa fa-fw fa-edit"></i> </a>
                                                @endcan
                                                @csrf


                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>
                <div id="menu2" class="tab-pane">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="diagnosticos" class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>

                                        <th>Codigo equipo</th>
                                        <th>Fecha</th>
                                        <th>Estado Mantencion</th>
                                        <th>Tarjetas malas</th>
                                        <th>Acrílico</th>
                                        <th>Tapa</th>
                                        <th>Enchufe</th>
                                        <th>Cable</th>


                                        <th align="right"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($diagnosticos as $mantencione)
                                        <tr>
                                            {{-- <td>{{ $mantencione->id_mantencion }}</td> --}}

                                            <td>im{{ $mantencione->id_equipo }}</td>
                                            <td>
                                                @if (isset($mantencione->descripcion_diagnostico))
                                                    {{ $mantencione->descripcion_diagnostico }}
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>lala</td>
                                            <td>
                                                @if (isset($mantencione->componentes2_targeta))
                                                    {{ $mantencione->componentes2_targeta}}
                                                @else
                                                    -
                                                @endif

                                            </td>
                                            <td>
                                                @if (isset($mantencione->componentes_mantencion))
                                                    @if ($mantencione->componentes_mantencion[0] == 0)
                                                        Malo
                                                        @else
                                                            Bueno
                                                            @endif
                                                @else
                                                    -
                                                @endif

                                            </td>
                                            <td>
                                                @if (isset($mantencione->componentes_mantencion))
                                                    @if ($mantencione->componentes_mantencion[1] == 0)
                                                        Malo
                                                        @else
                                                            Bueno
                                                            @endif
                                                @else
                                                    -
                                                @endif


                                            </td>
                                            <td>
                                                @if (isset($mantencione->componentes_mantencion))
                                                @if ($mantencione->componentes_mantencion[2] == 0)
                                                    Malo
                                                    @else
                                                        Bueno
                                                        @endif
                                            @else
                                                -
                                            @endif


                                            </td>
                                            <td>
                                                @if (isset($mantencione->componentes_mantencion))
                                                    @if ($mantencione->componentes_mantencion[3] == 0)
                                                        Malo
                                                        @else
                                                            Bueno
                                                            @endif
                                                @else
                                                    -
                                                @endif


                                            </td>




                                            <td align="right">


                                                @can('Ver mantención')
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('mantenciones.show', $mantencione->id_mantencion) }}"><i
                                                            class="fa fa-fw fa-eye"></i></a>
                                                @endcan
                                                @can('Editar mantenciones')
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('mantenciones.edit', $mantencione->id_mantencion) }}"><i
                                                            class="fa fa-fw fa-edit"></i></a>
                                                @endcan


                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>





                <div id="menu3" class="tab-pane">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="mantenciones" class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>

                                        <th>Codigo equipo</th>

                                        <th>Fecha</th>

                                        <th>Estado Mantencion</th>

                                        <th align="right"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($mantenciones3 as $mantencione)
                                        <tr>
                                            {{-- <td>{{ $mantencione->id_mantencion }}</td> --}}

                                            <td>im{{ $mantencione->id_equipo }}
                                            </td>
                                            <td>
                                                @if (isset($mantencione->descripcion_diagnostico))
                                                    {{ $mantencione->descripcion_diagnostico }}
                                                @else
                                                    En proceso
                                                @endif
                                            </td>
                                            <td>
                                                @if (isset($mantencione->estado_mantencion))
                                                    {{ $mantencione->estado_mantencion }}
                                                @else
                                                    En proceso
                                                @endif

                                            </td>
                                            <td align="right">




                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>



                <div id="menu4" class="tab-pane">


                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="dadadebaja" class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>

                                        <th>Codigo equipo</th>

                                        <th>Fecha</th>

                                        <th>Estado Mantencion</th>

                                        <th align="right"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dadadebaja as $mantencione)
                                        <tr>
                                            {{-- <td>{{ $mantencione->id_mantencion }}</td> --}}

                                            <td>im{{ $mantencione->id_equipo }}
                                            </td>
                                            <td>
                                                @if (isset($mantencione->descripcion_diagnostico))
                                                    {{ $mantencione->descripcion_diagnostico }}
                                                @else
                                                    En proceso
                                                @endif
                                            </td>
                                            <td>
                                                @if (isset($mantencione->estado_mantencion))
                                                    {{ $mantencione->estado_mantencion }}
                                                @else
                                                    En proceso
                                                @endif

                                            </td>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

            </div>



        </div>

    @endcan


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">
@stop

@section('js')
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"> </script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"> </script>


    <script type="text/javascript" src="{{ asset('js/user.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#validaciones').DataTable({
                "paging": false,
                "ScrollX": false,
                "lengthMenu": [
                    [5, 10, 50, -1],
                    [5, 10, 50, "All"]
                ],
                "language": {
                    "lengthMenu": "Mostrar _MENU_ registros por pagina",
                    "zeroRecords": "Ningun registro encontrado",
                    "info": "Mostrando pagina _PAGE_ de _PAGES_",
                    "infoEmpty": "Sin registros",
                    "infoFiltered": "(filtrado de _MAX_ registros totales)",
                    'search': 'Buscar:'
                }

            });
        });


        $(document).ready(function() {
            $('#equipos').DataTable({
                "paging": false,
                "lengthMenu": [
                    [5, 10, 50, -1],
                    [5, 10, 50, "All"]
                ],
                "language": {
                    "lengthMenu": "Mostrar _MENU_ registros por pagina",
                    "zeroRecords": "Ningun registro encontrado",
                    "info": "Mostrando pagina _PAGE_ de _PAGES_",
                    "infoEmpty": "Sin registros",
                    "infoFiltered": "(filtrado de _MAX_ registros totales)",
                    'search': 'Buscar:'
                }

            });
        });


        $(document).ready(function() {
            $('#mantenciones').DataTable({
                "paging": false,
                "lengthMenu": [
                    [5, 10, 50, -1],
                    [5, 10, 50, "All"]
                ],
                "language": {
                    "lengthMenu": "Mostrar _MENU_ registros por pagina",
                    "zeroRecords": "Ningun registro encontrado",
                    "info": "Mostrando pagina _PAGE_ de _PAGES_",
                    "infoEmpty": "Sin registros",
                    "infoFiltered": "(filtrado de _MAX_ registros totales)",
                    'search': 'Buscar:'
                }

            });
        });

        $(document).ready(function() {
            $('#diagnosticos').DataTable({
                "paging": false,
                "lengthMenu": [
                    [5, 10, 50, -1],
                    [5, 10, 50, "All"]
                ],
                "language": {
                    "lengthMenu": "Mostrar _MENU_ registros por pagina",
                    "zeroRecords": "Ningun registro encontrado",
                    "info": "Mostrando pagina _PAGE_ de _PAGES_",
                    "infoEmpty": "Sin registros",
                    "infoFiltered": "(filtrado de _MAX_ registros totales)",
                    'search': 'Buscar:'
                }

            });
        });


        $(document).ready(function() {
            $('#dadadebaja').DataTable({
                "paging": false,
                "lengthMenu": [
                    [5, 10, 50, -1],
                    [5, 10, 50, "All"]
                ],
                "language": {
                    "lengthMenu": "Mostrar _MENU_ registros por pagina",
                    "zeroRecords": "Ningun registro encontrado",
                    "info": "Mostrando pagina _PAGE_ de _PAGES_",
                    "infoEmpty": "Sin registros",
                    "infoFiltered": "(filtrado de _MAX_ registros totales)",
                    'search': 'Buscar:'
                }

            });
        });
    </script>
@stop
