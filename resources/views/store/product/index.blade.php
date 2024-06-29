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

<div class="container">
      <a href="{{route('store.product.create')}}" class="btn btn-primary">Create a new product</a>
      <form action="{{ route('store.products.index') }}" method="GET" class="mb-3">
        <div class="input-group">
        </div>
      </form>
      <div class="row">
        @foreach ($products as $product)
        <div class="col-md-6">
          <img src="{{ $product->picture }}" class="w-50">

            <p>{{$product->description}}</p>
            <p>Color : {{ucwords($product->color)}}</p>
            <p>Price : ${{$product->price}}</p>
            <p>Gender : {{ucwords($product->gender)}}</p>
            <p>Size : {{strtoupper($product->size)}}</p>
            <p>Condition : {{ucwords($product->condition)}}</p>
            <p>Status : {{ucwords($product->status)}}</p>
            <p>{{$product->updated_at->format('l d F Y')}}, {{$product->updated_at->format('H:i')}}</p>
            <p class="btn btn-outline-secondary">{{$product->category->name}}</p>
            <br>
            <a href="{{route('store.product.edit' ,$product->slug)}}" class="btn btn-info mb-3 me-1">Edit</a>
            <a href="{{route('store.product.details' ,$product->slug)}}" class="btn btn-info mb-3">Detail</a>
            <br>
            
        </div>
        @endforeach
              {{$products->links()}}
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>