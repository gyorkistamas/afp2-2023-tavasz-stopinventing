<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @yield('custom_css')
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{url('assets/css/template.css')}}">
    <script src="{{ url('assets/js/bootstrap.js') }}"></script>

    @yield('title')
</head>
<body>
      <nav class="navbar navbar-expand-lg bg-body-tertiary bg-secondary navbar-dark" data-bs-theme="dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"><img src="{{url('logo.jpg')}}" alt="Logo image" id="navbar-logo" class="d-inline-block align-text-top">{{env('COMPANY')}}</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Features</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Pricing</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>


      @yield('content')
</body>
</html>
