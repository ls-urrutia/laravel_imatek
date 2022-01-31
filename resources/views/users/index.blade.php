@extends('adminlte::page')

@section('title', 'Dashboard')


@section('content_header')
    <h1>Asignar permisos</h1>
@stop

@section('content')


  {{--  @livewire('admin.users-index')  --}}
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
                            {{--     <a href="{{ route('user.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a> --}}
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
                            <table class="table table-striped table-hover" id="usuarios">
                                <thead class="thead">
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Email</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td width="10px">
                                                <a class="btn btn-primary" href="{{route('users.edit',$user)}}">Editar</a>
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
    $('#equipos').DataTable({
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

