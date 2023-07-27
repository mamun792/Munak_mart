@extends('layouts.dashboardmaster')

@section('content')
    <div class="page-body">
        <!-- All User Table Start -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="title-header option-title">
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        <i class="ri-check-circle-line"></i> {{ session('success') }}
                                    </div>
                                @endif

                                <h5>All Category</h5>



                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop">
                                    <i data-feather="plus-square"></i>Add New
                                </button>

                            </div>

                            <div class="table-responsive ">
                                <table class="table all-package  display" id="Category_id">
                                    <thead>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Date</th>
                                            <th>Product Image</th>
                                            <th>description </th>
                                            <th>Slug</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($categories as $category)
                                            <tr>
                                                <td>{{ $category->name }}</td>

                                                <td>{{ $category->created_at->format('d-m-Y') }}
                                                </td>

                                                <td>
                                                    <div class="table-image">
                                                        <img src="{{ asset('image/category/' . $category->photo) }}"
                                                            class="img-fluid" alt="{{ $category->name }}">
                                                    </div>
                                                </td>

                                                <td>
                                                    <p>{{ $category->description }}</p>
                                                </td>

                                                <td>{{ $category->slug }}</td>

                                                <td>
                                                    <ul>
                                                        <li>
                                                            <a href="">
                                                                <i class="ri-eye-line"></i>
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a href="{{route('categories.show',$category->id)}}">
                                                                <i class="ri-pencil-line"></i>
                                                            </a>
                                                        </li>

                                                        <li>

                                                            <a href="#" onclick="confirmDelete({{ $category->id }})">
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
        <!-- All User Table Ends-->
        @include('parts.copy_right');
    </div>

    <!-- Modal -->
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
    </div>

@endsection

@section('footer_scprit')
    <script>
        new DataTable('#Category_id');


        //delete confirmation
        function confirmDelete(categoryId) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'You will not be able to recover this category!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('categories.destroy', '') }}/" + categoryId;
                }
            });
        }
    </script>
@endsection
