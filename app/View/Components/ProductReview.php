<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Review;

class ProductReview extends Component
{
    public $productId;
    public $product;

    /**
     * Create a new component instance.
     *
     * @param int $productId
     */
    public function __construct($productId)
    {
        $this->productId = $productId;
        $this->product = Review::where('product_id', $productId)->first();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('components.product-review');
    }
}
