<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Jobs\RevertProductStatusUpdate;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        $userId = auth()->id();
        $cart = session()->get("cart_{$userId}", []);
        if (empty($cart)) {
            return redirect()->route('cart.index');
            // ->with('error', 'Your cart is empty!');
        }

        $selectedProducts = $request->input('products');
        if (empty($selectedProducts)) {
            return redirect()->route('cart.index');
            // ->with('error', 'No products selected for checkout!');
        }

        $totalPrice = 0;
        foreach ($selectedProducts as $productId) {
            if (isset($cart[$productId])) {
                $totalPrice += $cart[$productId]['price'] * $cart[$productId]['quantity'];
            }
        }

        $order = Order::create([
            'user_id' => Auth::id(),
            'store_id' => Product::find(array_keys($cart)[0])->store_id, // Assuming all products belong to the same store
            'total_price' => $totalPrice,
            'shipping_method' => $request->shipping_method,
            'payment_method' => $request->payment_method,
            'status' => 'waiting_for_payment',
        ]);

        foreach ($selectedProducts as $productId) {
            $product = Product::find($productId);
            if ($product) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $cart[$productId]['quantity'],
                    'price' => $product->price
                ]);

                $product->status = 'waiting_for_payment';
                $product->save();
                unset($cart[$productId]);
            }
        }

        $orders = session()->get("orders_{$userId}", []);
        $orders[] = $order;
        session()->put("orders_{$userId}", $orders);

        $remainingCart = array_diff_key($cart, array_flip($selectedProducts));
        session()->put("cart_{$userId}", $remainingCart);

        RevertProductStatusUpdate::dispatch($order)->delay(now()->addSeconds(200));

        return redirect()->route('checkout.index');
        // ->with('success', 'Order created successfully!');
    }

    public function index()
    {
        $userId = auth()->id();
        $orders = Order::where('user_id', $userId)
            ->where('status', 'waiting_for_payment')
            ->with('orderItems.product')
            ->latest()
            ->get();

        return view('user.product.checkout', compact('orders'));
    }

    public function pay($orderId)
    {
        $userId = auth()->id();
        $order = Order::find($orderId);
        if ($order->status != 'waiting_for_payment') {
            return redirect()->route('checkout.index');
            // ->with('error', 'Invalid order status.');
        }

        $order->status = 'need_confirmation';
        $order->save();

        // Update the session data
        $orders = session()->get("orders_{$userId}", []);
        $remainingOrders = [];

        foreach ($orders as $storedOrder) {
            if ($storedOrder->id != $order->id) {
                $remainingOrders[] = $storedOrder;
            }
        }

        session()->put("orders_{$userId}", $remainingOrders);

        return redirect()->route('confirmation.index');
        // ->with('success', 'Order paid successfully!');
    }
}
