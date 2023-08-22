<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Stripe\Stripe;
use Stripe\Charge;
use Session;
use Carbon\Carbon;
use App\Models\Invoice;
use App\Models\invoice_Deatiles;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\Inventory;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PaymentController extends Controller
{
    public function index()
    {
        return view('payment.index');
    }

    public function handlePayment(Request $request)
    {



        Stripe::setApiKey(config('services.stripe.secret'));

        try {


            $invoice_number = session('invoice_id');
            $total_ammount = session('s_total_ammount');


            Invoice::find($invoice_number)->update([
                'payment_status' => 'paid',
                'payment_option' => 'stripe',
                'created_at' => carbon::now(),
            ]);

            $charge = \Stripe\Charge::create([
                'amount' => $total_ammount * 100,
                'currency' => 'usd',
                'source' => $request->stripeToken,
                'description' => 'Payment for Invoice: ' . $invoice_number,
            ]);




            return redirect()->route('view.card')->with('success', 'Order Placed  Payment Successful');
        } catch (\Exception $e) {

            return redirect('/payment')->with('error', $e->getMessage());
        }
    }

    public function paymentSuccess()
    {
        return view('payment.success');
    }

    public function paymentFailure()
    {
        return view('payment.failure');
    }
}
