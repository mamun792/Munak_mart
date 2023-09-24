@extends('layouts.fontend_master')


@section('content')
    <!-- Breadcrumb Section Start -->
    <section class="breadscrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadscrumb-contain">
                        <h2>{{ $poducts->product_name }}</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="index.html">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>

                                <li class="breadcrumb-item active">{{ $poducts->product_name }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <!-- Breadcrumb Section End -->

    <!-- Product Left Sidebar Start -->
    <section class="product-section">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-xxl-9 col-xl-8 col-lg-7 wow fadeInUp">
                    <div class="row g-4">
                        <div class="col-xl-6 wow fadeInUp">
                            <div class="product-left-box">
                                <div class="row g-2">
                                    <div class="col-xxl-10 col-lg-12 col-md-10 order-xxl-2 order-lg-1 order-md-2">
                                        <div class="product-main-2 no-arrow">
                                            @foreach ($featured_photos as $feature)
                                                <div>

                                                    <div class="slider-image">

                                                        <img src="{{ asset('image/product_features_photo/' . $feature->thumbnail_image) }}"
                                                            data-zoom-image="{{ asset('image/product_features_photo/' . $feature->thumbnail_image) }}"
                                                            class="img-fluid image_zoom_cls-0 blur-up lazyload"
                                                            alt="no img">

                                                    </div>


                                                </div>
                                            @endforeach

                                        </div>
                                    </div>

                                    <div class="col-xxl-2 col-lg-12 col-md-2 order-xxl-1 order-lg-2 order-md-1">
                                        <div class="left-slider-image-2 left-slider no-arrow slick-top">
                                            @foreach ($featured_photos as $feature)
                                                <div>
                                                    <div class="sidebar-image">
                                                        <img src="{{ asset('image/product_features_photo/' . $feature->thumbnail_image) }}"
                                                            class="img-fluid blur-up lazyload ml-3" alt="no img">
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="right-box-contain">
                                @php
                                    try {
                                        $diccount = (int) $poducts->discount;
                                    } catch (\Throwable $th) {
                                        $errorMessage = 'Error converting discount to integer: ' . $th->getMessage();
                                        file_put_contents('error_log.txt', $errorMessage, FILE_APPEND);
                                        echo 'An error occurred while converting the discount. Please try again later.';
                                    }

                                @endphp
                                <h6 class="offer-top">{{ $diccount }}% Off</h6>



                                <h2 class="name">{{ $poducts->product_name }}</h2>
                                <div class="price-rating">
                                    @if ($poducts->discount > 0)
                                        <h3 class="theme-color price">{{ $poducts->discount_price }} <del
                                                class="text-content">{{ $poducts->regular_price }}</del> <span
                                                class="offer theme-color">{{ $diccount }}% Off</span></h3>
                                    @else
                                        <h3 class="theme-color price">{{ $poducts->discount_price }}</h3>
                                    @endif

                                    <div class="product-rating custom-rate">
                                        <ul class="rating">
                                            <li>
                                                <i data-feather="star" class="fill"></i>
                                            </li>
                                            <li>
                                                <i data-feather="star" class="fill"></i>
                                            </li>
                                            <li>
                                                <i data-feather="star" class="fill"></i>
                                            </li>
                                            <li>
                                                <i data-feather="star" class="fill"></i>
                                            </li>
                                            <li>
                                                <i data-feather="star"></i>
                                            </li>
                                        </ul>
                                        <span class="review">23 Customer Review</span>
                                    </div>
                                </div>

                                <div class="procuct-contain">
                                    <p>{{ $poducts->short_productDescription }}

                                    </p>
                                </div>

                                <div class="product-packege ">
                                    <div class="product-title">
                                        <h4>Size</h4>
                                    </div>

                                    <select onchange="size_color()" class="form-control size_id">
                                        <option value="">--Select Size--</option>
                                        @foreach ($product_size->unique('size_name') as $product_sizes)
                                            <option value="{{ $product_sizes->size->id }}">
                                                {{ $product_sizes->size->name }}</option>
                                        @endforeach


                                    </select>


                                    <div class="product-title">

                                        <h4>Size</h4>
                                    </div>
                                    <select class="form-control list_color" id="color_list">
                                        <option value="">Chose Color</option>

                                    </select>
                                </div>
                                <div class="note-box product-packege">
                                    <div class="cart_qty qty-box product-qty">
                                        <div class="input-group">
                                            <button type="button" class="qty-right-plus" data-type="plus" data-field="">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </button>
                                            <input class="form-control input-number qty-input" type="text"
                                                name="quantity" value="1">
                                            <button type="button" class="qty-left-minus" data-type="minus" data-field="">
                                                <i class="fa fa-minus" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>

                                    @auth
                                        <button type="button" onclick="add_card()" id="add_to_remove"
                                            class="btn btn-md bg-dark cart-button text-white w-100 disabled">
                                            Add To Cart
                                        </button>
                                    @else
                                        <button type="button" class="btn btn-md bg-dark cart-button text-white w-100 "
                                            data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                            Add To Cart
                                        </button>
                                    @endauth


                                </div>



                                {{-- @if (auth()->check())
                                    <div class="buy-box">
                                        @if ($whishlist_checks == 1)
                                            <i class="text-danger" data-feather="heart"></i>
                                            <span>Already Add To Wishlist</span>
                                        @else
                                            <a href="{{ route('add.wishlist', $poducts->id) }}">
                                                <i data-feather="heart"></i>
                                                <span>Add To Wishlist</span>
                                            </a>
                                        @endif
                                    </div>
                                @endif --}}

                                <div class="pickup-box">
                                    <div class="product-title">
                                        <h4>Store Information</h4>
                                    </div>

                                    <div class="pickup-detail">
                                        <h4 class="text-content">Lollipop cake chocolate chocolate cake dessert jujubes.
                                            Shortbread sugar plum dessert powder cookie sweet brownie.</h4>
                                    </div>

                                    <div class="product-info">
                                        <ul class="product-info-list product-info-list-2">
                                            <li>Category : <a href="javascript:void(0)">{{ $poducts->category->name }}</a>
                                            </li>

                                            <li>Create At : <a
                                                    href="javascript:void(0)">{{ $poducts->category->created_at->format('d M Y') }}</a>
                                            </li>
                                            <li>Stock : <a
                                                    href="javascript:void(0)">{{ $product_size->sum('quantity') }}</a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>

                                <div class="paymnet-option">
                                    <div class="product-title">
                                        <h4>Guaranteed Safe Checkout</h4>
                                    </div>
                                    <ul>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <img src="{{ asset('fonend_asset/images/product/payment/1.svg') }}"
                                                    class="blur-up lazyload" alt="">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <img src="{{ asset('fonend_asset/images/product/payment/2.svg') }}"
                                                    class="blur-up lazyload" alt="">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <img src="{{ asset('fonend_asset/images/product/payment/3.svg') }}"
                                                    class="blur-up lazyload" alt="">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <img src="{{ asset('fonend_asset/images/product/payment/4.svg') }}"
                                                    class="blur-up lazyload" alt="">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <img src="{{ asset('fonend_asset/images/product/payment/5.svg') }}"
                                                    class="blur-up lazyload" alt="">
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="product-section-box">
                                <ul class="nav nav-tabs custom-nav" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="description-tab" data-bs-toggle="tab"
                                            data-bs-target="#description" type="button" role="tab"
                                            aria-controls="description" aria-selected="true">Description</button>
                                    </li>

                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="info-tab" data-bs-toggle="tab"
                                            data-bs-target="#info" type="button" role="tab" aria-controls="info"
                                            aria-selected="false">Additional info</button>
                                    </li>

                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="care-tab" data-bs-toggle="tab"
                                            data-bs-target="#care" type="button" role="tab" aria-controls="care"
                                            aria-selected="false">Care Instuctions</button>
                                    </li>

                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="review-tab" data-bs-toggle="tab"
                                            data-bs-target="#review" type="button" role="tab"
                                            aria-controls="review" aria-selected="false">Review</button>
                                    </li>
                                </ul>

                                <div class="tab-content custom-tab" id="myTabContent">
                                    <div class="tab-pane fade show active" id="description" role="tabpanel"
                                        aria-labelledby="description-tab">
                                        <div class="product-description">
                                            <div class="nav-desh">
                                                <p>{{ $poducts->short_productDescription }}.</p>
                                            </div>

                                            <div class="nav-desh">
                                                <div class="desh-title">
                                                    <h5>{{ $poducts->product_name }}</h5>
                                                </div>
                                                <p>{{ $poducts->long_productDescription }}</p>
                                            </div>

                                            <div class="banner-contain nav-desh">
                                                <img src="../assets/images/vegetable/banner/14.jpg"
                                                    class="bg-img blur-up lazyload" alt="">
                                                <div class="banner-details p-center banner-b-space w-100 text-center">
                                                    <div>
                                                        <h6 class="ls-expanded theme-color mb-sm-3 mb-1">SUMMER</h6>
                                                        <h2>VEGETABLE</h2>
                                                        <p class="mx-auto mt-1">Save up to 5% OFF</p>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="info" role="tabpanel"
                                        aria-labelledby="info-tab">
                                        <p>{{ $poducts->product_additional_information }}</p>
                                    </div>

                                    <div class="tab-pane fade" id="care" role="tabpanel"
                                        aria-labelledby="care-tab">
                                        <div class="information-box">
                                            <ul>
                                                <li>{{ $poducts->care_of_Instaction }}</li>





                                                <li>Enjoy your {{ $poducts->product_name }}!</li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="review" role="tabpanel"
                                        aria-labelledby="review-tab">
                                        <div class="review-box">
                                            <div class="row g-4">


                                                <div class="col-12">
                                                    <div class="review-title">
                                                        <h4 class="fw-500">Customer questions & answers</h4>
                                                    </div>

                                                    <div class="review-people">
                                                        <ul class="review-list">
                                                            @foreach ($review as $reviews)
                                                                <li>
                                                                    <div class="people-box">
                                                                        <div>
                                                                            <div class="people-image">
                                                                                <img src="../assets/images/review/1.jpg"
                                                                                    class="img-fluid blur-up lazyload"
                                                                                    alt="">
                                                                            </div>
                                                                        </div>

                                                                        <div class="people-comment">
                                                                            <a class="name"
                                                                                href="javascript:void(0)">Tracey</a>
                                                                            <div class="date-time">
                                                                                <h6 class="text-content">
                                                                                    {{ $reviews->created_at->format('d M, Y \a\t h:i A') }}

                                                                                </h6>

                                                                                <div class="product-rating">
                                                                                    <ul class="rating">
                                                                                        <li>
                                                                                            <i data-feather="star"
                                                                                                class="fill"></i>
                                                                                        </li>
                                                                                        <li>
                                                                                            <i data-feather="star"
                                                                                                class="fill"></i>
                                                                                        </li>
                                                                                        <li>
                                                                                            <i data-feather="star"
                                                                                                class="fill"></i>
                                                                                        </li>
                                                                                        <li>
                                                                                            <i data-feather="star"></i>
                                                                                        </li>
                                                                                        <li>
                                                                                            <i data-feather="star"></i>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>

                                                                            <div class="reply">
                                                                                <p>{{ $reviews->comment }}<a
                                                                                        href="javascript:void(0)">Reply</a>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            @endforeach



                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-3 col-xl-4 col-lg-5 d-none d-lg-block wow fadeInUp">
                    <div class="right-sidebar-box">
                        <div class="vendor-box">
                            <div class="verndor-contain">
                                <div class="vendor-image">
                                    @if ($vendors->photo)
                                        <img src="{{ asset('image/profile_photo/' . $vendors->photo) }}"
                                            class="blur-up lazyload" alt="">
                                    @else
                                        <img src="{{ Avatar::create($vendors->name)->toBase64() }}"
                                            class="blur-up lazyload" alt="">
                                    @endif

                                </div>

                                <div class="vendor-name">
                                    <h5 class="fw-500">{{ $vendors->name }}</h5>

                                    <div class="product-rating mt-1">
                                        <ul class="rating">
                                            <li>
                                                <i data-feather="star" class="fill"></i>
                                            </li>
                                            <li>
                                                <i data-feather="star" class="fill"></i>
                                            </li>
                                            <li>
                                                <i data-feather="star" class="fill"></i>
                                            </li>
                                            <li>
                                                <i data-feather="star" class="fill"></i>
                                            </li>
                                            <li>
                                                <i data-feather="star"></i>
                                            </li>
                                        </ul>
                                        <span>(36 Reviews)</span>
                                    </div>

                                </div>
                            </div>



                            <div class="vendor-list">
                                <ul>
                                    <li>
                                        <div class="address-contact">

                                            <i class="fa-solid fa-envelope"></i>
                                            <h5>Email: <span class="text-content">{{ $vendors->email }}</span></h5>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="address-contact">
                                            <i class="fa-solid fa-phone"></i>
                                            <h5>Contact Seller: <span class="text-content">{{ $vendors->phone }}</span>
                                            </h5>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Trending Product -->
                        <div class="pt-25">
                            <div class="category-menu">
                                <h3>Trending Products</h3>

                                <ul class="product-list product-right-sidebar border-0 p-0">
                                    <li>
                                        <div class="offer-product">
                                            <a href="product-left-thumbnail.html" class="offer-image">
                                                <img src="../assets/images/vegetable/product/23.png"
                                                    class="img-fluid blur-up lazyload" alt="">
                                            </a>

                                            <div class="offer-detail">
                                                <div>
                                                    <a href="product-left-thumbnail.html">
                                                        <h6 class="name">Meatigo Premium Goat Curry</h6>
                                                    </a>
                                                    <span>450 G</span>
                                                    <h6 class="price theme-color">$ 70.00</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </li>


                                </ul>
                            </div>
                        </div>

                        <!-- Banner Section -->
                        <div class="ratio_156 pt-25">
                            <div class="home-contain">
                                <img src="../assets/images/vegetable/banner/8.jpg" class="bg-img blur-up lazyload"
                                    alt="">
                                <div class="home-detail p-top-left home-p-medium">
                                    <div>
                                        <h6 class="text-yellow home-banner">Seafood</h6>
                                        <h3 class="text-uppercase fw-normal"><span
                                                class="theme-color fw-bold">Freshes</span> Products</h3>
                                        <h3 class="fw-light">every hour</h3>
                                        <button onclick="location.href = 'shop-left-sidebar.html';"
                                            class="btn btn-animation btn-md fw-bold mend-auto">Shop Now <i
                                                class="fa-solid fa-arrow-right icon"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Left Sidebar End -->

    <!-- Releted Product Section Start -->
    <section class="product-list-section section-b-space">
        <div class="container-fluid-lg">
            <div class="title">
                <h2>Related Products ({{ $related_products->count() }})</h2>
                <span class="title-leaf">
                    <svg class="icon-width">
                        <use xlink:href="../assets/svg/leaf.svg#leaf"></use>
                    </svg>
                </span>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="slider-6_1 product-wrapper">
                        @foreach ($related_products as $related_product)
                            <div>
                                <div class="product-box-3 wow fadeInUp">
                                    <div class="product-header">
                                        <div class="product-image">
                                            <a href="{{ route('product.detalis', $related_product->id) }}">
                                                <img src="{{ asset('image/products/' . $related_product->p_image) }}"
                                                    class="img-fluid blur-up lazyload"
                                                    alt="{{ $related_product->product_name }}">
                                            </a>

                                            <ul class="product-option">
                                                <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        data-bs-target="#view">
                                                        <i data-feather="eye"></i>
                                                    </a>
                                                </li>

                                                <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                                    <a href="compare.html">
                                                        <i data-feather="refresh-cw"></i>
                                                    </a>
                                                </li>

                                                <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                                    <a href="wishlist.html" class="notifi-wishlist">
                                                        <i data-feather="heart"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="product-footer">
                                        <div class="product-detail">
                                            <span class="span-name">{{ $related_product->category->name }}</span>
                                            <a href="{{ route('product.detalis', $related_product->id) }}">
                                                <h5 class="name">{{ $related_product->product_name }}</h5>
                                            </a>
                                            <div class="product-rating mt-2">
                                                <ul class="rating">
                                                    <li>
                                                        <i data-feather="star" class="fill"></i>
                                                    </li>
                                                    <li>
                                                        <i data-feather="star" class="fill"></i>
                                                    </li>
                                                    <li>
                                                        <i data-feather="star" class="fill"></i>
                                                    </li>
                                                    <li>
                                                        <i data-feather="star" class="fill"></i>
                                                    </li>
                                                    <li>
                                                        <i data-feather="star" class="fill"></i>
                                                    </li>
                                                </ul>
                                                <span>(5.0)</span>
                                            </div>
                                            <h6 class="unit">500 G</h6>
                                            <h5 class="price"><span
                                                    class="theme-color">{{ $related_product->discount_price }}</span>
                                                <del>{{ $related_product->regular_price }}</del>
                                            </h5>
                                            <div class="add-to-cart-box bg-white">
                                                <a href="{{ route('product.detalis', $related_product->id) }}"
                                                    class="btn btn-add-cart">Detalis</a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Releted Product Section End -->

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered 	modal-lg">
            <div class="modal-content">
                <div class="modal-header">


                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <h3 class=" mt-3 mb-2" id="staticBackdropLabel">Welcome! Please Login to continue.</h3>
                        <span class="mb-5">New member? <a href="{{ route('register') }}">Register here.</a></span>

                        <div class="row">
                            <div class="col-md-6">
                                <form class="row g-4" method="POST" action="{{ route('custom_login') }}">
                                    @csrf
                                    <div class="col-12">

                                        <div class="form-group">
                                            <label for="email">Email Address*</label>
                                            <input type="email" class="form-control" name="email"
                                                value="{{ old('email') }}"
                                                placeholder="Please enter your email address">
                                        </div>
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-12">


                                        <div class="form-group">
                                            <label for="password">Password*</label>
                                            <input type="password" class="form-control" name="password"
                                                placeholder="Please enter your password">
                                        </div>

                                        @error('password')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <div class="forgot-box">

                                            <a href="forgot.html" class="forgot-password">Forgot Password?</a>
                                        </div>
                                    </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <button class="btn btn-animation w-100 justify-content-center " type="submit">Log
                                        In</button>
                                </div>
                                </form>





                                <div class="log-in-button">
                                    <ul class="list-unstyled">
                                        <div class="row">
                                            <div class="col-lg-12 mb-3">
                                                <a href="{{ route('login.google') }}"
                                                    class="btn google-button w-100 bg-warning">
                                                    <i class="fab fa-google m-2"></i> Log In with Google
                                                </a>
                                            </div>
                                        </div>

                                        <li class="col-lg-12 mb-5">
                                            <a href="https://www.facebook.com/"
                                                class="btn facebook-button w-100 bg-primary">
                                                <i class="fab fa-facebook-f m-2"></i> Log In with Facebook
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                            {{-- </div> --}}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endsection

    @section('fotter_scprit')
        <script>
            function size_color() {
                var selectedSize = $(".size_id").val();
                var product_id = "{{ $poducts->id }}";

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: '/get/color/list',
                    data: {
                        size: selectedSize,
                        product_id: product_id,
                    },

                    success: function(data) {

                        $('#color_list').html(data);
                        checkEnableButton();

                    },
                    error: function(xhr, status, error) {
                        if (xhr.responseJSON && xhr.responseJSON.error) {
                            var errorMessage = xhr.responseJSON.error;
                            alert("Error: " + errorMessage);
                        } else {
                            alert("Error: " + error);
                        }
                    }
                });


            }



            function checkEnableButton() {

                const size = document.querySelector('.size_id').value;
                const color = document.querySelector('.list_color').value;
                var addToCartButton = document.querySelector('#add_to_remove');

                if (size && color) {
                    addToCartButton.classList.remove('disabled');


                } else {
                    addToCartButton.classList.add('disabled');

                }


            }


            document.addEventListener('DOMContentLoaded', function() {
                size_color();
            });


            function add_cards(size, color, quantity) {

                if (!size || !color) {
                    alert('Please select a size and color.');
                    return;
                }

                var size_id = size;
                var color_id = color;
                var product_id = "{{ $poducts->id }}";

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: 'POST',
                    url: '/add/to/card',
                    data: {
                        size_id: size_id,
                        quantity: quantity,
                        color_id: color_id,
                        product_id: product_id,
                    },
                    success: function(data) {
                        alert(data);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Error: ' + textStatus + ' - ' + errorThrown);
                    }
                });


            }

            function add_card() {
                const size = document.querySelector('.size_id').value;
                const color = document.querySelector('.list_color').value;
                const quantity = document.querySelector('.qty-input').value;

                add_cards(size, color, quantity);
            }
        </script>
    @endsection

    <!-- Modal -->
