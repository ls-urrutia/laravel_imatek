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
                        <span class="card-title">Show Centro</span>
                    </div>
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('centros.index') }}"> Back</a>
                    </div>
                </div>

                <div class="card-body">
                    
                    <div class="form-group">
                        <strong>Id Centro:</strong>
                        {{ $centro->id_centro }}
                    </div>
                    <div class="form-group">
                        <strong>Nombre Centro:</strong>
                        {{ $centro->nombre_centro }}
                    </div>
                    <div class="form-group">
                        <strong>Telefono Empresa:</strong>
                        {{ $centro->telefono_empresa }}
                    </div>
                    <div class="form-group">
                        <strong>Descripcion:</strong>
                        {{ $centro->descripcion }}
                    </div>
                    <div class="form-group">
                        <strong>Id Cliente:</strong>
                        {{ $centro->id_cliente }}
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


