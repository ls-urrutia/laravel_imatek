@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Mantenciones</h1>
@stop
@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Mantencione</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('mantenciones.update', $mantencione->id_mantencion) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf
                            @method('PUT')

                            {{-- @include('mantencione.form') --}}
                            <div  class="form-group mb-3">
                                <label for="">Fecha mantencion</label>
                                <input type="date" name="fecha_mantencion" id="fecha_mantencion" value="{{$mantencione->fecha_mantencion}}" class="form control"> 
                            </div>
                            <div  class="form-group mb-3">
                                <label for="">descripcion</label>
                                <input type="text" name="descripcion" id="descripcion" value="{{$mantencione->descripcion}}"  class="form control"> 
                            </div>
                            <div  class="form-group mb-3">
                                <label for="">validacion</label>
                                <input type="text" name="validacion" id="validacion" value="{{$mantencione->validacion}}"  class="form control"> 
                            </div>
                            <div  class="form-group mb-3">
                                <label for="">codigo equipo</label>
                                <input type="text" name="id_equipo" id="id_equipo" value="{{$mantencione->id_equipo}}"  class="form control"> 
                            </div>
                            <div  class="form-group mb-3">
                                <label for="">imagen1</label>
                                <input type="file" name="imagen1" id="imagen1"  class="form control"> 
                                <img src="{{asset('imagenes/fmantenciones/'.$mantencione->imagen1)}}" alt="" width="70px" height="70px">
                            </div>
                            <div  class="form-group mb-3">
                                <label for="">imagen2</label>
                                <input type="file" name="imagen2" id="imagen2" class="form control"> 
                                <img src="{{asset('imagenes/fmantenciones/'.$mantencione->imagen2)}}" alt="" width="70px" height="70px">
                            </div>
                            <div  class="form-group mb-3">
                                <label for="">imagen3</label>
                                <input type="file" name="imagen3" id="imagen3" class="form control"> 
                                <img src="{{asset('imagenes/fmantenciones/'.$mantencione->imagen3)}}" alt="" width="70px" height="70px">
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
