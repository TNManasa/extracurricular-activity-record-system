<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class supervisorsController extends Controller
{
    //
    public function supervisorView(){
        return view('supervisor');
    }
}
