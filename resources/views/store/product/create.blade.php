@extends('layouts.store_layout')

@section('title', 'Store Add Product')

@section('content')
    <main class="bg-gray-100 mb-auto flex-grow font-poppins">
        <div class="px-8 py-12">

            <!-- Form add product -->
            <form action="{{ route('store.product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Header -->
                <div class="flex justify-between items-center">
                    <div class="max-w-[60%]">
                        <h1 class="font-bold text-lg md:text-2xl">Add Product</h1>
                        <p class="text-xs">Add your product Lorem ipsum dolor sit amet consectetur adipisicing
                            elit. Quas, dolorem?</p>
                    </div>
                    <div>
                        <button type="submit"
                            class="rounded-lg border-2 border-slate-800 hover:bg-slate-800 hover:text-white transition-all text-slate-800 flex gap-2 items-center text-sm py-2 px-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg> Save
                        </button>
                    </div>
                </div>

                <!-- main content -->
                <div class="grid grid-cols-12 md:grid-rows-12 gap-4 mt-8">
                    <div class="col-span-12 md:col-span-7 md:row-span-12 bg-white px-4 py-6 rounded-lg">
                        <h2 class="font-bold text-xl">Basic Information</h2>
                        <div class="grid grid-cols-12 gap-4 mt-4">
                            <div class="col-span-12 md:col-span-6">
                                <label for="product-name" class="block text-sm font-medium text-gray-700">Product
                                    Name</label>
                                <input type="text" name="name" id="product-name" autocomplete="product-name"
                                    placeholder="e.g. Awua"
                                    class="mt-1 py-2 px-3 block w-full text-xs md:text-sm border-gray-300 focus:border-slate-800 transition-all border outline-none rounded-md">
                                @error('name')
                                    <p class="small text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-span-12 md:col-span-6">
                                <label for="product-price" class="block text-sm font-medium text-gray-700">Price</label>
                                <input type="number" name="price" id="product-price" placeholder="e.g. 300000"
                                    autocomplete="product-price"
                                    class="mt-1 py-2 px-3 block w-full text-xs md:text-sm border-gray-300 focus:border-slate-800 transition-all border outline-none rounded-md">
                                @error('price')
                                    <p class="small text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-span-12">
                                <label for="product-description"
                                    class="block text-sm font-medium text-gray-700">Description</label>
                                <textarea name="description" id="product-description" placeholder="e.g. Produk ini keren"
                                    autocomplete="product-description"
                                    class="mt-1 py-2 px-3 block w-full text-xs md:text-sm border-gray-300 focus:border-slate-800 transition-all border outline-none rounded-md"
                                    rows="20"></textarea>
                                @error('description')
                                    <p class="small text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- save as draft or add to product -->
                            <div class="col-span-12">
                                <label for="addto" class="block text-sm font-medium text-gray-700">Add
                                    To</label>
                                <select name="status" id="addto"
                                    class="mt-1 py-2 px-3 block w-full text-xs md:text-sm border-gray-300 focus:border-slate-800 transition-all border outline-none rounded-md">
                                    <option value="sale">For Sale</option>
                                    <option value="draft">Draft</option>
                                </select>
                                @error('status')
                                    <p class="small text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 md:col-span-5 md:row-span-6 bg-white px-4 py-6 rounded-lg">
                        <h2 class="font-bold text-xl">Product Image</h2>
                        <div class="mt-4">
                            <img src="" class="hidden w-48 h-48 border-gray-200 border object-cover mx-auto"
                                id="product-img">
                            <label for="product-image"
                                class="mt-3 text-sm font-medium text-gray-700 cursor-pointer p-8 border flex justify-center w-full">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <line x1="12" y1="5" x2="12" y2="19">
                                    </line>
                                    <line x1="5" y1="12" x2="19" y2="12">
                                    </line>
                                </svg>
                            </label>
                            <input type="file" name="picture" id="product-image"
                                class="hidden mt-1 py-2 px-3 w-full text-xs md:text-sm border-gray-300 focus:border-slate-800 transition-all border outline-none rounded-md"
                                onchange="showImagePrev()">
                            @error('picture')
                                <p class="small text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-span-12 md:col-span-5 md:row-span-6 bg-white px-4 py-6 rounded-lg">
                        <h2 class="font-bold text-xl">Product Category</h2>
                        <div class="grid grid-cols-8 gap-2">
                            <div class="mt-4 col-span-8">
                                <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                                <select name="category_id" id="category"
                                    class="mt-1 py-2 px-3 block w-full text-xs md:text-sm border-gray-300 focus:border-slate-800 transition-all border outline-none rounded-md">
                                    @foreach ($categories as $id => $name)
                                        <option value="{{ $id }}"
                                            {{ old('category_id') == $id ? 'selected' : '' }}>
                                            {{ $name }}</option>
                                    @endforeach
                                </select>
                                @error('brand_id')
                                    <p class="small text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mt-4 col-span-4">
                                <label for="size" class="block text-sm font-medium text-gray-700">Size</label>
                                <select name="size" id="size"
                                    class="mt-1 py-2 px-3 block w-full text-xs md:text-sm border-gray-300 focus:border-slate-800 transition-all border outline-none rounded-md">
                                    <option value="s">S</option>
                                    <option value="m">M</option>
                                    <option value="l">L</option>
                                    <option value="xl">XL</option>
                                </select>
                                @error('size')
                                    <p class="small text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mt-4 col-span-4">
                                <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                                <select name="gender" id="gender"
                                    class="mt-1 py-2 px-3 block w-full text-xs md:text-sm border-gray-300 focus:border-slate-800 transition-all border outline-none rounded-md">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                                @error('gender')
                                    <p class="small text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mt-4 col-span-8">
                                <label for="condition" class="block text-sm font-medium text-gray-700">Condition</label>
                                <select name="condition" id="condition"
                                    class="mt-1 py-2 px-3 block w-full text-xs md:text-sm border-gray-300 focus:border-slate-800 transition-all border outline-none rounded-md">
                                    <option value="new">New</option>
                                    <option value="good">Good</option>
                                    <option value="bad">Bad</option>
                                </select>
                                @error('condition')
                                    <p class="small text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </main>
@endsection
