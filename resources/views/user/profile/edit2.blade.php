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

    <div class="container py-5 my-5 min-vh-100">
        @if (Session::has('login_failed'))
        <p class="alert alert-danger">{{ Session::get('login_failed') }}</p>
        @endif
        @if (Session::has('logout'))
        <p class="alert alert-danger">{{ Session::get('logout') }}</p>
        @endif
        @if (Session::has('register'))
        <p class="alert alert-success">{{ Session::get('register') }}</p>
        @endif
        <div class="container">
            <h1>Edit User Profile</h1>

            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name"
                        value="{{ $user->first_name }}" required>
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name"
                        value="{{ $user->last_name }}" required>
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}"
                        required>
                </div>
                <div class="form-group">
                    <label for="date_of_birth">Date of Birth</label>
                    <input type="date" class="form-control" id="date_of_birth" name="date_of_birth"
                        value="{{ $user->date_of_birth }}">
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select name="gender" id="gender" class="form-control">
                        <option value="" disabled selected>Select Gender</option>
                        <option value="male" @if ($user->gender === 'male') selected @endif>Male</option>
                        <option value="female" @if ($user->gender === 'female') selected @endif>Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{ $user->address }}">
                </div>
                <div class="form-group">
                    <label for="phone_number">Phone Number</label>
                    <input type="text" class="form-control" id="phone_number" name="phone_number"
                        value="{{ $user->phone_number }}">
                </div>
                <div class="form-group">
                    <label for="password">Password (leave blank if not changing)</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" class="form-control" id="password_confirmation"
                        name="password_confirmation">
                </div>
                <div class="form-group">
                    <label for="picture">Profile Picture</label>
                    <input type="file" class="form-control-file" id="picture" name="picture">
                </div>
    
                <button type="submit" class="btn btn-primary">Update</button>
            </form>

            <form action="{{ route('delete') }}" method="POST"
                onsubmit="return confirm('Are you sure you want to delete your account?');">
                @csrf
                <button type="submit" class="btn btn-danger mt-3">Delete Account</button>
            </form>

            <form action="{{ route('profile.deletePictureProfile') }}" method="POST"
            onsubmit="return confirm('Are you sure you want to delete your picture?');">
            @csrf
            @method('put')
            <button type="submit" class="btn btn-danger mt-3">Delete Profile</button>
            </form>      
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
