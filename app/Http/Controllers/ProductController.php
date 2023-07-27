<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Featured_photo;
use App\Models\Product;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::where('vendor_id', auth()->user()->id)->latest()->get();
        return view('backend.product.index', compact('product'));
    }
    public function product_show()
    {
        $categories = Category::latest()->get();
        return view('backend.product.product_show', compact('categories'));
    }

    public function product_add(Request $request)
    {

        $request->validate([
            'product_name' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'short_productDescription' => 'required|string',
            'long_productDescription' => 'required|string',
            'pursing_price' => 'required|numeric',
            'regular_price' => 'required|numeric',


            'p_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'thumbnail_image.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        try {


            if ($request->hasFile('p_image')) {
                $file = $request->file('p_image');
                $file_name = time() . "." . $file->getClientOriginalExtension();
                $file_destanition = public_path('image/products/' . $file_name);
                Image::make($file)->fit(192, 160)->save($file_destanition);
            }

            if ($request->discount > 0) {
                $diccound = $request->discount;
                $discount_price = $request->regular_price - ($request->discount * $request->regular_price / 100);
            } else {
                $diccound = 0;

                $discount_price = $request->regular_price;
            }


            $product_id = Product::insertGetId([
                'product_name' => $request->product_name,
                'category_id' => $request->category_id,
                'vendor_id' => auth()->user()->id,
                'short_productDescription' => $request->short_productDescription,
                'long_productDescription' => $request->long_productDescription,
                'product_additional_information' => $request->product_additional_information,
                'care_of_Instaction' => $request->care_of_Instaction,
                'pursing_price' => $request->pursing_price,
                'regular_price' => $request->regular_price,
                'discount_price' => $discount_price,
                'discount' => $diccound,
                'p_image' => $file_name,

                'created_at' => Carbon::now(),
            ]);

            $request->thumbnail_image;

            foreach ($request->thumbnail_image as $multiple_image) {

                $file_name =   $product_id . time() . "." . $multiple_image->getClientOriginalExtension();
                $file_destanition = public_path('image/product_features_photo/' . $file_name);
                Image::make($multiple_image)->fit(750, 750)->save($file_destanition);

                Featured_photo::insert([
                    'product_id' => $product_id,
                    'thumbnail_image' => $file_name,
                    'created_at' => Carbon::now(),
                ]);
            }
            return back()->with('success', 'Product added successfully.');
        } catch (\Throwable $th) {
            $error = "Error adding Product.." . $th->getMessage();
            file_put_contents("error_log.txt", $error, FILE_APPEND);
        }


        return back()->with('error', 'An error occurred while adding the product. Please try again later.');
    }
}
