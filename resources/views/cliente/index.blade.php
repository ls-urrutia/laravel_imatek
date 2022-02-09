@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Creación</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Cliente') }}
                        </span>

                         <div class="float-right">
                             @can('Crear cliente')
                            <a href="{{ route('clientes.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                              {{ __('Crear nuevo') }}
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
                        <table id="clientes" class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>
                                    <th>Id Cliente</th>
                                    <th>Nombre Empresa</th>
                                    <th>Rut Empresa</th>
                                    <th>Descripción</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clientes as $cliente)
                                    <tr>

                                        <td>{{ $cliente->id_cliente }}</td>
                                        <td>{{ $cliente->nombre_empresa }}</td>
                                        <td>{{ $cliente->rut_empresa }}</td>
                                        <td>{{ $cliente->descripcion }}</td>
                                        <td>
                                            <form action="{{ route('clientes.destroy',$cliente->id_cliente) }}" method="POST">
                                                @can('Ver cliente')
                                                <a class="btn btn-sm btn-primary " href="{{ route('clientes.show',$cliente->id_cliente) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                @endcan
                                                @can('Editar cliente')
                                                <a class="btn btn-sm btn-success" href="{{ route('clientes.edit',$cliente->id_cliente) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                @endcan
                                                @csrf
                                                @method('DELETE')
                                                @can('Eliminar cliente')
                                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Borrar</button>
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
        $('#articulos').DataTable({
            "lengthMenu": [[5,10, 50, -1],[5, 10, 50,"All"]]
        });
    } );
    </script>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js">  </script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js">  </script>

    <script>
    $(document).ready(function() {
        $('#clientes').DataTable({
            "lengthMenu": [[5,10, 50, -1],[5, 10, 50,"All"]]
        });
    } );
    </script>
@stop



