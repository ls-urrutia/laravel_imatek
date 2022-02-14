<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class RoleController extends Controller
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
        //
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $permissions = Permission::all();

        return view('roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name'=> 'required'
        ]);
        try{

        
          
            $role = Role::create(['name' => $request->name]);

            $role->permissions()->sync($request->permissions);

            return redirect('/roles')->with('success', 'El rol se creo con éxito');
        }catch(\Exception $exception){
            return redirect('/roles')
            ->with('error', 'El rol no pudo ser creado');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
        return view('roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
        $permissions = Permission::all();
        return view('roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        //
        try{
        $request->validate([
            'name'=> 'required'
        ]);
        $role->update($request->all());
        $role->permissions()->sync($request->permissions);
        return redirect()->route('roles.index', $role)->with('success', 'El rol se actualizo con exito');
        }catch(\Exception $exception){
            return redirect()->route('roles.index', $role)->with('error', 'No se pudo actualizar el rol');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try{

        
        $rol = Role::find($id);
        $rol->delete();

        return redirect('/roles')
            ->with('success', 'Rol eliminado exitosamente');
        
        }catch(\Exception $exception){
            return redirect('/roles')
            ->with('error', 'No se pudo eliminar el rol');

        }

    }        
}
