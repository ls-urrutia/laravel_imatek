@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Módulo Usuarios</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Usuario') }}
                        </span>

                         <div class="float-right">
                            <a href="{{ route('users2.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                              {{ __('Crear nuevo usuario') }}
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
                        <table id="users2" class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>

                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Correo electrónico</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users2 as $usuario)
                                    <tr>
                                     

                                  
                                       

                                        <td>{{ $usuario->id}}</td>
                                        <td>{{ $usuario->name}}</td>
                                        <td>{{ $usuario->email }}</td>
                                        </td>

                                        <td>
                                            <form action="{{ route('users2.destroy',$usuario->id) }}" method="POST">
                                                <a class="btn btn-sm btn-primary " href="{{ route('users2.show',$usuario->id) }}"><i class="fa fa-fw fa-eye"></i> </a>
                                                <a class="btn btn-sm btn-success" href="{{ route('users2.edit',$usuario->id) }}"><i class="fa fa-fw fa-edit"></i> </a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> </button>
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
        $('#users2').DataTable({
            "lengthMenu": [[5,10, 50, -1],[5, 10, 50,"All"]],
            "language": {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "Ningun registro encontrado",
            "info": "Mostrando pagina _PAGE_ de _PAGES_",
            "infoEmpty": "Sin registros",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            'search':'Buscar:'
        }

        });
    } );

    </script>

@stop
