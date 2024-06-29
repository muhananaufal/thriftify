<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())
            ->where('status', 'success')
            ->get();

        return view('user.product.history', compact('orders'));
    }
}
