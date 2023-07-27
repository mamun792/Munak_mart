{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}


@extends('layouts.dashboardmaster')

@section('content')
    <div class="page-body">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            @if (Session::has('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                            <h2 class="font-semibold text-xl text-gray-800">Update Profile Information</h2>
                        </div>
                        <div class="card-body">
                            <form id="profile-info-form" method="post" action="{{ route('profile.update') }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <div class="form-group">
                                    <label for="name" class="text-gray-700">Name:</label>
                                    <input type="text" id="name" name="name" value="{{ auth()->user()->name }}"
                                        class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="text-gray-700">Email:</label>
                                    <input type="email" id="email" name="email" value="{{ auth()->user()->email }}"
                                        class="form-control" required>
                                </div>
                                <div>
                                    <label for="email" class="text-gray-700">Picture:</label>
                                    @if (Auth::check() && Auth::user()->photo)
                                        <img src="{{ asset('image/profile_photo/' . Auth::user()->photo) }}"
                                            class="img-fluid m-3" alt="{{ Auth::user()->name }}" width="100"
                                            height="100" style="border-radius: 50%;">
                                    @else
                                        <img src="{{ Avatar::create(Auth::user()->name ?? 'Default')->toBase64() }}"
                                            class="m-3" alt="Avatar" width="100" height="100">
                                    @endif
                                </div>

                                <div class="form-group m-3">
                                    <label for="profile-picture" class="text-gray-700">Profile Picture:</label>
                                    <input type="file" id="profile-picture" name="photo" class="form-control-file">
                                    <img class="m-3" id="profile-picture-preview" src="#"
                                        alt="Profile Picture Preview"
                                        style="max-width: 50%; width: 80px; height: 80px; display: none; border-radius: 50%;">

                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Update Profile</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div id="update-password" class="p-4 sm:p-8 bg-white">
                            <div class="max-w-md">
                                <div class="card-header">
                                    <h2 class="font-semibold text-xl text-gray-800">Update Password</h2>
                                </div>

                                <form id="password-form" method="post" action="{{ route('password.change') }}">
                                    @csrf
                                    {{-- @method('put') --}}
                                    <div class="form-group">
                                        <label for="current-password" class="text-gray-700">Current Password:</label>
                                        <div class="input-group">
                                            <input type="password" id="current-password" name="current_password"
                                                class="form-control" required>
                                            <div class="input-group-append">
                                                <button type="button" id="toggle-current-password"
                                                    class="btn btn-outline-dark">
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                            </div>
                                        </div>
                                        @error('current_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="new-password" class="text-gray-700">New Password:</label>
                                        <div class="input-group">
                                            <input type="password" id="new-password" name="password" class="form-control" required>
                                            <div class="input-group-append">
                                                <button type="button" id="toggle-new-password" class="btn btn-outline-dark">
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                            </div>
                                        </div>
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="confirm-password" class="text-gray-700">Confirm New Password:</label>
                                        <div class="input-group">
                                            <input type="password" id="confirm-password" name="password_confirmation" class="form-control" required>
                                            <div class="input-group-append">
                                                <button type="button" id="toggle-confirm-password" class="btn btn-outline-dark">
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <span id="password-match-message" class="text-danger" style="display: none;">
                                            Passwords do not match.
                                        </span>
                                    </div>

                                    <div class="text-center mt-5">
                                        <button type="submit" class="btn btn-primary" id="change-password-button" style="display: none;">Change Password</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('footer_scprit')
        <script>
            const profilePictureInput = document.getElementById('profile-picture');
            const profilePicturePreview = document.getElementById('profile-picture-preview');

            profilePictureInput.addEventListener('change', function() {
                const file = profilePictureInput.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function() {
                        profilePicturePreview.src = reader.result;
                        profilePicturePreview.style.display = 'block';
                    }
                    reader.readAsDataURL(file);
                } else {
                    profilePicturePreview.src = '#';
                    profilePicturePreview.style.display = 'none';
                }
            });

            //show password

            const currentPasswordField = document.getElementById('current-password');
        const newPasswordField = document.getElementById('new-password');
        const confirmNewPasswordField = document.getElementById('confirm-password');
        const toggleCurrentPasswordButton = document.getElementById('toggle-current-password');
        const toggleNewPasswordButton = document.getElementById('toggle-new-password');
        const toggleConfirmPasswordButton = document.getElementById('toggle-confirm-password');

        toggleCurrentPasswordButton.addEventListener('click', function() {
            const fieldType = currentPasswordField.getAttribute('type');
            currentPasswordField.setAttribute('type', fieldType === 'password' ? 'text' : 'password');
            toggleCurrentPasswordButton.querySelector('i').classList.toggle('fa-eye');
            toggleCurrentPasswordButton.querySelector('i').classList.toggle('fa-eye-slash');
        });

        toggleNewPasswordButton.addEventListener('click', function() {
            const fieldType = newPasswordField.getAttribute('type');
            newPasswordField.setAttribute('type', fieldType === 'password' ? 'text' : 'password');
            toggleNewPasswordButton.querySelector('i').classList.toggle('fa-eye');
            toggleNewPasswordButton.querySelector('i').classList.toggle('fa-eye-slash');
        });

        toggleConfirmPasswordButton.addEventListener('click', function() {
            const fieldType = confirmNewPasswordField.getAttribute('type');
            confirmNewPasswordField.setAttribute('type', fieldType === 'password' ? 'text' : 'password');
            toggleConfirmPasswordButton.querySelector('i').classList.toggle('fa-eye');
            toggleConfirmPasswordButton.querySelector('i').classList.toggle('fa-eye-slash');
        });

//  check password match and show/hide the submit button
const newPasswordInput = document.getElementById('new-password');
        const confirmPasswordInput = document.getElementById('confirm-password');
        const changePasswordButton = document.getElementById('change-password-button');
        const passwordMatchMessage = document.getElementById('password-match-message');

        function checkPasswordMatch() {
            const newPassword = newPasswordInput.value;
            const confirmPassword = confirmPasswordInput.value;
            if (newPassword !== confirmPassword) {
                changePasswordButton.style.display = 'none';
                passwordMatchMessage.style.display = 'block';
            } else {
                changePasswordButton.style.display = 'block';
                passwordMatchMessage.style.display = 'none';
            }
        }

        newPasswordInput.addEventListener('input', checkPasswordMatch);
        confirmPasswordInput.addEventListener('input', checkPasswordMatch);
        </script>
    @endsection
