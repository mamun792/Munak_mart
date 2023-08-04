<?php

namespace App\Http\Controllers;

use App\Models\Attributes;
use App\Models\Color;
use Attribute;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    public function add_attribute()
    {
        $attributes = Attributes::all();
        $colors = Color::all();
        return view('backend.attribute.index', compact('attributes','colors'));
    }

    public function create_attribute(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:attributes,name,',
        ]);

        Attributes::insert([
            'name' => $request->name,
            'created_at' => Carbon::now(),
        ]);
        return back()->with('success', 'Category created successfully.');
    }


    public function create_color(Request $request)
    {



        $request->validate([
            'name' => 'required|unique:colors,name,',
            'color_code' => 'required',
        ]);

        Color::insert([
            'name' => $request->name,
            'color_code' => $request->color_code,
            'created_at' => Carbon::now(),
        ]);
        return back();
    }
}
