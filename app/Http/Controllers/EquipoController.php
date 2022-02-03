<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Centro;
use App\Models\Movimiento;
use Illuminate\Http\Request;

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
        $equipos = Equipo::paginate();

        return view('equipo.index', compact('equipos'))
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
        request()->validate(Equipo::$rules);


        $data=$request->all();

/*      $clientes = new Equipo();
        $clientes->cod_equipo = $request->get('cod_equipo');
        $clientes->tipo_documento = $request->get('tipo_documento');
        $clientes->n_documento= $request->get('n_documento');
        $clientes->tipo_equipo = $request->get('tipo_equipo');
        $clientes->modelo = $request->get('modelo');
        $clientes->ciclos = $request->get('ciclos');
        $clientes->descripcion= $request->get('descripcion');
        $clientes->estado = $request->get('estado');
        $clientes->fecha_ingreso = $request->get('fecha_ingreso');
        $clientes->proveedor = $request->get('proveedor');
        $clientes->save();
 */


        $lastid=Equipo::create($data)->id;   ///es aca
        if(count($request->cod_equipo) > 0) ///es aca
        {
            foreach($request->cod_equipo as $movimiento=>$v){
                $data2=array(
                    'id_equipo'=>$lastid,
                    'tipo_movimiento'=>$request->tipo_movimiento = "Compra",
                    'fecha_movimiento'=>$request->fecha_ingreso[$movimiento],
                    'tipo_documento'=>$request->tipo_documento[$movimiento],
                    'n_documento'=>$request->n_documento[$movimiento],
                );
            Movimiento::insert($data2[]);
          }
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

        return view('equipo.show', compact('equipo'));
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
        request()->validate(Equipo::$rules);

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
