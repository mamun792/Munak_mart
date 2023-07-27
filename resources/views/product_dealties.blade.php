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
                                        <h4>Color</h4>
                                    </div>
                                    <select name="" class="form-control">
                                        <option value="">red</option>
                                        <option value="">green</option>
                                        <option value="">yellow</option>
                                    </select>
                                    <div class="product-title">
                                        <h4>Size</h4>
                                    </div>
                                    <select name="" class="form-control">
                                        <option value="">S</option>
                                        <option value="">M</option>
                                        <option value="">L</option>
                                        <option value="">XL</option>
                                        <option value="">XXL</option>
                                    </select>
                                </div>
                                <div class="note-box product-packege">
                                    <div class="cart_qty qty-box product-qty">
                                        <div class="input-group">
                                            <button type="button" class="qty-right-plus" data-type="plus" data-field="">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </button>
                                            <input class="form-control input-number qty-input" type="text"
                                                name="quantity" value="0">
                                            <button type="button" class="qty-left-minus" data-type="minus" data-field="">
                                                <i class="fa fa-minus" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <button onclick="location.href = 'cart.html';"
                                        class="btn btn-md bg-dark cart-button text-white w-100">Add To Cart</button>
                                </div>

                                <div class="buy-box">
                                    <a href="wishlist.html">
                                        <i data-feather="heart"></i>
                                        <span>Add To Wishlist</span>
                                    </a>
                                </div>

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
                                            <li>Stock : <a href="javascript:void(0)">---</a></li>

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
                                                <img src="../assets/images/product/payment/1.svg" class="blur-up lazyload"
                                                    alt="">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <img src="../assets/images/product/payment/2.svg" class="blur-up lazyload"
                                                    alt="">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <img src="../assets/images/product/payment/3.svg" class="blur-up lazyload"
                                                    alt="">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <img src="../assets/images/product/payment/4.svg" class="blur-up lazyload"
                                                    alt="">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <img src="../assets/images/product/payment/5.svg" class="blur-up lazyload"
                                                    alt="">
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

                                            {{-- <div class="nav-desh">
                                                <div class="desh-title">
                                                    <h5>From The Manufacturer:</h5>
                                                </div>
                                                <p>Jelly beans shortbread chupa chups carrot cake jelly-o halvah apple
                                                    pie pudding gingerbread. Apple pie halvah cake tiramisu shortbread
                                                    cotton candy croissant chocolate cake. Tart cupcake caramels gummi
                                                    bears macaroon gingerbread fruitcake marzipan wafer. Marzipan
                                                    dessert cupcake ice cream tootsie roll. Brownie chocolate cake
                                                    pudding cake powder candy ice cream ice cream cake. Jujubes soufflé
                                                    chupa chups cake candy halvah donut. Tart tart icing lemon drops
                                                    fruitcake apple pie.</p>

                                                <p>Dessert liquorice tart soufflé chocolate bar apple pie pastry danish
                                                    soufflé. Gummi bears halvah gingerbread jelly icing. Chocolate cake
                                                    chocolate bar pudding chupa chups bear claw pie dragée donut halvah.
                                                    Gummi bears cookie ice cream jelly-o jujubes sweet croissant.
                                                    Marzipan cotton candy gummi bears lemon drops lollipop lollipop
                                                    chocolate. Ice cream cookie dragée cake sweet roll sweet roll.Lemon
                                                    drops cookie muffin carrot cake chocolate marzipan gingerbread
                                                    topping chocolate bar. Soufflé tiramisu pastry sweet dessert.</p>
                                            </div> --}}
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
                                                <div class="col-xl-6">
                                                    <div class="review-title">
                                                        <h4 class="fw-500">Customer reviews</h4>
                                                    </div>

                                                    <div class="d-flex">
                                                        <div class="product-rating">
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
                                                                    <i data-feather="star"></i>
                                                                </li>
                                                                <li>
                                                                    <i data-feather="star"></i>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <h6 class="ms-3">4.2 Out Of 5</h6>
                                                    </div>

                                                    <div class="rating-box">
                                                        <ul>
                                                            <li>
                                                                <div class="rating-list">
                                                                    <h5>5 Star</h5>
                                                                    <div class="progress">
                                                                        <div class="progress-bar" role="progressbar"
                                                                            style="width: 68%" aria-valuenow="100"
                                                                            aria-valuemin="0" aria-valuemax="100">
                                                                            68%
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>

                                                            <li>
                                                                <div class="rating-list">
                                                                    <h5>4 Star</h5>
                                                                    <div class="progress">
                                                                        <div class="progress-bar" role="progressbar"
                                                                            style="width: 67%" aria-valuenow="100"
                                                                            aria-valuemin="0" aria-valuemax="100">
                                                                            67%
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>

                                                            <li>
                                                                <div class="rating-list">
                                                                    <h5>3 Star</h5>
                                                                    <div class="progress">
                                                                        <div class="progress-bar" role="progressbar"
                                                                            style="width: 42%" aria-valuenow="100"
                                                                            aria-valuemin="0" aria-valuemax="100">
                                                                            42%
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>

                                                            <li>
                                                                <div class="rating-list">
                                                                    <h5>2 Star</h5>
                                                                    <div class="progress">
                                                                        <div class="progress-bar" role="progressbar"
                                                                            style="width: 30%" aria-valuenow="100"
                                                                            aria-valuemin="0" aria-valuemax="100">
                                                                            30%
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>

                                                            <li>
                                                                <div class="rating-list">
                                                                    <h5>1 Star</h5>
                                                                    <div class="progress">
                                                                        <div class="progress-bar" role="progressbar"
                                                                            style="width: 24%" aria-valuenow="100"
                                                                            aria-valuemin="0" aria-valuemax="100">
                                                                            24%
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="col-xl-6">
                                                    <div class="review-title">
                                                        <h4 class="fw-500">Add a review</h4>
                                                    </div>

                                                    <div class="row g-4">
                                                        <div class="col-md-6">
                                                            <div class="form-floating theme-form-floating">
                                                                <input type="text" class="form-control" id="name"
                                                                    placeholder="Name">
                                                                <label for="name">Your Name</label>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-floating theme-form-floating">
                                                                <input type="email" class="form-control" id="email"
                                                                    placeholder="Email Address">
                                                                <label for="email">Email Address</label>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-floating theme-form-floating">
                                                                <input type="url" class="form-control" id="website"
                                                                    placeholder="Website">
                                                                <label for="website">Website</label>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-floating theme-form-floating">
                                                                <input type="url" class="form-control" id="review1"
                                                                    placeholder="Give your review a title">
                                                                <label for="review1">Review Title</label>
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <div class="form-floating theme-form-floating">
                                                                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 150px"></textarea>
                                                                <label for="floatingTextarea2">Write Your
                                                                    Comment</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="review-title">
                                                        <h4 class="fw-500">Customer questions & answers</h4>
                                                    </div>

                                                    <div class="review-people">
                                                        <ul class="review-list">
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
                                                                            <h6 class="text-content">14 Jan, 2022 at
                                                                                12.58 AM</h6>

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
                                                                            <p>Icing cookie carrot cake chocolate cake
                                                                                sugar plum jelly-o danish. Dragée dragée
                                                                                shortbread tootsie roll croissant muffin
                                                                                cake I love gummi bears. Candy canes ice
                                                                                cream caramels tiramisu marshmallow cake
                                                                                shortbread candy canes cookie.<a
                                                                                    href="javascript:void(0)">Reply</a>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>

                                                            <li>
                                                                <div class="people-box">
                                                                    <div>
                                                                        <div class="people-image">
                                                                            <img src="../assets/images/review/2.jpg"
                                                                                class="img-fluid blur-up lazyload"
                                                                                alt="">
                                                                        </div>
                                                                    </div>

                                                                    <div class="people-comment">
                                                                        <a class="name"
                                                                            href="javascript:void(0)">Olivia</a>
                                                                        <div class="date-time">
                                                                            <h6 class="text-content">01 May, 2022 at
                                                                                08.31 AM</h6>
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
                                                                            <p>Tootsie roll cake danish halvah powder
                                                                                Tootsie roll candy marshmallow cookie
                                                                                brownie apple pie pudding brownie
                                                                                chocolate bar. Jujubes gummi bears I
                                                                                love powder danish oat cake tart
                                                                                croissant.<a
                                                                                    href="javascript:void(0)">Reply</a>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>

                                                            <li>
                                                                <div class="people-box">
                                                                    <div>
                                                                        <div class="people-image">
                                                                            <img src="../assets/images/review/3.jpg"
                                                                                class="img-fluid blur-up lazyload"
                                                                                alt="">
                                                                        </div>
                                                                    </div>

                                                                    <div class="people-comment">
                                                                        <a class="name"
                                                                            href="javascript:void(0)">Gabrielle</a>
                                                                        <div class="date-time">
                                                                            <h6 class="text-content">21 May, 2022 at
                                                                                05.52 PM</h6>

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
                                                                            <p>Biscuit chupa chups gummies powder I love
                                                                                sweet pudding jelly beans. Lemon drops
                                                                                marzipan apple pie gingerbread macaroon
                                                                                croissant cotton candy pastry wafer.
                                                                                Carrot cake halvah I love tart caramels
                                                                                pudding icing chocolate gummi bears.
                                                                                Gummi bears danish cotton candy muffin
                                                                                marzipan caramels awesome feel. <a
                                                                                    href="javascript:void(0)">Reply</a>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
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

                                    <li>
                                        <div class="offer-product">
                                            <a href="product-left-thumbnail.html" class="offer-image">
                                                <img src="../assets/images/vegetable/product/24.png"
                                                    class="blur-up lazyload" alt="">
                                            </a>

                                            <div class="offer-detail">
                                                <div>
                                                    <a href="product-left-thumbnail.html">
                                                        <h6 class="name">Dates Medjoul Premium Imported</h6>
                                                    </a>
                                                    <span>450 G</span>
                                                    <h6 class="price theme-color">$ 40.00</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="offer-product">
                                            <a href="product-left-thumbnail.html" class="offer-image">
                                                <img src="../assets/images/vegetable/product/25.png"
                                                    class="blur-up lazyload" alt="">
                                            </a>

                                            <div class="offer-detail">
                                                <div>
                                                    <a href="product-left-thumbnail.html">
                                                        <h6 class="name">Good Life Walnut Kernels</h6>
                                                    </a>
                                                    <span>200 G</span>
                                                    <h6 class="price theme-color">$ 52.00</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="mb-0">
                                        <div class="offer-product">
                                            <a href="product-left-thumbnail.html" class="offer-image">
                                                <img src="../assets/images/vegetable/product/26.png"
                                                    class="blur-up lazyload" alt="">
                                            </a>

                                            <div class="offer-detail">
                                                <div>
                                                    <a href="product-left-thumbnail.html">
                                                        <h6 class="name">Apple Red Premium Imported</h6>
                                                    </a>
                                                    <span>1 KG</span>
                                                    <h6 class="price theme-color">$ 80.00</h6>
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
                <h2>Related Products ({{$related_products->count()}})</h2>
                <span class="title-leaf">
                    <svg class="icon-width">
                        <use xlink:href="../assets/svg/leaf.svg#leaf"></use>
                    </svg>
                </span>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="slider-6_1 product-wrapper">
