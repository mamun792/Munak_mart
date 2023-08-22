@extends('layouts.fontend_master')

@section('content')
    <!-- Breadcrumb Section Start -->
    <section class="breadscrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadscrumb-contain">
                        <h2>Checkout</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="index.html">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout section Start -->
    <section class="checkout-section-2 section-b-space">
        <div class="container-fluid-lg">
            <form action="{{ route('checkout.final') }}" method="POST">
                @csrf
                <div class="row g-sm-4 g-3">

                    <div class="col-lg-8">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('success') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                            </ul>
                        </div>
                    @endif
                        <div class="left-sidebar-checkout">
                            <div class="checkout-detail-box">
                                <ul>
                                    <li>
                                        <div class="checkout-icon">
                                            <lord-icon target=".nav-item" src="https://cdn.lordicon.com/ggihhudh.json"
                                                trigger="loop-on-hover"
                                                colors="primary:#121331,secondary:#646e78,tertiary:#0baf9a"
                                                class="lord-icon">
                                            </lord-icon>
                                        </div>
                                        <div class="checkout-box">
                                            <div class="checkout-title">
                                                <h4>Delivery Address</h4>
                                            </div>


                                            <div class="checkout-detail">

                                                <div class="row g-4">
                                                    @foreach ($address as $addres)
                                                        <div class="col-xxl-6 col-lg-12 col-md-6">

                                                            <div class="delivery-address-box">



                                                                <div>

                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio"
                                                                            value="{{ $addres->id }}"
                                                                            name="address_id"{{ $loop->index == 0 ? 'checked="checked"' : '' }}>
                                                                    </div>

                                                                    <div class="label">
                                                                        <label>{{ $addres->Label }}</label>
                                                                    </div>

                                                                    <ul class="delivery-address-detail">
                                                                        <li>
                                                                            <h4 class="fw-500">{{ $addres->CustomerName }}
                                                                            </h4>
                                                                        </li>

                                                                        <li>
                                                                            <p class="text-content"><span
                                                                                    class="text-title">Address
                                                                                    :</span>{{ $addres->CustomerAddress }}
                                                                            </p>
                                                                        </li>

                                                                        <li>
                                                                            <h6 class="text-content"><span
                                                                                    class="text-title">Zip
                                                                                    Code :</span>
                                                                                {{ $addres->ZipCode }}</h6>
                                                                        </li>

                                                                        <li>
                                                                            <h6 class="text-content mb-0"><span
                                                                                    class="text-title">Phone
                                                                                    :</span> {{ $addres->PhoneNumber }}</h6>
                                                                        </li>
                                                                    </ul>

                                                                </div>

                                                            </div>

                                                        </div>
                                                    @endforeach
                                                </div>


                                            </div>

                                        </div>
                                        <div class="d-flex justify-content-center ">
                                            <button type="button" class="btn bg-light text-dark" data-bs-toggle="modal"
                                                data-bs-target="#staticBackdrop">
                                                Add New Address
                                            </button>
                                        </div>

                                    </li>

                                    <li>
                                        <div class="checkout-icon">
                                            <lord-icon target=".nav-item" src="https://cdn.lordicon.com/oaflahpk.json"
                                                trigger="loop-on-hover" colors="primary:#0baf9a" class="lord-icon">
                                            </lord-icon>
                                        </div>
                                        <div class="checkout-box">
                                            <div class="checkout-title">
                                                <h4>Delivery Option</h4>
                                            </div>

                                            <div class="checkout-detail">
                                                <div class="row g-4">
                                                    <div class="col-xxl-6">
                                                        <div class="delivery-option">
                                                            <div class="delivery-category">
                                                                <div class="shipment-detail">
                                                                    <div
                                                                        class="form-check custom-form-check hide-check-box">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="delivery_option" value="1" checked>
                                                                        <label class="form-check-label"
                                                                            for="standard">Inside
                                                                            Dhaka (+60 tk)</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-xxl-6">
                                                        <div class="delivery-option">
                                                            <div class="delivery-category">
                                                                <div class="shipment-detail">
                                                                    <div
                                                                        class="form-check mb-0 custom-form-check show-box-checked">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="delivery_option" value="2">
                                                                        <label class="form-check-label" for="future">Out
                                                                            side
                                                                            Dhaka (+70 tk)</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>



                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="checkout-icon">
                                            <lord-icon target=".nav-item" src="https://cdn.lordicon.com/qmcsqnle.json"
                                                trigger="loop-on-hover" colors="primary:#0baf9a,secondary:#0baf9a"
                                                class="lord-icon">
                                            </lord-icon>
                                        </div>
                                        <div class="checkout-box">
                                            <div class="checkout-title">
                                                <h4>Payment Option</h4>
                                            </div>

                                            <div class="checkout-detail">
                                                <div class="accordion accordion-flush custom-accordion"
                                                    id="accordionFlushExample">
                                                    <div class="accordion-item">
                                                        <div class="accordion-header" id="flush-headingFour">
                                                            <div class="accordion-button collapsed">
                                                                <div class="custom-form-check form-check mb-0">
                                                                    <label class="form-check-label" for="cash"><input
                                                                            class="form-check-input mt-0" type="radio"
                                                                            value="cod" name="payment_option" checked>
                                                                        Cash
                                                                        On Delivery (COD)</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="flush-collapseFour"
                                                            class="accordion-collapse collapse show"
                                                            data-bs-parent="#accordionFlushExample">
                                                            <div class="accordion-body">
                                                                <p class="cod-review">Pay digitally with SMS Pay
                                                                    Link. Cash may not be accepted in COVID restricted
                                                                    areas.</a>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="accordion-item">
                                                        <div class="accordion-header" id="flush-headingOne">
                                                            <div class="accordion-button collapsed"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#flush-collapseOne">
                                                                <div class="custom-form-check form-check mb-0">
                                                                    <label class="form-check-label" for="credit"><input
                                                                            class="form-check-input mt-0" type="radio"
                                                                            value="online" name="payment_option">
                                                                        Online Payemnt</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="right-side-summery-box">
                            <div class="summery-box-2">
                                <div class="summery-header">
                                    <h3>Order Summery</h3>


                                </div>

                                <ul class="summery-contain">
                                    @foreach (cards() as $carts)
                                        <li>
                                            <img src="{{ asset('image/products/' . $carts->product->p_image) }}"
                                                class="img-fluid blur-up lazyloaded checkout-image" alt="">
                                            <h4>{{ $carts->product->product_name }} <span>X {{ $carts->quantity }}</span>
                                            </h4>
                                            <h4 class="price">{{ $carts->quantity * $carts->product->discount_price }}
                                            </h4>
                                        </li>
                                    @endforeach
                                </ul>

                                <ul class="summery-total">
                                    <li>
                                        <h4>Coupon/Code</h4>
                                        <h4 class="price">{{ session('s_cupon_name') }}</h4>
                                    </li>
                                    <li>
                                        <h4>Subtotal</h4>
                                        <h4 class="price">{{ session('s_sub_total') }}</h4>
                                    </li>


                                    <li>
                                        <h4>Disscuont</h4>
                                        <h4 class="price">
                                            {{ session('s_discount') }}
                                        </h4>
                                    </li>
                                    <li>
                                        <h4>Save</h4>
                                        <h4 class="price">
                                            {{ session('s_total_discount') }}
                                        </h4>
                                    </li>




                                    <li class="list-total">
                                        <h4>Total (BD)</h4>
                                        <h4 class="price">{{ session('s_total_ammount') }}</h4>
                                    </li>
                                </ul>
                            </div>



                            <button type="submit" class="btn theme-bg-color text-white btn-md w-100 mt-4 fw-bold">Place
                                Order</button>

                        </div>

                    </div>
            </form>
        </div>
        </div>
    </section>
    <!-- Checkout section End -->


    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Address</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <h2 class="mt-4">Customer Information Form</h2>
                        <form action="{{ route('costomer.adderss.add') }}" method="POST">

                            @csrf
                            <div class="mb-3">



                                <label class="form-label">Customer Label</label>
                                <input type="text" class="form-control" name="customerLabel"
                                    placeholder="Home/Office">

                                @error('customerLabel')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">



                                <label class="form-label">Customer </label>
                                <input type="text" class="form-control" name="customerName"
                                    placeholder="Enter Your Name">

                                @error('customerName')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="mb-3">
                                <label for="address" class="form-label">Address:</label>
                                <textarea class="form-control" name="address" rows="2"></textarea>
                                @error('address')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label>Phone Number:</label>
                                <input type="tel" class="form-control" name="phoneNumber" pattern="[0-9]{10}">
                                <small class="form-text text-muted">Enter 10 digits without spaces or dashes.</small>
                                @error('phoneNumber')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label>Zip Code:</label>
                                <input type="text" class="form-control" name="zipCode">
                                @error('zipCode')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    @endsection
