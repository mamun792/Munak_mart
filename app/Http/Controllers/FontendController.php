<?php

namespace App\Http\Controllers;
use App\Services\ProductService;
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
use App\Models\Invoice;
use App\Models\invoice_Deatiles;
use App\Models\Wishlist;
use App\Models\Treand;
use Carbon\Carbon;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Str;
use PDF;
use Illuminate\Database\Eloquent\ModelNotFoundException;



class FontendController extends Controller
{
    public function index(ProductService $productService)
   
    {
        try{
            $tranding = $productService->getAllTreands();
            $prpoducts = $productService->getAllProducts();
            $categories = $productService->getAllCategories();

            return view('index', compact('tranding', 'prpoducts', 'categories'));
        } catch (\Throwable $th) {
            return view('index')->with('error', 'Product not found!');
            
        }
       
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

            $review = Review::latest()->get();
           


            return view('product_dealties', compact('poducts', 'featured_photos', 'vendors', 'related_products', 'product_size', 'review'));
        } catch (\Throwable $th) {
            return view('product_dealties')->with('error', 'Product not found!');
        }catch (ModelNotFoundException $e) {
            return view('product_dealties')->with('error', 'Product not found!');
        }
    }

    public function about()
    {
        return view('about');
    }

    public function wishlist($id)
    {
        try{
            $count = Wishlist::where([
                'user_id' => Auth::id(),
                'product_id' => $id,
            ])->exists();
            if ($count) {
                return back()->with('error', 'Product already added to wishlist');
            } else {
                Wishlist::insert([
                    'user_id' => Auth::id(),
                    'product_id' => $id,
                    'created_at' => Carbon::now(),
                ]);
                return back()->with('success', 'Product added to wishlist');
            }
        } catch (\Throwable $th) {
            return back()->with('error', 'Product not found!');
        }catch (ModelNotFoundException $e) {
            return back()->with('error', 'Product not found!');
        }
        
    }

    public function wishlist_show()
    {
        $favorit = Wishlist::where('user_id', Auth::user()->id)->with('wishlists')->get();
        return view('wishlist', compact('favorit'));
    }

    public function wishlist_delete($id)
    {
        try{
            Wishlist::find($id)->delete();
            return back()->with('success', 'Product removed from wishlist');
        } catch (\Throwable $th) {
            return back()->with('error', 'Product not found!');
        }catch (ModelNotFoundException $e) {
            return back()->with('error', 'Product not found!');
        }
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
           
            $size_id = $request->size;
            $product_id = $request->product_id;
            $inventories = Inventory::where([
                'size_name' => $size_id,
                'product_id' => $product_id,
            ])->get();
            $color_list = '';

            foreach ($inventories as $inventory) {
                $color_list .= "<option value='" . $inventory->color->id . "'>" . $inventory->color->name . " (Stack " . $inventory->quantity . ")" . "</option>";
            }
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
        return $color_list;
    }

    public function add_to_card(Request $request)
    {
            
        try{
            $requestedQuantity = $request->quantity;
        $inventory = Inventory::where([
            'product_id' => $request->product_id,
            'size_name' => $request->size_id,
            'color_name' => $request->color_id,
        ])->first();

        if (!$inventory || $inventory->quantity < $requestedQuantity) {
            return response()->json(['error' => 'Not Available'], 400);
        }

        $cartCondition = [
            'user_id' => Auth::id(),
            'product_id' => $request->product_id,
            'size_id' => $request->size_id,
            'color_id' => $request->color_id,
        ];

        $existingCartItem = Cart::where($cartCondition)->first();

        if ($existingCartItem) {
            $existingCartItem->increment('quantity', $requestedQuantity);
        } else {
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $request->product_id,
                'size_id' => $request->size_id,
                'color_id' => $request->color_id,
                'quantity' => $requestedQuantity,
                'created_at' => Carbon::now(),
            ]);
        }

        return response()->json(['message' => 'Added to cart successfully']);
    } catch (\Exception $exception) {
        \Log::error('Error adding to cart: ' . $exception->getMessage());

        return response()->json(['error' => 'An error occurred while adding to the cart'], 500);
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
        try{
            Cart::find($id)->delete();
            return back()->with('success', 'Product removed from cart');
        } catch (\Throwable $th) {
            return back()->with('error', 'Product not found!');
        }
    }
    public function card_update(Request $request, $id)
    {
        try {

            $quantities = $request->input('quantity');

            Cart::where('id', $id)->update(['quantity' => $quantities]);
            echo "success";
        } catch (\Throwable $th) {

            $$th->getMessage();
        }
    }

    public function shop($id)
    {

       try{
        if ($id == 'all') {
            
            $poducts = Product::latest()->with('category')->paginate(12);
        } else {
            $poducts = Product::where('category_id', $id)->with('category')->get();
        }
        return view('shop', compact('poducts'));
       } catch (\Throwable $th) {
           return view('shop')->with('error', 'Product not found!');
       }



       
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

       try{
        $check_link = strpos(url()->previous(), "card");
        if ($check_link || strpos(url()->previous(), "Checkout")) {

            $address = CustomerAddress::where('customer_id', Auth::id())->get();
            $cart = Cart::where('user_id', Auth::id())->get();

            return view('checkout', compact('address', 'cart'));
        } else {
            abort(404);
        }
       }catch (\Throwable $th) {
        return view('checkout')->with('error', 'Product not found!');
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

    public function checkout_final(Request $request)
    {


        $request->validate([
            'address_id' => 'required',
            'delivery_option' => 'required',
            'payment_option' => 'required',
        ]);


        try {
            $invoice_number = Carbon::now()->format('Y') . '-' . Carbon::now()->format('m') . '-' . Str::random(5);
            $cupon_name =  session('s_cupon_name');

            $sub_toatal = session('s_sub_total');

            $disscount = session('s_discount');

            $total_disscount = session('s_total_discount');
            $total_ammount = session('s_total_ammount');

            if ($request->delivery_option == 1) {
                $delivery_charge = 60;
            } else {
                $delivery_charge = 70;
            }

            if ($request->payment_option == "cod") {
                $invoice_id = Invoice::insertGetId([
                    'invoice_no' => $invoice_number,
                    'user_id' => Auth::id(),
                    'cupon_name' => $cupon_name,
                    'sub_total' => $sub_toatal,
                    'discount' => $disscount,
                    'total_discount' => $total_disscount,
                    'total_amount' =>  $total_ammount,
                    'address_id' => $request->address_id,
                    'delivery_option' => $delivery_charge,
                    'payment_option' => $request->payment_option,
                    'created_at' => Carbon::now(),

                ]);

                //cupondercement
                if ($cupon_name != null) {
                    Coupon::where('coupon_title', $cupon_name)->decrement('coupon_limit');
                }
                //cartDeatiles
                $cart = Cart::where('user_id', Auth::id())->get();
                foreach ($cart as $card) {
                    invoice_Deatiles::insert([
                        'invoice_id' => $invoice_id,
                        'user_id' => $card->user_id,
                        'product_id' => $card->product_id,
                        'quantity' => $card->quantity,
                        'color_id' => $card->color_id,
                        'size_id' => $card->size_id,
                        'pursing_price' => Product::find($card->product_id)->discount_price,
                        'created_at' => Carbon::now(),

                    ]);

                    //dercement producti nventory

                    Inventory::where([
                        'product_id' => $card->product_id,
                        'color_name' => $card->color_id,
                        'size_name' => $card->size_id,
                    ])->decrement('quantity', $card->quantity);
                }
                //cart delete
                Cart::where('user_id', Auth::id())->delete();

                //session delete
                session()->forget(['s_sub_total', 's_discount', 's_total_discount', 's_total_ammount', 's_cupon_name']);

                return redirect('/view/card')->with('success', 'Order Placed ');
            } else {


                if ($request->delivery_option == 1) {
                    $delivery_charge = 60;
                } else {
                    $delivery_charge = 70;
                }

                $invoice_id = Invoice::insertGetId([
                    'invoice_no' => $invoice_number,
                    'user_id' => Auth::id(),
                    'cupon_name' => $cupon_name,
                    'sub_total' => $sub_toatal,
                    'discount' => $disscount,
                    'total_discount' => $total_disscount,
                    'total_amount' =>  $total_ammount,
                    'address_id' => $request->address_id,
                    'delivery_option' => $delivery_charge,
                    'payment_option' => $request->payment_option,
                    'created_at' => Carbon::now(),

                ]);



                if ($cupon_name != null) {
                    Coupon::where('coupon_title', $cupon_name)->decrement('coupon_limit');
                }
                //cartDeatiles
                $cart = Cart::where('user_id', Auth::id())->get();
                foreach ($cart as $card) {
                    invoice_Deatiles::insert([
                        'invoice_id' => $invoice_id,
                        'user_id' => $card->user_id,
                        'product_id' => $card->product_id,
                        'quantity' => $card->quantity,
                        'color_id' => $card->color_id,
                        'size_id' => $card->size_id,
                        'pursing_price' => Product::find($card->product_id)->discount_price,
                        'created_at' => Carbon::now(),

                    ]);

                    //dercement producti nventory

                    Inventory::where([
                        'product_id' => $card->product_id,
                        'color_name' => $card->color_id,
                        'size_name' => $card->size_id,
                    ])->decrement('quantity', $card->quantity);
                }
                //cart delete
                Cart::where('user_id', Auth::id())->delete();
                session()->put('invoice_id', $invoice_id);
                return redirect('/payment');
            }


            // return back()->with('success', 'Order Placed');
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function invoice_details($id)
    {

        try {
            $invoice = Invoice::with('invoiceDownload')->find($id);
            $adderss = CustomerAddress::where('customer_id', $invoice->user_id)->first();
            // $invoice_details = invoice_Deatiles::where('invoice_id', $id)->get();

            $pdf = \PDF::loadView('invoice', compact('invoice',  'adderss'));
            return $pdf->download('invoice.pdf');
        } catch (\Throwable $th) {
            $th->getMessage();
        }
    }
}
