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




         <!-- Preloader -->
         <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="..\vendor\adminlte\dist\img\AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
          </div>

<br>
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
                    {{-- <table class="tab">
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
                    </table> --}}
                    
                    Tiempo de operación: @if(isset($mes)) {{$mes}} @endif Meses y {{intval($resultado)}} Dias
                    
                    <br>
                  


                    {{-- @foreach($fechaarray as $data_fecha)
                    {{$data_fecha}} <br>
    
                    @endforeach --}}
                    <br>

                    
                    
                   

                    
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
                    <div class="container ml-0 ">
                        <div class="row">
                            <div class="col-6 col-md-2 ">
                                <p class="p">Codigo Equipo:</p>
                            </div>
                            <div class="col-6 col-md-2">
                                <p class="p"> {{ $equipo->cod_equipo }}</p>
                            </div>
                          
                        </div>

                        <div class="row">
                            <div class="col-6 col-md-2 ">
                                <p class="p">Numero documento:</p>
                            </div>
                            <div class="col-6 col-md-2">
                                <p class="p" >{{ $equipo->n_documento }}</p>
                            </div>
                           
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-2 ">
                                <p class="p">Equipo:</p>
                            </div>
                            <div class="col-6 col-md-2">
                                <p class="p" >{{ $equipo->tipo_equipo }}</p>
                            </div>
                           
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-2 ">
                                <p class="p">Modelo:</p>
                            </div>
                            <div class="col-6 col-md-2">
                                <p class="p" >{{ $equipo->modelo }}</p>
                            </div>
                           
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-2 ">
                                <p class="p">Descripciòn:</p>
                            </div>
                            <div class="col-6 col-md-6">
                                <p class="p" >{{ $equipo->descripcion }}</p>
                            </div>
                           
                        </div>

                        <div class="row">
                            <div class="col-6 col-md-2 ">
                                <p class="p">Estado Equipo:</p>
                            </div>
                            <div class="col-6 col-md-2">
                                <p class="p" >{{ $equipo->estado }}</p>
                            </div>
                           
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-2 ">
                                <p class="p">Fecha Compra:</p>
                            </div>
                            <div class="col-6 col-md-2">
                                <p class="p" >{{ $equipo->fecha_ingreso }}</p>
                            </div>
                           
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-2 ">
                                <p class="p">Proveedor:</p>
                            </div>
                            <div class="col-6 col-md-2">
                                <p class="p" >{{ $equipo->proveedor }}</p>
                            </div>
                           
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-2 ">
                                <p class="p">Centro:</p>
                            </div>
                            <div class="col-6 col-md-2">
                                <p class="p" >{{ $equipo->id_centro }}</p>
                            </div>
                           
                        </div>
                       
                        





                        {{-- <div class="row">
                            <div class="min">
                                <td class="">Equipo:</td>
                            </div>
                            <div class="">
                                <td> {{ $equipo->tipo_equipo }}</td>
                            </div>
                        </div>
                        <div class="row">
                            <div class="min">
                                <td class="">Modelo:</td>
                            </div>
                            <div class="">
                                <td> {{ $equipo->modelo }}</td>
                            </div>
                        </div>
                        <div class="row">
                            <div class="min2">
                                <td class="">Descripciòn:</td>
                            </div>
                            <div class="col-6 ">
                                <td>  {{ $equipo->descripcion }}</td>
                            </div>
                        </div>
                        <div class="row">
                            <div class="min">
                                <td class="">Estado Equipo:</td>
                            </div>
                            <div class="">
                                <td>{{ $equipo->estado }}</td>
                            </div>
                        </div>
                        <div class="row">
                            <div class="min">
                                <td class="">Fecha Compra:</td>
                            </div>
                            <div class="">
                                <td> {{ $equipo->fecha_ingreso }}</td>
                            </div>
                        </div>
                    </div>
                    

                      
                      <td class="tex w-25">Codigo Equipo:</td>
                      <td>{{ $equipo->cod_equipo }}</td> --}}
                      <style>
                          .mr-5{
                              min-width:50px ;
                          }
          /*                 .row{
                            min-width:50px ;
                          } */
                          .min{
                              min-width: 20%;
                          }
                          .min2{
                              margin-top:0 ;
                          }
                          .p{
                              
                              margin:5px;
                              margin-left: 0;

                          }
                         
                      </style>


               
                <ul class="nav nav-tabs">
                    
                    <li><a role="presentation" class="nav-link active" data-toggle="tab" href="#menu1" aria-controls="menu1" role="tab">Mantenciones</a></li>
                    <li><a role="presentation" class="nav-link" data-toggle="tab" href="#menu2" aria-controls="menu2" role="tab">Movimientos</a></li>
                  </ul>
                  
                  <div class="tab-content">
                    
                    <div id="menu1" class="tab-pane active ">
                      
                      
                      <div class="card-body">
                        <div class="table-responsive">
                            <table id ="mantenciones" class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>

										{{-- <th>Id Mantencion</th> --}}

										<th>Fecha Mantención</th>
										<th>Descripción</th>
										<th>Validación</th>
										<th>Usuario</th>
										<th>Código Equipo</th>

                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($mantencionequipo as $mantencione)
                                        <tr>
											{{-- <td>{{ $mantencione->id_mantencion }}</td> --}}

											<td>{{ $mantencione->fecha_mantencion }}</td>
											<td>{{ $mantencione->descripcion }}</td>
											<td>{{ $mantencione->validacion }}</td>
                                            

											<td>{{ $mantencione->id_usuario}}</td>
											<td>{{ $mantencione->id_equipo}}


                                            <td>
                                                <form action="{{ route('mantenciones.destroy',$mantencione->id_mantencion) }}" method="POST">
                                                    @can('Ver mantención')
                                                    <a class="btn btn-sm btn-primary " href="{{ route('mantenciones.show',$mantencione->id_mantencion) }}"><i class="fa fa-fw fa-eye"></i></a>
                                                    @endcan
                                                    @can('Editar mantenciones')
                                                    <a class="btn btn-sm btn-success" href="{{ route('mantenciones.edit',$mantencione->id_mantencion) }}"><i class="fa fa-fw fa-edit"></i></a>
                                                    @endcan
                                                    @csrf
                                                    @method('DELETE')
                                                    @can('Eliminar mantención')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i></button>
                                                    @endcan
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    </div>
                    <div id="menu2" class="tab-pane">
                     
                      <div class="card-body">
                        <div class="table-responsive">
                            <table id="movimientos" class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
										{{-- <th>Id Movimiento</th> --}}
										<th>Tipo Movimiento</th>
										<th>Fecha Movimiento</th>
										<th>Tipo Documento</th>
										<th>N° Documento</th>
										<th>Código Equipo</th>
                                        <th>Centro</th>

                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($movimientoequipo as $movimiento)
                                        <tr>
											{{-- <td>{{ $movimiento->id_movimiento }}</td> --}}
											<td>{{ $movimiento->tipo_movimiento }}</td>
											<td>{{ $movimiento->fecha_movimiento }}</td>
											<td>{{ $movimiento->tipo_documento }}</td>
											<td>{{ $movimiento->n_documento }}</td>
                                            <td>
                                                {{ $movimiento->id_equipo}}
                                            </td>
                                            <td>
                                                {{ $movimiento->id_centro}}
                                            </td>
                                            <td>
                                                <form action="{{ route('movimientos.destroy',$movimiento->id_movimiento) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('movimientos.show',$movimiento->id_movimiento) }}"><i class="fa fa-fw fa-eye"></i></a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('movimientos.edit',$movimiento->id_movimiento) }}"><i class="fa fa-fw fa-edit"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    </div>
                  </div>



                </div>
                   
                  
            </div>
            
        </div>
        
    </div>
    
</section>
{{-- <h3>Mantenciones realizadas</h3>


@php
$i = 1;
@endphp
@foreach ($mantencionequipo as $em)

   
    <section class="content container-fluid">
         --}}
       {{--  <div class="row">
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
                                            {{-- <tr>
                                            
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
        </div> --}}


    </section>
    @php
    /* $i += 1; */
    
@endphp

{{-- @endforeach --}}

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




