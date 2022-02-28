@extends('layouts.app')

@section('template_title')
    Actualizar Movimiento
@endsection

@section('content')
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
