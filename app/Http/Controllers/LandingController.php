<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $products = Product::where('status', 'sale')->latest()->paginate(20);
        return view('landing', compact('products'));
    }
}
