<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('user.product.show', compact('product'));
    }
    
    public function order(Order $order)
    {
        if ($order->user_id !== auth()->id()) {
            return redirect()->back();
            // ->with('error', 'You are not authorized to view this order.');
        }

        $order->load('orderItems.product');

        return view('user.product.order', compact('order'));
    }

}
