<?php

namespace App\Http\Controllers\auth\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.user.login');
    }
    public function login()
    {
        request()->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (auth()->attempt([
            'email' => request()->email,
            'password' => request()->password,
        ])) {
            return redirect()->back();
        } else {
            return redirect()->back();
            // ->with('login_failed', 'Login gagal!! Silahkan periksa kembali data yang anda masukkan');
        }
    }}
