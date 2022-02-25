@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Listado de Roles</h1>
@stop

@section('content')
    <p></p>
    @can('Crear roles')
    <a href="roles/create" class="btn btn-primary mb-3">Crear Rol</a>
    @endcan
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    @if ($message = Session::get('error'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="roles">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Role</th>
                        @can('Editar roles')
                        <th></th>
                        @endcan
                    </tr>

                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{$role->id}}</td>
                            <td>{{$role->name}}</td>
                            <td width="10px">
                                @can('Editar roles')
                                <a href="{{route('roles.edit', $role)}}" class="btn btn-sm btn-success"><i class="fa fa-fw fa-edit"></i></a>
                                @endcan
                            </td>
                            <td width="10px">
                                @can('Eliminar roles')
                                <form action="{{route('roles.destroy', $role)}}" method="POST">
                                   
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="class=btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i></button>
                                </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
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
        $('#roles').DataTable({
            "lengthMenu": [[5,10, 50, -1],[5, 10, 50,"All"]]

        });
    } );
    </script>
    
@stop