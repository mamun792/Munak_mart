@extends('layouts.dashboardmaster')


@section('content')
    <!-- Container-fluid starts-->
    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="title-header option-title">
                                <h5>Products List</h5>
                                <div class="right-options">
                                    <ul>
                                        <li>
                                            <a href="javascript:void(0)">import</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">Export</a>
                                        </li>
                                        <li>

                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#staticBackdrop">
                                                <i data-feather="plus-square"></i>Add Product
                                            </button>

                                            {{-- <a class="btn btn-solid" href="add-new-product.html">Add Product</a> --}}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div>
                                <div class="table-responsive">
                                    <table class="table all-package theme-table  display" id="product_id">
                                        <thead>
                                            <tr>
                                                <th>Product Image</th>
                                                <th>Product Name</th>
                                                <th>Category</th>
                                                <th>Current Qty</th>
                                                <th>Price</th>
                                                <th>Action</th>
                                                <th>Option</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($product as $productss)
                                                <tr>
                                                    <td>
                                                        <div class="table-image">
                                                            <img src="{{ asset('image/products/' . $productss->p_image) }}"
                                                                class="img-fluid" alt="{{ $productss->product_name }}">
                                                        </div>
                                                    </td>

                                                    <td>{{ $productss->product_name }}</td>

                                                    <td>{{ $productss->category->name }}</td>

                                                    <td>12</td>

                                                    <td class="td-price">{{ $productss->pursing_price }}</td>

                                                    <td class="status-danger">
                                                        <a href="{{route('inventory_add',$productss->id)}}" class="btn btn-sm">
                                                            <i class="fa-solid fa-plus"></i> Add Inventory
                                                        </a>
                                                    </td>

                                                    <td>
                                                        <ul>
                                                            <li>
                                                                <a href="order-detail.html">
                                                                    <i class="ri-eye-line"></i>
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="javascript:void(0)">
                                                                    <i class="ri-pencil-line"></i>
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                                    data-bs-target="#exampleModalToggle">
                                                                    <i class="ri-delete-bin-line"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->

        @include('parts.copy_right')
    </div>
    </div>
    </div>


    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog  ">
            <div class="modal-content">
                <div class="modal-header">
                    {{-- <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5> --}}
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">



                    <div class="col-12">
                        <div class="row">
                            <div class="col-sm-12 m-auto">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-header-2">
                                            <h5>Category Information</h5>
                                        </div>
                                        @if (session('success'))
                                            <div class="alert alert-success">
                                                {{ session('success') }}
                                            </div>
                                        @endif

                                        <form class="theme-form theme-form-2 mega-form" method="POST"
                                            action="{{ route('categories.store') }}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-4 row align-items-center">
                                                <label class="form-label-title col-sm-3 mb-0">Category Name</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" name="c_name">
                                                </div>
                                                @error('c_name')
                                                    <span class=" text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="mb-4 row align-items-center">
                                                <label class="col-sm-3 col-form-label form-label-title">Category
                                                    Image</label>
                                                <div class="form-group col-sm-9">
                                                    <div class="dropzone-wrapper">
                                                        <div class="dropzone-desc">
                                                            <i class="ri-upload-2-line"></i>
                                                            <p>Choose an image file or drag it here.</p>
                                                        </div>
                                                        <input type="file" class="dropzone" name="photo">
                                                    </div>
                                                    <span class="text-danger"></span>
                                                </div>
                                            </div>



                                            <div class="mb-4 row align-items-center">
                                                <label class="col-sm-3 col-form-label form-label-title">Category
                                                    Description</label>
                                                <div class="form-group col-sm-9">
                                                    <textarea class="form-control" name="description"></textarea>
                                                    @error('description')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>





                                    </div>

                                    <div class="text-center">
                                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
@endsection


@section('footer_scprit')
    <script>
        new DataTable('#product_id');
    </script>
@endsection
