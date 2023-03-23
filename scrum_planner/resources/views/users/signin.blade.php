@extends('template')

@section('title')
<title>Sign In</title>
@endsection

@section('content')

@endsection

{{-- <section class="vh-100">
    <div class="container-fluid h-custom bg-secondary">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-9 col-lg-6 col-xl-5">
          <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
            class="img-fluid" alt="Sample image">
        </div>
        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
          <form>

            <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                <h1 class="mb-0 me-3">Sign In</h1>
            </div>

            <!-- Email input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="email">Email address</label>
                <input type="email" id="email" class="form-control form-control-lg"
                placeholder="Enter a valid email address" />
            </div>

            <!-- Password input -->
            <div class="form-outline mb-3">
                <label class="form-label" for="password">Password</label>
                <input type="password" id="password" class="form-control form-control-lg"
                placeholder="Enter password" />
            </div>

            <div class="d-flex justify-content-between align-items-center">
              <!-- Checkbox -->
              <div class="form-check mb-0">
                <input class="form-check-input me-2" type="checkbox" value="" id="remember" />
                <label class="form-check-label" for="remember">
                  Remember me
                </label>
              </div>
              <a href="#!" class="text-body">Forgot password?</a>
            </div>

            <div class="text-center text-lg-start mt-4 pt-2">
              <button type="button" class="btn btn-primary btn-lg"
                style="padding-left: 2.5rem; padding-right: 2.5rem;">Sign In</button>
              <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="/sign-up"
                  class="link-danger">Sign Up</a></p>
            </div>

          </form>
        </div>
      </div>
    </div>
</section> --}}

<div style="background-image: url({{ url('assets/backgrounds/sign_in_background.png') }})" class="bg-image shadow-2-strong">
    <div>
      <div class="container d-flex align-items-center justify-content-center text-center h-100">
        <div class="text-white">

            <h1 class="mb-3">Sign In</h1>
            <h5 class="mb-4">Sample text for basic information</h5>

          <form>

            <div class="form-outline mb-4">
                <label class="d-flex justify-content-start align-items-start pe-3 fw-bold form-label" for="email">Email address</label>
                <input type="email" id="email" class="form-control form-control-lg"
                placeholder="Enter a valid email address" />
            </div>

            <div class="form-outline mb-3">
                <label class="d-flex justify-content-start align-items-start pe-3 fw-bold form-label" for="password">Password</label>
                <input type="password" id="password" class="form-control form-control-lg"
                placeholder="Enter password" />
            </div>

            <div class="d-flex justify-content-between align-items-center">
                <!-- Checkbox -->
                <div class="form-check mb-0">
                  <input class="form-check-input me-2" type="checkbox" value="" id="remember" />
                  <label class="form-check-label" for="remember">
                    Remember me
                  </label>
                </div>

                <p class="small fw-bold mt-2 pt-1 mb-0">
                    <a href="#!" class="link-info">Forgot password?</a>
                </p>

            </div>

            <div class="text-center text-lg-start mt-4 pt-2">

                <div class="text-center">
                    <button type="button" class="btn btn-outline-light btn-lg m-2">Sign In</button>
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
    </div>
  </div>



