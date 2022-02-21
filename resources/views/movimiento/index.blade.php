@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Movimientos</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('movimientos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear nuevo movimiento') }}
                                </a>
                              </div>
                        </div>
                    </div>
<<<<<<< HEAD
{{--                     @if ($message = Session::get('error'))
                        <div class="alert alert-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @endif --}}
=======
                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

>>>>>>> permisos
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="movimientos" class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
										{{-- <th>Id Movimiento</th> --}}
										<th>Tipo Movimiento</th>
										<th>Fecha Movimiento</th>
										<th>Tipo Documento</th>
										<th>N° Documento</th>
										<th>Código Equipo</th>
                                        <th>Centro</th>

                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($movimientos as $movimiento)
                                        <tr>
											{{-- <td>{{ $movimiento->id_movimiento }}</td> --}}
											<td>{{ $movimiento->tipo_movimiento }}</td>
											<td>{{ $movimiento->fecha_movimiento }}</td>
											<td>{{ $movimiento->tipo_documento }}</td>
											<td>{{ $movimiento->n_documento }}</td>
                                            <td>
                                                {{ $movimiento->equipo->cod_equipo}}
                                            </td>
                                            <td>
                                                {{ $movimiento->id_centro}}
                                            </td>
                                            <td>
                                                <form action="{{ route('movimientos.destroy',$movimiento->id_movimiento) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('movimientos.show',$movimiento->id_movimiento) }}"><i class="fa fa-fw fa-eye"></i></a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('movimientos.edit',$movimiento->id_movimiento) }}"><i class="fa fa-fw fa-edit"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i></button>
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
@endsection



@section('css')

<link rel="stylesheet" href="/css/admin_custom.css">


<style>
table th {
    background-color: #337ab7 !important;
    color: white;
}

.dt-buttons {

    padding-top:1%;
    padding-bottom:1%;

}

.paginate_button {

    color:aliceblue;
    padding: 1%;
    text-shadow: 0 0 2px black;
    font-weight: bold;


}

.paginate_button.current {

    color:aliceblue;
    padding: 1%;
    text-shadow: 0 0 2px #fff;
    text-align: justify;
    font-weight: 900;


}

.dataTables_info {
    padding-top:1%;
    padding-bottom:1%;

}

.dataTables_length {
    font-weight: normal;
}



</style>

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



    <script type="text/javascript">
    $(document).ready(function() {
        $('#movimientos').DataTable({
            "lengthMenu": [[5,10, 50, -1],[5, 10, 50,"All"]],
            language: {
                    "lengthMenu": "Mostrar _MENU_ registros",
                    "zeroRecords": "No se encontraron resultados",
                    "info": "",
                    "infoEmpty": "",
                    "infoFiltered": "",
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
