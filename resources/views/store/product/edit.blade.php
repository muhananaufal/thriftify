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
      ini halaman edit
      <form action="{{route('store.product.update', $product->slug)}}" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
        <img src="{{ $product->picture }}" class="w-25">
        <div class="mb-3">
          <input type="file" name="picture" class="form-control" placeholder="Picture">
          @error('picture')
          <p class="small text-danger">{{$message}}</p>
          @enderror
      
        </div>
      
        <div class="mb-3">
          <input type="text" placeholder="Name" name="name" class="form-control" value="{{$product->name}}">
          @error('name')
          <p class="small text-danger">{{$message}}</p>
          @enderror
      
        </div>
      
        <div class="mb-3">
          <textarea name="description" class="form-control" placeholder="Desription">{{$product->description}}</textarea>
          @error('description')
          <p class="small text-danger">{{$message}}</p>
          @enderror
      
        </div>
      
        <div class="mb-3">
          <input type="text" name="color" class="form-control" placeholder="Color" value="{{$product->color}}">
          @error('color')
          <p class="small text-danger">{{$message}}</p>
          @enderror
      
        </div>
      
        <div class="mb-3">
          <input type="number" name="price" class="form-control" placeholder="Price" value="{{$product->price}}">
          @error('price')
          <p class="small text-danger">{{$message}}</p>
          @enderror
      
        </div>      
      
        <div class="mb-3">
          <select name="gender" class="form-control">
            <option value="" disabled selected>Select Gender</option>
            <option value="male" @if ($product->gender === 'male') selected
              @endif>Male</option>
            <option value="female" @if ($product->gender === 'female') selected
              @endif>Female</option>
          </select>
          @error('gender')
          <p class="small text-danger">{{$message}}</p>
          @enderror
      
        </div>
              <div class="mb-3">
          <select name="size" class="form-control">
            <option value="" disabled selected>Select Size</option>
            <option value="s" @if ($product->size === 's') selected
              @endif>S</option>
            <option value="m" @if ($product->size === 'm') selected
              @endif>M</option>
            <option value="l" @if ($product->size === 'l') selected
              @endif>L</option>
            <option value="xl" @if ($product->size === 'xl') selected
              @endif>Xl</option>
          </select>
          @error('size')
          <p class="small text-danger">{{$message}}</p>
          @enderror
      
          <div class="mb-3">
            <select name="condition" class="form-control">
              <option value="" disabled selected>Select Condition</option>
              <option value="new" @if ($product->condition === 'new') selected
                @endif>New</option>
              <option value="good" @if ($product->condition === 'good') selected
                @endif>Good</option>
              <option value="bad" @if ($product->condition === 'bad') selected
                @endif>Bad</option>
            </select>
            @error('condition')
            <p class="small text-danger">{{$message}}</p>
            @enderror
        
          </div>
          <div class="mb-3">
            <select name="status" class="form-control">
              <option value="" disabled selected>Select Status</option>
                <option value="draft" @if ($product->status === 'draft') selected
              @endif>Draft</option>
              <option value="sale" @if ($product->status === 'sale') selected
                @endif>For Sale</option>
            </select>
            @error('status')
            <p class="small text-danger">{{$message}}</p>
            @enderror
        
          </div>

        </div>
        <div class="mb-3">
          <select name="category_id" class="form-control">
            <option value="" disabled selected>Select Category</option>
            @foreach ($categories as $id => $name)
            <option value="{{$id}}" @if ($product->category_id === $id) selected
              @endif>{{$name}}</option>
            @endforeach
          </select>
          @error('brand_id')
          <p class="small text-danger">{{$message}}</p>
          @enderror
      
        </div>

        <button type="submit" class="btn btn-success">Edit</button>
      </form>
      <form action="{{route('store.product.delete', $product->slug)}}" method="post">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger mb-5">Delete</button>
    </form>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>