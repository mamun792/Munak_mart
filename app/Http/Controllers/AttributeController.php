<?php

namespace App\Http\Controllers;

use App\Models\Attributes;
use Attribute;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    public function add_attribute()
    {
      $attributes=Attributes::all();
        return view('backend.attribute.index',compact('attributes'));
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
}
