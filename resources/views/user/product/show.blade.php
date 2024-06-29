<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Edit User Profile - Visual - Mobile Phone Marketplace</title>
</head>

<body>
    <div class="container">
        <h1>{{ $product->name }}</h1>
        <div class="row">
            <div class="col-md-6">
                <img class="img-fluid" src="{{ $product->picture }}" alt="{{ $product->name }}">
            </div>
            <div class="col-md-6">
                <h3>${{ $product->price }}</h3>
                <p>{{ $product->description }}</p>
                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
