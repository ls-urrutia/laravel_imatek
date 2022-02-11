@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Centros</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Centro') }}
                            </span>

                             <div class="float-right">
                                 @can('Crear centros')
                                <a href="{{ route('centros.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                                @endcan
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif


                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="centros" class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
										<th>Id Centro</th>
										<th>Nombre Centro</th>
										<th>Telefono Empresa</th>
										<th>Descripcion</th>
										<th>Empresa</th>

                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($centros as $centro)
                                        <tr>
											<td>{{ $centro->id_centro }}</td>
											<td>{{ $centro->nombre_centro }}</td>
											<td>{{ $centro->telefono_empresa }}</td>
											<td>{{ $centro->descripcion }}</td>
											<td>
                                                {{ $centro->cliente->nombre_empresa}}
                                            </td>

                                            <td>
                                                <form action="{{ route('centros.destroy',$centro->id_centro) }}" method="POST">
                                                    @can('Ver centro')
                                                    <a class="btn btn-sm btn-primary " href="{{ route('centros.show',$centro->id_centro) }}"><i class="fa fa-fw fa-eye"></i></a>
                                                    @endcan
                                                    @can('Editar centros')
                                                    <a class="btn btn-sm btn-success" href="{{ route('centros.edit',$centro->id_centro) }}"><i class="fa fa-fw fa-edit"></i></a>
                                                    @endcan
                                                    @csrf
                                                    @method('DELETE')
                                                    @can('Eliminar centros')
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
                {!! $centros->links() !!}
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
        $('#centros').DataTable({
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
