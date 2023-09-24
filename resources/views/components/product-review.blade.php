@if ($product)
    @if ($product->reviews && $product->reviews->isEmpty())
        <p>No reviews</p>
    @else
        <p class="text-center bg-info p-2">There are reviews</p>
    @endif
@else
    <a class="btn btn-primary" href="{{ route('customer.review', $productId) }}">
        Review
    </a>
@endif
