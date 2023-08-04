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

                                        <div class="mb-4 row align-items-center">
                                            <div class="col-sm-9">
                                                <button type="submit" name="submit"
                                                    class="btn btn-primary ">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>



                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <table class="table mt-3">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Size Name</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($attributes as $attribute)
                                                <tr>
                                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                                    <td> {{ $attribute['name'] }}</td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 ">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-header-2">
                                        <h5>Color Code Information</h5>
                                    </div>
                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif

                                    <form class="theme-form theme-form-2 mega-form" method="POST"
                                        action="{{ route('create.color') }}">
                                        @csrf
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Attribute Color</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="name">
                                            </div>
                                            @error('name')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror


                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Attribute Color Code</label>
                                            <div class="col-sm-9">
                                                <input type="color" name="color_code">
                                            </div>
                                            @error('color_code')
                                                <span class=" text-danger">{{ $message }}</span>
                                            @enderror


                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <div class="col-sm-9">
                                                <button type="submit" class="btn btn-primary ">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <table class="table mt-3">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Color Name</th>
                                                <th scope="col">Color Code</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($colors as $color)
                                                <tr>
                                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                                    <td> {{ $color->name }}</td>
                                                    <td>

                                                        <div style="width: 30px; height: 30px; background-color: {{ $color->color_code }};"></div>
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

        <!-- New Product Add End -->
    </div>
    @include('parts.copy_right');
@endsection


@section('footer_scprit')
@endsection
