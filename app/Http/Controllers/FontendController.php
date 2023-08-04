<?php

namespace App\Http\Controllers;

use App\Models\Attributes;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Color;
use App\Models\Featured_photo;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\User;
use App\Models\Coupon;
use App\Models\CustomerAddress;
use App\Models\Wishlist;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
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


            $product_size = Inventory::where('product_id', $id)->with('size')->get();

            return view('product_dealties', compact('poducts', 'featured_photos', 'vendors', 'related_products', 'product_size'));
        } catch (\Throwable $th) {
            return view('product_dealties')->with('error', 'Product not found!');
        }
    }

    public function about()
    {
        return view('about');
    }

    public function wishlist($id)
    {

        $user_id = auth()->user()->id;
        Wishlist::insert([
            'user_id' => $user_id,
            'product_id' => $id,
            'created_at' => Carbon::now(),
        ]);

        return back();
    }

    public function wishlist_show()
    {
        $favorit = Wishlist::with('wishlists')->get();
        return view('wishlist', compact('favorit'));
    }

    public function wishlist_delete($id)
    {
        Wishlist::find($id)->delete();
        return back();
    }

    public function custom_login(Request $request)
    {
        try {
            $user_info = $request->only('email', 'password');
            if (Auth::attempt($user_info)) {
                return back();
            } else {
                return redirect()->back()->with('error', 'Invalid credentials');
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Invalid credentials' . $th->getMessage());
        }
    }

    public function  get_color_list(Request $request)
    {

        try {
            $color_list = '';
            $size_id = $request->size;
            $product_id = $request->product_id;
            $inventories = Inventory::where([
                'size_name' => $size_id,
                'product_id' => $product_id,
            ])->get();
            // <option value="">S</option>
            foreach ($inventories as   $inventory) {

                $color_list .= "<option value='" . $inventory->color->id . "'>" . $inventory->color->name . "(Stack" . " " . $inventory->quantity . ")" . "</option>";
            }
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
        return $color_list;
    }

    public function add_to_card(Request $request)
    {


        $reat_stock = Inventory::where([
            'product_id' => $request->product_id,
            'size_name' => $request->size_id,
            'color_name' => $request->color_id,
        ])->first()->quantity;

        if ($reat_stock < $request->quantity) {
            echo "Not Avabile";
        } else {
            // echo "very good";

            $count_product =  Cart::where([
                'user_id' => Auth::id(),
                'product_id' => $request->product_id,
                'size_id' => $request->size_id,
                'color_id' => $request->color_id,

            ])->exists();
            if ($count_product) {

                Cart::where([
                    'user_id' => Auth::id(),
                    'product_id' => $request->product_id,
                    'size_id' => $request->size_id,
                    'color_id' => $request->color_id,
                ])->increment('quantity', $request->quantity);
            } else {
                Cart::insert([
                    'user_id' => Auth::id(),
                    'product_id' => $request->product_id,
                    'size_id' => $request->size_id,
                    'color_id' => $request->color_id,
                    'quantity' => $request->quantity,
                    'created_at' => Carbon::now(),

                ]);
            }



            echo "success";
        }
    }
    public function view_card(Request $request)
    {

        if (isset($request->coupon)) {
            // $discount=10;
            $copon_name = $request->coupon;
            $validate_all = Coupon::where('coupon_title', $copon_name)->first();
            $validate_name = Coupon::where('coupon_title', $copon_name)->exists();


            if ($validate_name) {
                $valid_date =  $validate_all->coupon_end_date;
                if (Carbon::parse($validate_all->coupon_start_date) > Carbon::parse($valid_date)) {
                    if ($validate_all->coupon_limit == 0) {
                        $discount = 0;
                        return redirect('/view/card')->with('error', 'Coupon limit over');
                    } else {
                        if ($validate_all->status == 1) {

                            if ($validate_all->state == "fixed") {
                                $discounts = $validate_all->coupon_quantity;
                                $copon = $copon_name;
                                return view('view_cart', compact('discounts', 'copon'));
                            } else {
                                $discount = $validate_all->coupon_quantity;
                                $copon = $copon_name;
                                return view('view_cart', compact('discount', 'copon'));
                            }
                        } else {
                            return "not active";
                        }
                    }
                } else {
                    $discount = 0;

                    return redirect('/view/card')->with('error', 'Coupon Expired');
                }
            } else {
                $discount = 0;

                return redirect('/view/card')->with('error', 'Invalid Coupon');
            }
        } else {
            $discount = 0;
            $copon = '';
            return view('view_cart', compact('discount', 'copon'));
        }
    }

    public function cart_delete($id)
    {
        Cart::find($id)->delete();

        return back();
    }
    public function card_update(Request $request, $id)
    {
        try {

            $quantities = $request->input('quantity');

            Cart::where('id', $id)->update(['quantity' => $quantities]);
            echo "success";
        } catch (\Throwable $th) {

            echo $th->getMessage();
        }
    }

    public function shop($id)
    {

        if ($id == 'all') {
            $poducts = Product::latest()->with('category')->get();
        } else {
            $poducts = Product::where('category_id', $id)->with('category')->get();
        }



        return view('shop', compact('poducts'));
    }


    public function product_fillter(Request $request)
    {
        $category = $request->input('category', []);
        $products = Product::whereIn('category_id', $category)->get();
        return response()->json($products);
    }


    public function cupon_apply(Request $request)
    {

        $request->validate([
            'coupon' => 'required',

        ]);

        $check_cupon = Coupon::where('coupon_title', $request->coupon)->exists();

        if ($check_cupon) {

            die();
            // Coupon::where('cupon_name',$request->cupon_name)->first()->cupon_discount;
        }
    }



    public function checkout()
    {

        $check_link = strpos(url()->previous(), "card");
        if ($check_link || strpos(url()->previous(), "Checkout")) {
            $address = CustomerAddress::where('customer_id', Auth::id())->get();
            $cart = Cart::where('user_id', Auth::id())->get();
            return view('checkout', compact('address', 'cart'));
        } else {
            abort(404);
        }
    }

    public function costomer_adderss_add(Request $request)
    {

        $request->validate([

            'customerLabel' => 'required',
            'customerName' => 'required|string|max:100',
            'address' => 'required|string|max:255',
            'phoneNumber' => 'required|string|max:20',
            'zipCode' => 'required|string|max:10',
        ]);
        try {

            CustomerAddress::insert([
                'customer_id' => Auth::id(),
                'Label' => $request->customerLabel,
                'CustomerName' => $request->customerName,
                'CustomerAddress' => $request->address,
                'PhoneNumber' => $request->phoneNumber,
                'ZipCode' => $request->zipCode,
                'created_at' => Carbon::now(),
            ]);
        } catch (\Throwable $th) {

            return $th->getMessage();
        }
        return back()->with('success', 'Address Added');
    }
}
