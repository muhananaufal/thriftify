<?php

namespace App\Http\Controllers\auth\store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.store.login');
    }
    public function login()
    {
        request()->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::guard('store')->attempt([
            'email' => request()->email,
            'password' => request()->password,
        ])) {
            return redirect()->route('store.dashboard');
        } else {
            return redirect()->back()->with('login_failed', 'Login gagal!! Silahkan periksa kembali data yang anda masukkan');
        }
    }
}
