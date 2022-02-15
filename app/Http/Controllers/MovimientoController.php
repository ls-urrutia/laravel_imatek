<?php

namespace App\Http\Controllers;

use App\Models\Centro;
use App\Models\Movimiento;
use App\Models\Equipo;
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $movimiento = new Movimiento();

        $centros = Centro::pluck('nombre_centro','id_centro');

        $equipos = Equipo::pluck('cod_equipo','id_equipo');


        return view('movimiento.create', compact('movimiento','equipos','centros'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //* request()->validate(Movimiento::$rules); */



        $centro_n = Centro::find($request->get('id_centro'));

        $tipo_movimiento = $request->get('tipo_movimiento');
        $fecha_movimiento = $request->get('fecha_movimiento');
        $n_documento = $request->get('n_documento');
        $id_equipo = $request->get('id_equipo');
        $id_centro = $centro_n->nombre_centro;

       /*  $tipomov = $request->get('tipo_movimiento'); */


       $long_arreglo_eq = count($id_equipo);
       $unico = array_unique($id_equipo);

       $long_arreglo_unico = count($unico);

       if( $long_arreglo_eq >  $long_arreglo_unico ) {

        return redirect()->route('movimientos.index')
        ->with('error', 'Ingreso fallido. Ha repetido equipos');

       }

        for ($i=0; $i < count($id_equipo); $i++){



        $ultimomov = DB::select("SELECT tipo_movimiento
        FROM `movimientos`where id_equipo= ? ORDER BY fecha_movimiento DESC LIMIT 1;",[$id_equipo[$i]]);

        $ultimafecha = DB::select("SELECT fecha_movimiento
        FROM `movimientos`where id_equipo= ? ORDER BY fecha_movimiento DESC LIMIT 1;",[$id_equipo[$i]]);



        $request->validate([

            'fecha_movimiento' => 'date|after:'.$ultimafecha[0]->fecha_movimiento
        ]);


        if($ultimomov[0]->tipo_movimiento == $request->get('tipo_movimiento') || ($ultimomov[0]->tipo_movimiento == 'Compra' && $request->get('tipo_movimiento') == 'Entrada')){

            return redirect()->route('movimientos.index')
                ->with('error', 'Ingreso fallido. Movimiento no permitido');

        } else {

              $data=array(

                'tipo_movimiento' => $tipo_movimiento,
                'fecha_movimiento' => $fecha_movimiento,
                'n_documento' => $n_documento,
                'id_equipo' =>  $id_equipo[$i],
                'id_centro' => $id_centro

                );

                DB::table('movimientos')->insert($data);


                if($request->get('tipo_movimiento') == 'Entrada') {

                    $equipo = Equipo::find($id_equipo[$i]);
                    $equipo->estado = 'En revisión';
                    $equipo->save();
                }




                $equipo = Equipo::find($id_equipo[$i]);
                /*    $equipo->centro->nombre_centro = $request-> get('nombre_centro'); */
                $equipo->id_centro =  $request->get('id_centro');
                $equipo->save();



                return redirect()->route('movimientos.index')
                    ->with('success', 'Movimiento created successfully.');

            }


        }


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

        return view('movimiento.show', compact('movimiento'));
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

        $equipos = Equipo::pluck('cod_equipo','id_equipo');

        return view('movimiento.edit', compact('movimiento'));
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
            ->with('success', 'Movimiento updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $movimiento = Movimiento::find($id)->delete();

        return redirect()->route('movimientos.index')
            ->with('success', 'Movimiento deleted successfully');
    }
}
