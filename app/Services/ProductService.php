<?php
// app/Services/ProductService.php
namespace App\Services;

use App\Models\Product;
use App\Models\Treand;
use App\Models\Category;

class ProductService
{
    public function getAllTreands()
    {
        return Treand::first();
    }

    public function getAllProducts()
    {
        return Product::latest()->paginate(3);
    }

    public function getAllCategories()
    {
        return Category::latest()->get();
    }
}
