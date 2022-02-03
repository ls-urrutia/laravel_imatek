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
        $mantenciones->fecha_mantencion = $request->get('fecha_mantencion');
        $mantenciones->descripcion = $request->get('descripcion');
        $mantenciones->validacion= $request->get('validacion');
        if($request->hasFile('imagen1')){
            $image1= $request->file('imagen1');
            $extension = $image1->getClientOriginalExtension();
            $imagename = time().'.'.$extension;
            $image1->move('imagenes/fmantenciones',$imagename);
            $mantenciones->imagen1 = $imagename;

        }
        if($request->hasFile('imagen2')){
            $image2= $request->file('imagen2');
            $extension2 = $image2->getClientOriginalExtension();
            $imagename2 = time().'.'.$extension2;
            $image2->move('imagenes/fmantenciones',$imagename2);
            $mantenciones->imagen2 = $imagename2;

        }
        if($request->hasFile('imagen3')){
            $image3= $request->file('imagen3');
            $extension3 = $image3->getClientOriginalExtension();
            $imagename3 = time().'.'.$extension3;
            $image3->move('imagenes/fmantenciones/',$imagename3);
            $mantenciones->imagen3 = $imagename3;

        }
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
