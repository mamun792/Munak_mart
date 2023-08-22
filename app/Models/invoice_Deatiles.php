<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoice_Deatiles extends Model
{
    use HasFactory;
    protected $fillable = [
        'invoice_id',
        'product_id',
        'product_name',
        'product_price',
        'product_quantity',
        'sub_total',
    ];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }



//     public function color(){
// return $this->belongsTo(Color::class);
//     }
}
