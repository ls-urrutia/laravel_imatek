<title>Multiple data send</title>




<script type="text/javascript" src="{{ asset('/vendor/jquery/jquery.js') }}"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>



<script type="module" src="{{ asset('/vendor/select2/select2.min.js') }}"></script>


{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"
integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}






<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="..\vendor\adminlte\dist\img\AdminLTELogo.png" alt="AdminLTELogo" height="60"
        width="60">
</div>

<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('tipo_movimiento') }}
            <select name="tipo_movimiento" class="form-control" id="select-movimiento">
                <option value="">Seleccione Movimiento</option>
                <option value="Salida">Entrada</option>
                <option value="Entrada">Salida</option>
                <option value="Compra">Salida Nuevos</option>
            </select>
            </th>

            <div class="form-group">
                {{ Form::label('fecha_movimiento:') }}
                {{ Form::date('fecha_movimiento', $movimiento->fecha_movimiento, ['class' => 'form-control' . ($errors->has('fecha_movimiento') ? ' is-invalid' : ''),'placeholder' => 'Fecha Movimiento']) }}
                {!! $errors->first('fecha_movimiento', '<div class="invalid-feedback">:message</p>') !!}
            </div>
            <div class="form-group">
                {{ Form::label('Número de documento') }}
                {{ Form::text('n_documento', $movimiento->n_documento, ['class' => 'form-control' . ($errors->has('n_documento') ? ' is-invalid' : ''),'placeholder' => 'N Documento']) }}
                {!! $errors->first('n_documento', '<div class="invalid-feedback">:message</p>') !!}
            </div>
            <div class="form-group" id="div_centro">
                {{ Form::label('Centro') }}
                {{ Form::select('id_centro', $centros, $movimiento->id_centro, ['id' => 'ids_centro','class' => 'form-control' . ($errors->has('id_centro') ? ' is-invalid' : ''),'placeholder' => 'Centros']) }}
                {!! $errors->first('id_centro', '<div class="invalid-feedback">:message</p>') !!}
            </div>
        </div>

        <div class="box box-info padding-1">
            <form id="transactionForm">
                <section>
                    <div class="form-group">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="th-cod">Código</th>
                                    <th><a class="addRow"> <i class="bi bi-plus-circle"></i></a> Agregar Equipo
                                        Adicional</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="td-select">
                                        <div class="form-group clases2">
                                            <select name="id_equipo[]" class="form-control select-e" id="select-equipo0" 

                                                required>
                                                <option value="">Seleccione Equipo</option>
                                            </select>
                                        </div>

                                        {{-- <input type="text" name="cod_equipo[]" class="form-control" required=""> --}}

                                    </td>
                                    <td><a class="btn btn-danger remove"><i class="bi bi-x-octagon"></i></a></td>
                                </tr>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td style="border: none"></td>
                                    <td style="border: none"></td>
                                    <td style="border: none"></td>
                                    <td><input type="button" name="" value="Guardar" class="btn btn-success"  id="submit"></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </section>
            </form>
        </div>


        <script type="text/javascript">
            var stored = [];
            var permitir_repeticion = false;
            var contador = 0;
            ////////////////////////////////777

           /*  $(document).ready(function() {
             

            
            for(var j=0; j<id_equipo.lenght;j++){
                for(var l=j+1; l<id_equipo.lenght;l++){
                    alert('repetido')
                }
            }
       
            }); */
            function save(){
                var selects= document.getElementsByTagName('select');
                console.log(selects);
                var values = [];
                for(i=0;i<selects.length;i++){
                    var select = selects[i];
                    if(values.indexOf(select.value)>-1){
                        alert('repetido');
                        break;
                       /*  const transactionForm = document.getElementById('transactionForm');
                        transactionForm.addEventListener('submit', function (event){
                            event.preventDefault();
                            alert('repetido'); */
                            $('transactionForm').click(function(e){
                                e.preventDefault();
                            });
                            return false;


                        

                    }else{
                        $('.btn-success').unbind("click");
                    }
                }
            }
            $("#submit").click(function(e){
                e.preventDefault();
                
            })



            ////////////////////////////////777


            /* var	search_select	=	$('.select-e');

             */


            /*
            jQuery(document).ready(function($){
                $(document).ready(function() {
                    $('.select-e').select2();
                });
            });           */


            $(document).ready(function() {
                $('.select-e').select2({
                    theme: "classic",

                });
            });
            



            /* $(document).ready(function() {


                $('.btn-success').click(function(e) {

                    var inputs = $('.select-e');
                    e.preventDefault();
                    $.each(inputs, function(k, v) {
                        var getVal = $(v).val();
                        if (stored.indexOf(getVal) != -1) {
                            if (permitir_repeticion == true) {
                                permitir_repeticion = false;
                            } else {
                                contador += 1;
                                $(this).parent().parent().parent().remove();
                            }
                        } else {
                            stored.push($(v).val());
                        }
                    });
                    if (contador >= 1) {
                        alert('Ha repetido un equipo');
                    }
                    var compareArray = new Array();
                    console.log(stored);

                    for (i = 0; i < stored.length; i++) {
                        if (compareArray.indexOf(stored[i]) == -1) {
                            $('.btn-success').unbind("click");
                        }
                    }
                    permitir_repeticion = true;
                    return permitir_repeticion;
                    return stored;

                   

                });
            }); */



            $(function() {


                $('#select-movimiento').on('change', onSelectMovimientoChange);
                $('#select-movimiento').on('change', onSelectMovimientoChangeHide);

                $('#div_centro').hide();
                numero_row = 0;
                dupl = [];
                rows = [];
                valido = false;
                previous = 0;





            });







            /*
            function verificador() {


            $id = event.target.id

            $(this).each(function (focus) {

            window.myIndex = dupl.indexOf(previous);

            }).change(function() {

            if ( $id == event.target.id)
            {  dupl.splice(myIndex, 1)} else {
                console.log('hola')}

                var chg = $(event.target).val();

                if (dupl.includes(chg)) {
                alert("Ha repetido equipos"); } else
                { dupl.push(chg)
            }
                document.getElementById("log").innerHTML = "<b>Previous: </b>"+previous;

                console.log(dupl);

                previous = $(event.target).val();

                $id = event.target.id;

            });

            } */



            function onSelectMovimientoChange() {

                var tipo_movimiento = $(this).val();



                // AJAX
                $.get('/movimiento/' + tipo_movimiento + '/equipos', function(data) {

                    var html_select = '<option value="">Seleccione Equipo</option>';
                    for (var i = 0; i < data.length; ++i)
                        html_select += '<option value="' + data[i].id_equipo + '">' + data[i].cod_equipo + '</option>';
                    $('.select-e').html(html_select);


                });


            }

            function onSelectMovimientoChangeHide() {

                if ($(this).val() == 'Salida') {

                    $('#div_centro').hide();
                    $("select#ids_centro option[value='1']").show();
                    $("select#ids_centro").val("1");


                } else {
                    $('#div_centro').show();
                    $("select#ids_centro option[value='1']").hide();
                    $("select#ids_centro").val("2");
                }
            }
        </script>


        <script type="text/javascript">
            $('.addRow').on('click', function() {
                addRow();
                onSelectMovimientoChange2();
                $('.select-e').select2({
                    containerCssClass: "bg_color "
                });


            });



            function addRow() {



                numero_row += 1;

                /*    rows.push(1)
                        if (rows.length !== 0) {
                        select = 'select#select-equipo'+numero_row


                         <div  class="form-group">
                                    <select name="id_equipo[]" class="form-control select-e" id="select-equipo0" required>
                                        <option value="">Seleccione Equipo</option>
                                    </select>
                                </div>
                    } */


                var tr = '<tr>' +
                    '<td  class ="td-select">        <div  class="form-group"><select name="id_equipo[]" class="form-control select-e" id="select-equipo' +
                    numero_row + '" required><option value="">Seleccione Equipo</option></select></div></td>' +
                    '<td><a class="btn btn-danger remove"><i class="bi bi-x-octagon"></i></a></td></tr>';


                $('tbody').append(tr);
            };



            function onSelectMovimientoChange2() {

                var tipo_movimiento = $("select#select-movimiento option:checked").val();

                // AJAX
                $.get('/movimiento/' + tipo_movimiento + '/equipos', function(data) {

                    var html_select = '<option value="">Seleccione Equipo</option>';
                    for (var i = 0; i < data.length; ++i)
                        html_select += '<option value="' + data[i].id_equipo + '">' + data[i].cod_equipo + '</option>';


                    $('select#select-equipo' + numero_row).html(html_select);
                });


            }

            $('body').on('click', '.remove', function() {
                var last = $('tbody tr').length;
                if (last == 1) {
                    alert("No esta permitido remover la última fila");
                } else {
                    $(this).parent().parent().remove();
                }

            });



            /*        function valueSelect() {

                    var seleccion_actual = $(event.target).val()

                   }
             */

            /* function onSelectMovimientoDuplicate() {




             var seleccion = $(event.target).val()

             var myIndex = myArray.indexOf('previous');
             if (myIndex !== -1) {
             myArray.splice(myIndex, 1);
             }

                 if (dupl.includes(seleccion)) {
                 alert("Ha repetido equipos"); } else
                 { dupl.push(seleccion)
             }

             agrega 1, agrega 2, el 1 selecciona 3, queda 2-3


             console.log(dupl);

             const noDups = new Set(dupl);
             return dupl.length !== noDups.size;



            } */
        </script>




        <style>
            .th-cod {

                width: 15%;


            }

            .select2-container--default .select2-selection--single .select2-selection__rendered {
                display: block;
                text-overflow: ellipsis;
                background-color: black: text-align-last:center !important;
                line-height: 15px;

            }

            .select2-results { background-color: #343a40; }


            .select2-selection__rendered[title] {

        text-align: center;
        }
        </style>

    </div>
