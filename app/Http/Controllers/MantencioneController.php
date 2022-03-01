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



    public function validacion($id, $id_equipo)
    {


        $mantencion = Mantencione::find($id);

        $mantencion->validacion= 'Validado';




        if($mantencion->estado_mantencion== "Reparada"){

        
        $equipo = Equipo::find($id_equipo);

        $equipo->estado_mantencion_equipo = 'Validado';
        $equipo->estado = 'Operativo';
        $equipo->save();
       }elseif($mantencion->estado_mantencion== "Dada de baja"){
        $equipo = Equipo::find($id_equipo);

        $equipo->estado_mantencion_equipo = 'Validado';
        $equipo->estado = 'Dado de baja';
        $equipo->save();
           
       }

        


        $mantencion->save();

        return redirect('dashboard')
            ->with('success', 'Equipo validado exitosamente');;
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
        $mantenciones->fecha_diagnostico = $request->get('fecha_diagnostico');
        $mantenciones->fecha_dado_baja = $request->get('fecha_dado_baja');
        $mantenciones->descripcion_diagnostico = $request->get('descripcion_diagnostico');
        $mantenciones->descripcion_mantencion = $request->get('descripcion_mantencion');
        $mantenciones->descripcion_dado_baja = $request->get('descripcion_dado_baja');
       /*  $mantenciones->validacion = 'Pendiente'; */
        //////////////////////
        //Recepción de componentes
        if($request->get('componente1')!==null){
            $placa = $request->get('componente1');
        }else{
            $placa = "-";
        }
        if($request->get('componente2')!==null){
            $acrilico = $request->get('componente2');
        }else{
            $acrilico = "-";
        }
        if($request->get('componente3')!==null){
            $tapas = $request->get('componente3');
        }else{
            $tapas = "-";
        }
        if($request->get('componente4')!==null){
            $enchufe = $request->get('componente4');
        }else{
            $enchufe = "-";
        }
        if($request->get('componente5')!==null){
            $cable = $request->get('componente5');
        }else{
            $cable = "-";
        }

        $mantenciones->componentes_mantencion = $placa.$acrilico.$tapas.$enchufe.$cable;



        $mantenciones->diagnostico_corriente = $request->get('diagnostico_corriente');

        /* $mantenciones->estado_mantencion= $request->get('estado_mantencion'); */




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



       /*  $mantenciones->id_usuario =  $request->user()->id; */
        if($request->get('Operacion')=='Diagnostico'&&$request->get('fecha_diagnostico')!==null&&$request->get('descripcion_diagnostico')!==null&&$request->get('diagnostico_corriente')!==null){
            $mantenciones->id_usuario0 =  $request->user()->id;
            $mantenciones->estado_mantencion = 'A mantención';

            $equipo = Equipo::find($request->get('id_equipo'));
            $equipo->estado_mantencion_equipo= 'Diagnostico';
            $equipo->save();

        }/* elseif($request->get('descripcion')==null&&$request->get('estado_mantencion')==null){

            $mantenciones->id_usuario =  null;
        } */
        //cambiar..esta automatico
        if($request->get('Operacion')=='Mantención'&&$request->get('fecha_mantencion')!==null&&$request->get('descripcion_mantencion')!==null){
            $mantenciones->id_usuario =  $request->user()->id;
            $mantenciones->estado_mantencion = 'Reparada';

            $equipo = Equipo::find($request->get('id_equipo'));
            $equipo->estado_mantencion_equipo= 'Pendiente';
            $equipo->save();

        }

        if($request->get('Operacion')=='Dar de baja'&&$request->get('fecha_dado_baja')!==null&&$request->get('descripcion_dado_baja')!==null){
            $mantenciones->id_usuario2 =  $request->user()->id;
            $mantenciones->estado_mantencion = 'Dada de baja';

            $equipo = Equipo::find($request->get('id_equipo'));
            $equipo->estado_mantencion_equipo= 'Pendiente';
            $equipo->save();
        }




        $mantenciones->id_equipo = $request->get('id_equipo');

        $idequipo = $request->get('id_equipo');

        $ultimafecha = DB::select("SELECT fecha_movimiento
        FROM `movimientos`where id_equipo= ? ORDER BY fecha_movimiento DESC LIMIT 1;",[$idequipo]);


/*
        $request->validate([

            'fecha_mantencion' => 'date|after:'.$ultimafecha[0]->fecha_movimiento
        ]);
        $fechahoy = Carbon::now();

        $request->validate([
             'fecha_mantencion' => 'date|before:'.$fechahoy
        ]); */



        $mantenciones->save();




        $equipo = Equipo::find($request->get('id_equipo'));
        if($request->get('estado_mantencion')=='Reparada'){
            $equipo->estado = 'Operativo';
        }else if($request->get('estado_mantencion')=='Dada de baja'){
            $equipo->estado = 'Dado de baja';
        }
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
        $cadena = $mantencione->componentes_mantencion;

        $arr = [];

        // Recorremos cada carácter de la cadena
        for($i=0;$i<strlen($cadena);$i++)
        {
            // Mostramos cada uno de los caracteres...
            // con $cadena[0] se muestra el primera caracter, [1], el segundo, etc...

            array_push($arr,$cadena[$i]);
        }
        $array2 =['Placa','Acrilico','Tapas','Enchufe','Cable'];




        return view('mantencione.show', compact('mantencione','arr','array2'));
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


    public function create2($id)
    {



        $equipo = Equipo::find($id);

        $equipos = Equipo::pluck('cod_equipo','id_equipo');

        return view('mantencione.create', compact('equipo','equipos'))->with('success','Mantención actualizada exitosamente');

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

        $mantenciones=Mantencione::find($id);
        $mantenciones->fecha_mantencion = $request->get('fecha_mantencion');
        $mantenciones->fecha_diagnostico = $request->get('fecha_diagnostico');
        $mantenciones->fecha_dado_baja = $request->get('fecha_dado_baja');
        $mantenciones->descripcion_diagnostico = $request->get('descripcion_diagnostico');
        $mantenciones->descripcion_mantencion = $request->get('descripcion_mantencion');
        $mantenciones->descripcion_dado_baja = $request->get('descripcion_dado_baja');

        //Recepción de componentes
        if($request->get('componente1')!==null){
            $placa = $request->get('componente1');
        }else{
            $placa = 0;
        }
        if($request->get('componente2')!==null){
            $acrilico = $request->get('componente2');
        }else{
            $acrilico = 0;
        }
        if($request->get('componente3')!==null){
            $tapas = $request->get('componente3');
        }else{
            $tapas = "0";
        }
        if($request->get('componente4')!==null){
            $enchufe = $request->get('componente4');
        }else{
            $enchufe = "0";
        }
        if($request->get('componente5')!==null){
            $cable = $request->get('componente5');
        }else{
            $cable = "0";
        }

        $mantenciones->componentes_mantencion = $placa.$acrilico.$tapas.$enchufe.$cable;
        $mantenciones->diagnostico_corriente = $request->get('diagnostico_corriente');

       /*  $mantenciones->estado_mantencion= $request->get('estado_mantencion'); */

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

       /* */
       $mantenciones->id_usuario0 =  $request->get('id');
       $mantenciones->id_usuario = $request->get('id');
       $mantenciones->id_usuario2 =  $request->get('id');

       if($request->get('Operacion')=='Diagnostico'&&$request->get('fecha_diagnostico')!==null&&$request->get('descripcion_diagnostico')!==null&&$request->get('corriente_diagnostico')!==null){
        $mantenciones->id_usuario0 =  $request->user()->id;
        $mantenciones->estado_mantencion = 'A mantención';
        }/* elseif($request->get('descripcion')==null&&$request->get('estado_mantencion')==null){

            $mantenciones->id_usuario =  null;
        } */
        //cambiar..esta automatico
        if($request->get('Operacion')=='Mantención'&&$request->get('fecha_mantencion')!==null&&$request->get('descripcion_mantencion')!==null){
            $mantenciones->id_usuario =  $request->user()->id;
            $mantenciones->estado_mantencion = 'Reparada';
        }
        if($request->get('Operacion')=='Dar de baja'&&$request->get('fecha_dado_baja')!==null&&$request->get('descripcion_dado_baja')!==null){
            $mantenciones->id_usuario2 =  $request->user()->id;
            $mantenciones->estado_mantencion = 'Dada de baja';
        }



        $equipo = Equipo::find($request->get('id_equipo'));
        if($request->get('estado_mantencion')!==null){
        $equipo->estado = $request->get('estado_mantencion');}
        $equipo->save();

        $mantenciones->id_equipo = $request->get('id_equipo');


        $mantenciones->update();

        $equipo = Equipo::find($request->get('id_equipo'));
        if($request->get('estado_mantencion')=='Reparada'){
        $equipo->estado = 'Operativo';
        }else if($request->get('estado_mantencion')=='Dada de baja'){
            $equipo->estado = 'Dado de baja';
        }
        $equipo->save();








        /* $mantencione->update($request->all());
 */
        return redirect()->route('mantenciones.index')
            ->with('success', 'Se ha actualizado exitosamente');

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
