@extends('layouts.fontend_master')


@section('content')
    <!-- Breadcrumb Section Start -->
    <section class="breadscrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadscrumb-contain">
                        <h2>Shop Top Filter</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="index.html">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Shop Top Filter</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shop Section Start -->
    <section class="section-b-space shop-section">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="show-button">
                        <div class="top-filter-menu-2">
                            <div class="sidebar-filter-menu" data-bs-toggle="collapse" data-bs-target="#collapseExample">
                                <a href="javascript:void(0)"><i class="fa-solid fa-filter"></i> Filter Menu</a>
                            </div>

                            <div class="ms-auto d-flex align-items-center">
                                <div class="category-dropdown me-md-3">
                                    <h5 class="text-content">Sort By :</h5>
                                    <div class="dropdown">
                                        <button class="dropdown-toggle" type="button" id="dropdownMenuButton1"
                                            data-bs-toggle="dropdown">
                                            <span>Most Popular</span> <i class="fa-solid fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li>
                                                <a class="dropdown-item" id="pop"
                                                    href="javascript:void(0)">Popularity</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" id="low" href="javascript:void(0)">Low - High
                                                    Price</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" id="high" href="javascript:void(0)">High - Low
                                                    Price</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" id="rating" href="javascript:void(0)">Average
                                                    Rating</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" id="aToz" href="javascript:void(0)">A - Z
                                                    Order</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" id="zToa" href="javascript:void(0)">Z - A
                                                    Order</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" id="off" href="javascript:void(0)">% Off -
                                                    Hight To
                                                    Low</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="grid-option grid-option-2">
                                    <ul>


                                        <li class="grid-btn five-grid d-xxl-inline-block">
                                            <a href="javascript:void(0)">
                                                <img src="{{ asset('fonend_asset/svg/grid-3.svg') }}"
                                                    class="blur-up lazyload d-lg-inline-block " alt="">
                                            </a>
                                        </li>
                                        <li class="list-btn">
                                            <a href="javascript:void(0)">
                                                <img src="{{ asset('fonend_asset/svg/list.svg') }}" class="blur-up lazyload"
                                                    alt="">
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="top-filter-category" id="collapseExample">
                        <div class="row g-sm-4 g-3">
                            <div class="col-xl-3 col-md-6">
                                <div class="category-title">
                                    <h3>Pack Size</h3>
                                </div>
                                <ul class="category-list custom-padding custom-height">

                                    <li>
                                        {{-- @foreach ($poducts as $categorie)
                                            <div class="form-check ps-0 m-0 category-list-box">
                                                <input class="checkbox_animated category-checkbox" type="checkbox" id="fruit" value="{{$categorie->category->id}}" id="{{$categorie->category->id}}">
                                                <label class="form-check-label" for="fruit">
                                                    <span class="name">{{ $categorie->category->name }}</span>
                                                    <span class="number">({{ $categorie->product->quantity ?? '0' }})</span>
                                                </label>
                                            </div>
                                        @endforeach --}}

                                        @php
                                            $displayedCategories = [];
                                        @endphp

                                        @foreach ($poducts as $product)
                                            @if (!in_array($product->category->id, $displayedCategories))
                                                <div class="form-check ps-0 m-0 category-list-box">
                                                    <input class="checkbox_animated category-checkbox" type="checkbox"
                                                        value="{{ $product->category->id }}"
                                                        id="{{ $product->category->id }}">
                                                    <label class="form-check-label"
                                                        for="category_{{ $product->category->id }}">
                                                        <span class="name">{{ $product->category->name }}</span>
                                                        <span
                                                            class="number">({{ $product->category->products->count() ?? '0' }})</span>
                                                    </label>
                                                </div>
                                                {{-- Mark the category as displayed to avoid duplication --}}
                                                @php
                                                    $displayedCategories[] = $product->category->id;
                                                @endphp
                                            @endif
                                        @endforeach

                                    </li>

                                </ul>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="category-title">
                                    <h3>Price</h3>
                                </div>
                                <div class="range-slider">
                                    <input type="text" class="js-range-slider" value="">
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="category-title">
                                    <h3>Discount</h3>
                                </div>
                                <ul class="category-list">
                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                <span class="name">upto 5%</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>


                                </ul>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="category-title">
                                    <h3>Category</h3>
                                </div>
                                <ul class="category-list custom-padding custom-height">
                                    <li>
                                        <div class="form-check ps-0 m-0 category-list-box">
                                            <input class="checkbox_animated" type="checkbox" id="flexCheckDefault5">
                                            <label class="form-check-label" for="flexCheckDefault5">
                                                <span class="name">400 to 500 g</span>
                                                <span class="number">(15)</span>
                                            </label>
                                        </div>
                                    </li>



                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="product-list-section">
                        <!-- Products will be displayed here -->
                    </div>

                    <div
                        class="row g-sm-4 g-3 row-cols-xxl-5 row-cols-xl-3 row-cols-lg-2 row-cols-md-3 row-cols-2 product-list-section">

                        @foreach ($poducts as $poduct)
                            <div>

                                <div class="product-box-3 h-100 wow fadeInUp">



                                    <div class="product-header">
                                        <div class="product-image">
                                            <a href="{{ route('product.detalis', $poduct->id) }}">
                                                <img src="{{ asset('image/products/' . $poduct->p_image) }}"
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
                                            <span class="span-name">{{ $poduct->category->name }}</span>
                                            <a href="{{ route('product.detalis', $poduct->id) }}">
                                                <h5 class="name">{{ $poduct->product_name }}</h5>
                                            </a>
                                            {{-- <p class="text-content mt-1 mb-2 product-content">Cheesy feet cheesy grin brie.
                                                Mascarpone cheese and wine hard cheese the big cheese everyone loves smelly
                                                cheese macaroni cheese croque monsieur.</p> --}}
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
                                            <h6 class="unit">{{ $poduct->product->quantity ?? 'out of stock' }}
                                            </h6>
                                            <h5 class="price"><span
                                                    class="theme-color">{{ $poduct->discount_price }}</span> <del>
                                                    @if ($poduct->discount > 0)
                                                        {{ $poduct->regular_price }}
                                                    @endif
                                                </del>
                                                </del>
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
                        @endforeach
                    </div>

                    <nav class="custome-pagination">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link" href="javascript:void(0)" tabindex="-1" aria-disabled="true">
                                    <i class="fa-solid fa-angles-left"></i>
                                </a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="javascript:void(0)">1</a>
                            </li>
                            <li class="page-item" aria-current="page">
                                <a class="page-link" href="javascript:void(0)">2</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="javascript:void(0)">3</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="javascript:void(0)">
                                    <i class="fa-solid fa-angles-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->
