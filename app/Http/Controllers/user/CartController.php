<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request, Product $product)
    {
        if ($product->quantity < 1 || $product->status != 'sale') {
            return redirect()->back()->with('error', 'Product is not available!');
        }

        $userId = auth()->id();
        $cart = session()->get("cart_{$userId}", []);

        if (isset($cart[$product->id])) {
            if ($cart[$product->id]['quantity'] < $product->quantity) {
                $cart[$product->id]['quantity']++;
            } else {
                return redirect()->back()->with('error', 'Not enough stock available!');
            }
        } else {
            $cart[$product->id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image_url
            ];
        }

        session()->put("cart_{$userId}", $cart);

        return redirect()->route('cart.index');
        // ->with('success', 'Product added to cart!');
    }

    public function index()
    {
        $userId = auth()->id();
        $cart = session()->get("cart_{$userId}");

        return view('user.product.cart', compact('cart'));
    }
}
