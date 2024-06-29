<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConfirmationController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())
            ->where('status', 'need_confirmation')
            ->get();

        return view('user.product.confirmation', compact('orders'));
    }

    public function reject(Request $request, $orderId, Product $product)
    {
        $order = Order::find($orderId);
        if ($order->user_id != auth()->user()->id) {
            return redirect()->back()->with('error', 'You are not authorized to confirm this order.');
        }

        // Update the order status to success
        $order->status = 'sale';
        $order->save();

        // Update the status of each product in the order to success
        foreach ($order->orderItems as $item) {
            $product = $item->product;
            $product->status = 'sale';
            $product->save();
        }


        return redirect()->back();
        // ->with('success', 'Order confirmed successfully.');
    }
}
