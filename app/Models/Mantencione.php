<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Mantencione
 *
 * @property $id_mantencion
 * @property $cod_mantencion
 * @property $n_despacho
 * @property $fecha_mantencion
 * @property $descripcion
 * @property $validacion
 * @property $id_usuario
 * @property $id_equipo
 * @property $created_at
 * @property $updated_at
 *
 * @property Equipo $equipo
 * @property Imagene[] $imagenes
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Mantencione extends Model
{

    static $rules = [
		
		'fecha_mantencion' => 'required',
		'descripcion' => 'required',
		'validacion' => 'required',
        'estado_mantencion' => 'required',
		'id_equipo' => 'required',
    ];

    protected $perPage = 20;

    protected $primaryKey = 'id_mantencion';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_mantencion','fecha_mantencion','descripcion','validacion','estado_mantencion','imagen1','imagen2','imagen3','id_usuario','id_equipo'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function equipo()
    {
        return $this->hasOne('App\Models\Equipo', 'id_equipo', 'id_equipo');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function imagenes()
    {
        return $this->hasMany('App\Models\Imagene', 'id_mantencion', 'id_mantencion');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_usuario');
    }


}
