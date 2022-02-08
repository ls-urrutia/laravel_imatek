<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\User2;
use Illuminate\Http\Request;


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
        $users2 = User::all();
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
        $user2 = new User();
        $user2->name = $request->get('nombreu');
        $user2->email = $request->get('correo');
        $user2->password = bcrypt($request->get('passw'));

        $user2->save();

        return redirect('/users2')
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

    public function ubicacion($id)
    {
        //
        $user2 = User::find($id);
        return view('user2.ubicacion')->with('user2',$user2);
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
        $user2 = User::find($id);

        $user2->name = $request->get('nombreu');
        $user2->email = $request->get('correo');
        $user2->password = bcrypt($request->get('passw'));


        $user2->save();

        return redirect('/users2')
            ->with('success', 'Usuario actualizado exitosamente');;
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
        $user2 = User::find($id);
        $user2->delete();

        return redirect('/users2')
            ->with('success', 'Usuario eliminado exitosamente');;
    }
}
