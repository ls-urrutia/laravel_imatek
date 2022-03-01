
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop
@section('content')


         <!-- Preloader -->
         <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="..\..\vendor\adminlte\dist\img\AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
          </div>
<br>
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <span class="card-title">Mantención</span>
                    </div>
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('mantenciones.index') }}">Volver</a>
                    </div>
                </div>


                <div class="card-body">
                    <table class="tab">
                        <h3 class="space">Diagnostico</h3>
                        <tbody>
                            <tr>
                                <td class="tex">Id Mantención:</td>
                                <td class="padd">{{ $mantencione->id_mantencion  }}</td>

                            </tr>

                            <tr>
                                <td class="tex">Fecha Diagnostico:</td>
                                @if(isset($mantencione->fecha_diagnostico))
                                <td class="padd"> {{ $mantencione->fecha_diagnostico }}</td>
                                @else
                                <td class="font-italic grey">No aplica</td>
                                @endif
                            </tr>
                            <tr>
                                <td class="tex">Descripción diagnostico:</td>
                                @if(isset($mantencione->descripcion_diagnostico))
                                <td class="padd"> {{ $mantencione->descripcion_diagnostico }}</td>
                                @else
                                <td class="font-italic grey">No aplica</td>
                                @endif
                            </tr>
                            <tr>
                                <td class="tex">Corriente:</td>
                                @if(isset( $mantencione->diagnostico_corriente))
                                <td class="padd"> {{ $mantencione->diagnostico_corriente }}</td>
                                @else
                                <td class="font-italic grey">No aplica</td>
                                @endif
                            </tr>
                            <tr>
                                <td class="tex">Usuario Diagnostico:</td>
                                @if(isset($mantencione->id_usuario0))
                                <td class="padd">{{ $mantencione->id_usuario0}}</td>
                                @else
                                <td class="font-italic grey">No aplica</td>

                                @endif
                            </tr>
                        </tbody>

                    </table>
                  <br><br>

                    <table class="tab">
                        <h3 class="space">Mantenimiento</h3>

                        <tbody>
                            <tr>

                                <td class="tex">Fecha mantención:</td>
                                @if(isset($mantencione->fecha_mantencion))
                                <td class="padd"> {{ $mantencione->fecha_mantencion }}</td>
                                @else
                                <td class="font-italic grey">No aplica</td>
                                @endif
                            </tr>
                            <tr>
                                <td class="tex">Descripción mantención:</td>
                                @if(isset($mantencione->descripcion_mantencion))
                                <td class="padd"> {{ $mantencione->descripcion_mantencion }}</td>
                                @else
                                <td class="font-italic grey">No aplica</td>
                                @endif
                            </tr>
                            <tr>
                                <td class="tex">Usuario Mantención:</td>
                                @if(isset($mantencione->id_usuario))
                                <td class="padd">{{ $mantencione->id_usuario}}</td>
                                @else
                                <td class="font-italic grey">No aplica</td>
                                @endif
                            </tr>




                        </tbody>
                    </table>


                    <table class="tab">
                        <tbody>
                                <tr>
                                    @if(isset($arr[0]))
                                        <td class="tex2">Placa</td>
                                        @if($arr[0]==0 )
                                        <td class="tex2">:Mala</td>
                                        @else
                                        <td class="tex2">:Buena</td>
                                        @endif
                                    @else
                                    <td class="font-italic grey">No aplica</td>
                                    @endif


                                </tr>

                                <tr>
                                    @if(isset($arr[1]))
                                        <td class="tex2">Acrilico</td>
                                        @if($arr[1]==0 )
                                        <td class="tex2">:Mala</td>
                                        @else
                                        <td class="tex2">:Buena</td>
                                        @endif
                                    @else
                                    <td class="font-italic grey">No aplica</td>
                                    @endif

                                </tr>
                                <tr>
                                    @if(isset($arr[2]))
                                        <td class="tex2">Tapas</td>
                                        @if($arr[2]==0 )
                                        <td class="tex2">:Mala</td>
                                        @else
                                        <td class="tex2">:Buena</td>
                                        @endif
                                    @else
                                    <td class="font-italic grey">No aplica</td>
                                    @endif
                                </tr>
                                <tr>
                                    @if(isset($arr[3]))
                                        <td class="tex2">Enchufe</td>
                                        @if($arr[3]==0 )
                                        <td class="tex2">:Mala</td>
                                        @else
                                        <td class="tex2">:Buena</td>
                                        @endif
                                    @else
                                    <td class="font-italic grey">No aplica</td>
                                    @endif
                                </tr>

                                <tr>
                                    @if(isset($arr[4]))
                                        <td class="tex2">Cable</td>
                                        @if($arr[4]==0 )
                                        <td class="tex2">:Mala</td>
                                        @else
                                        <td class="tex2">:Buena</td>
                                        @endif
                                    @else
                                    <td class="font-italic grey">No aplica</td>
                                    @endif
                                </tr>


                        </tbody>
                    </table>