@foreach ($related_products as   $related_product)


                        <div>
                            <div class="product-box-3 wow fadeInUp">
                                <div class="product-header">
                                    <div class="product-image">
                                        <a href="{{ route('product.detalis', $related_product->id) }}">
                                            <img src="{{asset('image/products/'. $related_product->p_image)}}"
                                                class="img-fluid blur-up lazyload" alt="{{$related_product->product_name}}">
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
                                        <span class="span-name">{{$related_product->category->name}}</span>
                                        <a href="{{ route('product.detalis', $related_product->id) }}">
                                            <h5 class="name">{{$related_product->product_name}}</h5>
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
                                        <h5 class="price"><span class="theme-color">{{$related_product->discount_price}}</span> <del>{{$related_product->regular_price}}</del>
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
                        {{-- <div>
                            <div class="product-box-3 wow fadeInUp" data-wow-delay="0.05s">
                                <div class="product-header">
                                    <div class="product-image">
                                        <a href="product-left-thumbnail.html">
                                            <img src="../assets/images/cake/product/2.png"
                                                class="img-fluid blur-up lazyload" alt="">
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
                                        <span class="span-name">Vegetable</span>
                                        <a href="product-left-thumbnail.html">
                                            <h5 class="name">Fresh Bread and Pastry Flour 200 g</h5>
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
                                                    <i data-feather="star"></i>
                                                </li>
                                            </ul>
                                            <span>(4.0)</span>
                                        </div>
                                        <h6 class="unit">250 ml</h6>
                                        <h5 class="price"><span class="theme-color">$08.02</span> <del>$15.15</del>
                                        </h5>
                                        <div class="add-to-cart-box bg-white">
                                            <button class="btn btn-add-cart addcart-button">Add
                                                <span class="add-icon bg-light-gray">
                                                    <i class="fa-solid fa-plus"></i>
                                                </span>
                                            </button>
                                            <div class="cart_qty qty-box">
                                                <div class="input-group bg-white">
                                                    <button type="button" class="qty-left-minus bg-gray"
                                                        data-type="minus" data-field="">
                                                        <i class="fa fa-minus" aria-hidden="true"></i>
                                                    </button>
                                                    <input class="form-control input-number qty-input" type="text"
                                                        name="quantity" value="0">
                                                    <button type="button" class="qty-right-plus bg-gray"
                                                        data-type="plus" data-field="">
                                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="product-box-3 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="product-header">
                                    <div class="product-image">
                                        <a href="product-left-thumbnail.html">
                                            <img src="../assets/images/cake/product/3.png"
                                                class="img-fluid blur-up lazyload" alt="">
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
                                        <span class="span-name">Vegetable</span>
                                        <a href="product-left-thumbnail.html">
                                            <h5 class="name">Peanut Butter Bite Premium Butter Cookies 600 g</h5>
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
                                                    <i data-feather="star"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star"></i>
                                                </li>
                                            </ul>
                                            <span>(2.4)</span>
                                        </div>
                                        <h6 class="unit">350 G</h6>
                                        <h5 class="price"><span class="theme-color">$04.33</span> <del>$10.36</del>
                                        </h5>
                                        <div class="add-to-cart-box bg-white">
                                            <button class="btn btn-add-cart addcart-button">Add
                                                <span class="add-icon bg-light-gray">
                                                    <i class="fa-solid fa-plus"></i>
                                                </span>
                                            </button>
                                            <div class="cart_qty qty-box">
                                                <div class="input-group bg-white">
                                                    <button type="button" class="qty-left-minus bg-gray"
                                                        data-type="minus" data-field="">
                                                        <i class="fa fa-minus" aria-hidden="true"></i>
                                                    </button>
                                                    <input class="form-control input-number qty-input" type="text"
                                                        name="quantity" value="0">
                                                    <button type="button" class="qty-right-plus bg-gray"
                                                        data-type="plus" data-field="">
                                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="product-box-3 wow fadeInUp" data-wow-delay="0.15s">
                                <div class="product-header">
                                    <div class="product-image">
                                        <a href="product-left-thumbnail.html">
                                            <img src="../assets/images/cake/product/4.png"
                                                class="img-fluid blur-up lazyload" alt="">
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
                                        <span class="span-name">Snacks</span>
                                        <a href="product-left-thumbnail.html">
                                            <h5 class="name">SnackAmor Combo Pack of Jowar Stick and Jowar Chips</h5>
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
                                        <h6 class="unit">570 G</h6>
                                        <h5 class="price"><span class="theme-color">$12.52</span> <del>$13.62</del>
                                        </h5>
                                        <div class="add-to-cart-box bg-white">
                                            <button class="btn btn-add-cart addcart-button">Add
                                                <span class="add-icon bg-light-gray">
                                                    <i class="fa-solid fa-plus"></i>
                                                </span>
                                            </button>
                                            <div class="cart_qty qty-box">
                                                <div class="input-group bg-white">
                                                    <button type="button" class="qty-left-minus bg-gray"
                                                        data-type="minus" data-field="">
                                                        <i class="fa fa-minus" aria-hidden="true"></i>
                                                    </button>
                                                    <input class="form-control input-number qty-input" type="text"
                                                        name="quantity" value="0">
                                                    <button type="button" class="qty-right-plus bg-gray"
                                                        data-type="plus" data-field="">
                                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="product-box-3 wow fadeInUp" data-wow-delay="0.2s">
                                <div class="product-header">
                                    <div class="product-image">
                                        <a href="product-left-thumbnail.html">
                                            <img src="../assets/images/cake/product/5.png"
                                                class="img-fluid blur-up lazyload" alt="">
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
                                        <span class="span-name">Snacks</span>
                                        <a href="product-left-thumbnail.html">
                                            <h5 class="name">Yumitos Chilli Sprinkled Potato Chips 100 g</h5>
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
                                                    <i data-feather="star"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star"></i>
                                                </li>
                                            </ul>
                                            <span>(3.8)</span>
                                        </div>
                                        <h6 class="unit">100 G</h6>
                                        <h5 class="price"><span class="theme-color">$10.25</span> <del>$12.36</del>
                                        </h5>
                                        <div class="add-to-cart-box bg-white">
                                            <button class="btn btn-add-cart addcart-button">Add
                                                <span class="add-icon bg-light-gray">
                                                    <i class="fa-solid fa-plus"></i>
                                                </span>
                                            </button>
                                            <div class="cart_qty qty-box">
                                                <div class="input-group bg-white">
                                                    <button type="button" class="qty-left-minus bg-gray"
                                                        data-type="minus" data-field="">
                                                        <i class="fa fa-minus" aria-hidden="true"></i>
                                                    </button>
                                                    <input class="form-control input-number qty-input" type="text"
                                                        name="quantity" value="0">
                                                    <button type="button" class="qty-right-plus bg-gray"
                                                        data-type="plus" data-field="">
                                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="product-box-3 wow fadeInUp" data-wow-delay="0.25s">
                                <div class="product-header">
                                    <div class="product-image">
                                        <a href="product-left-thumbnail.html">
                                            <img src="../assets/images/cake/product/6.png"
                                                class="img-fluid blur-up lazyload" alt="">
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
                                        <span class="span-name">Vegetable</span>
                                        <a href="product-left-thumbnail.html">
                                            <h5 class="name">Fantasy Crunchy Choco Chip Cookies</h5>
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
                                                    <i data-feather="star"></i>
                                                </li>
                                            </ul>
                                            <span>(4.0)</span>
                                        </div>

                                        <h6 class="unit">550 G</h6>

                                        <h5 class="price"><span class="theme-color">$14.25</span> <del>$16.57</del>
                                        </h5>
                                        <div class="add-to-cart-box bg-white">
                                            <button class="btn btn-add-cart addcart-button">Add
                                                <span class="add-icon bg-light-gray">
                                                    <i class="fa-solid fa-plus"></i>
                                                </span>
                                            </button>
                                            <div class="cart_qty qty-box">
                                                <div class="input-group bg-white">
                                                    <button type="button" class="qty-left-minus bg-gray"
                                                        data-type="minus" data-field="">
                                                        <i class="fa fa-minus" aria-hidden="true"></i>
                                                    </button>
                                                    <input class="form-control input-number qty-input" type="text"
                                                        name="quantity" value="0">
                                                    <button type="button" class="qty-right-plus bg-gray"
                                                        data-type="plus" data-field="">
                                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="product-box-3 wow fadeInUp" data-wow-delay="0.3s">
                                <div class="product-header">
                                    <div class="product-image">
                                        <a href="product-left-thumbnail.html">
                                            <img src="../assets/images/cake/product/7.png" class="img-fluid"
                                                alt="">
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
                                        <span class="span-name">Vegetable</span>
                                        <a href="product-left-thumbnail.html">
                                            <h5 class="name">Fresh Bread and Pastry Flour 200 g</h5>
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
                                                    <i data-feather="star"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star"></i>
                                                </li>
                                            </ul>
                                            <span>(3.8)</span>
                                        </div>

                                        <h6 class="unit">1 Kg</h6>

                                        <h5 class="price"><span class="theme-color">$12.68</span> <del>$14.69</del>
                                        </h5>
                                        <div class="add-to-cart-box bg-white">
                                            <button class="btn btn-add-cart addcart-button">Add
                                                <span class="add-icon bg-light-gray">
                                                    <i class="fa-solid fa-plus"></i>
                                                </span>
                                            </button>
                                            <div class="cart_qty qty-box">
                                                <div class="input-group bg-white">
                                                    <button type="button" class="qty-left-minus bg-gray"
                                                        data-type="minus" data-field="">
                                                        <i class="fa fa-minus" aria-hidden="true"></i>
                                                    </button>
                                                    <input class="form-control input-number qty-input" type="text"
                                                        name="quantity" value="0">
                                                    <button type="button" class="qty-right-plus bg-gray"
                                                        data-type="plus" data-field="">
                                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Releted Product Section End -->
@endsection