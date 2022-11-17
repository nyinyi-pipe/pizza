<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function getPerson($id){
        $person = DB::select('CALL sp_getName(".$id.")');
        dd($person);
    }
}
