@extends('adminlte::page')


@section('title', 'Movimientos')


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
                            <span class="card-title">Movimiento</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('movimientos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

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

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
