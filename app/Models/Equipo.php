<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
/**
 * Class Equipo
 *
 * @property $id_equipo
 * @property $cod_equipo
 * @property $n_factura
 * @property $tipo_equipo
 * @property $modelo
 * @property $ubicacion
 * @property $descripcion
 * @property $estado
 * @property $fecha_compra
 * @property $proveedor
 * @property $id_centro
 * @property $created_at
 * @property $updated_at
 *
 * @property Centro $centro
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */





 class Equipo extends Model
{


    use Loggable;

    static $rules = [
		'cod_equipo' => 'required|unique:equipos',
        'tipo_documento' => 'required',
        'n_documento' => 'required',
		'tipo_equipo' => 'required',
		'modelo' => 'required',
		'descripcion' => 'required',
		'fecha_ingreso' => 'required',
		'proveedor' => 'required',
    ];

    protected $perPage = 20;

    protected $primaryKey = 'id_equipo';



    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_equipo','cod_equipo','tipo_documento','n_documento','tipo_equipo','modelo','ciclos','descripcion','estado','fecha_ingreso','proveedor','id_centro'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function centro()
    {
        return $this->hasOne('App\Models\Centro', 'id_centro', 'id_centro');
    }



}
