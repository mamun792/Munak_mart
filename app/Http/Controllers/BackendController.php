<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class BackendController extends Controller
{

    public function dashboard()
    {
        $catoriges = Category::latest()->get();
        return view('backend.dashboard', compact('catoriges'));
    }
}
