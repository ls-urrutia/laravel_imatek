@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')
    @php
    use Illuminate\Support\Carbon;
    $dateh = Carbon::now();
    $dateh = $dateh->format('Y-m-d');
    @endphp




    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="..\vendor\adminlte\dist\img\AdminLTELogo.png" alt="AdminLTELogo" height="60"
            width="60">
    </div>

    <br>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Especificaciones Equipo</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('equipos.index') }}"> Volver</a>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-sm btn-primary "
                                href="{{ route('mantenciones.create', ['id' => $equipo->id_equipo]) }}">Crear
                                Mantención</a>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary"
                                href="{{ route('movimientos.create', ['id' => $equipo->id_equipo]) }}"> Crear
                                Movimiento</a>
                        </div>
                    </div>
                    <div class="card-body tab table-responsive">
                        <table class="tab">
                            <tbody>
                                <tr>
                                    <td class="tex">Codigo Equipo:</td>
                                    <td>{{ $equipo->cod_equipo }}{{ $equipo->id_equipo }}</td>

                                </tr>

                                <tr>
                                    <td class="tex">Numero documento:</td>
                                    <td> {{ $equipo->n_documento }}</td>
                                </tr>
                                <tr>
                                    <td class="tex">Equipo:</td>
                                    <td> {{ $equipo->tipo_equipo }}</td>
                                </tr>
                                <tr>
                                    <td class="tex">Modelo:</td>
                                    <td> {{ $equipo->modelo }}</td>
                                </tr>
                                <tr>
                                    <td class="tex">Descripciòn:</td>
                                    <td> {{ $equipo->descripcion }}</td>
                                </tr>
                                <tr>
                                    <td class="tex">Estado Equipo:</td>
                                    <td>{{ $equipo->estado }}</td>
                                </tr>
                                <tr>
                                    <td class="tex">Fecha Compra:</td>
                                    <td>{{ $equipo->fecha_ingreso }}</td>
                                </tr>
                                <tr>
                                    <td class="tex">Proveedor:</td>
                                    <td>{{ $equipo->proveedor }}</td>
                                </tr>
                                <tr>
                                    <td class="tex">Centro:</td>
                                    <td>   {{$equipo->centro->nombre_centro ?? 'Sin centro'}}</td>
                                </tr>
                            </tbody>
                        </table>
                        Tiempo de operación: {{ $mes }} Meses y {{ intval($resultado) }} Dias

                        <br>



                        @foreach ($fechaarray as $data_fecha)
                            {{ $data_fecha }} <br>
                        @endforeach
                        <br>




                        <ul class="nav nav-tabs">

                            <li><a role="presentation" class="nav-link active" data-toggle="tab" href="#menu1"
                                    aria-controls="menu1" role="tab">Mantenciones</a></li>
                            <li><a role="presentation" class="nav-link" data-toggle="tab" href="#menu2"
                                    aria-controls="menu2" role="tab">Movimientos</a></li>
                        </ul>

                        <div class="tab-content">

                            <div id="menu1" class="tab-pane active ">


                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="mantenciones" class="table table-striped table-hover"  style="margin-top: 1%">
                                            <thead class="thead">
                                                <tr>

                                                    {{-- <th>Id Mantencion</th> --}}

                                                    <th>Fecha Mantención</th>
                                                    <th>Descripción</th>
                                                    <th>Validación</th>
                                                    <th>Usuario</th>


                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($mantencionequipo as $mantencione)
                                                    <tr>
                                                        {{-- <td>{{ $mantencione->id_mantencion }}</td> --}}

                                                        <td>{{ $mantencione->fecha_mantencion }}</td>
                                                        <td>{{ $mantencione->descripcion }}</td>
                                                        <td>{{ $mantencione->validacion }}</td>


                                                        <td>{{ $mantencione->id_usuario }}</td>
                                                        <td>{{ $mantencione->id_equipo }}


                                                        <td>
                                                            <form
                                                                action="{{ route('mantenciones.destroy', $mantencione->id_mantencion) }}"
                                                                method="POST">
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
                                                                @csrf
                                                                @method('DELETE')
                                                                @can('Eliminar mantención')
                                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                                            class="fa fa-fw fa-trash"></i></button>
                                                                @endcan
                                                            </form>
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
                                        <table id="movimientos" class="table table-striped table-hover" style="margin-top: 1%">
                                            <thead class="thead">
                                                <tr>
                                                    {{-- <th>Id Movimiento</th> --}}
                                                    <th>Tipo Movimiento</th>
                                                    <th>Fecha Movimiento</th>
                                                    <th>Tipo Documento</th>
                                                    <th>N° Documento</th>

                                                    <th>Centro</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($movimientoequipo as $movimiento)
                                                    <tr>
                                                        {{-- <td>{{ $movimiento->id_movimiento }}</td> --}}
                                                        <td>{{ $movimiento->tipo_movimiento }}</td>
                                                        <td>{{ $movimiento->fecha_movimiento }}</td>
                                                        <td>{{ $movimiento->tipo_documento }}</td>
                                                        <td>{{ $movimiento->n_documento }}</td>
                                                        <td>
                                                            {{ $movimiento->id_centro }}
                                                        </td>
                                                        <td>
                                                            <form
                                                                action="{{ route('movimientos.destroy', $movimiento->id_movimiento) }}"
                                                                method="POST">
                                                                <a class="btn btn-sm btn-primary "
                                                                    href="{{ route('movimientos.show', $movimiento->id_movimiento) }}"><i
                                                                        class="fa fa-fw fa-eye"></i></a>
                                                                <a class="btn btn-sm btn-success"
                                                                    href="{{ route('movimientos.edit', $movimiento->id_movimiento) }}"><i
                                                                        class="fa fa-fw fa-edit"></i></a>
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-sm"><i
                                                                        class="fa fa-fw fa-trash"></i></button>
                                                            </form>
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


                </div>

            </div>

        </div>

    </section>

