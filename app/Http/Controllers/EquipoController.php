<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Centro;
use Illuminate\Http\Request;
use Carbon\Carbon;

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


    public function call(Request $request)
    {

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


        $clientes = new Equipo();
        $clientes->cod_equipo = $request->get('cod_equipo');
        $clientes->n_factura= $request->get('n_factura');
        $clientes->tipo_equipo = $request->get('tipo_equipo');
        $clientes->modelo = $request->get('modelo');
        $clientes->ubicacion = $request->get('ubicacion');
        $clientes->descripcion= $request->get('descripcion');
        $clientes->estado = $request->get('estado');
        $clientes->fecha_compra = $request->get('fecha_compra');
        $clientes->proveedor = $request->get('proveedor');
        $clientes->id_centro = $request->get('id_centro');
        $clientes->save();


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
