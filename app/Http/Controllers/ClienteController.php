<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
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
        $clientes = Cliente::all();
        $data = array("lista_clientes" => $clientes);
        return view('cliente.index')->with('clientes',$clientes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $clientes = new Cliente();
        $clientes->nombre_empresa = $request->get('nombre_empresa');
        $clientes->rut_empresa = $request->get('rut_empresa');
        $clientes->descripcion = $request->get('descripcion');
        $clientes->save();


        return redirect()->route('clientes.index')
            ->with('success', 'Cliente creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  id_cliente
     * @return \Illuminate\Http\Response
     */
    public function show($id_cliente)
    {
        $cliente = Cliente::find($id_cliente);

        return view('cliente.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  id_cliente
     * @return \Illuminate\Http\Response
     */
    public function edit($id_cliente)
    {
        $cliente = cliente::find($id_cliente);
        return view('cliente.edit')->with('cliente',$cliente);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  id_cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_cliente)
    {
        try{
        $cliente = cliente::find($id_cliente);

        $cliente->nombre_empresa = $request->get('nombre_empresa');
        $cliente->rut_empresa = $request->get('rut_empresa');
        $cliente->descripcion = $request->get('descripcion');

        $cliente->save();

        return redirect('/clientes');
        }catch(\Exception $exception){
            return redirect('/clientes')->with('error','No se pudo actualizar al cliente');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id_cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_cliente)
    {
        try{
        $cliente = Cliente::find($id_cliente);
        $cliente->delete();

        return redirect('/clientes')->with('success','Cliente eliminado satisfactoriamente');
        }catch(\Exception $exception){
            return redirect('/clientes')->with('error','No se pudo eliminar al cliente');
        }
    }
}
