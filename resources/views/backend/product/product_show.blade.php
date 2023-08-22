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
                                <div class="card-body">
                                    <div class="card-header-2">
                                        <h5>Product Information</h5>
                                    </div>
                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif

                                    @if(session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif

                                    <form class="theme-form theme-form-2 mega-form" action="{{ route('product.add') }}"
                                        enctype="multipart/form-data" method="POST">
                                        @csrf
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Product
                                                Name</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="product_name"
                                                    value="{{ old('product_name') }}" placeholder="Product Name">
                                            </div>
                                            @error('product_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        {{-- <div class="mb-4 row align-items-center">
                                            <label class="col-sm-3 col-form-label form-label-title">Product
                                                Type</label>
                                            {{-- <div class="col-sm-9">
                                                <select class="js-example-basic-single w-100" name="category_id">
                                                    <option disabled>Static Menu</option>
                                                    <option>Simple</option>
                                                    <option>Classified</option>
                                                </select>
                                            </div>
                                        </div> --}}

                                        <div class="mb-4 row align-items-center">
                                            <label class="col-sm-3 col-form-label form-label-title">Category</label>
                                            <div class="col-sm-9">
                                                <select class="js-example-basic-single w-100" name="category_id">
                                                    <option>--Select Category--</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        {{-- add --}}

                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0" for="productName">Product
                                                Short Descprition</label>
                                            <div class="col-sm-9">

                                                <textarea id="productDescription" name="short_productDescription" rows="2" cols="2" class="form-control">{{ old('s_productDescription') }}</textarea>


                                            </div>
                                            @error('short_productDescription')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0" for="productName">Product
                                                Long Descprition</label>
                                            <div class="col-sm-9">

                                                <textarea id="productDescription" name="long_productDescription" rows="4" cols="4" class="form-control">{{ old('l_productDescription') }}</textarea>


                                            </div>
                                            @error('long_productDescription')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0" for="productName">Product
                                                Additional Information</label>
                                            <div class="col-sm-9">

                                                <textarea id="productDescription" name="product_additional_information" rows="2" cols="2" class="form-control">{{ old('s_productDescription') }}</textarea>


                                            </div>
                                            @error('product_additional_information')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0" for="productName">Care of Instaction</label>
                                            <div class="col-sm-9">

                                                <textarea id="productDescription" name="care_of_Instaction" rows="2" cols="2" class="form-control">{{ old('s_productDescription') }}</textarea>


                                            </div>
                                            @error('care_of_Instaction')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label class="col-sm-3 form-label-title">Pursing/Manufacuring price</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="number" name="pursing_price"
                                                    value="{{ old('pursing_price') }}"
                                                    placeholder="Pursing/Manufacuring price">
                                            </div>
                                            @error('l_productDescription')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-4 row align-items-center">
                                            <label class="col-sm-3 form-label-title">Regular Price</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="number" name="regular_price"
                                                    value="{{ old('regular_price') }}" placeholder="Regular Price">
                                            </div>
                                            @error('regular_price')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-4 row align-items-center ">
                                            <label class="col-sm-3 form-label-title">Discount(%)</label>
                                            <div class="col-sm-9 ">
                                                <input class="form-control" type="number" name="discount"
                                                    value="{{ old('discount') }}" placeholder="Discount(%)">
                                            </div>

                                            @error('discount')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label class="col-sm-3 col-form-label form-label-title">Images</label>
                                            <div class="col-sm-9">
                                                <input class="form-control form-choose" type="file" name="p_image"
                                                    id="formFile">
                                            </div>
                                            @error('p_image')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="row align-items-center">
                                            <label class="col-sm-3 col-form-label form-label-title">Thumbnail
                                                Image</label>
                                            <div class="col-sm-9">
                                                <input class="form-control form-choose" type="file"
                                                    name="thumbnail_image[]" id="formFileMultiple1" multiple>
                                            </div>
                                            @error('thumbnail_image')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        {{-- add cloled --}}




                                        <div class="mb-4 row align-items-center mt-4">
                                            <label class="col-sm-3 col-form-label form-label-title">Exchangeable</label>
                                            <div class="col-sm-9">
                                                <label class="switch">
                                                    <input type="checkbox" name="exchangeable"><span
                                                        class="switch-state"></span>
                                                </label>
                                            </div>
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







                            {{-- <div class="card">
                            <div class="card-body">
                                <div class="card-header-2">
                                    <h5>Product variations</h5>
                                </div>

                                <form class="theme-form theme-form-2 mega-form">
                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-3 mb-0">Option
                                            Name</label>
                                        <div class="col-sm-9">
                                            <select class="js-example-basic-single w-100" name="state">
                                                <option>Color</option>
                                                <option>Size</option>
                                                <option>Material</option>
                                                <option>Style</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label-title">Option
                                            Value</label>
                                        <div class="col-sm-9">
                                            <div class="bs-example">
                                                <input type="text" class="form-control"
                                                    placeholder="Type tag & hit enter" id="#inputTag"
                                                    data-role="tagsinput">
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <a href="#" class="add-option"><i class="ri-add-line me-2"></i> Add Another
                                    Option</a>
                            </div>
                        </div> --}}

                            {{-- <div class="card">
                            <div class="card-body">
                                <div class="card-header-2">
                                    <h5>Shipping</h5>
                                </div>

                                <form class="theme-form theme-form-2 mega-form">
                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-3 mb-0">Weight
                                            (kg)</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="number" placeholder="Weight">
                                        </div>
                                    </div>

                                    <div class="row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label-title">Dimensions
                                            (cm)</label>
                                        <div class="col-sm-9">
                                            <select class="js-example-basic-single w-100" name="state">
                                                <option>Length</option>
                                                <option>Width</option>
                                                <option>Height</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div> --}}




                            {{-- <div class="card">
                            <div class="card-body">
                                <div class="card-header-2">
                                    <h5>Product Inventory</h5>
                                </div>

                                <form class="theme-form theme-form-2 mega-form">
                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-3 mb-0">SKU</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="mb-4 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label-title">Stock
                                            Status</label>
                                        <div class="col-sm-9">
                                            <select class="js-example-basic-single w-100" name="state">
                                                <option>In Stock</option>
                                                <option>Out Of Stock</option>
                                                <option>On Backorder</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                                <table class="table variation-table table-responsive-sm">
                                    <thead>
                                        <tr>
                                            <th scope="col">Variant</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">SKU</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Red</td>
                                            <td>
                                                <input class="form-control" type="number" placeholder="0">
                                            </td>
                                            <td>
                                                <input class="form-control" type="number" placeholder="0">
                                            </td>
                                            <td>
                                                <input class="form-control" type="number" placeholder="0">
                                            </td>
                                            <td>
                                                <ul class="order-option">
                                                    <li><a href="javascript:void(0)" data-toggle="modal"
                                                            data-target="#deleteModal"><i
                                                                class="ri-delete-bin-line"></i></a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Blue</td>
                                            <td>
                                                <input class="form-control" type="number" placeholder="0">
                                            </td>
                                            <td>
                                                <input class="form-control" type="number" placeholder="0">
                                            </td>
                                            <td>
                                                <input class="form-control" type="number" placeholder="0">
                                            </td>
                                            <td>
                                                <ul class="order-option">
                                                    <li><a href="javascript:void(0)" data-toggle="modal"
                                                            data-target="#deleteModal"><i
                                                                class="ri-delete-bin-line"></i></a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div> --}}


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
