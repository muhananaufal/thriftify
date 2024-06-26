<?php

namespace App\Http\Controllers\auth\store;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.store.register');
    }
    public function register()
    {
        request()->validate([
            'picture' => 'required|mimes:jpg,jpeg,png',
            'name' => 'required|unique:stores',
            'email' => 'required',
            'password' => 'required|confirmed'
        ]);

        $picture = request()->file('picture');
        $pictureURL = $picture->storeAs('picture', str()->random(20) . ".{$picture->extension()}");


        $store = Store::create([
            'picture' => $pictureURL,
            'name' => request()->name,
            'email' => request()->email,
            'password' => bcrypt(request()->password),
            'slug' => str()->slug(request()->name) . "-" . str()->random(5),
        ]);
        Auth::guard('store')->login($store);
        return redirect()->route('store.dashboard')->with('register', 'Selamat datang!! kamu baru saja membuat akun baru');
    }
}
