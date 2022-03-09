@extends('adminlte::page')

@section('title', 'Equipos')

@section('content_header')
    <h1>Actualizar Movimiento</h1>
@stop

@section('content')

<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake"  src="{{ URL::asset('imagenes/AdminLTELogo.png')}}"   alt="AdminLTELogo" height="60" width="60">
    </div>


    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar Movimiento</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('movimientos.update', $movimiento->id_movimiento) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('movimiento.form2')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
