@extends('layouts.app')

@section('template_title')
    Centro
@endsection

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
                                <a href="{{ route('centros.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Id Centro</th>
										<th>Nombre Centro</th>
										<th>Telefono Empresa</th>
										<th>Descripcion</th>
										<th>Id Cliente</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($centros as $centro)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $centro->id_centro }}</td>
											<td>{{ $centro->nombre_centro }}</td>
											<td>{{ $centro->telefono_empresa }}</td>
											<td>{{ $centro->descripcion }}</td>
											<td>{{ $centro->id_cliente }}</td>

                                            <td>
                                                <form action="{{ route('centros.destroy',$centro->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('centros.show',$centro->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('centros.edit',$centro->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $centros->links() !!}
            </div>
        </div>
    </div>
@endsection
