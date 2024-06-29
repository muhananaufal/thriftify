<?php

namespace App\Http\Controllers\auth\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function logout()
    {
        auth()->logout();
        return redirect()->back();
        // ->with('logout', 'Peringatan!! kamu baru saja logout dari akun kamu');
    }
}
