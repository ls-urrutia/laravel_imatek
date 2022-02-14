<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Centro;
use App\Models\Mantencione;
use App\Models\Movimiento;
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

/*
        $date = Carbon::parse('2016-09-17 11:00:00');
        $now = Carbon::now(); */
/*
        $date = Carbon::parse('2020-01-19');
        $date2 = '2020-01-14';
        $diff = $date->diffInDays($date2);


       /*  $fechas = DB::select('SELECT fecha_movimiento FROM movimientos where id_equipo=?',[2]); */

/*
        $fechas = DB::table('movimientos')->where([
            ['id_equipo', '=', '1'],
        ])->get(); */

        return view('equipo.index', compact('equipos'));



    }



    public function mostrar() {

        $equipos = Equipo::paginate(); //1 page with 10 products
        $users2 = User::all()->except(1);


        $rawsQs1 = DB::table('equipos')->get()->where('tipo_equipo','=','Lampara')->count();
        $rawsQs2 = DB::table('equipos')->get()->where('tipo_equipo','=','Camara')->count();



        $rawsQs3 = DB::table('equipos')->get()->where('estado','=','En revisión','and','tipo_equipo','=','Camara');
        $rawsQs4 = DB::table('equipos')->get()->where('estado','=','En revisión','and','tipo_equipo','=','Lampara');

        $rawsQs6 = DB::select("SELECT id_equipo
        FROM equipos where estado='En revisión' and tipo_equipo='Camara';");

        $rawsQs5 = DB::select("SELECT estado
        FROM equipos where 'estado'='En revisión' and tipo_equipo='Lampara';");




        $nlamparas = $rawsQs1;
        $ncamaras = $rawsQs2;
        $ncamarasrep = count($rawsQs6);
        $nlamparasrep = count($rawsQs5);

        return view('dashboard',compact('ncamaras','nlamparas','users2','ncamarasrep','nlamparasrep'));
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

        return view('equipo.create', compact('equipo', 'centros'));
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
        $cod_equipo = $request->get('cod_equipo');
        $tipo_documento = $request->get('tipo_documento');
        $n_documento= $request->get('n_documento');
        $modelo = $request->get('modelo');
        $descripcion= $request->get('descripcion');
        $estado = $request->get('estado');
        $fecha_ingreso = $request->get('fecha_ingreso');
        $proveedor = $request->get('proveedor');

            for ($i=0; $i < count($cod_equipo); $i++){
                $data=array(
                'cod_equipo' =>   $cod_equipo[$i],                      //
                'tipo_equipo' =>   $tipo_equipo,
                'tipo_documento'=> $tipo_documento,
                'n_documento' =>  $n_documento,
                'modelo'  =>  $modelo,
                'descripcion' =>  $descripcion,
                'estado' =>    'Operativa' ,
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
            ->with('success', 'Equipo creado satisfactoriamente');
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

        /* $records['mantenciones'] = DB::table('equipos')
                         ->join('mantenciones', 'mantenciones.id_equipo', '=', 'equipos.id_equipo')
                         ->where('equipos.id_equipo', $equipo->id)
                         ->paginate(5); */
       /*  $equipos2= DB::select("SELECT * FROM mantenciones INNER JOIN equipos ON mantenciones.$id=equipos.$id"); */
       /*  $prop =  Equipo::findOrFail($id)->mantenciones(); */
        /* $contar = Equipo::withCount(['mantenciones'])->get(); */

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

                if(count($fechaarray)%2!=0){
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
                $resultado= $resultado/30;
                $dias = $resultado%30;


    
               $resultado = $resultado*0.95;
                intval($resultado);


                /*Muestra las mantenciones de cada equipo */
                $equipos = Mantencione::paginate();
                $mantencionequipo = DB::select('SELECT * FROM mantenciones where id_equipo=?',[$id]);





        return view('equipo.show', compact('equipo','fechaarray','resultado','dias','mantencionequipo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $equipo = Equipo::find($id);
        $centros = Centro::pluck('nombre_centro','id_centro');

        return view('equipo.edit', compact('equipo','centros'));
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
