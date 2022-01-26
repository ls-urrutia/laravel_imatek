@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Creación</h1>
@stop

@section('content')
    <p>Datatable.</p>
    <a href="clientes/create" class="btn btn-primary mb-3">CREAR</a>

<table id="clientes" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
    <thead class="bg-primary text-white">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre Empresa</th>
            <th scope="col">Rut empresa</th>
            <th scope="col">Descripción</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($clientes as $cliente)
        <tr>
             <td>{{ $cliente->id_cliente}}</td>
             <td>{{ $cliente->nombre_empresa}}</td>
             <td>{{ $cliente->rut_empresa}}</td>
             <td>{{ $cliente->descripcion}}</td>
             <td>
                <form action="{{ route('clientes.destroy',$cliente->id_cliente) }}" method="POST">
                    <a href="/clientes/{{$cliente->id_cliente}}/edit" class="btn btn-info">Editar</a>
                        @csrf
                        @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
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
        $('#clientes').DataTable({
            "lengthMenu": [[5,10, 50, -1],[5, 10, 50,"All"]]
        });
    } );
    </script>
@stop





