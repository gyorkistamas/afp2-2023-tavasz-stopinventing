@extends('main_template')

@section('title')
<title>Edit Profile</title>
@endsection

@section('content')

<script src="{{ url('assets/js/registration.profilepic.js') }}"></script>

<div class="container d-flex align-items-center justify-content-center text-center p-5">
    <div class="text-white">

        <h1 class="mb-3">Edit Profile</h1>
        <h5 class="mb-4">Edit profile site for you to change email, fullname or even password</h5>

        <form action={{ url('/edit-profile') }} method="POST" enctype="multipart/form-data">
        @csrf
            <div class="form-outline mb-4">

                <label class="pe-3 fw-bold form-label" for="profilePic">
                    Your profile image
                </label>
                @if(Auth::check())
                <img
                    name="displayIMG"
                    id="displayIMG"
                    src="{{ Auth::user()->picture }}"
                    style="width: 250px; height: 250px; display: block; margin-left: auto; margin-right: auto;"
                    alt="Not Found"
                    title="Profile Image"
                />
                @endif
              </div>


            <div class="form-outline mb-4">

                <label class="d-flex justify-content-start align-items-start pe-3 fw-bold form-label" for="profilePic">
                    Profile image
                </label>

                <input
                    type="file"
                    name="picture"
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
                @if (Auth::check())
                <input
                    name="full_name"
                    type="text"
                    id="fullName"
                    class="form-control form-control-lg"
                    placeholder="Enter your full name"
                    value="{{Auth::User()->full_name}}"
                    
                />
                @endif
                @error('full_name')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror

            </div>

            <div class="form-outline mb-4">

                <label class="d-flex justify-content-start align-items-start pe-3 fw-bold form-label" for="email">
                    Email address
                </label>
                @if(Auth::check())
                <input
                    name="email"
                    type="email"
                    id="email"
                    class="form-control form-control-lg"
                    placeholder="Give a valid email address"
                    value="{{Auth::User()->email}}"
                    
                />
                @endif
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
                    name="password_confirmation"
                    type="password"
                    id="password_confirmation"
                    class="form-control form-control-lg"
                    placeholder="Confirm your password"
                    
                />

                @error('password_confirmation')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror

            </div>

            <div class="text-center text-lg-start mt-4 pt-2">

                <div class="text-center">
                    <button type="submit" class="btn btn-outline-light btn-lg m-2">
                        Modify Account
                    </button>
                </div>

            </div>

        </form>

    </div>
</div>

@endsection
