@extends('layouts.fontend_master')

@section('content')
    <!-- Breadcrumb Section Start -->
    <section class="breadscrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadscrumb-contain">
                        <h2>Wishlist</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="index.html">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Wishlist Section Start -->
    <section class="wishlist-section section-b-space">
        <div class="container-fluid-lg">
            <div class="row g-sm-3 g-2">
                @foreach ($favorit as $favorits)
                    <div class="col-xxl-2 col-lg-3 col-md-4 col-6 product-box-contain">

                        <div class="product-box-3 h-100">



                            <div class="product-header">
                                <div class="product-image">
                                    <a href="product-left-thumbnail.html">
                                        <img src="{{ asset('image/products/' . $favorits->wishlists->p_image) }}"
                                            class="img-fluid blur-up lazyload" alt="{{ $favorits->product_name }}">
                                    </a>

                                    <div class="product-header-top">

                                        <a href="{{ route('wishlist.delete', $favorits->id) }}"
                                            class="btn wishlist-button close_button">
                                            <i data-feather="x"></i>
                                        </a>

                                    </div>
                                </div>
                            </div>
                            <div class="product-footer">
                                <div class="product-detail">
                                    <span class="span-name">Vegetable</span>
                                    <a href="product-left-thumbnail.html">
                                        <h5 class="name"> {{ $favorits->wishlists->product_name }}</h5>
                                    </a>
                                    <h6 class="unit mt-1">250 ml</h6>
                                    <h5 class="price">
                                        <span class="theme-color"> {{ $favorits->wishlists->discount_price }}</span>
                                        <del>{{ $favorits->wishlists->regular_price }}</del>
                                    </h5>

                                    <div class="add-to-cart-box bg-white mt-2">
                                        <button class="btn btn-add-cart addcart-button">Add
                                            <span class="add-icon bg-light-gray">
                                                <i class="fa-solid fa-plus"></i>
                                            </span>
                                        </button>
                                        <div class="cart_qty qty-box">
                                            <div class="input-group bg-white">
                                                <button type="button" class="qty-left-minus bg-gray" data-type="minus"
                                                    data-field="">
                                                    <i class="fa fa-minus" aria-hidden="true"></i>
                                                </button>
                                                <input class="form-control input-number qty-input" type="text"
                                                    name="quantity" value="0">
                                                <button type="button" class="qty-right-plus bg-gray" data-type="plus"
                                                    data-field="">
                                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- Wishlist Section End -->
@endsection
