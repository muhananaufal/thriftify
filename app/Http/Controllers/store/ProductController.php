<?php

namespace App\Http\Controllers\store;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // read
    public function index()
    {
        $products = Product::where('store_id', auth()->user()->id)->latest()->paginate(6);
        // ->where('status', 'published');

        return view('store.product.index', [
            'products' => $products
        ]);
    }



    // create
    public function create()
    {
        $categories = Category::pluck('name', 'id');
        return view('store.product.create', compact('categories'));
    }
    public function store()
    {
        request()->validate([
            'picture' => 'required|mimes:jpg,jpeg,png',
            'name' => 'required|string|min:3|max:255',
            'price' => 'required|numeric|min:0.01',
            'description' => 'required|string',
            'category_id' => 'required',
            'gender' => 'required',
            'size' => 'required',
            'status' => 'required|in:draft,sale',
            'condition' => 'required',
        ]);

        $picture = request()->file('picture');
        $picturePath = $picture->storeAs('public/products', str()->random(20) . ".{$picture->extension()}");
        $pictureURL = url(Storage::url($picturePath));

        Product::create([
            'picture' => $pictureURL,
            'name' => request()->name,
            'price' => request()->price,
            'description' => request()->description,
            'category_id' => request()->category_id,
            'gender' => request()->gender,
            'size' => request()->size,
            'status' => request()->status,
            'condition' => request()->condition,
            'slug' => str()->slug(request()->name) . "-" . str()->random(5),
            'store_id' => auth()->user()->id,
        ]);
        return redirect()->route('store.products.index');
        // ->with('product_create', 'Selamat!! kamu baru saja menambahkan sebuah product');
    }

    // update
    public function edit(Product $product)
    {
        $this->authorize('access', $product);

        $categories = Category::pluck('name', 'id');
        return view('store.product.edit', [
            'product' => $product,
            'categories' => $categories,
        ]);
    }
    public function update(Product $product)
    {
        $this->authorize('access', $product);

        request()->validate([
            'picture' => 'mimes:jpg,jpeg,png',
            'name' => 'required|string|min:3|max:255',
            'price' => 'required|numeric|min:0.1',
            'description' => 'required|string',
            'category_id' => 'required',
            'gender' => 'required',
            'size' => 'required',
            'status' => 'required|in:draft,sale',
            'condition' => 'required',
        ]);

        if (request()->file('picture')) {
            $picture = request()->file('picture');
            $picturePath = $picture->storeAs('public/products', str()->random(20) . ".{$picture->extension()}");
            \Storage::delete($product->picture);
            $pictureURL = url(Storage::url($picturePath));
        } else {
            $pictureURL = $product->picture;
        }

        $product->update([
            'picture' => $pictureURL,
            'name' => request()->name,
            'price' => request()->price,
            'description' => request()->description,
            'category_id' => request()->category_id,
            'gender' => request()->gender,
            'size' => request()->size,
            'status' => request()->status,
            'condition' => request()->condition,
            'slug' => str()->slug(request()->name) . "-" . str()->random(5),
            'store_id' => auth()->user()->id,
        ]);
        return redirect()->route('store.products.index');
        // ->with('product_edit', 'Pemberitahuan!! kamu baru saja mengubah sebuah product');
    }
    // delete
    public function destroy(Product $product)
    {
        $this->authorize('access', $product);

        \Storage::delete($product->picture);
        $product->delete();
        return redirect()->route('store.products.index');
        // ->with('product_delete', 'Peringatan!! kamu baru saja menghapus sebuah product');
    }
    // show
    public function details(Product $product)
    {
        return view('store.product.details', [
            'product' => $product
        ]);
    }
    public function updateConfirmationStatus($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        // Ubah status produk menjadi "success"
        $product->status = 'success';
        $product->save();

        // Redirect kembali ke halaman sebelumnya
        return back()->with('success', 'Status produk berhasil diubah.');
    }
}
