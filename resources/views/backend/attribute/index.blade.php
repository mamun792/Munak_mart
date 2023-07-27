@extends('layouts.dashboardmaster')

@section('content')
    <div class="page-body">
        <!-- New Product Add Start -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="row">


                        <div class="col-sm-6 ">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-header-2">
                                        <h5>Add Attribute</h5>
                                    </div>
                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif

                                    <form class="theme-form theme-form-2 mega-form" method="POST"
                                        action="{{ route('create.attribute') }}">
                                        @csrf
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Attribute Size</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="name">
                                            </div>
                                            @error('name')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>


                                        <div class="text-center">
                                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="mt-3">
                                    <ul>
                                        @foreach ($attributes as $attribute)
                                            <li>
                                                @if (isset($attribute['name']))
                                                    {{ $attribute['name'] }}
                                                @else
                                                    No name available
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 m-auto">
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

                                    <form class="theme-form theme-form-2 mega-form" method="POST" action="#"
                                        enctype="multipart/form-data">
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
                                            <label class="col-sm-3 col-form-label form-label-title">Category Image</label>
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




                                        <div class="text-center">
                                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>

        <!-- New Product Add End -->
    </div>
    @include('parts.copy_right');
@endsection


@section('footer_scprit')
@endsection
