
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Mantenciones</h1>
@stop
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
                        {{ $mantencione->user->name}}
                    </div>
                    <div class="form-group">
                        <strong>Id Equipo:</strong>
                        {{ $mantencione->id_equipo }}
                    </div>
                    <div id="pelicula">
                        @if(isset($mantencione->imagen1))
                             <img src="{{asset('imagenes/fmantenciones/'.$mantencione->imagen1)}}" alt="" width="70px" height="70px">  
                        @endif
                        @if(isset($mantencione->imagen2))
                            <img src="{{asset('imagenes/fmantenciones/'.$mantencione->imagen2)}}" alt="" width="70px" height="70px">  
                        @endif
                        @if(isset($mantencione->imagen3))
                           <img src="{{asset('imagenes/fmantenciones/'.$mantencione->imagen3)}}" alt="" width="70px" height="70px">  
                        @endif

                    </div>



                </div>
            </div>
            
        </div>
        
    </div>
    
</section>
@section('js')
    <script>  </script>
@stop
@section('css')
    <style>
        #pelicula{
            display: grid;
            grid-template-columns: repeat(3,1fr);
            width: 90%;
            margin: 5%;
            grid-gap: 30px;

        }
        #pelicula img{
            width: 100%;
            transition: all 300ms;
            position: relative;
        }
        #pelicula img:hover{
            transform: scale(1.15);
            width: 100%;
        }


    </style>
@stop

@endsection
