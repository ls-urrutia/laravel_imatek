<title>Multiple data send</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="..\vendor\adminlte\dist\img\AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('tipo_movimiento') }}
            <select name="tipo_movimiento" class="form-control" id="select-movimiento">
                <option value="">Seleccione Movimiento</option>
                <option value ="Salida">Entrada</option>
                <option value ="Entrada">Salida</option>
                <option value ="Compra">Salida Nuevos</option>
            </select>
        </th>

        <div class="form-group">
            {{ Form::label('fecha_movimiento:') }}
            {{ Form::date('fecha_movimiento', $movimiento->fecha_movimiento, ['class' => 'form-control' . ($errors->has('fecha_movimiento') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Movimiento']) }}
            {!! $errors->first('fecha_movimiento', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('número_documento') }}
            {{ Form::text('n_documento', $movimiento->n_documento, ['class' => 'form-control' . ($errors->has('n_documento') ? ' is-invalid' : ''), 'placeholder' => 'N Documento']) }}
            {!! $errors->first('n_documento', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group" id="div_centro">
            {{ Form::label('Centro:') }}
            {{ Form::select('id_centro', $centros, $movimiento->id_centro, ['id' => 'ids_centro','class' => 'form-control' . ($errors->has('id_centro') ? ' is-invalid' : ''), 'placeholder' => 'Centros']) }}
            {!! $errors->first('id_centro', '<div class="invalid-feedback">:message</p>') !!}
        </div>
    </div>

    <div class="box box-info padding-1">
        <form>
            <section>
                <div class="form-group" >
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th><a class="addRow"> <i class="bi bi-plus-circle"></i></a> Agregar Equipo Adicional</th>
                            </tr>
                        </thead>
                        <tbody>
            <tr>
            <td>
                <div  class="form-group">
                    <select name="id_equipo[]" class="form-control select-e" onclick="btnClick()" id="select-equipo0" required>
                        <option value="">Seleccione Equipo</option>
                    </select>
                </div>

         {{--    <input type="text" name="cod_equipo[]" class="form-control" required=""> --}}

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
                                <td><input type="submit" name="" value="Guardar" class="btn btn-success"></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </section>
        </form>
   </div>
   
   



   <script type="text/javascript">


$(document).ready(function(){

$('.btn').click(function(e) {

e.preventDefault();
    var	stored	=	[];
    var	inputs	=	$('.select-e');
    $.each(inputs,function(k,v){
        var getVal	=	$(v).val();
        if(stored.indexOf(getVal) != -1)
    $(v).fadeOut();

        else
    stored.push($(v).val());
            $('.btn').unbind("click");
    });


});
});




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
    $.get('/movimiento/'+tipo_movimiento+'/equipos', function (data) {

    var html_select = '<option value="">Seleccione Equipo</option>';
    for (var i=0; i<data.length; ++i)
        html_select += '<option value="'+data[i].id_equipo+'">'+data[i].cod_equipo+'</option>';
        $('.select-e').html(html_select);


});


}

function onSelectMovimientoChangeHide() {

if ($(this).val() == 'Salida') {

    $('#div_centro').hide();
    $("select#ids_centro option[value='1']").show();
    $("select#ids_centro").val("1");


    } else{
        $('#div_centro').show();
        $("select#ids_centro option[value='1']").hide();
        $("select#ids_centro").val("2");
    }
}



 </script>


   <script type="text/javascript">
       $('.addRow').on('click',function(){
           addRow();
           onSelectMovimientoChange2();
           lala();
        });

       function addRow()
       {

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


           var tr='<tr>'+
           '<td>        <div  class="form-group"><select name="id_equipo[]" class="form-control select-e" id="select-equipo'+numero_row+'" required><option value="">Seleccione Equipo</option></select></div></td>'+
           '<td><a class="btn btn-danger remove"><i class="bi bi-x-octagon"></i></a></td></tr>';


           $('tbody').append(tr);
       };



       function onSelectMovimientoChange2() {

        var tipo_movimiento = $( "select#select-movimiento option:checked" ).val();

        // AJAX
        $.get('/movimiento/'+tipo_movimiento+'/equipos', function (data) {

        var html_select = '<option value="">Seleccione Equipo</option>';
        for (var i=0; i<data.length; ++i)
            html_select += '<option value="'+data[i].id_equipo+'">'+data[i].cod_equipo+'</option>';


            $('select#select-equipo'+numero_row).html(html_select);
    });


    }

       $('.remove').live('click',function(){
           var last=$('tbody tr').length;
           if(last==1){
               alert("No esta permitido remover la última fila");
           }
           else{
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

</div>


