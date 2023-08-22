<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Treands extends Controller
{
public function trending_product (){
    return view('backend.treand.index');
}

}
