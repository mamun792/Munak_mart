@extends('layouts.dashboardmaster')

@section('content')
    <!-- Page Sidebar Start -->
    <div class="page-body">
        <!-- New User start -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-sm-8 m-auto">
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
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                                data-bs-target="#pills-profile" type="button">Pernission</button>
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
                                                        <label class="form-label-title col-lg-2 col-md-3 mb-0">Name</label>
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
                                                            <select class="form-select" aria-label="Default select example"
                                                                name="role">
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
                                                            <input class="form-control" type="file" name="photo">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-9 col-lg-10">
                                                        <button type="submit" class="btn btn-primary">Add Users</button>
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
        </div>
    </div>
        <!-- New User End -->
    @endsection
