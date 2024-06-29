<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        return view('user.profile.index');
    }

    public function edit()
    {
        $user = auth()->user();
        return view('user.profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        // Validate incoming request
        $request->validate([
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Example validation for image upload
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'gender' => 'nullable',
            'address' => 'nullable',
            'phone_number' => 'nullable|phone_number',
            'date_of_birth' => 'nullable',
            'password' => 'nullable|confirmed|min:8', // Only require password if provided
        ]);

        // Handle picture upload if provided
        if ($request->hasFile('picture')) {
            $picture = $request->file('picture');
            $picturePath = $picture->storeAs('public/users', str()->random(20) . '.' . $picture->getClientOriginalExtension());
            $pictureURL = Storage::url($picturePath);
            $user->picture = $pictureURL;
        }

        // Update user attributes
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->gender = $request->input('gender');
        $user->address = $request->input('address');
        $user->phone_number = $request->input('phone_number');
        $user->date_of_birth = $request->input('date_of_birth');

        // Update password if provided
        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        // Save user record
        $user->save();

        return redirect()->route('profile.index');
        // ->with('success', 'Profile updated successfully.');
    }

    public function deletePictureProfile()
    {
        $user = auth()->user();

        if ($user && $user->picture) {
            \Storage::delete($user->picture);
            $user->picture = null;
            $user->save();

            return redirect()->route('profile.index');
            // ->with('success', 'Picture deleted successfully.');
        }
    }
}
