<?php

namespace App\Http\Controllers\auth\store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function logout()
    {
        auth()->logout();
        return redirect()->route('store.login')->with('logout', 'Peringatan!! kamu baru saja logout dari akun kamu');
    }
}
