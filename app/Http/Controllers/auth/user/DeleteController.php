<?php

namespace App\Http\Controllers\auth\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function destroy()
    {
        $user = auth()->user();

        // Logout user
        auth()->logout();

        // Delete user account
        \Storage::delete($user->picture);
        $user->delete();

        return redirect()->back();
        // ->with('success', 'Peringatan!! kamu baru saja menghapus akun kamu');
    }
}
