
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
                        <tbody>
                            <tr>
                                <td class="tex">Id Mantención:</td>
                                <td>{{ $mantencione->id_mantencion  }}</td>

                            </tr>

                            <tr>
                                <td class="tex">Fecha Mantención:</td>
                                <td> {{ $mantencione->fecha_mantencion }}</td>
                            </tr>
                            <tr>
                                <td class="tex">Descripción:</td>
                                <td> {{ $mantencione->descripcion }}</td>
                            </tr>
                            <tr>
                                <td class="tex">Validación:</td>
                                <td> {{ $mantencione->validacion }}</td>
                            </tr>
  
                            <tr>
                                <td class="tex">Id Usuario:</td>
                                <td>{{ $mantencione->id_usuario}}</td>
                            </tr>
                            <tr>
                                <td class="tex">Id Equipo:</td>
                                <td>{{ $mantencione->id_equipo }}</td>
                            </tr>

                        </tbody>
                    </table>

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
                                <div class="image">
                                @if(isset($mantencione->imagen1))
                                    <img src="{{asset('imagenes/fmantenciones/'.$mantencione->imagen1)}}" alt="" width="70px" height="70px">
                                @endif
                                </div>
                                <div class="image">
                                @if(isset($mantencione->imagen2))
                                    <img src="{{asset('imagenes/fmantenciones/'.$mantencione->imagen2)}}" alt="" width="70px" height="70px">
                                @endif
                                </div>
                                <div class="image">
                                @if(isset($mantencione->imagen3))
                                <img src="{{asset('imagenes/fmantenciones/'.$mantencione->imagen3)}}" alt="" width="70px" height="70px">
                                @endif
                                </div>

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
            padding: 5px;
         }

    


    </style>
@stop


@endsection
