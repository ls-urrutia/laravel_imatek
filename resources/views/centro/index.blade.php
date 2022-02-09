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

                                        <th></th>
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
                                                    <a class="btn btn-sm btn-primary " href="{{ route('centros.show',$centro->id_centro) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    @endcan
                                                    @can('Editar centros')
                                                    <a class="btn btn-sm btn-success" href="{{ route('centros.edit',$centro->id_centro) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @endcan
                                                    @csrf
                                                    @method('DELETE')
                                                    @can('Eliminar centros')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
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
@stop

@section('js')
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js">  </script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js">  </script>

    <script>
    $(document).ready(function() {
        $('#centros').DataTable({
            "lengthMenu": [[5,10, 50, -1],[5, 10, 50,"All"]]
        });
    } );
    </script>
@stop
