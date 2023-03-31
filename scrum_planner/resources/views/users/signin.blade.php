@extends('main_template')

@section('title')
<title>Sign In</title>
@endsection

@section('content')

<div class="container d-flex align-items-center justify-content-center text-center p-5">
    <div class="text-white">

        <h1 class="mb-3">Sign In</h1>
        <h5 class="mb-4">Start getting involved in a team working environment</h5>

        <form action={{ url('/sign-in') }} method="POST">
        @csrf

        <div class="form-outline mb-4">

            <label class="d-flex justify-content-start align-items-start pe-3 fw-bold form-label" for="email">
                Email address
            </label>

            <input
                name="email"
                type="email"
                id="email"
                class="form-control form-control-lg"
                placeholder="Enter a valid email address"
                required
            />

            @error('email')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror

        </div>

        <div class="form-outline mb-3">

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

        <div class="d-flex justify-content-between align-items-center">

            <p class="small fw-bold mt-2 pt-1 mb-0">
                <a href="#!" class="link-info">Forgot password?</a>
            </p>

        </div>

        <div class="text-center text-lg-start mt-4 pt-2">

            <div class="text-center">
                <button type="submit" class="btn btn-outline-light btn-lg m-2">
                    Sign In
                </button>
            </div>

        </div>

        <div class="d-flex justify-content-between align-items-center">

            <p class="small fw-bold mt-2 pt-1 mb-0">
                Don't have an account?
            </p>

            <p class="small fw-bold mt-2 pt-1 mb-0">
                <a href="/sign-up" class="link-info">Sign Up</a>
            </p>

        </div>

        </form>

    </div>
</div>

@endsection

