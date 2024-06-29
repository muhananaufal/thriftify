<?php

namespace App\Http\Controllers\auth\store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logout()
    {
        Auth::guard('store')->logout();
        return redirect()->back();
        // ->with('logout', 'Peringatan!! kamu baru saja logout dari akun kamu');
    }
}
