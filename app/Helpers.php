<?php

use App\Models\Category;
use App\Models\Wishlist;
use App\Models\Cart;
use App\Models\Inventory;
use Illuminate\Support\Facades\Auth;

function list_of_category()
{
    return Category::latest()->get();
}


function withlist_count()
{
    return Wishlist::where('user_id', auth()->user()->id)->count();
}

function add_to_card_count()
{
    return Cart::where('user_id', auth()->user()->id)->count();
}

function cards()
{
    return Cart::with('product')->where('user_id', Auth::id())->get();

}

function total_price()
{
    $total_price = 0;
    foreach (cards() as $card) {
        $total_price +=$card->product->discount_price * $card->quantity;
    }
    return $total_price;
}

function inventory($product_id, $size_id, $color_id)
{
    return Inventory::where([
        'product_id' => $product_id,
        'size_name' => $size_id,
        'color_name' => $color_id,
    ])->first()->quantity;
}
