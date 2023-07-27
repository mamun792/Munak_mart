<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->get();

        return view('backend.catoriges.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.catoriges.category_ceate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate(
            [
                'c_name' => 'required|max:50|unique:categories,name',
                'icon' => 'nullable|string',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'description' => 'required|max:150',
            ],
            [
                'c_name' => "Category Name is Required",

            ],
        );
        try {

            if ($request->hasFile('photo')) {
                $photo = $request->file('photo');
                $filename = time() . '.' . $photo->getClientOriginalExtension();
                $path = public_path('image/category/' . $filename);


                Image::make($photo)->fit(400, 400)->save($path);
            } else {
                $filename = null;
            }

            Category::insert([
                'name' => $request->c_name,
                'slug' => Str::slug($request->c_name),
                'photo' => $filename,
                'description' => $request->description,
                'created_at' => Carbon::now(),
            ]);
            return back()->with('success', 'Category created successfully.');
        } catch (\Throwable $th) {

            return back()->with('error', 'Error creating category: ' . $th->getMessage());
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::find($id);

        if ($category) {
            return view('backend.catoriges.category_edit', compact('category'));
        } else {
            abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $category =  Category::find($id);

        $request->validate([
            'c_name' => 'required|max:50|',

            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'required|max:150',
        ]);


        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $filename = time() . '.' . $photo->getClientOriginalExtension();


            if ($category->photo) {
                $previousPhotoPath = public_path('image/category/' . $category->photo);
                if (file_exists($previousPhotoPath)) {
                    unlink($previousPhotoPath);
                }
            }

            $path = public_path('image/category/' . $filename);
            $photo->move(public_path('image/category'), $filename);


            $category->photo = $filename;
        }

        $category->save();


        $category->update([
            'name' => $request->c_name,
            'description' => $request->description,
        ]);
        return back()->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {

        $category = Category::find($id);
        $category->delete();
        return back()->with('success', 'Category deleted successfully');
    }
}
