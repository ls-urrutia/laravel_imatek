@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
    <h1>Clientes</h1>
@stop

@section('content')



         <!-- Preloader -->
         <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="..\vendor\adminlte\dist\img\AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
          </div>


<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <span class="card-title">cliente</span>
                    </div>
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('clientes.index') }}"> Atrás</a>
                    </div>
                </div>
                <div class="container ml-0 ">
                    <div class="row">
                        <div class="col-6 col-md-2 ">
                            <p class="p ml-3">Id Cliente:</p>
                        </div>
                        <div class="col-6 col-md-2">
                            <p class="p"> {{ $cliente->id_cliente }}</p>
                        </div>
                      
                    </div>

                    <div class="row">
                        <div class="col-6 col-md-2 ">
                            <p class="p ml-3">Nombre Empresa:</p>
                        </div>
                        <div class="col-6 col-md-2">
                            <p class="p" >{{ $cliente->nombre_empresa }}</p>
                        </div>
                       
                    </div>
                    <div class="row">
                        <div class="col-6 col-md-2 ">
                            <p class="p ml-3">Rut Empresa:</p>
                        </div>
                        <div class="col-6 col-md-2">
                            <p class="p" >{{ $cliente->rut_empresa }}</p>
                        </div>
                       
                    </div>
                    <div class="row">
                        <div class="col-6 col-md-2 ">
                            <p class="p ml-3 mb-3">Descripción:</p>
                        </div>
                        <div class="col-6 col-md-6">
                            <p class="p" >{{ $cliente->descripcion }}</p>
                        </div>
                       
                    </div>
                </div>

{{--                 <div class="card-body">

                    <div class="form-group">
                        <strong>Id Cliente:</strong>
                        {{ $cliente->id_cliente }}
                    </div>
                    <div class="form-group">
                        <strong>Nombre Empresa:</strong>
                        {{ $cliente->nombre_empresa }}
                    </div>
                    <div class="form-group">
                        <strong>Rut Empresa:</strong>
                        {{ $cliente->rut_empresa }}
                    </div>
                    <div class="form-group">
                        <strong>Descripción:</strong>
                        {{ $cliente->descripcion }}
                    </div>

                </div> --}}
            </div>
        </div>
    </div>
</section>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">
@stop


