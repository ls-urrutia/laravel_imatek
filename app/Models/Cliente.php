<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;





class Cliente extends Model
{
    use HasFactory;
    use Loggable;

    protected $primaryKey = 'id_cliente';

}
