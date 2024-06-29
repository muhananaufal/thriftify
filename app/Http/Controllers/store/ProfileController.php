<?php

namespace App\Http\Controllers\store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        return view('store.profile.index');
    }
    public function edit()
    {
        $store = Auth::guard('store')->user();
        return view('store.profile.edit', compact('store'));
    }

    public function update(Request $request)
    {
        $store = Auth::guard('store')->user();

        $request->validate([
            'picture' => 'nullable|mimes:jpg,jpeg,png',
            'name' => 'required|unique:stores,name,' . $store->id,
            'email' => 'required|email|unique:stores,email,' . $store->id,
            'password' => 'nullable|confirmed',
            'bio' => 'nullable',
            'location' => 'nullable',
        ]);

        if ($request->hasFile('picture')) {
            $picture = $request->file('picture');
            $picturePath = $picture->storeAs('public/stores', str()->random(20) . ".{$picture->extension()}");
            $pictureURL = url(Storage::url($picturePath));
            $store->picture = $pictureURL;
        }

        $store->name = $request->input('name');
        $store->email = $request->input('email');
        $store->bio = $request->input('bio');
        $store->location = $request->input('location');
        if ($request->input('password')) {
            $store->password = bcrypt($request->input('password'));
        }
        $store->save();

        return redirect()->route('store.profile.index');
        // ->with('success', 'Profile updated successfully.');
    }

}
