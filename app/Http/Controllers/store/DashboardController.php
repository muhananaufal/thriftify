<?php

namespace App\Http\Controllers\store;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index()
    {
        return view('store.dashboard');
    }
    // public function confirmation()
    // {
    //     $products = Product::where('store_id', auth()->user()->id)->where('status', 'confirmation')->latest()->paginate(6);
    //     // ->where('status', 'published');
    //     return view('store.product.confirmation', [
    //         'products' => $products
    //     ]);
    // }
    // public function confirmed(Product $product)
    // {
    //     $this->authorize('access', $product);

    //     request()->validate([
    //         'picture' => 'mimes:jpg,jpeg,png',
    //         'name' => 'required|string|min:3|max:255',
    //         'price' => 'required|numeric|min:0.1',
    //         'description' => 'required|string',
    //         'color' => 'required|string',
    //         'category_id' => 'required',
    //         'gender' => 'required',
    //         'size' => 'required',
    //         'status' => 'required',
    //         'condition' => 'required',
    //     ]);

    //     if (request()->file('picture')) {
    //         $picture = request()->file('picture');
    //         $picturePath = $picture->storeAs('public/products', str()->random(20) . ".{$picture->extension()}");
    //         \Storage::delete($product->picture);
    //         $pictureURL = url(Storage::url($picturePath));
    //     } else {
    //         $pictureURL = $product->picture;
    //     }

    //     $product->update([
    //         'picture' => $pictureURL,
    //         'name' => request()->name,
    //         'price' => request()->price,
    //         'description' => request()->description,
    //         'color' => request()->color,
    //         'category_id' => request()->category_id,
    //         'gender' => request()->gender,
    //         'size' => request()->size,
    //         'status' => request()->status,
    //         'condition' => request()->condition,
    //         'slug' => str()->slug(request()->name) . "-" . str()->random(5),
    //         'store_id' => auth()->user()->id,
    //     ]);
    //     return redirect()->route('products.index')->with('product_edit', 'Pemberitahuan!! kamu baru saja mengubah sebuah product');
    // }
    
    // public function sales()
    // {
    //     $products = Product::where('store_id', auth()->user()->id)->where('status', 'success')->latest()->paginate(6);
    //     // ->where('status', 'published');
    //     return view('store.product.sales', [
    //         'products' => $products
    //     ]);
    // }
}
