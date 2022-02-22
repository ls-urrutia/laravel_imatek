<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Mantencione;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;



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

        $equipos = Equipo::where('estado','=','En revisión')->pluck('cod_equipo','id_equipo');

        $equipos2 = DB::select('SELECT id_equipo, cod_equipo FROM equipos where estado="En revisión" ');


        return view('mantencione.create', compact('mantencione', 'equipos','equipos2'));
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
        $mantenciones->diagnostico = $request->get('diagnostico');
        $mantenciones->descripcion = $request->get('descripcion');
        $mantenciones->estado_mantencion= $request->get('estado_mantencion');
        $mantenciones->validacion = 'Pendiente';
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
            $imagename2 = date('YmdHis').'.'.$extension2;
            $image2->move('imagenes/fmantenciones',$imagename2);
            $mantenciones->imagen2 = $imagename2;

        }
        if($request->hasFile('imagen3')){
            $image3= $request->file('imagen3');
            $extension3 = $image3->getClientOriginalExtension();
            $imagename3 = date('YmdH').'.'.$extension3;
            $image3->move('imagenes/fmantenciones/',$imagename3);
            $mantenciones->imagen3 = $imagename3;

        }
        $mantenciones->id_usuario0 =  $request->user()->id;


       /*  $mantenciones->id_usuario =  $request->user()->id; */
        if($request->get('descripcion')!==null&&$request->get('estado_mantencion')!==null){
            $mantenciones->id_usuario =  $request->user()->id;
        }elseif($request->get('descripcion')==null&&$request->get('estado_mantencion')==null){

            $mantenciones->id_usuario =  null;
        }


        
        $mantenciones->id_equipo = $request->get('id_equipo');

        $idequipo = $request->get('id_equipo');

        $ultimafecha = DB::select("SELECT fecha_movimiento
        FROM `movimientos`where id_equipo= ? ORDER BY fecha_movimiento DESC LIMIT 1;",[$idequipo]);



        $request->validate([

            'fecha_mantencion' => 'date|after:'.$ultimafecha[0]->fecha_movimiento
        ]);
        $fechahoy == Carbon::now();

        $request->validate([
             'fecha_mantencion' => 'date|before:'.$fechahoy
        ]);



        $mantenciones->save();


        $equipo = Equipo::find($request->get('id_equipo'));
        if($request->get('estado_mantencion')!==null){
        $equipo->estado = $request->get('estado_mantencion');}
        $equipo->save();





        return redirect()->route('mantenciones.index')
            ->with('success', 'Mantención creada exitosamente.');
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
        try{
        $mantencione = Mantencione::find($id);

        $equipos = Equipo::pluck('cod_equipo','id_equipo');

        return view('mantencione.edit', compact('mantencione','equipos'))->with('success','Mantención actualizada exitosamente');
        }catch(\Exception $exception){
            return view('mantencione.edit', compact('mantencione','equipos'))->with('error','No se pudo editar la mantención');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Mantencione $mantencione
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate(Mantencione::$rules);
        try{
        $mantenciones=Mantencione::find($id);
        $mantenciones->fecha_mantencion = $request->get('fecha_mantencion');
        $mantenciones->descripcion = $request->get('descripcion');
        $mantenciones->validacion= $request->get('validacion');
        $mantenciones->estado_mantencion= $request->get('estado_mantencion');

        if($request->hasFile('imagen1')){
            $destino = 'imagenes/fmantenciones/'.$mantenciones->imagen1;
            if(File::exists($destino)){
                File::delete($destino);
            }
            $image1= $request->file('imagen1');
            $extension = $image1->getClientOriginalExtension();
            $imagename = time().'.'.$extension;
            $image1->move('imagenes/fmantenciones',$imagename);
            $mantenciones->imagen1 = $imagename;

        }
        if($request->hasFile('imagen2')){
            $destino = 'imagenes/fmantenciones/'.$mantenciones->imagen2;
            if(File::exists($destino)){
                File::delete($destino);
            }
            $image2= $request->file('imagen2');
            $extension2 = $image2->getClientOriginalExtension();
            $imagename2 = date('YmdHis').'.'.$extension2;
            $image2->move('imagenes/fmantenciones',$imagename2);
            $mantenciones->imagen2 = $imagename2;

        }
        if($request->hasFile('imagen3')){
            $destino = 'imagenes/fmantenciones/'.$mantenciones->imagen3;
            if(File::exists($destino)){
                File::delete($destino);
            }
            $image3= $request->file('imagen3');
            $extension3 = $image3->getClientOriginalExtension();
            $imagename3 = date('YmdH').'.'.$extension3;
            $image3->move('imagenes/fmantenciones/',$imagename3);
            $mantenciones->imagen3 = $imagename3;

        }
       /*  $mantenciones->id_usuario =  $request->user()->id; */




       
        

        $equipo = Equipo::find($request->get('id_equipo'));
        if($request->get('estado_mantencion')!==null){
        $equipo->estado = $request->get('estado_mantencion');}
        $equipo->save();

        $mantenciones->id_equipo = $request->get('id_equipo');


        $mantenciones->update();







        /* $mantencione->update($request->all());
 */
        return redirect()->route('mantenciones.index')
            ->with('success', 'Se ha actualizado exitosamente');
        }catch(\Exception $exception){
            return redirect()->route('mantenciones.index')
            ->with('success', 'No se pudo actualizar');
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
        $mantencione = Mantencione::find($id);
        $destino = 'imagenes/fmantenciones/'.$mantencione->imagen1;
        if(File::exists($destino)){
            File::delete($destino);
        }
        $mantencione->delete();
       /*  $mantencione = Mantencione::find($id)->delete();
 */
        return redirect()->route('mantenciones.index')
            ->with('success', 'Mantención eliminada exitosamente');
        }catch(\Exception $exception){
            return redirect()->route('mantenciones.index')
            ->with('success', 'No se pudo eliminar la mantención');
        }


    }
}