@endsection


@section('fotter_scprit')
    <script>
        $(document).ready(function() {
            $('.category-checkbox').on('click', function() {
                var category = [];
                $('.category-checkbox:checked').each(function() {
                    category.push($(this).val());
                });
                // console.log(category);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    }
                });

                $.ajax({
                    type: "GET",
                    url: "/product/filter",
                    data: {
                        category: category
                    },
                    success: function(data) {
                        console.log(data);
                      //  displayFilteredProducts(data);

                    }
                });
            });



        });
    </script>


    {{-- <script>
        $(document).ready(function() {
            $('.category-checkbox').on('click', function() {
                var category = [];
                $('.category-checkbox:checked').each(function() {
                    category.push($(this).val());
                });
                console.log(category);
                $.ajax({
                    type: "GET",
                    url: "/product/filter",
                    data: {
                        category: category
                    },
                    success: function(data) {
                        displayFilteredProducts(data);
                        console.log(data);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });

            function displayFilteredProducts(data) {
                var products = JSON.parse(data);

                $('.product-list-section').empty();

                $.each(products, function(index, product) {
                    var html = '<div class="product-box">' +
                        '<h3>' + product.product_name + '</h3>' +
                        '<p>Category: ' + product.category.name + '</p>' +
                        '<img src="' + product.p_image + '" alt="Product Image">' +
                        '</div>';

                    $('.product-list-section').append(html);
                });
            }
        });
    </script> --}}
@endsection
