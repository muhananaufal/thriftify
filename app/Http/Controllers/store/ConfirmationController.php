<?php

namespace App\Http\Controllers\store;

use App\Http\Controllers\Controller;
use App\Jobs\ProcessOrderStatusUpdate;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConfirmationController extends Controller
{
    public function index()
    {
        $storeId = Auth::guard('store')->user()->id;
        $statuses = ['need_confirmation', 'on_delivery', 'success', 'sale'];
        $orders = Order::where('store_id', $storeId)
            ->whereIn('status', $statuses)
            ->get();

        return view('store.product.confirmation', compact('orders'));
    }

    public function reject(Request $request, $orderId, Product $product)
    {
        $order = Order::find($orderId);
        if ($order->store_id != Auth::guard('store')->user()->id) {
            return redirect()->back();
            // ->with('error', 'You are not authorized to confirm this order.');
        }

        $order->status = 'sale';
        $order->save();

        foreach ($order->orderItems as $item) {
            $product = $item->product;
            $product->status = 'sale';
            $product->save();
        }
        return redirect()->route('store.confirmation.index');
        // ->with('success', 'Order confirmed successfully.');
    }

    public function confirm(Request $request, $orderId, Product $product)
    {
        $order = Order::find($orderId);
        if ($order->store_id != Auth::guard('store')->user()->id) {
            return redirect()->back();
            // ->with('error', 'You are not authorized to confirm this order.');
        }

        $order->status = 'on_delivery';
        $order->save();

        foreach ($order->orderItems as $item) {
            $product = $item->product;
            $product->status = 'on_delivery';
            $product->save();
        }

        ProcessOrderStatusUpdate::dispatch($orderId)->delay(now()->addSeconds(200));

        return redirect()->route('store.confirmation.index');
        // ->with('success', 'Order confirmed successfully.');
    }
}
