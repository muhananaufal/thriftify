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

    <section class="container-fluid">
        <div class="px-4 py-5 px-md-5 text-center text-lg-start d-flex align-items-center" style="background-color: hsl(0, 0%, 96%); height:100vh">
          <div class="container">
            <div class="row gx-lg-5 align-items-center">
              <div class="col-lg-6 mb-5 mb-lg-0">
                <h1 class="my-5 display-3 fw-bold ls-tight">
                  The best offer <br />
                  <span class="text-primary">for your business</span>
                </h1>
                <p style="color: hsl(217, 10%, 50.8%)">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Eveniet, itaque accusantium odio, soluta, corrupti aliquam
                  quibusdam tempora at cupiditate quis eum maiores libero
                  veritatis? Dicta facilis sint aliquid ipsum atque?
                </p>
              </div>
              <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="card">
                  <div class="card-body py-5 px-md-5">
                    <form action="{{route('store.register.post')}}" method="post" enctype="multipart/form-data">
                      @csrf

                      <div data-mdb-input-init class="form-outline mb-4">
                        @error('picture')
                        <p class="small text-danger">{{$message}}</p>
                        @enderror
                        <label class="form-label d-flex" for="picture">Store Logo</label>
                        <input type="file" id="picture" name="picture" class="form-control">
                      </div>
                      <div data-mdb-input-init class="form-outline mb-4">
                        @error('name')
                        <p class="small text-danger">{{$message}}</p>
                        @enderror

                        <label class="form-label d-flex" for="name">Store name</label>
                        <input type="text" id="name" class="form-control" name="name"/>
                  </div>                      
                      <div data-mdb-input-init class="form-outline mb-4">
                        @error('email')
                        <p class="small text-danger">{{$message}}</p>
                        @enderror
                        <label class="form-label d-flex" for="email">Email address</label>
                        <input type="email" id="email" class="form-control" name="email"/>
                      </div>
                      <div data-mdb-input-init class="form-outline mb-4">
                        @error('password')
                        <p class="small text-danger">{{$message}}</p>
                        @enderror
                        <label class="form-label d-flex" for="password">Password</label>
                        <input type="password" id="password" class="form-control" name="password"/>
                      </div>
                      <div data-mdb-input-init class="form-outline mb-4">
                        @error('password_confirmation')
                        <p class="small text-danger">{{$message}}</p>
                        @enderror
                        <label class="form-label d-flex" for="password_confirmation">Retype Password</label>
                        <input type="password" id="password_confirmation" class="form-control" name="password_confirmation"/>
                      </div>
                      <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4">
                        Register
                      </button>
                      <div class="text-center">
                        <a href="{{route('login')}}" class="text-decoration-none small">Already have account?</a>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>















<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>