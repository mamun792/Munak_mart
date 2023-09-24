<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReviewRequest;
use App\Models\Category;
use App\Models\CustomerAddress;
use App\Models\Invoice;
use App\Models\invoice_Deatiles;
use App\Models\Review;
use App\Models\User;
use App\Models\Wishlist;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class CustomerProfileController extends Controller
{
    public function index()
    {

        $oder = Invoice::where('user_id', Auth::id())->count();

        $panding_oder = Invoice::where('user_id', Auth::id())
            ->where('payment_status', 'pending')->count();

        $whithlist = Wishlist::where('user_id', Auth::user()->id)->count();
        $favorit = $favorit = Wishlist::where('user_id', Auth::user()->id)->with('wishlists')->get();
        $invoice_deatiles = invoice::where('user_id', Auth::user()->id)->latest()->get();

        $adderss = CustomerAddress::where('customer_id', Auth::user()->id)->get();
        return view('customer.index', compact('oder', 'adderss', 'panding_oder', 'whithlist', 'favorit', 'invoice_deatiles'));
    }

    public function  address_edit($id)
    {
        $adderss = CustomerAddress::find($id);
        return response()->json($adderss);
    }

    public function  address_update(Request $request, $id)
    {

        //update address
        CustomerAddress::find($id)->update([
            'Label' => $request->Label,
            'CustomerName' => $request->CustomerName,
            'CustomerAddress' => $request->CustomerAddress,
            'ZipCode' => $request->ZipCode,
            'PhoneNumber' => $request->PhoneNumber,
            'update_at' => now()
        ]);
        return redirect()->back()->with('success', 'Address Update Successfully');
    }
    public function customer_review($id)
    {
        $product_id = $id;
        return view('customer.customer_review', compact('product_id'));
    }
    public function customer_review_add(StoreReviewRequest $request)
    {
        // return $request->product_id;

        Review::insert([
            'user_id' => auth()->user()->id,
            'product_id' => $request->input('product_id'),
            'rating' => $request->input('rating'),
            'comment' => $request->input('comment'),
            'created_at' => Carbon::now(),
        ]);
        return redirect()->back()->with('success', 'Review Add Successfully');
    }
}
