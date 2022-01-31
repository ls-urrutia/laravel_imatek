<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Mantencione;
use Illuminate\Http\Request;

/**
 * Class MantencioneController
 * @package App\Http\Controllers
 */
class MantencioneController extends Controller
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
        $mantenciones = Mantencione::paginate();

        return view('mantencione.index', compact('mantenciones'))
            ->with('i', (request()->input('page', 1) - 1) * $mantenciones->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mantencione = new Mantencione();

        $equipos = Equipo::pluck('cod_equipo','id_equipo');

        return view('mantencione.create', compact('mantencione', 'equipos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Mantencione::$rules);

        $mantenciones = new Mantencione();
        $mantenciones->cod_mantencion= $request->get('cod_mantencion');
        $mantenciones->n_despacho= $request->get('n_despacho');
        $mantenciones->fecha_mantencion = $request->get('fecha_mantencion');
        $mantenciones->descripcion = $request->get('descripcion');
        $mantenciones->validacion= $request->get('validacion');
        $mantenciones->id_usuario =  $request->user()->id;
        $mantenciones->id_equipo = $request->get('id_equipo');
        $mantenciones->save();

        return redirect()->route('mantenciones.index')
            ->with('success', 'Mantencione created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mantencione = Mantencione::find($id);

        return view('mantencione.show', compact('mantencione'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mantencione = Mantencione::find($id);

        $equipos = Equipo::pluck('cod_equipo ','id_equipo');

        return view('mantencione.edit', compact('mantencione','equipos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Mantencione $mantencione
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mantencione $mantencione)
    {
        request()->validate(Mantencione::$rules);

        $mantencione->update($request->all());

        return redirect()->route('mantenciones.index')
            ->with('success', 'Mantencione updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $mantencione = Mantencione::find($id)->delete();

        return redirect()->route('mantenciones.index')
            ->with('success', 'Mantencione deleted successfully');
    }
}
