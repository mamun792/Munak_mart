@extends('layouts.fontend_master')


@section('content')
    <!-- Breadcrumb Section Start -->
    <section class="breadscrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadscrumb-contain">
                        <h2>User Dashboard</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="index.html">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">User Dashboard</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong> {{ session('success') }} </strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <!-- User Dashboard Section Start -->
    <section class="user-dashboard-section section-b-space">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-xxl-3 col-lg-4">
                    <div class="dashboard-left-sidebar">
                        <div class="close-button d-flex d-lg-none">
                            <button class="close-sidebar">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>
                        <div class="profile-box">
                            <div class="cover-image">
                                @if (Auth::user()->photo !== null)
                                    <img src="{{ asset('image/profile_photo/' . Auth::user()->photo) }}"
                                        class="img-fluid blur-up lazyload" alt="mm">
                                @else
                                @endif
                                <img src="{{ asset('image/profile_photo/1689878297.jpg') }}"
                                    class="img-fluid blur-up lazyload" alt="mm">
                            </div>

                            <div class="profile-contain">
                                <div class="profile-image">
                                    <div class="position-relative">
                                        @if (Auth::user()->photo !== null)
                                            <img src="{{ asset('image/profile_photo/' . Auth::user()->photo) }}"
                                                class="blur-up lazyload update_img" alt="not found">
                                        @else
                                            <img src="{{ Avatar::create(Auth::user()->name)->toBase64() }}"
                                                class="blur-up lazyload update_img" alt="not found">
                                        @endif

                                        {{-- <div class="cover-icon">
                                            <i class="fa-solid fa-pen">
                                                <input type="file" onchange="readURL(this,0)">
                                            </i>
                                        </div> --}}
                                    </div>
                                </div>

                                <div class="profile-name">
                                    <h3>{{ Auth::user()->name }}</h3>
                                    <h6 class="text-content">{{ Auth::user()->email }}</h6>
                                </div>
                            </div>
                        </div>

                        <ul class="nav nav-pills user-nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-dashboard-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-dashboard" type="button" role="tab"
                                    aria-controls="pills-dashboard" aria-selected="true"><i data-feather="home"></i>
                                    DashBoard</button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-order-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-order" type="button" role="tab" aria-controls="pills-order"
                                    aria-selected="false"><i data-feather="shopping-bag"></i>Order</button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-wishlist-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-wishlist" type="button" role="tab"
                                    aria-controls="pills-wishlist" aria-selected="false"><i data-feather="heart"></i>
                                    Wishlist</button>

                            </li>



                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-address-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-address" type="button" role="tab"
                                    aria-controls="pills-address" aria-selected="false"><i data-feather="map-pin"></i>
                                    Address</button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-profile" type="button" role="tab"
                                    aria-controls="pills-profile" aria-selected="false"><i data-feather="user"></i>
                                    Profile</button>
                            </li>


                        </ul>
                    </div>
                </div>

                <div class="col-xxl-9 col-lg-8">
                    <button class="btn left-dashboard-show btn-animation btn-md fw-bold d-block mb-4 d-lg-none">Show
                        Menu</button>
                    <div class="dashboard-right-sidebar">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-dashboard" role="tabpanel"
                                aria-labelledby="pills-dashboard-tab">
                                <div class="dashboard-home">
                                    <div class="title">
                                        <h2>My Dashboard</h2>
                                        <span class="title-leaf">
                                            <svg class="icon-width bg-gray">
                                                <use xlink:href="../assets/svg/leaf.svg#leaf"></use>
                                            </svg>
                                        </span>
                                    </div>

                                    <div class="dashboard-user-name">
                                        <h6 class="text-content">Hello, <b
                                                class="text-title">{{ auth()->user()->name }}</b></h6>
                                        <p class="text-content">From your My Account Dashboard you have the ability to
                                            view a snapshot of your recent account activity and update your account
                                            information. Select a link below to view or edit information.</p>
                                    </div>

                                    <div class="total-box">
                                        <div class="row g-sm-4 g-3">
                                            <div class="col-xxl-4 col-lg-6 col-md-4 col-sm-6">
                                                <div class="totle-contain">
                                                    <img src="../assets/images/svg/order.svg"
                                                        class="img-1 blur-up lazyload" alt="">
                                                    <img src="{{ asset('fonend_asset/images/svg/order.svg') }}"
                                                        class="blur-up lazyload" alt="">
                                                    <div class="totle-detail">
                                                        <h5>Total Order</h5>
                                                        <h3>{{ $oder }}</h3>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xxl-4 col-lg-6 col-md-4 col-sm-6">
                                                <div class="totle-contain">
                                                    <img src="../assets/images/svg/pending.svg"
                                                        class="img-1 blur-up lazyload" alt="">
                                                    <img src="{{ asset('fonend_asset/images/svg/pending.svg') }}"
                                                        class="blur-up lazyload" alt="">
                                                    <div class="totle-detail">
                                                        <h5>Total Pending Order</h5>
                                                        <h3>{{ $panding_oder }}</h3>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xxl-4 col-lg-6 col-md-4 col-sm-6">
                                                <div class="totle-contain">
                                                    <img src="{{ asset('fonend_asset/images/svg/wishlist.svg') }}"
                                                        class="img-1 blur-up lazyload" alt="">
                                                    <img src="{{ asset('fonend_asset/images/svg/wishlist.svg') }}"
                                                        class="blur-up lazyload" alt="">
                                                    <div class="totle-detail">
                                                        <h5>Total Wishlist</h5>
                                                        <h3>{{ $whithlist }}</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="dashboard-title">
                                        <h3>Wellcome {{ auth()->user()->name }}</h3>
                                    </div>


                                </div>
                            </div>

                            <div class="tab-pane fade show" id="pills-wishlist" role="tabpanel"
                                aria-labelledby="pills-wishlist-tab">
                                <div class="dashboard-wishlist">
                                    <div class="title">
                                        <h2>My Wishlist History</h2>
                                        <span class="title-leaf title-leaf-gray">
                                            <svg class="icon-width bg-gray">
                                                <use xlink:href="../assets/svg/leaf.svg#leaf"></use>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="row g-sm-4 g-3">
                                        @foreach ($favorit as $favorits)
                                            <div class="col-xxl-3 col-lg-6 col-md-4 col-sm-6">
                                                <div class="product-box-3 theme-bg-white h-100">
                                                    <div class="product-header">
                                                        <div class="product-image">
                                                            <a href="product-left-thumbnail.html">
                                                                <img src="{{ asset('image/products/' . $favorits->wishlists->p_image) }}"
                                                                    class="img-fluid blur-up lazyload" alt="">
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
                                                            <span
                                                                class="span-name">{{ $favorits->wishlists->product_name }}</span>
                                                            <a href="product-left-thumbnail.html">
                                                                <h5 class="name">Fresh Bread and Pastry Flour 200 g</h5>
                                                            </a>
                                                            {{-- <p class="text-content mt-1 mb-2 product-content">{{$favorits->product->short_productDescription}}.</p> --}}
                                                            <h6 class="unit mt-1">250 ml</h6>
                                                            <h5 class="price">
                                                                <span class="theme-color">
                                                                    {{ $favorits->wishlists->discount_price }}</span>
                                                                <del>{{ $favorits->wishlists->regular_price }}</del>
                                                            </h5>
                                                            <div class="add-to-cart-box mt-2">
                                                                <button class="btn btn-add-cart addcart-button"
                                                                    tabindex="0">Add
                                                                    <span class="add-icon">
                                                                        <i class="fa-solid fa-plus"></i>
                                                                    </span>
                                                                </button>
                                                                <div class="cart_qty qty-box">
                                                                    <div class="input-group">
                                                                        <button type="button" class="qty-left-minus"
                                                                            data-type="minus" data-field="">
                                                                            <i class="fa fa-minus" aria-hidden="true"></i>
                                                                        </button>
                                                                        <input class="form-control input-number qty-input"
                                                                            type="text" name="quantity"
                                                                            value="0">
                                                                        <button type="button" class="qty-right-plus"
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
                                </div>
                            </div>

                            <div class="tab-pane fade show" id="pills-order" role="tabpanel"
                                aria-labelledby="pills-order-tab">
                                <div class="dashboard-order">
                                    <div class="title">
                                        <h2>My Orders History</h2>
                                        <span class="title-leaf title-leaf-gray">
                                            <svg class="icon-width bg-gray">
                                                <use xlink:href="../assets/svg/leaf.svg#leaf"></use>
                                            </svg>
                                        </span>
                                    </div>



                                    <table id="example" class="display" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Oder Id</th>
                                                <th>Oder Date</th>
                                                <th>Status</th>
                                                <th>Price </th>
                                                <th>Deatiles</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($invoice_deatiles as $invoice_deatile)
                                                <tr>



                                                    <td>{{ $invoice_deatile->invoice_no }}</td>
                                                    <td>{{ $invoice_deatile->created_at->format('Y F d') }}</td>
                                                    <td>{{ $invoice_deatile->payment_status }}</td>
                                                    <td>{{ $invoice_deatile->total_amount }} TK
                                                        ({{ $invoice_deatile->id }})
                                                    </td>
                                                    <td>
                                                        <button type="submit" class="btn btn-primary"
                                                            onclick="loadDetails({{ $invoice_deatile->id }})">Detalies</button>

                                                    </td>
                                                    <td>
                                                        {{-- @php
                                                            $review = App\Models\Review::where('product_id', $invoice_deatile->id)->first();
                                                        @endphp
                                                        @if ($review)
                                                            <p>Not review</p>
                                                        @else
                                                            <a class="btn btn-primary"
                                                                href="{{ route('customer.review', $invoice_deatile->id) }}">
                                                                Review</a>
                                                        @endif --}}
                                                        @php
                                                            $productId = $invoice_deatile->id;
                                                        @endphp

                                                        <x-product-review :productId="$productId" />
                                                    </td>

                                                </tr>
                                            @endforeach
                                        </tbody>

                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane fade show" id="pills-address" role="tabpanel"
                                aria-labelledby="pills-address-tab">
                                <div class="dashboard-address">
                                    <div class="title title-flex">
                                        <div>
                                            <h2>My Address Book</h2>
                                            <span class="title-leaf">
                                                <svg class="icon-width bg-gray">
                                                    <use xlink:href="../assets/svg/leaf.svg#leaf"></use>
                                                </svg>
                                            </span>
                                        </div>

                                        <button class="btn theme-bg-color text-white btn-sm fw-bold mt-lg-0 mt-3"
                                            data-bs-toggle="modal" data-bs-target="#add-address"><i data-feather="plus"
                                                class="me-2"></i> Add New Address</button>
                                    </div>

                                    <div class="row g-sm-4 g-3">
                                        @foreach ($adderss as $adders)
                                            <div class="col-xxl-4 col-xl-6 col-lg-12 col-md-6">
                                                <div class="address-box">
                                                    <div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="jack"
                                                                id="flexRadioDefault2" checked>
                                                        </div>

                                                        <div class="label">
                                                            <label>{{ $adders->Label }}</label>
                                                        </div>

                                                        <div class="table-responsive address-table">
                                                            <table class="table">
                                                                <tbody>
                                                                    <tr>
                                                                        <td colspan="2">{{ $adders->CustomerName }}
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>Address :</td>
                                                                        <td>
                                                                            <p>{{ $adders->CustomerAddress }}</p>
                                                                            </p>
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>Zip Code :</td>
                                                                        <td>{{ $adders->ZipCode }}</td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>Phone :</td>
                                                                        <td>{{ $adders->PhoneNumber }}</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>

                                                    <div class="button-group">
                                                        <button value="{{ $adders->id }}" type="button"
                                                            class="btn btn-primary edit-button" data-bs-toggle="modal"
                                                            data-bs-target="#editModal">
                                                            <i class="fa-solid fa-pen-to-square"></i> Edit
                                                        </button>
                                                        <button class="btn btn-sm add-button w-100" data-bs-toggle="modal"
                                                            data-bs-target="#removeProfile"><i data-feather="trash-2"></i>
                                                            Remove</button>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>



                            <div class="tab-pane fade show" id="pills-profile" role="tabpanel"
                                aria-labelledby="pills-profile-tab">
                                <div class="dashboard-profile">
                                    <div class="title">
                                        <h2>My Profile</h2>
                                        <span class="title-leaf">
                                            <svg class="icon-width bg-gray">
                                                <use xlink:href="../assets/svg/leaf.svg#leaf"></use>
                                            </svg>
                                        </span>
                                    </div>

                                    <div class="profile-detail dashboard-bg-box">
                                        <div class="dashboard-title">
                                            <h3>Profile Name</h3>
                                        </div>
                                        <div class="profile-name-detail">
                                            <div class="d-sm-flex align-items-center d-block">
                                                <h3>{{ auth()->user()->name }}</h3>
                                                <div class="product-rating profile-rating">
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
                                            </div>

                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#editProfile">Edit</a>
                                        </div>

                                        <div class="location-profile">
                                            <ul>
                                                <li>
                                                    <div class="location-box">
                                                        <i data-feather="map-pin"></i>
                                                        <h6>{{ $adderss->first()->CustomerAddress }}
                                                        </h6>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="location-box">
                                                        <i data-feather="mail"></i>
                                                        <h6>{{ auth()->user()->email }}</h6>
                                                    </div>
                                                </li>


                                            </ul>
                                        </div>


                                    </div>

                                    <div class="profile-about dashboard-bg-box">
                                        <div class="row">
                                            <div class="col-xxl-7">
                                                <div class="dashboard-title mb-3">
                                                    <h3>Profile About</h3>
                                                </div>

                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                <td>Gender :</td>
                                                                <td>Female</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Birthday :</td>
                                                                <td>21/05/1997</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Phone Number :</td>
                                                                <td>
                                                                    <a href="javascript:void(0)">
                                                                        {{ $adderss->first()->PhoneNumber }}</a>
                                                                </td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div class="dashboard-title mb-3">
                                                    <h3>Login Details</h3>
                                                </div>

                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                <td>Email :</td>
                                                                <td>
                                                                    <a href="javascript:void(0)">{{ auth()->user()->email }}
                                                                        <span data-bs-toggle="modal"
                                                                            data-bs-target="#editProfile">Edit</span></a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Password :</td>
                                                                <td>
                                                                    <a href="javascript:void(0)">●●●●●●
                                                                        <span data-bs-toggle="modal"
                                                                            data-bs-target="#editProfile">Edit</span></a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="col-xxl-5">
                                                <div class="profile-image">
                                                    <img src="../assets/images/inner-page/dashboard-profile.png"
                                                        class="img-fluid blur-up lazyload" alt="">
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
        </div>
    </section>
    <!-- User Dashboard Section End -->


    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Profile Edit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form id="editForm" action="{{ route('address.update', ['id' => '__ADDRESS_ID__']) }}"
                            method="post">
                            @csrf



                            <div class="form-group">
                                <label for="Label">Label:</label>
                                <input type="text" class="form-control" id="Label" name="Label" required>
                            </div>

                            <div class="form-group">
                                <label for="CustomerName">User Name:</label>
                                <input type="text" class="form-control" id="CustomerName" name="CustomerName"
                                    required>
                            </div>

                            <div class="form-group">
                                <label for="CustomerAddress">Address:</label>
                                <input type="text" class="form-control" id="CustomerAddress" name="CustomerAddress"
                                    required>
                            </div>

                            <div class="form-group">
                                <label for="ZipCode">Zip Code:</label>
                                <input type="text" class="form-control" id="ZipCode" name="ZipCode" required>
                            </div>

                            <div class="form-group">
                                <label for="PhoneNumber">Phone:</label>
                                <input type="text" class="form-control" id="PhoneNumber" name="PhoneNumber" required>
                            </div>

                            <input type="hidden" id="address_id" name="address_id">

                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection


