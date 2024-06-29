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
                    Smooth and<br />
                    <span class="text-primary">enjoyable shopping</span>
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
                    <form action="{{route('register.post')}}" method="post">
                      @csrf
                      <div class="row">
                        <div class="col-md-6 mb-4">
                          <div data-mdb-input-init class="form-outline">
                            @error('first_name')
                            <p class="small text-danger">{{$message}}</p>
                            @enderror
    
                            <label class="form-label d-flex" for="first_name">First name</label>
                            <input type="text" id="first_name" class="form-control" name="first_name"/>
                          </div>
                        </div>
                        <div class="col-md-6 mb-4">
                          <div data-mdb-input-init class="form-outline">
                            @error('last_name')
                            <p class="small text-danger">{{$message}}</p>
                            @enderror
    
                            <label class="form-label d-flex" for="last_name">Last name</label>
                            <input type="text" id="last_name" class="form-control" name="last_name"/>
                          </div>
                        </div>
                        <div class="col-md-6 mb-4">
                          <div data-mdb-input-init class="form-outline">
                            @error('address')
                            <p class="small text-danger">{{$message}}</p>
                            @enderror
    
                            <label class="form-label d-flex" for="address">Address</label>
                            <input type="text" id="address" class="form-control" name="address"/>
                          </div>
                        </div>
                        <div class="col-md-6 mb-4">
                          <div data-mdb-input-init class="form-outline">
                            @error('phone_number')
                            <p class="small text-danger">{{$message}}</p>
                            @enderror
    
                            <label class="form-label d-flex" for="phone_number">Phone Number</label>
                            <input type="text" id="phone_number" class="form-control" name="phone_number"/>
                          </div>
                        </div>
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