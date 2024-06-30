@extends('layouts.store_layout')

@section('title', 'Store Product Details')

@section('content')
    <main class="bg-gray-100 mb-auto flex-grow font-poppins">
        <div class="px-8 py-12">

            <!-- Form add product -->
            <form>
                <!-- Header -->
                <div class="flex justify-between items-center">
                    <div class="max-w-[60%]">
                        <h1 class="font-bold text-lg md:text-2xl">Detail Product</h1>
                        <p class="text-xs">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas,
                            dolorem?</p>
                    </div>
                    <div>
                        <a href="{{ route('store.product.edit', $product) }}"
                            class="rounded-lg hover:bg-blue-100 text-blue-500 transition-all flex gap-2 items-center text-sm py-3 px-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <polygon points="16 3 21 8 8 21 3 21 3 16 16 3"></polygon>
                            </svg> Edit
                        </a>
                    </div>
                </div>

                <!-- main content -->
                <div class="grid grid-cols-12 md:grid-rows-12 gap-4 mt-8">
                    <div class="col-span-12 md:col-span-7 md:row-span-12 bg-white px-4 py-6 rounded-lg">
                        <h2 class="font-bold text-xl">Basic Information</h2>
                        <div class="grid grid-cols-12 gap-4 mt-4">
                            <div class="col-span-12 md:col-span-6">
                                <p class="block text-sm font-medium text-gray-500">Product Name</p>
                                <p class="mt-1 py-2 block w-full text-xs md:text-sm text-black">{{ $product->name }}</p>
                            </div>
                            <div class="col-span-12 md:col-span-6">
                                <p class="block text-sm font-medium text-gray-500">Price</p>
                                <p placeholder="e.g. 300000" autocomplete="product-price"
                                    class="mt-1 py-2 block w-full text-xs md:text-sm text-black">${{ $product->price }}</p>
                            </div>
                            <div class="col-span-12">
                                <p class="block text-sm font-medium text-gray-500">Description</p>
                                <div class="overflow-y-auto">
                                    <p class="mt-1 py-2 block w-full text-xs md:text-sm h-full text-black">
                                        {{ $product->description }}</p>
                                </div>
                            </div>

                            <!-- save as draft or add to product -->
                            <div class="col-span-12">
                                <label for="addto" class="block text-sm font-medium text-gray-700">Status</label>
                                <select name="addto" id="addto"
                                    class="mt-1 py-2 px-3 block w-full text-xs md:text-sm border-gray-300 focus:border-slate-800 transition-all border outline-none rounded-md"
                                    disabled>
                                    <option value="sale" @if ($product->status === 'sale') selected @endif>For Sale
                                    </option>
                                    <option value="draft" @if ($product->status === 'draft') selected @endif>Draft
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 md:col-span-5 md:row-span-6 bg-white px-4 py-6 rounded-lg">
                        <h2 class="font-bold text-xl">Product Image</h2>
                        <div class="mt-4">
                            <img src="{{ $product->picture }}" alt="foto-produk"
                                class="w-48 h-48 border-gray-200 border object-cover mx-auto" id="product-img">
                        </div>
                    </div>
                    <div class="col-span-12 md:col-span-5 md:row-span-6 bg-white px-4 py-6 rounded-lg">
                        <h2 class="font-bold text-xl">Product Category</h2>
                        <div class="grid grid-cols-8 gap-2">
                            <div class="mt-4 col-span-8">
                                <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                                <select name="category" id="category"
                                    class="mt-1 py-2 px-3 block w-full text-xs md:text-sm border-gray-300 focus:border-slate-800 transition-all border outline-none rounded-md"
                                    disabled>
                                    <option value="">{{ $product->category->name }}</option>
                                    <option value="tops">Tops</option>
                                    <option value="bottoms">Bottoms</option>
                                    <option value="outwear">Outwear</option>
                                    <option value="footwear">Footwear</option>
                                    <option value="accessories">Accessories</option>
                                    <option value="sports">Sports</option>
                                    <option value="kids">Kids</option>
                                    <option value="other">Other..</option>
                                </select>
                            </div>
                            <div class="mt-4 col-span-4">
                                <label for="size" class="block text-sm font-medium text-gray-700">Size</label>
                                <select name="size" id="size"
                                    class="mt-1 py-2 px-3 block w-full text-xs md:text-sm border-gray-300 focus:border-slate-800 transition-all border outline-none rounded-md"
                                    disabled>
                                    <option value="">{{ strtoupper($product->size) }}</option>
                                    <option value="s">S</option>
                                    <option value="m">M</option>
                                    <option value="l">L</option>
                                    <option value="xl">XL</option>
                                </select>
                            </div>
                            <div class="mt-4 col-span-4">
                                <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                                <select name="gender" id="gender"
                                    class="mt-1 py-2 px-3 block w-full text-xs md:text-sm border-gray-300 focus:border-slate-800 transition-all border outline-none rounded-md"
                                    disabled>
                                    <option value="">{{ ucwords($product->gender) }}</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                            <div class="mt-4 col-span-8">
                                <label for="condition" class="block text-sm font-medium text-gray-700">Condition</label>
                                <select name="condition" id="condition"
                                    class="mt-1 py-2 px-3 block w-full text-xs md:text-sm border-gray-300 focus:border-slate-800 transition-all border outline-none rounded-md"
                                    disabled>
                                    <option value="">{{ ucwords($product->condition) }}</option>
                                    <option value="new">New</option>
                                    <option value="good">Good</option>
                                    <option value="bad">Bad</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </main>
@endsection
