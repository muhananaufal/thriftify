<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">
    <title>Thriftify</title>
</head>

<body>
<nav class="navbar bg-dark-subtle d-flex justify-content-center">
    <div class="">
    <span class="navbar-text d-flex ms-auto gap-2 ">
        @guest
        <a class="btn btn-primary text-white" href={{ route('store.register') }}>Open Vendor</a>
        <a class="btn btn-primary text-white" href={{ route('store.login') }}>Start Selling</a>
        @endguest
        @auth
            <p>Thriftify - User</p>
        @endauth
        @auth('store')
            <p>Thriftify - Store</p>
        @endauth
    </span>
    </div>
</nav>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" href="{{ route('landing') }}">Thriftify</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Profile</a>
                    <ul class="dropdown-menu">
                        @guest
                        <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                        <li><a class="dropdown-item" href="{{ route('register') }}">Register</a></li>
                        @endguest
                        @auth
                        <li><a class="dropdown-item" href="{{ route('profile.index') }}">Profile</a></li>
                        <li><a class="dropdown-item" href="{{ route('cart.index') }}">Cart</a></li>
                        <li><a class="dropdown-item" href="{{ route('checkout.index') }}">Checkout</a></li>
                        <li><a class="dropdown-item" href="{{ route('history.index') }}">History</a></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                        @endauth
                        @auth('store')
                        <li><a class="dropdown-item" href="{{ route('store.dashboard') }}">Dashboard</a></li>
                        <li><a class="dropdown-item" href="{{ route('store.logout') }}">Logout</a></li>
                        @endauth
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row">
        @foreach($products as $product)
            <div class="col-md-4">
                <div class="card mb-3">
                    <img class="card-img-top" src="{{ $product->picture }}" alt="{{ $product->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">${{ $product->price }}</p>
                        <a href="{{ route('product.show', $product->id) }}" class="btn btn-primary">View Product</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
