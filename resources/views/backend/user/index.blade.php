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
                                <h5>All Users</h5>

                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop">
                                    <i data-feather="plus-square"></i>Add New user
                                </button>
                            </div>

                            <div class="table-responsive table-product">
                                <table class="table all-package theme-table" id="user_id">
                                    <thead>
                                        <tr>
                                            <th>User</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>
                                                    <div class="table-image">
                                                        @if ($user->photo)
                                                        <img src="{{ asset('image/profile_photo/' . $user->photo) }}" class="img-fluid" alt="{{ $user->name }}">
                                                    @else
                                                        <img src="{{ Avatar::create($user->name)->toBase64() }}" alt="Avatar" width="40" height="40">
                                                    @endif

                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="user-name">
                                                        <span>{{ $user->name }}</span>
                                                        <span>{{ $user->role }}</span>
                                                    </div>
                                                </td>

                                                <td>{{ $user->phone }}</td>

                                                <td>{{ $user->email }}</td>

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
    @include('parts.copy_right');
@endsection

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
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
                                    <div class="title-header option-title">
                                        <h5>Add New User</h5>
                                    </div>
                                    @if (Session::has('success'))
                                        <div class="alert alert-success">
                                            {{ Session::get('success') }}
                                        </div>
                                    @endif
                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                                data-bs-target="#pills-home" type="button">Account</button>
                                        </li>

                                    </ul>

                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel">
                                            <form class="theme-form theme-form-2 mega-form" method="POST"
                                                action="{{ route('users.add') }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="card-header-1">
                                                    <h5>Register Users</h5>
                                                </div>

                                                <div class="row">
                                                    <div class="mb-4 row align-items-center">
                                                        <label
                                                            class="form-label-title col-lg-2 col-md-3 mb-0">Name</label>
                                                        <div class="col-md-9 col-lg-10">
                                                            <input class="form-control" type="text" name="name">
                                                        </div>
                                                        @error('name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-4 row align-items-center">
                                                        <label
                                                            class="col-lg-2 col-md-3 col-form-label form-label-title">Email
                                                            Address</label>
                                                        <div class="col-md-9 col-lg-10">
                                                            <input class="form-control" type="email" name="email">
                                                        </div>
                                                        @error('email')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>


                                                    <div class="mb-4 row align-items-center">
                                                        <label
                                                            class="col-lg-2 col-md-3 col-form-label form-label-title">Phone
                                                            number</label>
                                                        <div class="col-md-9 col-lg-10">
                                                            <input class="form-control" type="phone" name="phone">
                                                        </div>
                                                        @error('phone')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-4 row align-items-center">
                                                        <label
                                                            class="col-lg-2 col-md-3 col-form-label form-label-title">Role
                                                            Users</label>
                                                        <div class="col-md-9 col-lg-10">
                                                            <select class="form-select"
                                                                aria-label="Default select example" name="role">
                                                                <option selected>Choose a role from this select menu
                                                                </option>
                                                                <option value="admin">Admin</option>
                                                                <option value="vendor">Vendor</option>
                                                            </select>
                                                        </div>
                                                        @error('role')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-4 row align-items-center">
                                                        <label
                                                            class="col-lg-2 col-md-3 col-form-label form-label-title">Profile
                                                            Photo</label>
                                                        <div class="col-md-9 col-lg-10">
                                                            <input class="form-control" type="file"
                                                                name="photo">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-9 col-lg-10">
                                                        <button type="submit" class="btn btn-primary">Add
                                                            Users</button>
                                                    </div>
                                                </div>
                                            </form>


                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>


            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>

    </div>
</div>
@section('footer_scprit')
    <script>
        new DataTable('#user_id');
    </script>
@endsection
