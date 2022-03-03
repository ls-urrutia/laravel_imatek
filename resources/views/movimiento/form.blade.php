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
            {{ Form::label('tipo_movimiento') }}<span class="form-span">*</span>
            <select name="tipo_movimiento" class="form-control" id="select-movimiento" required>
                <option value="">Seleccione Movimiento</option>
                <option value="Salida">Entrada</option>
                <option value="Entrada">Salida</option>
                <option value="Compra">Salida Nuevos</option>
            </select>


            <div class="form-group">
                {{ Form::label('fecha_movimiento:') }}<span class="form-span">*</span>
                {{ Form::date('fecha_movimiento', $movimiento->fecha_movimiento, ['id' => 'fecha_movimiento','class' => 'form-control' . ($errors->has('fecha_movimiento') ? ' is-invalid' : ''),'placeholder' => 'Fecha Movimiento','required']) }}
                {!! $errors->first('fecha_movimiento', '<div class="invalid-feedback">:message</p>') !!}
            </div>

            <div class="form-group">

                {{ Form::label('Número de documento') }}<span class="form-span">*</span>
                {{ Form::text('n_documento', $movimiento->n_documento, ['class' => 'form-control' . ($errors->has('n_documento') ? ' is-invalid' : ''),'placeholder' => 'N Documento','required' => '']) }}
                {!! $errors->first('n_documento', '<div class="invalid-feedback">:message</p>') !!}
            </div>



            <div class="form-group" id="div_cliente">
                {{ Form::label('Cliente') }}<span class="form-span">*</span>
                <select class="form-control" id="clientes" name="clientes" required>
                    <option value="">Seleccione Cliente</option>
                    @foreach ($clientes as $cliente)
                        <option value="{{ $cliente->id_cliente }}">{{ $cliente->nombre_empresa }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group" id="div_centro">
                {{ Form::label('Centro') }}<span class="form-span">*</span>
                <select class="form-control" id="id_centro" name="id_centro" required>
                    <option value="">Seleccione Centro</option>
                </select>

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
                                                onchange="onSelectEquipoChange(this.value)" required>
                                                <option value="">Seleccione Equipo</option>
                                            </select>
                                        </div>

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
            $(document).ready(function() {
                $('.select-e').select2({
                    theme: "classic",

                });

            });



            $(function() {


                $('#select-movimiento').on('change', onSelectMovimientoChange);
                $('#select-movimiento').on('change', onSelectMovimientoChangeHide);
                $('#clientes').on('change', onSelectClienteChange);


                $('#div_centro').hide();
                $('#div_cliente').hide();

                numero_row = 0;
                dupl = [];
                rows = [];
                unico = true;
                previous = 0;
                valid = true;

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

                    key = $(this).find('option:selected').text();

                    if (checkIfArrayIsUnique(store) != true) {
                        alert("Equipo " + key + " repetido")

                    }


                });

                if (checkIfArrayIsUnique(store) != true) {

                } else {
                    $(".btn-success").prop('type', 'submit');

                }
                /*  console.log(`${store} is unique : ${checkIfArrayIsUnique(store)}`); */

            }


            function onSelectEquipoChange(val) {

                $.get('/movimiento/' + val + '/fechas', function(data) {

                    ult_fecha_equipo = data[0].fecha_movimiento;



                    fecha_actual = document.getElementById("fecha_movimiento").value;

                    if (fecha_actual < ult_fecha_equipo) {
                        document.getElementById("fecha_movimiento").setAttribute("min", ult_fecha_equipo);
                        $('#fecha_movimiento').val(ult_fecha_equipo);
                    }

                });

            };


            function onSelectClienteChange() {

                var id_cliente = $(this).val();

                // AJAX
                $.get('/movimiento/' + id_cliente + '/centros', function(data) {

                    var html_select = '<option value="">Seleccione Centro</option>';
                    for (var i = 0; i < data.length; ++i)
                        html_select += '<option value="' + data[i].id_centro + '">' + data[i]
                        .nombre_centro +
                        '</option>';
                    $('#id_centro').html(html_select);


                });

            }



            function onSelectMovimientoChange() {


                $('#fecha_movimiento').val("");

                var tipo_movimiento = $(this).val();


                // AJAX
                $.get('/movimiento/' + tipo_movimiento + '/equipos', function(data) {

                    var html_select = '<option value="">Seleccione Equipo</option>';
                    for (var i = 0; i < data.length; ++i)
                        html_select += '<option value="' + data[i].id_equipo + '">' + data[i].cod_equipo +
                        data[i]
                        .id_equipo +
                        '</option>';
                    $('.select-e').html(html_select);


                });


            }

            function onSelectMovimientoChangeHide() {

                if ($(this).val() == 'Salida') {

                    $('#div_centro').hide();
                    $('#div_cliente').hide();

                    select = document.getElementById('id_centro');
                    var opt = document.createElement('option');
                    opt.value = 1;
                    opt.innerHTML = 'Oficina';
                    select.appendChild(opt);

                    $("select#id_centro option[value='1']").show();
                    $("select#id_centro").val("1");






                } else {
                    $('#div_centro').show();
                    $('#div_cliente').show();
                    $("select#id_centro option[value='1']").hide();
                    $("select#id_centro").val("2");
                    $('select[name*="clientes"] option[value="1"]').remove();


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

                var tr = '<tr>' +
                    '<td  class ="td-select">        <div  class="form-group"><select onchange="onSelectEquipoChange(this.value)" name="id_equipo[]" class="form-control select-e" id="select-equipo' +
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
                        html_select += '<option value="' + data[i].id_equipo + '">' + data[i].cod_equipo + data[i]
                        .id_equipo +
                        '</option>';


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




        
     

    </div>
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">
