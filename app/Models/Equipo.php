<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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


    static $rules = [
		'cod_equipo' => 'required',
		'n_factura' => 'required',
		'tipo_equipo' => 'required',
		'modelo' => 'required',
		'ubicacion' => 'required',
		'descripcion' => 'required',
		'estado' => 'required',
		'fecha_compra' => 'required',
		'proveedor' => 'required',
		'id_centro' => 'required',
    ];

    protected $perPage = 20;

    protected $primaryKey = 'id_equipo';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_equipo','cod_equipo','n_factura','tipo_equipo','modelo','ubicacion','descripcion','estado','fecha_compra','proveedor','id_centro'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function centro()
    {
        return $this->hasOne('App\Models\Centro', 'id_centro', 'id_centro');
    }



}
