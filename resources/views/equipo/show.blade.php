@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')

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
                        {{ $equipo->fecha_compra }}
                    </div>
                    <div class="form-group">
                        <strong>Proveedor:</strong>
                        {{ $equipo->proveedor }}
                    </div>
                    <div class="form-group">
                        <strong>Id Centro:</strong>
                        {{ $equipo->id_centro }}
                    </div>

                </div>
                @foreach($fechas as $data_fecha)
                {{$data_fecha->fecha_movimiento}}
                @endforeach

            </div>

                </div>
            </div>
        </div>
    </div>
</section>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop




