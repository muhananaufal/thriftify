<?php

namespace App\Http\Controllers\auth\store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeleteController extends Controller
{
    public function destroy()
    {
        $store = Auth::guard('store')->user();
        Auth::guard('store')->logout();
        \Storage::delete($store->picture);
        $store->delete();

        return redirect()->back();
        // ->with('success', 'Account deleted successfully.');
    }
}
