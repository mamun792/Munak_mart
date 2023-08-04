<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Size;

class Inventory extends Model
{
    use HasFactory;
    protected $fillable = ['product_id', 'size_name', 'color_name', 'quantity'];
    public function color()
    {
        return $this->hasOne(Color::class, 'id','color_name');
    }
    public function size()
    {
        return $this->hasOne(Attributes::class,'id','size_name');
    }

    }


