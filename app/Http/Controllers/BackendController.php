<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\invoice_Deatiles;
use App\Models\User;
use Illuminate\Http\Request;

class BackendController extends Controller
{

    public function dashboard()
    {
        $catoriges = Category::latest()->get();
        //inner join to invoice_deatiles and products table and invoice
   $invoice_deatiles = invoice_Deatiles::join('products', 'products.id', '=', 'invoice__deatiles.product_id')
    ->join('invoices', 'invoices.id', '=', 'invoice__deatiles.invoice_id')
    ->latest('invoice__deatiles.created_at')
    ->get();

//Total Revenue

 $total_revenue=invoice_Deatiles::sum('pursing_price');


//total product

 $total_product=invoice_Deatiles::sum('quantity');

 //total invoice

 $total_oder=invoice_Deatiles::count('invoice_id');

//total customer

 $total_customer=User::count('id');

        return view('backend.dashboard', compact('catoriges', 'invoice_deatiles','total_revenue','total_product','total_oder','total_customer'));
    }
}
