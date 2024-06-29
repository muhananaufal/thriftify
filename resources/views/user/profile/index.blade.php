<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="shortcut icon" href="{{asset('img/logo.png')}}" type="image/x-icon">
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

<div class="container">
    {{-- <div class="col-md-6 pt-5"> --}}
    {{-- <a href="{{route('register')}}" class="text-decoration-none small">Dont have account?</a> --}}
      <p>
        ini halaman profile
        </p>
          
          <img src="" alt="">
          <img src="{{ auth()->user()->picture }}" alt="" class="w-25">
          {{-- <h1 class="fw-bold"><span class="text-info">{{auth()->user()->first_name}}</span><br>{{auth()->user()->last_name}}</h1> --}}
          <p class="text-info small">{{auth()->user()->first_name}}</p>
          <p class="text-info small">{{auth()->user()->last_name}}</p>
          <p class="text-info small">{{auth()->user()->email}}</p>
          <p class="text-info small">{{auth()->user()->gender}}</p>
          <p class="text-info small">{{auth()->user()->address}}</p>
          <p class="text-info small">{{auth()->user()->phone_number}}</p>
          <p class="text-info small">{{auth()->user()->date_of_birth}}</p>
      <a href="{{ route('profile.edit') }}" class="btn btn-outline-primary">Edit profile</a>
          <a href="{{ route('cart.index') }}" class="btn btn-outline-primary">See my cart</a>
          <a href="{{ route('checkout.index') }}" class="btn btn-outline-primary">See my checkout</a>
          <a href="{{ route('confirmation.index') }}" class="btn btn-outline-primary">Need confirmation</a>
          <a href="{{ route('history.index') }}" class="btn btn-outline-primary">See my history</a>
      <a href="{{route('logout')}}" class="btn btn-danger text-white">Log out</a>
      {{-- <a href="{{route('products.index')}}" class="btn btn-primary text-white">See Product</a> --}}

    {{-- </div> --}}
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>