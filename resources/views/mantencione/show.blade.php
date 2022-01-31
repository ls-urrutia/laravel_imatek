@extends('layouts.app')

@section('template_title')
    {{ $mantencione->name ?? 'Show Mantencione' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Mantencione</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('mantenciones.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Mantencion:</strong>
                            {{ $mantencione->id_mantencion }}
                        </div>
                        <div class="form-group">
                            <strong>Cod Mantencion:</strong>
                            {{ $mantencione->cod_mantencion }}
                        </div>
                        <div class="form-group">
                            <strong>N Despacho:</strong>
                            {{ $mantencione->n_despacho }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Mantencion:</strong>
                            {{ $mantencione->fecha_mantencion }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $mantencione->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Validacion:</strong>
                            {{ $mantencione->validacion }}
                        </div>
                        <div class="form-group">
                            <strong>Id Usuario:</strong>
                            {{ $mantencione->id_usuario }}
                        </div>
                        <div class="form-group">
                            <strong>Id Equipo:</strong>
                            {{ $mantencione->id_equipo }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
