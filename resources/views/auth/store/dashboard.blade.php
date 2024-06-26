<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <title>Visual - Mobile Phone Marketplace</title>
</head>

<body>

<div class="container py-5 my-5 min-vh-100">
  @if (Session::get('login_failed'))
<p class="alert alert-danger">{{Session::get('login_failed')}}</p>
@endif
@if (Session::get('logout'))
<p class="alert alert-danger">{{Session::get('logout')}}</p>
@endif
@if (Session::get('register'))
<p class="alert alert-success">{{Session::get('register')}}</p>
@endif

<div class="row">
    {{-- <div class="col-md-6 pt-5"> --}}
    {{-- <a href="{{route('register')}}" class="text-decoration-none small">Dont have account?</a> --}}
      ini halaman dashboard
      
      <a href="{{route('store.logout')}}" class="nav-link btn btn-danger text-white">Log out</a>

    {{-- </div> --}}
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>