@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Centros</h1>
@stop

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar Equipo</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('equipos.update', $equipo->id_equipo) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('equipo.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
