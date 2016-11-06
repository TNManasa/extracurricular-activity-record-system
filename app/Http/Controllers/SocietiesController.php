<?php

namespace App\Http\Controllers;

use App\Society;
use Illuminate\Http\Request;

class SocietiesController extends Controller
{
    public function getIndex()
    {
        $all_societies = Society::all();
        return view('societies.index', [
            'all_societies' => $all_societies
        ]);
    }
}
