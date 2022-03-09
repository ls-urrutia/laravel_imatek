@extends('adminlte::page')

@section('title', 'Mantenciones')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Lista de mantenciones') }}
                            </span>
                             @can('Crear mantención')
                             <div class="float-right">
                                <a href="{{ route('mantenciones.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear mantención') }}
                                </a>
                              </div>
                            @endcan
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    @if ($message = Session::get('error'))
                    <div class="alert alert-danger">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id ="mantenciones" class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>

										<th>Código equipo</th>

										<th>Fecha</th>
										
										<th>Estado Mantención</th>

                                        <th align="right"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($mantenciones as $mantencione)
                                        <tr>
											{{-- <td>{{ $mantencione->id_mantencion }}</td> --}}

											<td>IM{{$mantencione->equipo->id_equipo}}</td>
											<td>@if(isset($mantencione->descripcion_diagnostico))
                                                {{ $mantencione->descripcion_diagnostico}}
                                                @else
                                                -
                                                @endif
                                            </td>
											<td>
                                                @if(isset($mantencione->estado_mantencion))
                                                {{ $mantencione->estado_mantencion}}
                                                @else
                                                -

                                                @endif

                                            </td>
                                            <td align="right">
                                                <form action="{{ route('mantenciones.destroy',$mantencione->id_mantencion) }}" method="POST">
                                                    @can('Ver mantención')
                                                    <a class="btn btn-sm btn-primary " href="{{ route('mantenciones.show',$mantencione->id_mantencion) }}"><i class="fa fa-fw fa-eye"></i></a>
                                                    @endcan
                                                    @can('Editar mantenciones')
                                                    <a class="btn btn-sm btn-success" href="{{ route('mantenciones.edit',$mantencione->id_mantencion) }}"><i class="fa fa-fw fa-edit"></i></a>
                                                    @endcan
                                                    @csrf
                                                    @method('DELETE')
                                                    @can('Eliminar mantención')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i></button>
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
                {!! $mantenciones->links() !!}
            </div>
        </div>
    </div>
@endsection


@section('css')

<link rel="stylesheet" href="/css/admin_custom.css">

<link rel="stylesheet" href="{{ asset('css/all.css') }}">

@stop

@section('js')
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js">  </script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js">  </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>


    <script type="text/javascript" src="{{ asset('js/user.js') }}"></script>






  {{--   "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros", --}}

    <script type="text/javascript">
    $(document).ready(function() {
        $('#mantenciones').DataTable({
            "lengthMenu": [[5,10, 50, -1],[5, 10, 50,"All"]],
            language: {
                    "lengthMenu": "Mostrar _MENU_ registros",
                    "zeroRecords": "No se encontraron resultados",
                    "info": "",
                    "infoEmpty": "",
                    "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "sSearch": "Buscar:",
                    "oPaginate": {
                        "sFirst": "Primero",
                        "sLast":"Último",
                        "sNext":"Siguiente",
                        "sPrevious": "Anterior"
                     },
                     "sProcessing":"Procesando...",
                },
            //para usar los botones
            responsive: "true",
            dom: 'Bfrtilp',
            buttons:[
                {
                    extend:    'excelHtml5',
                    text:      '<i class="fas fa-file-excel"></i> ',
                    titleAttr: 'Exportar a Excel',
                    className: 'btn btn-success'
                },
                {
                    extend:    'pdfHtml5',
                    text:      '<i class="fas fa-file-pdf"></i> ',
                    titleAttr: 'Exportar a PDF',
                    className: 'btn btn-danger'
                },
                {
                    extend:    'print',
                    text:      '<i class="fa fa-print"></i> ',
                    titleAttr: 'Imprimir',
                    className: 'btn btn-info'
                },
            ]
        });
    });
    </script>

@stop
