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
                                    <td><input type="button" name="" value="Guardar" class="btn btn-success"
                                            id="submit-btn" onclick="clickErrores()"></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </section>
            </form>
        </div>


        <script type="text/javascript">
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
            









            $(function() {


                $('#select-movimiento').on('change', onSelectMovimientoChange);
                $('#select-movimiento').on('change', onSelectMovimientoChangeHide);

                $('#div_centro').hide();
                numero_row = 0;
                dupl = [];
                rows = [];
                unico = true;
                previous = 0;

            });





            function checkIfArrayIsUnique(myArray) {
                return myArray.length === new Set(myArray).size;
            }



            function clickErrores() {

                var inputs = $('.select-e');
                var store = [];


                $.each(inputs, function(k, v) {

                    var getVal = $(v).val();
                    store.push($(v).val());
                });

                if (checkIfArrayIsUnique(store) != true)
                {
                    alert("Valor repetido");
                }else {
                    $(".btn-success").prop('type','submit');

                }
               /*  console.log(`${store} is unique : ${checkIfArrayIsUnique(store)}`); */

            }/*

            $('.btn-success').click(function(e) {


            e.preventDefault();
            var stored = [];




            $.when(
                $.each(inputs, function(k, v) {
                    var getVal = $(v).val();
                    if (stored.indexOf(getVal) != -1) {
                        $(this).parent().parent().parent().remove();
                        unico = false;
                        alert("fuck")
                    } else {
                        stored.push($(v).val());
                    }
                    console.log("x")
                })
            ).then(function() {

                console.log(unico);

                if (unico == true) {
                    $('.btn-success').unbind("click");
                    document.getElementById('submit-btn').click();
                }


            });
            }); */




/*
                        $(document).ready(function() {

                            $('.btn-success').click(function(e) {


                                e.preventDefault();
                                var stored = [];
                                var inputs = $('.select-e');

                                $.when(
                                    $.each(inputs, function(k, v) {
                                        var getVal = $(v).val();
                                        if (stored.indexOf(getVal) != -1) {
                                            $(this).parent().parent().parent().remove();
                                            unico = false;
                                            alert("fuck")
                                        } else {
                                            stored.push($(v).val());
                                        }
                                        console.log("x")
                                    })
                                ).then(function() {

                                    console.log(unico);

                                    if (unico == true) {
                                        $('.btn-success').unbind("click");
                                        document.getElementById('submit-btn').click();
                                    }


                                });




            });

            });
             */


            function onSelectMovimientoChange() {

                var tipo_movimiento = $(this).val();



                // AJAX
                $.get('/movimiento/' + tipo_movimiento + '/equipos', function(data) {

                    var html_select = '<option value="">Seleccione Equipo</option>';
                    for (var i = 0; i < data.length; ++i)
                        html_select += '<option value="' + data[i].id_equipo + '">' + data[i].cod_equipo +
                        '</option>';
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
                $('.select-e').select2({});


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
        </script>




        <style>
            .th-cod {

                width: 15%;


            }

            .select2-container--default .select2-selection--single .select2-selection__rendered {
                display: block;
                text-overflow: ellipsis;
                background-color: transparent: text-align-last:center !important;
                line-height: 15px;
                color: white;

            }

            .select2-results {
                background-color: #343a40;
            }


            .select2-selection__rendered[title] {
                background-color: #343a40;
                text-align: center;
                color: white !important;

            }

            .select2-container--default .select2-selection--single {
                background-color: transparent
            }

        </style>

    </div>
