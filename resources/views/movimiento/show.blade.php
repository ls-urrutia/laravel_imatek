@extends('adminlte::page')


@section('title', 'Movimientos')


@section('content_header')
    <h1>Movimiento</h1>
@stop

@section('content')



         <!-- Preloader -->
         <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake"  src="{{ URL::asset('imagenes/AdminLTELogo.png')}}"  alt="AdminLTELogo" height="60" width="60">
          </div>

    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Vista Movimientos</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('movimientos.index') }}"> Atrás</a>
                        </div>
                    </div>
                    <div class="container ml-0 ">
                        <div class="row">
                            <div class="col-6 col-md-2 ">
                                <p class="p ml-3">Número Movimiento:</p>
                            </div>
                            <div class="col-6 col-md-2">
                                <p class="p"> {{ $movimiento->id_movimiento }}</p>
                            </div>
                          
                        </div>
    
                        <div class="row">
                            <div class="col-6 col-md-2 ">
                                <p class="p ml-3">Tipo Movimiento:</p>
                            </div>
                            <div class="col-6 col-md-2">
                                <p class="p" > {{ $movimiento->tipo_movimiento }}</p>
                            </div>
                           
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-2 ">
                                <p class="p ml-3">Fecha Movimiento:</p>
                            </div>
                            <div class="col-6 col-md-2">
                                <p class="p" >{{ $movimiento->fecha_movimiento }}</p>
                            </div>
                           
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-2 ">
                                <p class="p ml-3 mb-3">Tipo Documento:</p>
                            </div>
                            <div class="col-6 col-md-2">
                                <p class="p" >   {{ $movimiento->tipo_documento }}</p>
                            </div>
                           
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-2 ">
                                <p class="p ml-3 mb-3">N° Documento:</p>
                            </div>
                            <div class="col-6 col-md-2">
                                <p class="p" > {{ $movimiento->n_documento }}</p>
                            </div>
                           
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-2 ">
                                <p class="p ml-3 mb-3">Id Equipo:</p>
                            </div>
                            <div class="col-6 col-md-2">
                                <p class="p" > IM{{ $movimiento->id_equipo }}</p>
                            </div>
                           
                        </div>
                    </div>

                   {{--  <div class="card-body">

                        <div class="form-group">
                            <strong>Id Movimiento:</strong>
                            {{ $movimiento->id_movimiento }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo Movimiento:</strong>
                            {{ $movimiento->tipo_movimiento }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Movimiento:</strong>
                            {{ $movimiento->fecha_movimiento }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo Documento:</strong>
                            {{ $movimiento->tipo_documento }}
                        </div>
                        <div class="form-group">
                            <strong>N Documento:</strong>
                            {{ $movimiento->n_documento }}
                        </div>
                        <div class="form-group">
                            <strong>Id Equipo:</strong>
                            {{ $movimiento->id_equipo }}
                        </div>

                    </div> --}}
                </div>
            </div>
        </div>
    </section>
@endsection

