<?php

namespace App\Http\Controllers\Auth\User;

use App\Http\Controllers\Controller;
use App\Models\User;
// use App\Services\ProfilePictureService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    // protected $profilePictureService;

    // public function __construct(ProfilePictureService $profilePictureService)
    // {
    //     $this->middleware('guest');
    //     $this->profilePictureService = $profilePictureService;
    // }

    public function index()
    {
        return view('auth.user.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'picture' => 'nullable',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'gender' => 'nullable',
            'address' => 'nullable',
            'phone_number' => 'nullable|string|regex:/^\d{1,15}$/',
            'date_of_birth' => 'nullable',
            'password' => 'required|confirmed|min:8',
        ]);

        $user = User::create([
            'picture' => '',
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'gender' => '',
            'address' => '',
            'phone_number' => '',
            'password' => bcrypt($request->input('password')),
            'slug' => Str::slug($request->input('first_name') . '-' . $request->input('last_name')),
        ]);

        auth()->login($user);

        return redirect()->back();
        // ->with('success', 'Selamat datang! Kamu baru saja membuat akun baru.');
    }
}
