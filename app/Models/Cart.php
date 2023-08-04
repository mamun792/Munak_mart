<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
protected $fillable = ['user_id','product_id','color_id','size_id','quantity','price','total_price'];
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
public function C_re_color()
    {
        return $this->belongsTo(Color::class, 'color_id', 'id');
    }

    public function C_re_attibute()
    {
        return $this->belongsTo(Attributes::class, 'size_id', 'id');
    }

}
