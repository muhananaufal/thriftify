<?php

namespace App\Http\Controllers\store;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index()
    {
        $orders = Order::all();

        return view('store.dashboard', compact('orders'));
    }
    public function order(Order $order)
    {
        if ($order->store_id !== auth()->guard('store')->id()) {
            return redirect()->back();
            // ->with('error', 'You are not authorized to view this order.');
        }

        $order->load('orderItems.product');

        return view('store.product.order', compact('order'));
    }
}
