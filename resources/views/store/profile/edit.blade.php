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
  <h1>Edit Store Profile</h1>

  @if (session('success'))
      <div class="alert alert-success">
          {{ session('success') }}
      </div>
  @endif

  <form action="{{ route('store.profile.update') }}" method="POST" enctype="multipart/form-data">
    @method('put')
      @csrf
      <div class="form-group">
          <label for="name">Store Name</label>
          <input type="text" class="form-control" id="name" name="name" value="{{ $store->name }}" required>
      </div>
      <div class="form-group">
          <label for="email">Email address</label>
          <input type="email" class="form-control" id="email" name="email" value="{{ $store->email }}" required>
      </div>
      <div class="form-group">
          <label for="bio">Bio</label>
          <input type="text" class="form-control" id="bio" name="bio" value="{{ $store->bio }}">
      </div>
      <div class="form-group">
          <label for="location">Location</label>
          <input type="text" class="form-control" id="location" name="location" value="{{ $store->location }}">
      </div>
      <div class="form-group">
          <label for="password">Password (leave blank if not changing)</label>
          <input type="password" class="form-control" id="password" name="password">
      </div>
      <div class="form-group">
          <label for="password_confirmation">Confirm Password</label>
          <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
      </div>
      <div class="form-group">
          <label for="picture">Profile Picture</label>
          <input type="file" class="form-control-file" id="picture" name="picture">
      </div>
      <button type="submit" class="btn btn-primary">Update</button>
  </form>

  <form action="{{ route('store.delete') }}" method="POST" onsubmit="return confirm('Are you sure you want to delete your account?');">
      @csrf
      <button type="submit" class="btn btn-danger mt-3">Delete Account</button>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>