@extends('layouts.fontend_master')

@section('content')
    <!-- Breadcrumb Section Start -->
    <section class="breadscrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadscrumb-contain">
                        <h2>Cart</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="index.html">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Cart</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Cart Section Start -->

    <section class="cart-section section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="cart-table">
                        <div class="cart-table">
                            @php
                                $errors = false;
                            @endphp
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        @foreach (cards() as $cart)
                                            @php
                                                if (inventory($cart->product_id, $cart->size_id, $cart->color_id) < $cart->quantity) {
                                                    $errors = true;
                                                }
                                            @endphp
                                            <tr
                                                class="product-box-contain @if (inventory($cart->product_id, $cart->size_id, $cart->color_id) < $cart->quantity) bg-danger @endif">
                                                <td class="product-detail">
                                                    <div class="product border-0">
                                                        <a href="product-left-thumbnail.html" class="product-image">
                                                            <img src="{{ asset('image/products/' . $cart->product->p_image) }}"
                                                                class="img-fluid blur-up lazyload" alt="mm">

                                                        </a>

                                                        <div class="product-detail">
                                                            <ul>
                                                                <li class="name">
                                                                    <a
                                                                        href="product-left-thumbnail.html">{{ $cart->product->product_name }}</a>
                                                                </li>

                                                                <li class="text-content"><span class="text-title">Sold
                                                                        By:</span> {{ $cart->product->user->name }}</li>

                                                                <li class="text-content"><span
                                                                        class="text-title">Quantity:</span>
                                                                    {{ $cart->quantity }}
                                                                </li>

                                                                <span class="text-dark">{{ $cart->C_re_color->name }}
                                                                    <span>{{ $cart->C_re_attibute->name }}</span></span>
                                                                <br>
                                                                <span
                                                                    class="badge bg-warning text-dark">Stock:{{ inventory($cart->product_id, $cart->size_id, $cart->color_id) }}
                                                                </span>

                                                            </ul>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="price">
                                                    <h4 class="table-title text-content">Price</h4>
                                                    <h5>{{ $cart->product->discount_price }} <del
                                                            class="text-content">{{ $cart->product->regular_price }}</del>
                                                    </h5>
                                                    <h6 class="theme-color">You Save
                                                        :{{ $cart->product->regular_price - $cart->product->discount_price }}
                                                    </h6>
                                                </td>

                                                <td class="quantity">
                                                    <h4 class="table-title text-content">Qty</h4>
                                                    <div class="quantity-price">
                                                        <div class="cart_qty">
                                                            <div class="input-group">
                                                                <button type="button" class="btn qty-left-minus"
                                                                    data-type="minus" data-field="">
                                                                    <i class="fa fa-minus ms-0" aria-hidden="true"></i>
                                                                </button>
                                                                <input class="form-control input-number qty-input"
                                                                    type="text" name="quantity[{{ $cart->id }}]"
                                                                    value="{{ $cart->quantity }}">
                                                                <button type="button" class="btn qty-right-plus"
                                                                    data-type="plus" data-field="">
                                                                    <i class="fa fa-plus ms-0" aria-hidden="true"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="subtotal">
                                                    <h4 class="table-title text-content">Total</h4>
                                                    <h5>{{ $cart->product->discount_price * $cart->quantity }}</h5>
                                                </td>

                                                <td class="save-remove">
                                                    <h4 class="table-title text-content">Action</h4>
                                                    <a class="save notifi-wishlist" onclick="update({{ $cart->id }})"
                                                        href="javascript:void(0)">Save for later {{ $cart->id }}</a>
                                                    <a class="remove" onclick="deleteItem({{ $cart->id }})"
                                                        href="javascript:void(0)">Remove</a>


                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>




                <div class="col-md-3">
                    <div class="summery-box p-sticky">


                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        <div class="summery-header">
                            <h3>Cart Total</h3>
                        </div>

                        <div class="summery-contain">
                            <div class="coupon-cart">
                                <form action="" method="GET">
                                    @csrf
                                    <h6 class="text-content mb-2">Coupon Apply</h6>
                                    <div class="mb-3 coupon-box input-group">
                                        <input type="text" class="form-control" name="coupon"
                                            placeholder="Enter Coupon Code Here..." value="{{$copon}}">
                                        <button type="submit" class="btn-apply">Apply</button>
                                </form>
                            </div>
                        </div>
                        <ul>
                            <li>
                                <h4>Subtotal</h4>
                                <h4 class="price">
                                    {{ total_price() }}
                                </h4>
                                </h4>
                            </li>

                            <li>
                                <h4>Coupon Discount</h4>
                                <h4 class="price">(-) {{ isset($discount) ? $discount.'%' : $discounts }}</h4>

                            </li>

                            <li class="align-items-start">
                                <h4>Shipping</h4>
                                <h4 class="price text-end">$6.90</h4>
                            </li>
                        </ul>
                    </div>

                    <ul class="summery-total">
                        <li class="list-total border-top-0">
                            <h4>Total (BD)</h4>
                            <h4 class="price theme-color">{{ isset($discount) ? total_price() - (total_price() * $discount / 100) : total_price()-$discounts }}
                            </h4>
                        </li>
                    </ul>

                    <div class="button-group cart-button">
                        <ul>

                            <li>
                                @if ($errors)
                                    <h4><span class="badge bg-warning text-dark p-3 ">Please update or remove
                                            cart</span></h4>
                                @else
                                    <button onclick="location.href = '{{route('checkout')}}';"
                                        class="btn btn-animation proceed-btn fw-bold">Process To Checkout</button>
                                @endif

                            </li>

                            <li>
                                <button onclick="location.href = '{{ route('shop', 'all') }}';"
                                    class="btn btn-light shopping-button text-dark">
                                    <i class="fa-solid fa-arrow-left-long"></i>Return To Shopping</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- Cart Section End -->
@endsection


@section('fotter_scprit')
    <script>
        //delete item
        function deleteItem(id) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "get",
                url: "/cart/delete/" + id,
                success: function(data) {
                    alert('Item removed successfully');
                    location.reload();
                },



                error: function(data) {
                    alert('Error removing item');
                }
            });
        }

        //uptete item

        function update(id) {

            var quantity = document.querySelector('input[name="quantity[' + id + ']"]').value;

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "/card/update/" + id,
                data: {
                    quantity: quantity,
                },
                success: function(data) {
                    location.reload();
                    alert('Update successful!');
                },
                error: function(data) {

                    alert('error updating item');
                }
            });
        }
    </script>
@endsection
