<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    use HasFactory;

    protected $fillable=['id_equipo','tipo_movimiento','fecha_movimiento','tipo_documento','n_documento'];
}
