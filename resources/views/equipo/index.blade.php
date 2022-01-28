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
                                {{ __('Equipo') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('equipos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
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
                            <table id="equipos" class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>

										<th>Id Equipo</th>
										<th>Cod Equipo</th>
										<th>N Factura</th>
										<th>Tipo Equipo</th>
										<th>Modelo</th>
										<th>Ubicacion</th>
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
											<td>{{ $equipo->n_factura }}</td>
											<td>{{ $equipo->tipo_equipo }}</td>
											<td>{{ $equipo->modelo }}</td>
											<td>{{ $equipo->ubicacion }}</td>
											<td>{{ $equipo->descripcion }}</td>
											<td>{{ $equipo->estado }}</td>
                                            <td>{{ Carbon\Carbon::parse($equipo->fecha_compra)->format('d-m-Y') }}</td>
											<td>{{ $equipo->proveedor }}</td>
											<td>
                                                {{ $equipo->centro->nombre_centro }}
                                            </td>

                                            <td>
                                                <form action="{{ route('equipos.destroy',$equipo->id_equipo) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('equipos.show',$equipo->id_equipo) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('equipos.edit',$equipo->id_equipo) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
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
@stop

@section('js')
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js">  </script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js">  </script>

    <script>
    $(document).ready(function() {
        $('#equipos').DataTable({
            "lengthMenu": [[5,10, 50, -1],[5, 10, 50,"All"]]
        });
    } );
    </script>
@stop
