<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $coupons = Coupon::all();, compact('coupons')
        return view('backend.coupon.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request->all();
        $request->validate([
            'coupon_title' => 'required|string|max:255|unique:coupon_title',
            'coupon_code' => 'required|max:255|unique:coupons',
            'coupon_start_date' => 'required|date',
            'coupon_end_date' => 'required|date|after_or_equal:coupon_start_date',
            'max_spend_customer' => 'required|integer',
            'coupon_quantity' => 'required|integer|max:100',
            'state' => 'required|string',
            'enable_cupon' => 'required|boolean',

        ]);

        try {
            Coupon::insert([
                'user_id' => auth()->user()->id,
                'coupon_title' => $request->coupon_title,
                'coupon_code' => $request->coupon_code,
                'coupon_start_date' => $request->coupon_start_date,
                'coupon_end_date' => $request->coupon_end_date,
                'coupon_limit' => $request->max_spend_customer,
                'coupon_quantity' => $request->coupon_quantity,
                'state' => $request->state,
                'status' => $request->enable_cupon ? 1 : 0,

            ]);
            return redirect()->back()->with('success', 'Coupon created successfully');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', 'Something went wrong', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coupon $coupon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Coupon $coupon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coupon $coupon)
    {
        //
    }
}
