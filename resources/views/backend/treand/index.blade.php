@extends('layouts.dashboardmaster')


@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="title-header option-title">



                                <p>hiungin</p>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="title-header option-title">

                                {{-- treand upload from --}}

                                <div class="container mt-5">
                                    <h2>Custom Photo Upload Form</h2>
                                    <form id="photoUploadForm" method="POST" action="#">
                                        <label for="photoInput" class="form-label">Descprition</label>
                                        <div class="mb-3">

                                            <textarea name="desc" id="" rows="3"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="photoInput" class="form-label">Select Photo</label>
                                            <input type="file" class="form-control" id="photoInput" accept="image/*">
                                        </div>
                                        <div class="mb-3">
                                            <button type="button" class="btn btn-primary" id="uploadButton">Upload</button>
                                        </div>
                                    </form>
                                    <div id="uploadedPhoto" class="mt-3"></div>
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
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const photoInput = document.getElementById('photoInput');
        const uploadButton = document.getElementById('uploadButton');
        const uploadedPhoto = document.getElementById('uploadedPhoto');

        uploadButton.addEventListener('click', function () {
            const file = photoInput.files[0];
            if (file) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.classList.add('img-thumbnail');

                    uploadedPhoto.innerHTML = '';
                    uploadedPhoto.appendChild(img);
                };

                reader.readAsDataURL(file);
            } else {
                uploadedPhoto.innerHTML = '<p>No photo selected.</p>';
            }
        });
    });
</script>
@endsection
