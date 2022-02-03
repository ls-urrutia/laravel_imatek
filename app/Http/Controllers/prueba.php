
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orders;
use App\Items;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->all();
        $lastid=Orders::create($data)->id;
        if(count($request->product_name) > 0)
        {
        foreach($request->product_name as $item=>$v){
            $data2=array(
                'orders_id'=>$lastid,
                'product_name'=>$request->product_name[$item],
                'brand'=>$request->brand[$item],
                'quantity'=>$request->quantity[$item],
                'budget'=>$request->budget[$item],
                'amount'=>$request->amount[$item]
            );
        Items::insert($data2);
      }
        }
        return redirect()->back()->with('success','data insert successfully');
    }


}

for ($count = 0; $count<count($clase); $count++){
    $horario = array(
        'clase_nombre' => $clase[$count],
         'fecha'=>$fecha_clase[$count],
         'hora'=>$hora_clase[$count],
         'id_bloque'=>$duracion_clase[$count],
         'id_user'=>$profesor[$count]
        );
    $insertHorario[] = $horario;
}
$horarioSync->horario()->sync($id_curso);
Horario::insert($insertHorario);
