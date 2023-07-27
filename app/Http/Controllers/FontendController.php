<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Featured_photo;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class FontendController extends Controller
{
    public function index()
    {

        $prpoducts = Product::latest()->get();
        $categories = Category::latest()->get();

        return view('index', compact('prpoducts', 'categories'));
    }


    public function product_detalis($id)
    {


        try {
            $featured_photos  = Featured_photo::where('product_id', $id)->get();
            $poducts = Product::find($id);
            $category_id = $poducts->category_id;
            $related_products = Product::where('category_id', $category_id)->where('id', '!=', $id)->get();
            $vendors = User::find($poducts->vendor_id);
            return view('product_dealties', compact('poducts', 'featured_photos', 'vendors','related_products'));
        } catch (\Throwable $th) {
            return view('product_dealties')->with('error', 'Product not found!');
        }
    }

public function about(){
return view('about');
}
}
