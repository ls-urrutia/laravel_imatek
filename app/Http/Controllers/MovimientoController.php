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
        
       
   
        request()->validate(Movimiento::$rules);
        
        



        $centro_n = Centro::find($request->get('id_centro'));


        $movimientos = new Movimiento();
        $movimientos->tipo_movimiento = $request->get('tipo_movimiento');
        $movimientos->fecha_movimiento = $request->get('fecha_movimiento');
        $movimientos->tipo_documento = $request->get('tipo_documento');
        $movimientos->n_documento = $request->get('n_documento');
        $movimientos->id_equipo = $request->get('id_equipo');
        $movimientos->id_centro = $centro_n->nombre_centro;

        $tipomov = $request->get('tipo_movimiento');

        $ultimomov = DB::select("SELECT tipo_movimiento
        FROM `imatek`.`movimientos`where id_equipo= ? ORDER BY created_at DESC LIMIT 1;",[$request->get('id_equipo')]);

        $ultimafecha = DB::select("SELECT fecha_movimiento
        FROM `imatek`.`movimientos`where id_equipo= ? ORDER BY created_at DESC LIMIT 1;", [$request->get('id_equipo')]);
    
        $request->validate([

                'fecha_movimiento' => 'date|after:'.$ultimafecha[0]->fecha_movimiento
                
            ]);




/*
        DB::table('`prueba`.`movimientos`where id_equipo = 8')
        ->select("tipo_movimiento")
        ->limit(1)
        ->orderBy("created_at","desc")
        ->get(); */

         if($ultimomov[0]->tipo_movimiento == $tipomov || ($ultimomov[0]->tipo_movimiento == 'Compra' && $tipomov == 'Entrada')){

            return redirect()->route('movimientos.index')
                ->with('error', 'Ingreso fallido. Movimiento no permitido');

        } else {
            $movimientos->save();
        }

        if($request->get('tipo_movimiento') == 'Entrada') {

            $equipo = Equipo::find($request->get('id_equipo'));
            $equipo->estado = 'En revisión';
            $equipo->save();
        }


        $equipo = Equipo::find($request->get('id_equipo'));
        /*    $equipo->centro->nombre_centro = $request-> get('nombre_centro'); */
        $equipo->id_centro = $request->get('id_centro');
        $equipo->save();



        return redirect()->route('movimientos.index')
            ->with('success','Movimiento creado exitosamente');
        
  



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
        try{
        $movimiento->update($request->all());

        return redirect()->route('movimientos.index')
            ->with('success', 'Movimiento actualizado satisfactoriamente');
        }catch(\Exception $exception){
            return redirect()->route('movimientos.index')
            ->with('error', 'No se pudo eliminar el movimiento');

        }    
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        try{
            $movimiento = Movimiento::find($id)->delete();

            return redirect()->route('movimientos.index')
                ->with('success', 'Movimiento eliminado satisfactoriamente');
        }catch(\Exception $exception){
            return redirect()->route('movimientos.index')
            ->with('error', 'No se pudo eliminar el movimiento');


        }
    }
}
