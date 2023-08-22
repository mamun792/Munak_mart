<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'invoice_no', 'user_id', 'address_id', 'cupon_name',
        'delivery_option', 'payment_option', 'sub_total', 'discount', 'total_discount', 'total_amount', 'payment_status'
    ];

    public function invoiceDownload()
    {
        return $this->hasOne((invoice_Deatiles::class));
    }

    // public function product()
    // {
    //     return $this->hasMany(Product::class , 'id' , 'product_id');
    // }

}
