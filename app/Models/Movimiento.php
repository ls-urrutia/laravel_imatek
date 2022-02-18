<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

/**
 * Class Movimiento
 *
 * @property $id_movimiento
 * @property $tipo_movimiento
 * @property $fecha_movimiento
 * @property $tipo_documento
 * @property $n_documento
 * @property $id_equipo
 * @property $created_at
 * @property $updated_at
 *
 * @property Equipo $equipo
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Movimiento extends Model
{

    use Loggable;

    static $rules = [
        'id_centro' => 'required',
		'tipo_movimiento' => 'required',
		'fecha_movimiento' => 'required',
		'n_documento' => 'required',
		'id_equipo' => 'required',

    ];





    protected $perPage = 20;

    protected $primaryKey = 'id_movimiento';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_centro','id_movimiento','tipo_movimiento','fecha_movimiento','tipo_documento','n_documento','id_equipo'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function equipo()
    {
        return $this->hasOne('App\Models\Equipo', 'id_equipo', 'id_equipo');
    }


}
