<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\User2;
use Illuminate\Http\Request;

use Maatwebsite\Excel\Facades\Excel;


class User2Controller extends Controller
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


        $users2 = User::all()->except(1);


        return view('user2.index')->with('users2',$users2);

    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('user2.create');
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
        /* $request->validate([
            'name'=>'required|string|max:255',
            'name'=>'required',
            ['name.required' => 'El campo no puede estar vacio'],
            'email'=>'required|unique:users',
            'password' => ['required', 'string', 'min:4','confirmed'],


        ]);
         */
        /* request()->validate(User::$rules); */



        request()->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'name' => 'required| string| max:255',
            'email' => 'required|string|email|max:255|unique:users',

        ],


        [
            'name.required'=>'El campo nombre es obligatorio',
            'email.required'=>'El email es requerido',
        ],[
            'email.unique:users'=>'El email no es unico',

        ],[


        ],[
            'password.confirmed'=>'Las contraseñas no coinciden',

        ],[
            'password.min'=>'La contraseña debe ser mayor a 8 caracteres'
        ]




        );

        $user2 = new User();
        $user2->name = $request->get('name');
        $user2->email = $request->get('email');
        $user2->password = bcrypt($request->get('password'));


        $user2->save();


          return redirect()->route('users2.index')
            ->with('success', 'Usuario creado exitosamente.');



    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */




    public function show($id)
    {
        //

        $user2 = User::find($id);

        return view('user2.show', compact('user2'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user2 = User::find($id);
        return view('user2.edit')->with('user2',$user2);
    }

    public function ubicacion(Request $request,$id)
    {


        $usuario = User::find($id);

/*         $user2->name = $request->get('nombreu');
        $user2->email = $request->get('correo');
        $user2->password = bcrypt($request->get('passw')); */
        $usuario->estado= $request->get('estado');


        $usuario->save();

        return redirect('dashboard')
            ->with('success', 'Usuario actualizado exitosamente');;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        try{
            $user2 = User::find($id);

            $user2->name = $request->get('nombreu');
            $user2->email = $request->get('correo');
            $user2->password = bcrypt($request->get('passw'));

            $user2->save();

             return redirect()->route('users2.index')
                ->with('success', 'Usuario actualizado exitosamente');
        }catch(\Exception $exception){
             return redirect()->route('users2.index')
            ->with('error', 'No se pudo actualizar el usuario');
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
            $user2 = User::find($id);
            $user2->delete();

             return redirect()->route('users2.index')
                ->with('success', 'Usuario eliminado exitosamente');
        }catch(\Exception $exception){
            return redirect()->route('users2.index')
            ->with('error', 'No se pudo eliminar el usuario');

        }
    }


}
