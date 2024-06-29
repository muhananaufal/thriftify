<?php

namespace App\Http\Controllers\store;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SalesController extends Controller
{
    public function index()
    {
        $storeId = Auth::guard('store')->user()->id;
        $orders = Order::where('store_id', $storeId)
            ->where('status', 'success')
            ->get();

        return view('store.product.sales', compact('orders'));
    }
}
