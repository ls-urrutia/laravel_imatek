<?php

namespace App\Http\Controllers;

use App\Models\Centro;
use App\Models\Movimiento;
use App\Models\Equipo;
use Illuminate\Http\Request;

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
        $movimientos->save();



        $equipo = Equipo::find($request->get('id_equipo'));
        /*    $equipo->centro->nombre_centro = $request-> get('nombre_centro'); */
        $equipo->id_centro = $request->get('id_centro');
        $equipo->save();



        return redirect()->route('movimientos.index')
            ->with('success', 'Movimiento created successfully.');



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
