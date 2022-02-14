@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Centros</h1>
@stop

@section('content')

    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Centro</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('centros.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('centro.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
