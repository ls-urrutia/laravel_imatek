<?php

namespace App\Http\Controllers;
use App\Models\Equipo;
use Illuminate\Support\Facades\DB;
use App\Models\Mantencione;

use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index(){
        return view('dash.index');
    }


}