@section('js')
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"> </script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"> </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>





    <script type="text/javascript">
        $(document).ready(function() {

            $('#movimientos').DataTable({
                language: {
                    "lengthMenu": "Mostrar _MENU_ registros",
                    "zeroRecords": "No se encontraron resultados",
                    "info": "",
                    "infoEmpty": "",
                    "infoFiltered": "",
                    "sSearch": "Buscar:",
                    "oPaginate": {
                        "sFirst": "Primero",
                        "sLast": "Último",
                        "sNext": "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "sProcessing": "Procesando...",
                },
                paging: false,
                searching: false,
                ordering: false,
                //para usar los botones
                responsive: "true",
                dom: 'Bfrtilp',
                buttons: [{
                        extend: 'excelHtml5',
                        text: '<i class="fas fa-file-excel"></i> ',
                        titleAttr: 'Exportar a Excel',
                        className: 'btn btn-success'
                    },
                    {
                        extend: 'pdfHtml5',
                        text: '<i class="fas fa-file-pdf"></i> ',
                        titleAttr: 'Exportar a PDF',
                        className: 'btn btn-danger'
                    },
                    {
                        extend: 'print',
                        text: '<i class="fa fa-print"></i> ',
                        titleAttr: 'Imprimir',
                        className: 'btn btn-info'
                    },
                ]
            });


            $('#mantenciones').DataTable({
                language: {
                    "lengthMenu": "Mostrar _MENU_ registros",
                    "zeroRecords": "No se encontraron resultados",
                    "info": "",
                    "infoEmpty": "",
                    "infoFiltered": "",
                    "sSearch": "Buscar:",
                    "oPaginate": {
                        "sFirst": "Primero",
                        "sLast": "Último",
                        "sNext": "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "sProcessing": "Procesando...",
                },
                paging: false,
                searching: false,
                ordering: false,
                //para usar los botones
                responsive: "true",
                dom: 'Bfrtilp',
                buttons: [{
                        extend: 'excelHtml5',
                        text: '<i class="fas fa-file-excel"></i> ',
                        titleAttr: 'Exportar a Excel',
                        className: 'btn btn-success'
                    },
                    {
                        extend: 'pdfHtml5',
                        text: '<i class="fas fa-file-pdf"></i> ',
                        titleAttr: 'Exportar a PDF',
                        className: 'btn btn-danger'
                    },
                    {
                        extend: 'print',
                        text: '<i class="fa fa-print"></i> ',
                        titleAttr: 'Imprimir',
                        className: 'btn btn-info'
                    },
                ]
            });



        });
    </script>

@stop


</section>


@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<style>
    .ordenar {
        padding-top: 5%;


    }

    .tab {}

    .tex {
        padding: 5px;
    }


    .buttons-excel {
        size: 20px !important;
        background-color:  !important;
        padding: 5px !important;
        padding-bottom:2px !important;
        padding-top:2px !important;

    }
    .buttons-pdf {
        size: 20px !important;
        background-color:  !important;
        padding: 5px !important;
        padding-bottom:2px !important;
        padding-top:2px !important;

    }
    .buttons-print {
        size: 20px !important;
        background-color:  !important;
        padding: 5px !important;
        padding-bottom:2px !important;
        padding-top:2px !important;

    }
    .dt-buttons{
        align-items: right !important;

    }

</style>
@stop
