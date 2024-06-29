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
      ini halaman create
      <form action="{{route('store.product.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <input type="file" name="picture" class="form-control" placeholder="Picture">
          @error('picture')
          <p class="small text-danger">{{$message}}</p>
          @enderror
      
        </div>
        <div class="mb-3">
          <input type="text" placeholder="Name" name="name" class="form-control">
          @error('name')
          <p class="small text-danger">{{$message}}</p>
          @enderror
      
        </div>
      
        <div class="mb-3">
      
          <textarea name="description" class="form-control" placeholder="Desription"></textarea>
          @error('description')
          <p class="small text-danger">{{$message}}</p>
          @enderror
        </div>
      
        <div class="mb-3">
      
          <input type="text" name="color" class="form-control" placeholder="Color">
          @error('color')
          <p class="small text-danger">{{$message}}</p>
          @enderror
        </div>
            
        <div class="mb-3">
          <input type="number" name="price" class="form-control" placeholder="Price $">
          @error('price')
          <p class="small text-danger">{{$message}}</p>
          @enderror
      
        </div>
      
        <div class="mb-3">
          <select name="gender" class="form-control">
            <option value="" disabled selected>Select Gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
          </select>
          @error('gender')
          <p class="small text-danger">{{$message}}</p>
          @enderror
        </div>

        <div class="mb-3">
          <select name="size" class="form-control">
            <option value="" disabled selected>Select Size</option>
            <option value="s">S</option>
            <option value="m">M</option>
            <option value="l">L</option>
            <option value="xl">XL</option>
          </select>
          @error('size')
          <p class="small text-danger">{{$message}}</p>
          @enderror
        </div>

        <div class="mb-3">
          <select name="condition" class="form-control">
            <option value="" disabled selected>Select Condition</option>
            <option value="new">New</option>
            <option value="good">Good</option>
            <option value="bad">Bad</option>
          </select>
          @error('condition')
          <p class="small text-danger">{{$message}}</p>
          @enderror
      
        </div>
        <div class="mb-3">
          <select name="status" class="form-control">
            <option value="" disabled selected>Select Status</option>
            <option value="draft">Draft</option>
            <option value="sale">For Sale</option>
          </select>
          @error('status')
          <p class="small text-danger">{{$message}}</p>
          @enderror
      
        </div>
        <div class="mb-3">
          <select id="category_id" class="form-control" name="category_id" required>
            <option value="" disabled selected>Select Category</option>
            @foreach($categories as $id => $name)
                <option value="{{ $id }}" {{ old('category_id') == $id ? 'selected' : '' }}>{{ $name }}</option>
            @endforeach
        </select>
          @error('brand_id')
          <p class="small text-danger">{{$message}}</p>
          @enderror
        </div>
        <button type="submit" class="btn btn-success">Create</button>
      </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>