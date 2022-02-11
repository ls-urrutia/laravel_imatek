@extends('adminlte::page')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Equipo') }}
                            </span>
                            @can('Crear equipos')

                             <div class="float-right">
                                <a href="{{ route('equipos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear equipo') }}
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

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="equipos" class="table table-striped table-hover">
                                <thead class="thead">

                                    <tr>

										<th>Id Equipo</th>
										<th>Cod Equipo</th>
                                        <th>Tipo Documento</th>
										<th>N° Documento</th>
										<th>Tipo Equipo</th>
										<th>Modelo</th>
										<th>Descripcion</th>
										<th>Estado</th>
										<th>Fecha Compra</th>
										<th>Proveedor</th>
										<th>Id Centro</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($equipos as $equipo)

                                        <tr>

											<td>{{ $equipo->id_equipo }}</td>
											<td>{{ $equipo->cod_equipo }}</td>
                                            <td>{{ $equipo->tipo_documento }}</td>
											<td>{{ $equipo->n_documento }}</td>
											<td>{{ $equipo->tipo_equipo }}</td>
											<td>{{ $equipo->modelo }}</td>
											<td>{{ $equipo->descripcion }}</td>
											<td>{{ $equipo->estado }}</td>
                                            <td>{{ Carbon\Carbon::parse($equipo->fecha_compra)->format('d-m-Y') }}</td>
											<td>{{ $equipo->proveedor }}</td>
											<td>
                                                {{$equipo->centro->nombre_centro ?? 'Sin centro'}}
                                            </td>

                                            <td>
                                                <form action="{{ route('equipos.destroy',$equipo->id_equipo) }}" method="POST">
                                                    @can('Ver equipo')
                                                    <a class="btn btn-sm btn-primary " href="{{ route('equipos.show',$equipo->id_equipo) }}"><i class="fa fa-fw fa-eye"></i></a>
                                                    @endcan
                                                    @can('Editar equipos')
                                                    <a class="btn btn-sm btn-success" href="{{ route('equipos.edit',$equipo->id_equipo) }}"><i class="fa fa-fw fa-edit"></i></a>
                                                    @endcan
                                                    @csrf
                                                    @method('DELETE')
                                                    @can('Eliminar equipos')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> </button>
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
                {!! $equipos->links() !!}
            </div>
        </div>
    </div>






@endsection



@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">


<style>
table th {
    background-color:  #4d4d4d !important;
    color: white;
}

.dt-buttons {

    padding-top:1%;
    padding-bottom:1%;

}

.paginate_button {

    color:aliceblue;
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
        $('#equipos').DataTable({
            "lengthMenu": [[5,10, 50, -1],[5, 10, 50,"All"]],
            language: {
                    "lengthMenu": "Mostrar _MENU_ registros",
                    "zeroRecords": "No se encontraron resultados",
                    "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
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
