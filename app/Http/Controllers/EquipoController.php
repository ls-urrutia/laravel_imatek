<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Centro;
use App\Models\Mantencione;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;


/**
 * Class EquipoController
 * @package App\Http\Controllers
 */
class EquipoController extends Controller
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
        $rawQsl = DB::table('equipos')->get()->where('tipo_equipo','=','Lampara')->count();
        
        $equipos = Equipo::paginate();

        return view('equipo.index', compact('equipos','rawQsl'))
            ->with('i', (request()->input('page', 1) - 1) * $equipos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $equipo = new Equipo();



        $centros = Centro::pluck('nombre_centro','id_centro');

        return view('equipo.create', compact('equipo', 'centros'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
/*         request()->validate(Equipo::$rules);

  */

        $tipo_equipo = $request->get('tipo_equipo');
        $cod_equipo = $request->get('cod_equipo');
        $tipo_documento = $request->get('tipo_documento');
        $n_documento= $request->get('n_documento');
        $modelo = $request->get('modelo');
        $ciclos = $request->get('ciclos');
        $descripcion= $request->get('descripcion');
        $estado = $request->get('estado');
        $fecha_ingreso = $request->get('fecha_ingreso');
        $proveedor = $request->get('proveedor');

            for ($i=0; $i < count($cod_equipo); $i++){
                $data=array(
                'cod_equipo' =>   $cod_equipo[$i],                      //
                'tipo_equipo' =>   $tipo_equipo,
                'tipo_documento'=> $tipo_documento,
                'n_documento' =>  $n_documento,
                'modelo'  =>  $modelo,
                'ciclos' =>   $ciclos,
                'descripcion' =>  $descripcion,
                'estado' =>    $estado ,
                'fecha_ingreso' =>    $fecha_ingreso ,
                'proveedor' =>  $proveedor,
                );

                DB::table('equipos')->insert($data);

                $id = DB::getPdo()->lastInsertId();
                $data2= [
                    'id_equipo' => $id,
                    'tipo_movimiento' => 'Compra',
                    'fecha_movimiento' => $fecha_ingreso,
                    'tipo_documento' => $tipo_documento,
                    'n_documento' =>  $n_documento,
                    'id_centro' => 'Oficina'

                    ];
                DB::table('movimientos')->insert($data2);
          }



        return redirect()->route('equipos.index')
            ->with('success', 'Equipo created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $equipo = Equipo::find($id);
    
        /* $records['mantenciones'] = DB::table('equipos')
                         ->join('mantenciones', 'mantenciones.id_equipo', '=', 'equipos.id_equipo')
                         ->where('equipos.id_equipo', $equipo->id)
                         ->paginate(5); */
       /*  $equipos2= DB::select("SELECT * FROM mantenciones INNER JOIN equipos ON mantenciones.$id=equipos.$id"); */
       /*  $prop =  Equipo::findOrFail($id)->mantenciones(); */
        /* $contar = Equipo::withCount(['mantenciones'])->get(); */
        $fechas = DB::select('SELECT fecha_movimiento from movimientos where id_equipo={$id}');

        return view('equipo.show', compact('equipo','$fechas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $equipo = Equipo::find($id);
        $centros = Centro::pluck('nombre_centro','id_centro');

        return view('equipo.edit', compact('equipo','centros'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Equipo $equipo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipo $equipo)
    {
        /* request()->validate(Equipo::$rules); */

        $equipo->update($request->all());

        return redirect()->route('equipos.index')
            ->with('success', 'Equipo updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $equipo = Equipo::find($id)->delete();

        return redirect()->route('equipos.index')
            ->with('success', 'Equipo deleted successfully');
    }


}
