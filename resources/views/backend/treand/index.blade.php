@extends('layouts.dashboardmaster')


@section('content')
    <div class="page-body">
        <div class="container-fluid">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> {{ session('success') }}
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> {{ session('error') }}
            @endif
            <div class="row">

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            {{-- success message --}}

                            <class="title-header option-title">

                                {{-- show treand  --}}
                                <div class="container mt-5">
                                    <h2>Treand Product</h2>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">SL</th>
                                                <th scope="col">Photo</th>
                                                <th scope="col">Description</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($trending as $key => $item)
                                                <tr>
                                                    <th scope="row">{{ $key + 1 }}</th>
                                                    <td><img src="{{ asset('image/trends/' . $item->image) }}"
                                                            alt="" width="100px"></td>
                                                    <td>{{ $item->desc }}</td>
                                                    <td>
                                                        <a href="#"
                                                        class="btn btn-danger">Delete</a>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>



                                </div>

                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="title-header option-title">



                                <div class="container mt-5">
                                    <h2>Treand Product</h2>
                                    <form method="POST" action="{{ route('trending.product.add') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <label for="photoInput" class="form-label">Descprition</label>
                                        <div class="mb-3">

                                            <textarea name="desc" id="" rows="3"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="photoInput" class="form-label">Select Photo</label>
                                            <input type="file" class="form-control" name="t_photo">
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-primary">Upload</button>
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
@endsection


@section('footer_scprit')
    <script></script>
@endsection
