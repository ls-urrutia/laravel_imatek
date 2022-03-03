<?php

namespace App\Http\Controllers;

use App\Models\Centro;
use App\Models\Movimiento;
use App\Models\Equipo;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


/**
 * Class MovimientoController
 * @package App\Http\Controllers
 */
class MovimientoController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }





    public function index()
    {
        $movimientos = Movimiento::paginate();

        return view('movimiento.index', compact('movimientos'))
            ->with('i', (request()->input('page', 1) - 1) * $movimientos->perPage());
    }



    //funcion-consulta  para buscar la fecha con el valor más alto segun un equipo en especifico
    // sirve para que al seleccionarr un equipo el campo de fecha se actualize y no se pueda seleccionar una fecha anterior a la que se ha consultado

    public function fechas($id_equipo)
    {
        return DB::SELECT("SELECT m.id_movimiento,m.fecha_movimiento, m.tipo_movimiento, equipos.cod_equipo, m.id_equipo,  equipos.estado
        FROM movimientos m
        INNER JOIN equipos ON m.id_equipo = equipos.id_equipo
        INNER JOIN
            (SELECT id_equipo, MAX(fecha_movimiento) AS MaxDateTime
            FROM movimientos
            GROUP BY id_equipo) groupedtt
        ON m.id_equipo = groupedtt.id_equipo
        AND m.fecha_movimiento = groupedtt.MaxDateTime where m.id_equipo = ? ;", [$id_equipo]);
    }






    public function centros($id_cliente)
    {

        return DB::SELECT("SELECT id_centro, nombre_centro FROM centros where id_cliente = ? ; ", [$id_cliente]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $movimiento = new Movimiento();

        $centros = Centro::pluck('nombre_centro', 'id_centro');

        $equipos = Equipo::pluck('cod_equipo', 'id_equipo');

        $clientes = Cliente::all();


        return view('movimiento.create', compact('movimiento', 'equipos', 'centros', 'clientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*         request()->validate(Movimiento::$rules); */



        $centro_n = Centro::find($request->get('id_centro'));

        $tipo_movimiento = $request->get('tipo_movimiento');
        $fecha_movimiento = $request->get('fecha_movimiento');
        $n_documento = $request->get('n_documento');
        $id_equipo = $request->get('id_equipo');
        $id_centro = $centro_n->nombre_centro;




        /*  $tipomov = $request->get('tipo_movimiento'); */

        $vld = true;





        for ($i = 0; $i < count($id_equipo); $i++) {




        //Ver último movimiento de un equipo (saca la última fecha)

            $ultimomov = DB::select("SELECT tipo_movimiento
        FROM `movimientos`where id_equipo= ? ORDER BY fecha_movimiento DESC LIMIT 1;", [$id_equipo[$i]]);


     /*        $ultimafecha = DB::select("SELECT fecha_movimiento
        FROM `movimientos`where id_equipo= ? ORDER BY fecha_movimiento DESC LIMIT 1;", [$id_equipo[$i]]); */
            /*  $request->validate([

        'fecha_movimiento' => 'date|after:'.$ultimafecha[0]->fecha_movimiento

        ]);
 */


 //Explicación: en el formulario cuando uno selecciona 'Salida' el valor es Entrada (El 'Entrada' es Salida y el 'Salida Nuevos' es Compra),
 // esto por ejemplo para poder pedir los datos de los movimientos de los equipos (funcion ByEquipo de controlador equipos) en condicion de compra(valor entrante) y asi mostrarlos disponibles como 'Salida' en el selectbox, pero deben cambiarse después aca en el back-end para corregir con el filtro

            if ($vld == true) {
                switch ($tipo_movimiento) {
                    case 'Compra':
                        $tipo_movimiento = 'Salida';
                        $vld = false;
                        break;

                    case 'Entrada':
                        $tipo_movimiento = 'Salida';
                        $vld = false;
                        break;

                    case 'Salida':
                        $tipo_movimiento = 'Entrada';
                        $vld = false;
                        break;
                }
            }


            // Esto es para que no se repitan los movimientos, no se pueda ingresar una salida después de una salida; por ejemplo.

            if ($ultimomov[0]->tipo_movimiento == $tipo_movimiento || ($ultimomov[0]->tipo_movimiento == 'Compra' && $tipo_movimiento == 'Entrada')) {

                //Si falla lo devuelve.
                return redirect()->route('movimientos.index')
                    ->with('error', 'Ingreso fallido. Movimiento no permitido');
            } else {

                $data = array(

                    'tipo_movimiento' => $tipo_movimiento,
                    'fecha_movimiento' => $fecha_movimiento,
                    'n_documento' => $n_documento,
                    'id_equipo' =>  $id_equipo[$i],
                    'id_centro' => $id_centro

                );



                DB::table('movimientos')->insert($data);


                if ($tipo_movimiento == 'Entrada') {

                // Si es entrada cambia el estado a revisión
                    $equipo = Equipo::find($id_equipo[$i]);
                    $equipo->estado = 'En revisión';
                    $equipo->save();
                }

                //Cambia el centro del equipo según el centro seleccionado


                $equipo = Equipo::find($id_equipo[$i]);
                /*    $equipo->centro->nombre_centro = $request-> get('nombre_centro'); */
                $equipo->id_centro =  $request->get('id_centro');
                $equipo->save();
            }
        }
        return redirect()->route('movimientos.index')
            ->with('success', 'Movimiento creado exitosamente.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movimiento = Movimiento::find($id);

        $equipos = Equipo::pluck('cod_equipo', 'id_equipo');

        return view('movimiento.show', compact('movimiento', 'equipos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {


        $movimiento = Movimiento::find($id);

        $equipos = Equipo::pluck('cod_equipo', 'id_equipo');

        $centros = Centro::pluck('nombre_centro', 'id_centro');


        $clientes = Cliente::all();

        return view('movimiento.edit', compact('movimiento','equipos','centros','clientes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Movimiento $movimiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movimiento $movimiento)
    {


        request()->validate(Movimiento::$rules);

            $movimiento->update($request->all());

            return redirect()->route('movimientos.index')
                ->with('success', 'Movimiento actualizado satisfactoriamente');

    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {


            $mov = Movimiento::find($id);
            $ultimomovi= DB::select("SELECT * FROM movimientos where id_movimiento=?;",[$id]);


            $idequipo = $ultimomovi[0]->id_equipo;

            $movimiento = Movimiento::find($id)->delete();

            $ultm = DB::select("SELECT * FROM movimientos where id_equipo = ? ORDER BY id_movimiento DESC LIMIT 1 ;", [$idequipo]);
            $string = $ultm[0]->id_centro;

            $equipo = Equipo::find($idequipo);


            $ultimomovi= DB::select("SELECT id_centro FROM centros where nombre_centro = ? ;",[$string]);

       /*      $equipo->id_centro = $ultimomovi[0]-> */
            $id_centro2 = $ultimomovi[0]->id_centro;


            /* $equipo2 = Equipo::find($id_eq2); */
            $equipo->id_centro = $id_centro2;


            $tipomov = $ultm[0]->tipo_movimiento;
            if($tipomov=='Entrada'){
                $equipo->estado = 'En revisión';
            }elseif($tipomov=='Salida'){
                $equipo->estado = 'Operativo';
            }else{
                'Error';
            }







            $equipo->save();




            return redirect()->route('movimientos.index')
                ->with('success', 'Movimiento eliminado satisfactoriamente');

    }
}
