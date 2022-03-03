@extends('adminlte::page')

@section('title', 'Movimientos')

@section('content_header')
    <h1>Crear movimiento</h1>
@stop


@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear Movimiento</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('movimientos.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('movimiento.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>


{{--         @foreach($ultimomov as $ult)
        {{$ult->tipo_movimiento}}
        @endforeach --}}
    </section>
@endsection
