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
      <div class="row">
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
            @if ($product->status !== 'success')
                
            <br>
            @endif
            
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>