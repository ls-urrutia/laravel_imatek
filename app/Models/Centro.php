<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Centro
 *
 * @property $id_centro
 * @property $nombre_centro
 * @property $telefono_empresa
 * @property $descripcion
 * @property $id_cliente
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Centro extends Model
{
    
    static $rules = [
		'id_centro' => 'required',
		'nombre_centro' => 'required',
		'telefono_empresa' => 'required',
		'descripcion' => 'required',
		'id_cliente' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_centro','nombre_centro','telefono_empresa','descripcion','id_cliente'];



}