@section('fotter_scprit')
    <script>
        $(document).ready(function() {

            $('#example').DataTable();

        });

        function loadDetails(InvoiceId) {
            const id = InvoiceId;

            window.location.href = "/invoice/details/" + id;

            // $.ajaxSetup({
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     }
            // });
            // $.ajax({
            //     type: "GET",
            //     url: "/invoice/details/" + id,


            //     success: function(response) {
            //         console.log(response);
            //         // alert(JSON.stringify(response));
            //         // $('#invoiceDetails').html(response);
            //         // $('#invoiceDetailsModal').modal('show');
            //     },

            // });
        }

        $(document).ready(function() {

            $('.edit-button').on('click', function() {
                var addressId = $(this).val();


                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "GET",

                    url: "/address/edit/" + addressId,



                    success: function(response) {
                        console.log(response);

                        $('#Label').val(response.Label);
                        $('#CustomerName').val(response.CustomerName);
                        $('#CustomerAddress').val(response.CustomerAddress);

                        $('#address_id').val(addressId);
                        $('#ZipCode').val(response.ZipCode);
                        $('#PhoneNumber').val(response.PhoneNumber);


                        var formAction = $('#editForm').attr('action');
                        formAction = formAction.replace('__ADDRESS_ID__', addressId);
                        $('#editForm').attr('action', formAction);
                        $('#editModal').modal('show');

                    },
                    error: function(error) {
                        console.log(error);
                    }

                });
            });
        });
    </script>
@endsection
