<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name',
        'category_id',
        'vendor_id',
        'short_productDescription',
        'long_productDescription',
        'product_additional_information',
        'care_of_Instaction',
        'pursing_price',
        'regular_price',
        'discount',
        'discount_price',
        'p_image',
        'created_at',
        'updated_at',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function features()
    {
        return $this->hasMany(Featured_photo::class, 'product_id', 'id');
    }

}
