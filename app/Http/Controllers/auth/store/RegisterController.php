<?php

namespace App\Http\Controllers\auth\store;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
            'bio' => 'nullable',
            'location' => 'nullable',
            'password' => 'required|confirmed|min:8'
        ]);

        $picture = request()->file('picture');
        $picturePath = $picture->storeAs('public/stores', str()->random(20) . ".{$picture->extension()}");
        $pictureURL = url(Storage::url($picturePath));


        $store = Store::create([
            'picture' => $pictureURL,
            'name' => request()->name,
            'email' => request()->email,
            'bio' => '',
            'location' => '',
            'password' => bcrypt(request()->password),
            'slug' => str()->slug(request()->name) . "-",
        ]);
        Auth::guard('store')->login($store);
        return redirect()->route('store.dashboard');
        // ->with('register', 'Selamat datang!! kamu baru saja membuat akun baru');
    }
}
