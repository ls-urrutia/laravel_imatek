@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Creación</h1>
@stop

@section('content')
    <p>Usuarios</p>
   @can('Crear usuarios')
    <a href="users2/create" class="btn btn-primary mb-3">CREAR</a>
   @endcan 
<table id="users2" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
    <thead class="bg-primary text-white">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Correo electronico</th>
            <th></th>

            
        </tr>
    </thead>
    <tbody>
        @foreach ($users2 as $user)
        <tr>
             <td>{{ $user->id}}</td>
             <td>{{ $user->name}}</td>
             <td>{{ $user->email}}</td>

              <td>
                <form action="{{ route('users2.destroy',$user->id) }}" method="POST">
                    @can('Editar usuarios')
                        <a href="/users2/{{$user->id}}/edit" class="btn btn-info">Editar</a>
                    @endcan
                    @can('Eliminar usuarios')
                            @csrf
                            @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
             </td> 
        </tr>
        @endforeach
    </tbody>
<table>
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
