@extends('layouts.dashboardmaster')


@section('content')
    <div class="page-body">

        <!-- New Product Add Start -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-sm-8 m-auto">
                            <div class="card">
                                <div class="card-header-2">
                                    <h5>Add Inventory of {{ $product->product_name }}</h5>
                                    <hr>
                                    <p> {{ $product->short_productDescription }}</p>
                                    <img src="{{ asset('image/products/' . $product->p_image) }}" alt="not found">
                                </div>
                                <div class="card-body">

                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif

                                    @if (session('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                    @endif

                                    <form class="theme-form theme-form-2 mega-form"
                                        action="{{ route('insert.inventory', $product->id) }}" method="POST">
                                        @csrf


                                        <div class="mb-4 row align-items-center">
                                            <label class="col-sm-3 col-form-label form-label-title">Size Name</label>
                                            <div class="col-sm-9">
                                                <select class="js-example-basic-single w-100" name="size_name">
                                                    <option>--Select Size--</option>
                                                    @foreach ($sizes as $size)
                                                        <option value="{{ $size->id }}">{{ $size->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label class="col-sm-3 col-form-label form-label-title">Color Name</label>
                                            <div class="col-sm-9">
                                                <select class="js-example-basic-single w-100" name="color_name">
                                                    <option>--Select Color--</option>
                                                    @foreach ($colors as $color)
                                                        <option value="{{ $color->id }}">{{ $color->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Add Quantity</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="number" name="quantity"
                                                    value="{{ old('quantity') }}" placeholder="Quantity">
                                            </div>
                                            @error('quantity')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-4 row">
                                            <div class="col-sm-3"></div>
                                            <div class="col-sm-9">
                                                <button type="submit" class="btn btn-primary">Add Product</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>


                            <div class="card">
                                <div class="card-header-2">
                                    <h5> Inventory Calcluation</h5>

                                </div>
                                <div class="card-body">

                                    <table class="table mt-3">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Size Name</th>
                                                <th scope="col">Color Code</th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col">Value</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $total = 0;
                                                $quantity = 0;
                                            @endphp
                                            @foreach ($inventory as $inventories)
                                                <tr>
                                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                                    <td> {{ $inventories->size->name }}</td>
                                                    <td>

                                                        <div
                                                            style="width: 30px; height: 30px; background-color: {{ $inventories->color->color_code }};">
                                                        </div>
                                                    </td>
                                                    <td> {{ $inventories->quantity }}</td>
                                                    <td>{{ $inventories->quantity * $product->pursing_price }}</td>
                                                </tr>
                                                @php

                                                    $total += $inventories->quantity * $product->pursing_price;
                                                    $quantity+= $inventories->quantity;
                                                @endphp
                                            @endforeach

                                            <tr>
                                                <th scope="row" colspan="4">Total Cost:</th>
                                                <td>


                                                    {{ $total }}
                                                </td>

                                            </tr>
                                            <tr>
                                                <td colspan="3"></td>
                                                <td colspan="2">Total Quantity: {{  $quantity }}</td>
                                            </tr>


                                        </tbody>
                                    </table>


                                </div>
                            </div>






                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- New Product Add End -->

        <!-- footer Start -->
        @include('parts.copy_right')
        <!-- footer En -->
    </div>
    <!-- Container-fluid End -->
    </div>
    <!-- Page Body End -->
    </div>
@endsection


@section('footer_scprit')
    <script></script>
@endsection
