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

<div class="container">
      <p>
        ini halaman profile
        </p>
          <img src="{{ auth()->user()->picture }}" alt="" class="w-25">
          <h1 class="fw-bold"><span class="text-info">{{auth()->user()->first_name}}</span><br>{{auth()->user()->last_name}}</h1>
          <p class="text-info small">{{auth()->user()->name}}</p>
          <p class="text-info small">{{auth()->user()->email}}</p>
          <p class="text-info small">{{auth()->user()->bio}}</p>
          <p class="text-info small">{{auth()->user()->location}}</p>
          <a href="{{ route('store.profile.edit') }}" class="btn btn-outline-primary">Edit profile</a>
      <a href="{{route('store.logout')}}" class="btn btn-danger text-white">Log out</a>

    {{-- </div> --}}
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>