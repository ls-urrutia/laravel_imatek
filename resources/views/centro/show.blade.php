@extends('adminlte::page')

@section('title', 'Centros')

@section('content_header')
    <h1>Centros</h1>
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
                        <span class="card-title">Centro</span>
                    </div>
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('centros.index') }}"> Atrás</a>
                    </div>
                </div>
                <div class="container ml-0 ">
                    <div class="row">
                        <div class="col-6 col-md-2 ">
                            <p class="p ml-3">Id Centro:</p>
                        </div>
                        <div class="col-6 col-md-2">
                            <p class="p"> {{ $centro->id_centro }}</p>
                        </div>
                      
                    </div>

                    <div class="row">
                        <div class="col-6 col-md-2 ">
                            <p class="p ml-3">Nombre Centro:</p>
                        </div>
                        <div class="col-6 col-md-2">
                            <p class="p" > {{ $centro->nombre_centro }}</p>
                        </div>
                       
                    </div>
                    <div class="row">
                        <div class="col-6 col-md-2 ">
                            <p class="p ml-3">Telefono Empresa:</p>
                        </div>
                        <div class="col-6 col-md-2">
                            <p class="p" >{{ $centro->telefono_empresa }}</p>
                        </div>
                       
                    </div>
                    <div class="row">
                        <div class="col-6 col-md-2 ">
                            <p class="p ml-3 mb-3">Descripción:</p>
                        </div>
                        <div class="col-6 col-md-6">
                            <p class="p" > {{ $centro->descripcion }}</p>
                        </div>
                       
                    </div>
                    <div class="row">
                        <div class="col-6 col-md-2 ">
                            <p class="p ml-3 mb-3">Id Cliente:</p>
                        </div>
                        <div class="col-6 col-md-6">
                            <p class="p" >{{ $centro->id_cliente }}</p>
                        </div>
                       
                    </div>
                </div>

                {{-- <div class="card-body">

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


