<?php

namespace App\Http\Controllers;

use App\Models\Centro;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

use App\Exports\CentrosExport;

/**
 * Class CentroController
 * @package App\Http\Controllers
 */
class CentroController extends Controller
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
        $centros = Centro::paginate();

        return view('centro.index', compact('centros'))
            ->with('i', (request()->input('page', 1) - 1) * $centros->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $centro = new Centro();

        $clientes = Cliente::pluck('nombre_empresa','id_cliente');

        return view('centro.create', compact('centro', 'clientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Centro::$rules);

        $clientes = new Centro();
        $clientes->nombre_centro = $request->get('nombre_centro');
        $clientes->telefono_empresa = $request->get('telefono_empresa');
        $clientes->descripcion = $request->get('descripcion');
        $clientes->id_cliente = $request->get('id_cliente');
        $clientes->save();

        return redirect()->route('centros.index')
            ->with('success', 'Centro creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $centro = Centro::find($id);

        return view('centro.show', compact('centro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $centro = Centro::find($id);
        $clientes = Cliente::pluck('nombre_empresa','id_cliente');

        return view('centro.edit', compact('centro', 'clientes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Centro $centro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Centro $centro)
    {
        

        
        request()->validate(Centro::$rules);
        try{
        $centro->update($request->all());

        return redirect()->route('centros.index')
            ->with('success', 'Centro actualizado exitosamente');
        }catch(\Exception $exception){
            return redirect()->route('centros.index')
            ->with('success', 'No se pudo actualizar el centro');
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
        $centro = Centro::find($id)->delete();

        return redirect()->route('centros.index')
            ->with('success', 'Centro eliminado exitosamente');
        }catch(\Exception $exception){
            return redirect()->route('centros.index')
            ->with('success', 'No se pudo eliminar el centro');
        }
    }


}
