@extends('main_template')

@section('title')
<title>Sign up</title>
@endsection

@section('content')

<script src="{{ url('assets/js/registration.profilepic.js') }}"></script>

<div class="container d-flex align-items-center justify-content-center text-center p-5">
    <div class="text-white">

        <h1 class="mb-3">Sign Up</h1>
        <h5 class="mb-4">Create your account and join meetings with various teams</h5>

        <form action={{ url('/sign-up') }} method="POST" enctype="multipart/form-data">
        @csrf
            <div class="form-outline mb-4">

                <label class="pe-3 fw-bold form-label" for="profilePic">
                    Your profile image
                </label>

                <img
                    name="displayIMG"
                    id="displayIMG"
                    src="{{ asset('profile_pic_sample.png') }}"
                    style="width: 250px; height: 250px; display: block; margin-left: auto; margin-right: auto;"
                    alt="Not Found"
                    title="Profile Image"
                />

              </div>


            <div class="form-outline mb-4">

                <label class="d-flex justify-content-start align-items-start pe-3 fw-bold form-label" for="profilePic">
                    Profile image
                </label>

                <input
                    type="file"
                    name="profilePic"
                    id="profilePic"
                    accept="image/*"
                    class="form-control form-control-lg"
                    placeholder="Choose your profile picture"
                />
            </div>

            <div class="form-outline mb-4">

                <label class="d-flex justify-content-start align-items-start pe-3 fw-bold form-label" for="fullName">
                    Full name
                </label>

                <input
                    name="fullName"
                    type="text"
                    id="fullName"
                    class="form-control form-control-lg"
                    placeholder="Enter your full name"
                    required
                />

                @error('fullName')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror

            </div>

            <div class="form-outline mb-4">

                <label class="d-flex justify-content-start align-items-start pe-3 fw-bold form-label" for="email">
                    Email address
                </label>

                <input
                    name="email"
                    type="email"
                    id="email"
                    class="form-control form-control-lg"
                    placeholder="Give a valid email address"
                    required
                />

                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror

            </div>

            <div class="form-outline mb-4">

                <label class="d-flex justify-content-start align-items-start pe-3 fw-bold form-label" for="password">
                    Password
                </label>

                <input
                    name="password"
                    type="password"
                    id="password"
                    class="form-control form-control-lg"
                    placeholder="Enter password"
                    required
                />

                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror

            </div>

            <div class="form-outline mb-4">

                <label class="d-flex justify-content-start align-items-start pe-3 fw-bold form-label" for="passwordConfirm">
                    Confirm password
                </label>

                <input
                    name="passwordConfirm"
                    type="password"
                    id="passwordConfirm"
                    class="form-control form-control-lg"
                    placeholder="Confirm your password"
                    required
                />

                @error('passwordConfirm')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror

            </div>

            <div class="text-center text-lg-start mt-4 pt-2">

                <div class="text-center">
                    <button type="button" class="btn btn-outline-light btn-lg m-2">
                        Sign Up
                    </button>
                </div>

            </div>

            <div class="d-flex justify-content-between align-items-center">

                <p class="small fw-bold mt-2 pt-1 mb-0">
                    Already have an account?
                </p>

                <p class="small fw-bold mt-2 pt-1 mb-0">
                    <a href="/sign-in" class="link-info">Sign In</a>
                </p>

            </div>

        </form>

    </div>
</div>

@endsection
