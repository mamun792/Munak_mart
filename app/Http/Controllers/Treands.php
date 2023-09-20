<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Treand;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;


class Treands extends Controller
{
    public function trending_product()
    {
        $trending=Treand::all();
        return view('backend.treand.index',compact('trending'));
    }

    public function trending_product_add(Request $request)
    {
        $request->validate([
            'desc' => 'required|max:255',
            't_photo' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);



        try {
            if ($request->hasFile('t_photo')) {
                $file_destion = $request->file('t_photo');
                $filename = time() . '.' . $file_destion->getClientOriginalExtension();
                $path = public_path('image/trends/' . $filename);
                Image::make($file_destion)->resize(1155, 670)->save($path);
            }

           Treand::insert([
                'user_id' => auth()->user()->id,
                'desc' => $request->desc,
                'image' => $filename,
                'created_at' =>Carbon::now(),
            ]);


            return redirect()->back()->with('success', 'Trend Added Successfully');
        } catch (\Throwable $th) {

            return redirect()->back()->with('error', 'Trend Added Faild', $th->getMessage());
        }
    }
}
