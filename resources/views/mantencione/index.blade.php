@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Mantenciones</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Mantencione') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('mantenciones.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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

										<th>Id Mantencion</th>
									
										<th>Fecha Mantencion</th>
										<th>Descripcion</th>
										<th>Validacion</th>
                                        <th>Imagen1</th>
                                        <th>imagen2</th>
                                        <th>Imagen3</th>
										<th>Usuario</th>
										<th>Código Equipo</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($mantenciones as $mantencione)
                                        <tr>
											<td>{{ $mantencione->id_mantencion }}</td>
										
											<td>{{ $mantencione->fecha_mantencion }}</td>
											<td>{{ $mantencione->descripcion }}</td>
											<td>{{ $mantencione->validacion }}</td>
                                            <td>
                                                <img src="{{asset('imagenes/fmantenciones/'.$mantencione->imagen1)}}" alt="" width="70px" height="70px">
                                            <td><img src="{{asset('imagenes/fmantenciones/'.$mantencione->imagen2)}}" alt="" width="70px" height="70px"></td>
                                            <td><img src="{{asset('imagenes/fmantenciones/'.$mantencione->imagen3)}}" alt="" width="70px" height="70px"></td>

											<td>{{ $mantencione->user->name}}</td>
											<td>{{ $mantencione->equipo->cod_equipo}}


                                            <td>
                                                <form action="{{ route('mantenciones.destroy',$mantencione->id_mantencion) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('mantenciones.show',$mantencione->id_mantencion) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('mantenciones.edit',$mantencione->id_mantencion) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $mantenciones->links() !!}
            </div>
        </div>
    </div>
@endsection
