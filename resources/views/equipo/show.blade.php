@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
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

                    <div class="form-group">
                        <strong>Id Equipo:</strong>
                        {{ $equipo->id_equipo }}
                    </div>
                    <div class="form-group">
                        <strong>Cod Equipo:</strong>
                        {{ $equipo->cod_equipo }}
                    </div>
                    <div class="form-group">
                        <strong>N Documento:</strong>
                        {{ $equipo->n_documento }}
                    </div>
                    <div class="form-group">
                        <strong>Tipo Equipo:</strong>
                        {{ $equipo->tipo_equipo }}
                    </div>
                    <div class="form-group">
                        <strong>Modelo:</strong>
                        {{ $equipo->modelo }}
                    </div>
                    <div class="form-group">
                        <strong>ciclos:</strong>
                        {{ $equipo->ciclos }}
                    </div>
                    <div class="form-group">
                        <strong>Descripcion:</strong>
                        {{ $equipo->descripcion }}
                    </div>
                    <div class="form-group">
                        <strong>Estado:</strong>
                        {{ $equipo->estado }}
                    </div>
                    <div class="form-group">
                        <strong>Fecha Compra:</strong>
                        {{ $equipo->fecha_ingreso }}
                        
                    </div>
                    <div class="form-group">
                        <strong>Proveedor:</strong>
                        {{ $equipo->proveedor }}
                    </div>
                    <div class="form-group">
                        <strong>Id Centro:</strong>
                        {{ $equipo->id_centro }}
                    </div>

                    <table class="tab">
                        <tbody>
                            <tr>
                                <td class="tex">Codigo Equipo</td>
                                <td>{{ $equipo->cod_equipo }}</td>
                            
                            </tr>
                         
                            <tr>
                                <td class="tex">Numero documento</td>
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
                                <td class="tex">Ciclos:</td>
                                <td>{{ $equipo->ciclos }}</td>
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
                   

                    El equipo Ha estado operativo aproximadamente un total de:{{intval($resultado)}} Meses y {{$dias}} Dias
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
<h2>Mantenciones realizadas</h2>
<br>
<br>
@php
$i = 1;
@endphp
@foreach ($mantencionequipo as $em)

   <h3> Mantención {{$i}}</h3>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body ordenar" >

                        <table class="tab">
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
                                <tr>
                                    <td class="tex">Codigo equipo</td>
                                    <td>{{ $em->id_equipo }}</td>
                                </tr> 
                            </tbody>
                        </table>

                        {{-- <div class="form-group">
                            <strong >Fecha Mantención:</strong>
                            {{ $em->fecha_mantencion }}
                        </div>
                        <div class="form-group">
                            <strong>Descripción:</strong>
                            {{ $em->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Validación:</strong>
                            {{ $em->validacion}}
                        </div>
                        <div class="form-group">
                            <strong>Mantencíon realizada por:</strong>
                            {{ $em->id_usuario }}
                        </div>
                        <div class="form-group">
                            <strong>Codigo equipo</strong>
                            {{ $em->id_equipo }}
                        </div> --}}
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
              
         }
         .tab{
             
            
         }
         .tex{
            padding: 5px;
         }

    </style>
@stop




