@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
@php
use Illuminate\Support\Carbon;
@endphp
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <span class="card-title">Show Equipo</span>
                    </div>
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('equipos.index') }}"> Back</a>
                    </div>
                </div>

                <div class="card-body">

                    <div class="form-group">
                        <strong>Id Equipo:</strong>
                        {{ $equipo->id_equipo }}
                    </div>
                    <div class="form-group">
                        <strong>Cod Equipo:</strong>
                        {{ $equipo->cod_equipo }}
                    </div>
                    <div class="form-group">
                        <strong>N Documento:</strong>
                        {{ $equipo->n_documento }}
                    </div>
                    <div class="form-group">
                        <strong>Tipo Equipo:</strong>
                        {{ $equipo->tipo_equipo }}
                    </div>
                    <div class="form-group">
                        <strong>Modelo:</strong>
                        {{ $equipo->modelo }}
                    </div>
                    <div class="form-group">
                        <strong>ciclos:</strong>
                        {{ $equipo->ciclos }}
                    </div>
                    <div class="form-group">
                        <strong>Descripcion:</strong>
                        {{ $equipo->descripcion }}
                    </div>
                    <div class="form-group">
                        <strong>Estado:</strong>
                        {{ $equipo->estado }}
                    </div>
                    <div class="form-group">
                        <strong>Fecha Compra:</strong>
                        {{ $equipo->fecha_ingreso }}
                        
                    </div>
                    <div class="form-group">
                        <strong>Proveedor:</strong>
                        {{ $equipo->proveedor }}
                    </div>
                    <div class="form-group">
                        <strong>Id Centro:</strong>
                        {{ $equipo->id_centro }}
                    </div>
                    {{$fechas
                    }}
                     {{-- <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>

                                    <th>Id Mantencion</th>
                                
                                    <th>Fecha Mantencion</th>
                                    <th>Descripcion</th>
                                    <th>Validacion</th>
                                    <th>Imagen1</th>
                                    {{-- <th>imagen2</th>
                                    <th>Imagen3</th> --}}{{--
                                   <th>Usuario</th>
                                    <th>Código Equipo</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($records as $mantencione)
                                    <tr>
                                       
                                    
                                        <td>{{ $mantencione->n_documento}}</td>
                                        <td>{{ $mantencione->descripcion }}</td>
                                        <td>{{ $mantencione->validacion }}</td>
                                        <td>
                                            

                                        <td>{{ $mantencione->user->name}}</td>
                                        <td>{{ $mantencione->equipo->cod_equipo}}


                                        <td>
                                            
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>  --}}

                </div>
            </div>
        </div>
    </div>
</section>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop




