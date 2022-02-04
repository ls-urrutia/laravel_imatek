@extends('layouts.app')

@section('template_title')
    Movimiento
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Movimiento') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('movimientos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Id Movimiento</th>
										<th>Tipo Movimiento</th>
										<th>Fecha Movimiento</th>
										<th>Tipo Documento</th>
										<th>N Documento</th>
										<th>Id Equipo</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($movimientos as $movimiento)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $movimiento->id_movimiento }}</td>
											<td>{{ $movimiento->tipo_movimiento }}</td>
											<td>{{ $movimiento->fecha_movimiento }}</td>
											<td>{{ $movimiento->tipo_documento }}</td>
											<td>{{ $movimiento->n_documento }}</td>
											<td>{{ $movimiento->equipo->id_equipo }}</td>

                                            <td>
                                                <form action="{{ route('movimientos.destroy',$movimiento->id_movimiento) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('movimientos.show',$movimiento->id_movimiento) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('movimientos.edit',$movimiento->id_movimiento) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $movimientos->links() !!}
            </div>
        </div>
    </div>
@endsection
