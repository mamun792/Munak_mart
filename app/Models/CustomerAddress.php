<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerAddress extends Model
{
    use HasFactory;
    protected $fillable = [
        'Label',
        'CustomerName',
        'CustomerAddress',
        'ZipCode',
        'PhoneNumber',

    ];

    // public function invoice_detail()
    // {
    //     return $this->hasMany(Invoice::class);
    // }
}
