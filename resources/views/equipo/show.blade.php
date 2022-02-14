@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    
@stop

@section('content')
@php
use Illuminate\Support\Carbon;
$dateh = Carbon::now();
$dateh = $dateh->format('Y-m-d');
@endphp

<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <span class="card-title">Especificaciones Equipo</span>
                    </div>
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('equipos.index') }}"> Volver</a>
                    </div>
                </div>

                <div class="card-body tab table-responsive">
                    <table class="tab">
                        <tbody>
                            <tr>
                                <td class="tex">Codigo Equipo:</td>
                                <td>{{ $equipo->cod_equipo }}</td>

                            </tr>

                            <tr>
                                <td class="tex">Numero documento:</td>
                                <td> {{ $equipo->n_documento }}</td>
                            </tr>
                            <tr>
                                <td class="tex">Equipo:</td>
                                <td> {{ $equipo->tipo_equipo }}</td>
                            </tr>
                            <tr>
                                <td class="tex">Modelo:</td>
                                <td> {{ $equipo->modelo }}</td>
                            </tr>
                            <tr>
                                <td class="tex">Descripciòn:</td>
                                <td> {{ $equipo->descripcion }}</td>
                            </tr>
                            <tr>
                                <td class="tex">Estado Equipo:</td>
                                <td>{{ $equipo->estado }}</td>
                            </tr>
                            <tr>
                                <td class="tex">Fecha Compra:</td>
                                <td>{{ $equipo->fecha_ingreso }}</td>
                            </tr>
                            <tr>
                                <td class="tex">Proveedor:</td>
                                <td>{{ $equipo->proveedor }}</td>
                            </tr>
                            <tr>
                                <td class="tex">Centro:</td>
                                <td>{{ $equipo->id_centro }}</td>
                            </tr>
                        </tbody>
                    </table>


                   {{--  @foreach($fechaarray as $data_fecha)
                    {{$data_fecha}}
                    @endforeach --}}
                    <br>
                    
                    
                   

                    Tiempo de operación: {{intval($resultado)}} Meses y {{intval($dias)}} Dias
                     {{-- <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>

                                    <th>Id Mantencion</th>

                                    <th>Fecha Mantencion</th>
                                    <th>Descripcion</th>
                                    <th>Validacion</th>
                                    <th>Imagen1</th>
                                    {{-- <th>imagen2</th>
                                    <th>Imagen3</th> --}}{{--
                                   <th>Usuario</th>
                                    <th>Código Equipo</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($records as $mantencione)
                                    <tr>


                                        <td>{{ $mantencione->n_documento}}</td>
                                        <td>{{ $mantencione->descripcion }}</td>
                                        <td>{{ $mantencione->validacion }}</td>
                                        <td>


                                        <td>{{ $mantencione->user->name}}</td>
                                        <td>{{ $mantencione->equipo->cod_equipo}}


                                        <td>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>  --}}


                {{-- @foreach($fechas as $data_fecha)
                {{$data_fecha->fecha_movimiento}}
                @endforeach --}}



                </div>
            </div>
        </div>
    </div>
</section>
<h3>Mantenciones realizadas</h3>


@php
$i = 1;
@endphp
@foreach ($mantencionequipo as $em)

   
    <section class="content container-fluid">
        
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="float-left">
                        <br>
                        
                        <span class="card-title">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspMantención{{$i}}</span><br>
                    </div>

                  
                    
                    
                    <div class="card-body" >
                        <div class="row">
                                <div class="ordenar2">

                                    <table class="tab row">
                                        <tbody>
                                            <tr>
                                                <td class="tex">Fecha Mantención:</td>
                                                <td>{{$em->fecha_mantencion}}</td>
                                                
                                            
                                            </tr>
                                        
                                            <tr>
                                                <td class="tex">Descripción:</td>
                                                <td>{{ $em->descripcion }}</td>
                                            </tr> 
                                            <tr>
                                                <td class="tex">Validación:</td>
                                                <td>{{ $em->validacion}}</td>
                                            </tr> 
                                            <tr>
                                                <td class="tex">Mantencíon realizada por:</td>
                                                <td>{{ $em->id_usuario }}</td>
                                                
                                            </tr> 
                                            {{-- <tr>
                                                <td class="tex">Codigo equipo:</td>
                                                <td>{{ $em->id_equipo }}</td>
                                            </tr>  --}}
                                            <tr>
                                            
                                            </tr>
                                        </tbody>
                                        
                                    </table>
                                </div>

                                <div class="ordenar2">    

                                    <div id="ordenar">
                                        @if(isset($em->imagen1))
                                            <img src="{{asset('imagenes/fmantenciones/'.$em->imagen1)}}" alt="" width="70px" height="70px" >  
                                        @endif
                                        @if(isset($em->imagen2))
                                            <img src="{{asset('imagenes/fmantenciones/'.$em->imagen2)}}" alt="" width="70px" height="70px">  
                                        @endif
                                        @if(isset($em->imagen3))
                                        <img src="{{asset('imagenes/fmantenciones/'.$em->imagen3)}}" alt="" width="70px" height="70px">  
                                        @endif
                
                                    </div>
                                </div>    
                            </div>        

 
                    </div> 
                </div>           
            </div>
        </div>

    </section>
    @php
    $i += 1;
@endphp

@endforeach

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <style>
         .ordenar{
             padding-top: 5%;


         }
         .tab{


         }
         .tex{
            padding: 5px;
         }

    </style>
@stop