<br><br>
                    <table>
                        <h3 class="">De baja</h3>
                        <body>

                            <tr>
                                <td class="tex">Fecha dado de baja:</td>
                                @if(isset($mantencione->fecha_dado_baja))
                                <td class="padd">{{ $mantencione->fecha_dado_baja}}</td>
                                @else
                                <td class="font-italic grey">No aplica</td>
                                @endif
                            </tr>
                            <tr>
                                <td class="tex">Descripción dado de baja:</td>
                                @if(isset($mantencione->descripcion_dado_baja))
                                <td class="padd">{{ $mantencione->descripcion_dado_baja}}</td>
                                @else
                                <td class="font-italic grey">No aplica</td>
                                @endif
                            </tr>





                            <tr>
                                <td class="tex">Usuario dado baja:</td>
                                @if(isset($mantencione->id_usuario2))
                                <td class="padd">{{ $mantencione->id_usuario2}}</td>
                                @else
                                <td class="grey">No aplica</td>
                                @endif

                            </tr>
                            <tr>
                                <td class="tex">Id Equipo:</td>
                                @if(isset($mantencione->id_equipo))
                                <td class="padd">{{ $mantencione->id_equipo }}</td>
                                @else
                                <td class="grey">No aplica</td>
                                @endif
                            </tr>

                        </body>
                    </table>


                    <br><br>





                    {{-- div class="form-group">
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
                    </div> --}}
                    <div class="container">
                        <div class="image-container">
                                @if(isset($mantencione->imagen1))
                                <div class="image">

                                    <img src="{{asset('imagenes/fmantenciones/'.$mantencione->imagen1)}}" alt="" width="70px" height="70px">

                                </div>
                                @endif
                                @if(isset($mantencione->imagen2))
                                <div class="image">

                                    <img src="{{asset('imagenes/fmantenciones/'.$mantencione->imagen2)}}" alt="" width="70px" height="70px">
                                </div>
                                @endif
                                @if(isset($mantencione->imagen3))

                                <div class="image">

                                <img src="{{asset('imagenes/fmantenciones/'.$mantencione->imagen3)}}" alt="" width="70px" height="70px">

                                </div>
                                @endif

                        </div>
                        <div class="popup-image">
                            @if(isset($mantencione->imagen1))
                                <span>&times;</span>
                                <img src="{{asset('imagenes/fmantenciones/'.$mantencione->imagen1)}}" alt="" width="70px" height="70px">
                            @endif
                        </div>

                    </div>




                </div>
            </div>

        </div>

    </div>

</section>
@section('js')
@section('js')
<script>
document.querySelectorAll('.image-container img').forEach(image=>{
    image.onclick = () =>{
        document.querySelector('.popup-image').style.display = 'block';
        document.querySelector('.popup-image img').src =image.getAttribute('src');
    }

});
document.querySelector('.popup-image span').onclick = () =>{
    document.querySelector('.popup-image').style.display = 'none';
}

 </script>
@stop
@stop
@section('css')
    <style>
        .reduc{
            padding-top: 83px;

        }
        /* #pelicula{
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
        } */
        *{
            margin: 0; padding: 0;
            box-sizing: border-box;
        }
        .container{
            position: relative;
            min-height: 30vh;

        }
        .padd{
            padding-left: 15px;

        }
        .grey{
            color: rgb(145, 139, 130);
            font-size: 15px;
            display: inline-block;
            padding-left: 15px;

        }
        .paddw{
            padding-bottom: 1px;
            margin: 0;
        }
        .space{


        }
        .container .image-container{
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            justify-content: center;
            padding: 10px;

        }
        .container .image-container .image{
            height: 250px;
            width: 350px;
            border: 10px solid #fff;
            box-shadow: 0 5px 15px rgba(0,0,0,.1);
            overflow: hidden;
            cursor: pointer;
        }
        .container .image-container .image img{
            height: 100%;
            width: 100%;
            object-fit:cover;
            transition: .2s linear;
        }
        .container .image-container .image:hover img{
            transform: scale(1.1);
        }
        .container .popup-image{
            position: fixed;
            top: 0; left: 0;
            background: rgba(126,126,126,.6);
            height: 100%;
            width: 100%;
            z-index: 100;
            display: none;
        }
        .container .popup-image span{
            position: absolute;
            top: 55px; right: 10px;
            font-size: 40px;
            font-weight: bolder;
            color: rgb(255, 255, 255);
            cursor: pointer;

        }
        .container .popup-image img{
            position: absolute;
            top: 50%; left: 50%;
            transform: translate(-50%, -50%);
            border: 5px solid #fff;
            border-radius: 5px;
            width: 750px;
            object-fit: cover;
        }
        @media(max-width:768px){
            .container .popup-image img{
                width: 95%;
            }
        }





         .ordenar{
             padding-top: 5%;


         }
         .tab{


         }
         .tex{
            padding: 0.5px;

         }
         .tex2{
            padding: 0.5px;
            font-size: 12px;
         }




    </style>
@stop


@endsection
