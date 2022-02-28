<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Centro;
use App\Models\Mantencione;
use App\Models\Movimiento;
use App\Models\Proveedore;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;


/**
 * Class EquipoController
 * @package App\Http\Controllers
 */
class EquipoController extends Controller
{

    public function byEquipo($tipo_m)
    {
       /*  return Equipo::where('id_equipo', $id)->get(); */


        return DB::select("SELECT m.id_movimiento,m.fecha_movimiento, m.tipo_movimiento, equipos.cod_equipo, m.id_equipo, equipos.estado
        FROM movimientos m
        INNER JOIN equipos ON m.id_equipo = equipos.id_equipo
        INNER JOIN
            (SELECT id_equipo, MAX(fecha_movimiento) AS MaxDateTime
            FROM movimientos
            GROUP BY id_equipo) groupedtt
        ON m.id_equipo = groupedtt.id_equipo
        AND m.fecha_movimiento = groupedtt.MaxDateTime where tipo_movimiento = ? and estado_mantencion_equipo='Validado' ;",[$tipo_m]);
/*
       return DB::select("SELECT id_equipo, cod_equipo FROM `equipos` where id_equipo = ?",[$id_mov]); */
    }


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
        $equipos = Equipo::paginate();


        return view('equipo.index', compact('equipos'));



    }



    public function mostrar() {

        $equipos = Equipo::paginate(); //1 page with 10 products


        $mantenciones = Mantencione::all();


        $rawsQs1 = DB::table('equipos')->get()->where('tipo_equipo','=','Lampara')->count();
        $rawsQs2 = DB::table('equipos')->get()->where('tipo_equipo','=','Camara')->count();


        $rawsQs3 =  DB::select("SELECT estado FROM equipos where estado='En revisión' and tipo_equipo='Camara';" );
        $rawsQs4 =  DB::select("SELECT estado FROM equipos where estado='En revisión' and tipo_equipo='Lampara';" );
        $mantenciones2 = DB::select("SELECT * FROM mantenciones where validacion!='Validado' and estado_mantencion='Reparada' or estado_mantencion='Dada de baja';" );


        $nlamparas = $rawsQs1;
        $ncamaras = $rawsQs2;
        $ncamarasrep = count($rawsQs3);
        $nlamparasrep = count($rawsQs4);

        return view('dashboard',compact('ncamaras','nlamparas','mantenciones','ncamarasrep','nlamparasrep','mantenciones2'));
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

        $proveedores = Proveedore::all();

        return view('equipo.create', compact('equipo', 'centros','proveedores'));
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



        $tipo_equipo = $request->get('tipo_equipo');
        $cod_fabrica = $request->get('cod_fabrica');
        $tipo_documento = $request->get('tipo_documento');
        $n_documento= $request->get('n_documento');
        $modelo = $request->get('modelo');
        $descripcion= $request->get('descripcion');
        $estado = $request->get('estado');
        $fecha_ingreso = $request->get('fecha_ingreso');
        $proveedor = $request->get('proveedor');

            for ($i=0; $i < count($cod_fabrica); $i++){
                $data=array(
                'cod_fabrica' =>   $cod_fabrica[$i],                      //
                'tipo_equipo' =>   $tipo_equipo,
                'tipo_documento'=> $tipo_documento,
                'n_documento' =>  $n_documento,
                'modelo'  =>  $modelo,
                'descripcion' =>  $descripcion,
                'estado' =>    'Operativo',
                'fecha_ingreso' =>    $fecha_ingreso ,
                'proveedor' =>  $proveedor,
                );


                DB::table('equipos')->insert($data);

                $id = DB::getPdo()->lastInsertId();

                $data2= [
                    'id_equipo' => $id,
                    'tipo_movimiento' => 'Compra',
                    'fecha_movimiento' => $fecha_ingreso,
                    'tipo_documento' => $tipo_documento,
                    'n_documento' =>  $n_documento,
                    'id_centro' => 'Oficina'
                    ];
                DB::table('movimientos')->insert($data2);
          }



        return redirect()->route('equipos.index')
            ->with('success', 'Equipo creado exitosamente.');
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

        $fechas = DB::select('SELECT tipo_movimiento, fecha_movimiento, id_centro FROM movimientos where id_equipo=?',[$id]);


            $bool = 0;
            $fechaarray = [];
            /*ordena el array */
                foreach ($fechas as $fech) {
                    if($fech->tipo_movimiento == "Compra" ){



                    }elseif($fech->tipo_movimiento == "Salida" && $bool == 0 ){
                        array_push($fechaarray,$fech->fecha_movimiento);

                        $bool=1;
                    }
                    elseif($fech->tipo_movimiento == "Entrada" && $bool == 1 ){

                        array_push($fechaarray,$fech->fecha_movimiento);
                        $bool=0;
                    }
                    else{
                        "error";
                    }

                }
                /**agrega la fecha de hoy en caso de estar afuera*/
                $dateh = Carbon::now();
                $dateh = $dateh->format('Y-m-d');


                if(count($fechaarray)%2!=0 && end($fechaarray)!=$dateh){
                    array_push($fechaarray,$dateh);
                }


                /*diferencia entre fechas*/
                $i= 0;
                $resultado = 0;
                $suma= 0;
                $entrada = null;
                foreach($fechaarray as $fechan){
                    $salida= $fechan;
                    $i+=1;
                    if($i%2==0)
                    {
                        $suma = \Carbon\Carbon::parse($entrada)->diffInDays( \Carbon\Carbon::parse($salida));
                        $resultado  += $suma;
                    }
                    $entrada = $fechan;

                }


                /*conversión diferencia de fechas en meses y dias*/
                /* $resultado = $resultado+1;


                $resultado1= $resultado/30;
                $dias = round($resultado%30); */



                $resultado = $resultado*0.95;


                $mes = round($resultado/30);

                $resultado=$resultado%30;


                /*Muestra las mantenciones de cada equipo */
                $equipos = Mantencione::paginate();
                $mantencionequipo = DB::select('SELECT * FROM mantenciones where id_equipo=?',[$id]);
                 /*Muestra las movimientos de cada equipo */
                $movimientoequipo = DB::select('SELECT * FROM movimientos where id_equipo=?',[$id]);



         ///mess falta//

        return view('equipo.show', compact('equipo','fechaarray','resultado','mantencionequipo','movimientoequipo','mes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $proveedores = Proveedore::all();
        $equipo = Equipo::find($id);
        $centros = Centro::pluck('nombre_centro','id_centro');

        return view('equipo.edit', compact('equipo','centros','proveedores'));
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
        /* request()->validate(Equipo::$rules); */

        $equipo->update($request->all());

        return redirect()->route('equipos.index')
            ->with('success', 'Equipo actualizado satisfactoriamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        try{


        $equipo = Equipo::find($id)->delete();
        return redirect()->route('equipos.index')
        ->with('success', 'Equipo eliminado satisfactoriamente');

        } catch(\Exception $exception){
            return redirect()->route('equipos.index')
            ->with('error', 'El equipo no se puede eliminar!');

        }


    }


}
