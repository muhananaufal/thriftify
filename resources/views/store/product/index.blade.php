@extends('layouts.store_layout')

@section('title', 'Store Products')

@section('content')
    <main class="bg-gray-100 mb-auto flex-grow font-poppins">
        <!-- Hello -->
        <div class="px-8 py-12" x-data="{ tab: 'all' }">
            <div class="flex flex-col md:flex-row gap-4 md:gap-0 md:justify-between items-center">
                <h1 class="font-bold text-2xl">List Products</h1>
                <div class="flex gap-5 items-center">
                    <!-- search bar -->
                    {{-- <form action="">
                        <div class="relative group">
                            <input type="text"
                                class="form-input rounded-md bg-white text-sm pl-10 py-2.5 ml-5 border-transparent border-none outline-none focus:ring-0 transition-all duration-300 ease-in-out focus:w-60 w-48"
                                placeholder="Search..." autocomplete="off">
                            <span class="absolute left-8 top-2.5">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </span>
                        </div>
                    </form> --}}


                    <a href="{{ route('store.product.create') }}"
                        class="flex items-center gap-3 rounded-lg bg-slate-900 text-white hover:bg-slate-950 transition-all py-3 px-4 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                        <p class="text-xs hidden md:block">Add Product</p>
                    </a>
                </div>
            </div>

            <!-- Navtabs -->
            <div class="flex justify-center md:justify-normal mt-6">
                <nav class="flex space-x-4">
                    <a href="#" @click.prevent="tab = 'all'"
                        :class="{ 'border-b-2 border-blue-600': tab === 'all' }" class="px-4 py-2">All
                        <span
                            class="ml-1 text-blue-600 rounded-full text-xs">{{ $products->filter(function ($product) {
                                    return $product->status === 'draft' || $product->status === 'sale';
                                })->count() }}</span></a>
                    <a href="#" @click.prevent="tab = 'draft'"
                        :class="{ 'border-b-2 border-slate-500': tab === 'draft' }" class="px-4 py-2">Draft<span
                            class="ml-1 text-slate-600 rounded-full text-xs">{{ $products->filter(function ($product) {
                                    return $product->status === 'draft';
                                })->count() }}</span></a>
                    <a href="#" @click.prevent="tab = 'sale'"
                        :class="{ 'border-b-2 border-green-500': tab === 'sale' }" class="px-4 py-2">For Sale <span
                            class="ml-1 text-green-600 rounded-full text-xs">{{ $products->filter(function ($product) {
                                    return $product->status === 'sale';
                                })->count() }}</span></a>
                </nav>
            </div>
            <div class="flex gap-5 items-center mb-4">
                <!-- search bar -->
                <form action="" class="mt-8">
                    <div class="relative group">
                        <input type="text"
                            class="form-input rounded-md bg-white text-sm pl-10 py-2.5 border-transparent border-none outline-none focus:ring-0 transition-all duration-300 ease-in-out focus:w-72 w-64"
                            placeholder="Search..." autocomplete="off">
                        <span class="absolute left-3 top-2.5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </span>
                    </div>
                </form>
            </div>
            <!-- Table -->
            <div class="mt-3">
                <div class="py-3 overflow-x-auto bg-white rounded-xl">
                    <table class="table-auto w-full min-w-[750px]">
                        <thead>
                            <tr class="text-left text-xs">
                                <th class="px-4 py-2">Product Image</th>
                                <th class="px-4 py-2">Product Name</th>
                                <th class="px-4 py-2">Price</th>
                                <th class="px-4 py-2">Stock</th>
                                <th class="px-4 py-2">Action</th>
                            </tr>
                        </thead>

                        <template x-if="tab === 'all'">
                            <tbody>
                                @foreach ($products as $product)
                                    @if ($product->status === 'sale' || $product->status === 'draft')
                                        <tr class="text-sm border-b-2 ">
                                            <td class="px-4 py-2">
                                                <img src="{{ $product->picture }}" alt=""
                                                    class="w-20 h-20 object-cover rounded-md">
                                            </td>
                                            <td class="px-4 py-2">{{ $product->name }}</td>
                                            <td class="px-4 py-2">${{ $product->price }}</td>
                                            <td class="px-4 py-2">
                                                <span
                                                    class="{{ $product->status === 'sale' ? 'bg-green-200 text-green-600' : 'bg-slate-200 text-slate-600' }} px-2 py-1 rounded-full text-xs">
                                                    {{ $product->status === 'sale' ? 'For Sale' : ucwords($product->status) }}
                                                </span>
                                            </td>
                                            <td class="px-4 py-2">
                                                <div class="flex items-center">

                                                    <!-- Action dropdown -->
                                                    <div class="relative px-4 text-gray-400 text-sm cursor-pointer"
                                                        x-data="{ open: false }">
                                                        <div class="flex items-center min-h-full" @click="open = !open">

                                                            <div class="max-w-xs rounded-full flex items-center text-sm"
                                                                id="user-menu-button" aria-expanded="false"
                                                                aria-haspopup="true">
                                                                <span class="sr-only">Open user menu</span>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                    height="20" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round">
                                                                    <circle cx="12" cy="12" r="1">
                                                                    </circle>
                                                                    <circle cx="12" cy="5" r="1">
                                                                    </circle>
                                                                    <circle cx="12" cy="19" r="1">
                                                                    </circle>
                                                                </svg>
                                                            </div>
                                                        </div>

                                                        <div x-show="open" @click.away="open = false"
                                                            class="origin-top-right absolute z-[1] right-8 mt-0 rounded-b-md py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none w-[200px] shadow-md"
                                                            x-transition:enter="transition ease-out duration-100"
                                                            x-transition:enter-start="transform opacity-0 scale-95"
                                                            x-transition:enter-end="transform opacity-100 scale-100"
                                                            x-transition:leave="transition ease-in duration-75"
                                                            x-transition:leave-start="transform opacity-100 scale-100"
                                                            x-transition:leave-end="transform opacity-0 scale-95"
                                                            role="menu" aria-orientation="vertical"
                                                            aria-labelledby="user-menu-button" tabindex="-1">
                                                            <a href="{{ route('store.product.details', $product) }}"
                                                                class="flex gap-2 items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"role="menuitem"
                                                                tabindex="-1" id="user-menu-item-0">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                    height="20" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round">
                                                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                                    </path>
                                                                    <circle cx="12" cy="12" r="3">
                                                                    </circle>
                                                                </svg>
                                                                <p>View</p>
                                                            </a>

                                                            <a href="{{ route('store.product.edit', $product) }}"
                                                                class="flex gap-2 items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"role="menuitem"
                                                                tabindex="-1" id="user-menu-item-0">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                    height="20" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round">
                                                                    <path
                                                                        d="M20 14.66V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h5.34">
                                                                    </path>
                                                                    <polygon points="18 2 22 6 12 16 8 16 8 12 18 2">
                                                                    </polygon>
                                                                </svg>
                                                                <p>Edit</p>
                                                            </a>

                                                            <form action="{{ route('store.product.delete', $product) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="w-full">
                                                                    <a href="#"
                                                                        class="flex gap-2 items-center px-4 py-2 text-sm text-red-700 hover:bg-gray-100"
                                                                        role="menuitem" tabindex="-1"
                                                                        id="user-menu-item-0">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="20" height="20"
                                                                            viewBox="0 0 24 24" fill="none"
                                                                            stroke="currentColor" stroke-width="2"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round">
                                                                            <polyline points="3 6 5 6 21 6">
                                                                            </polyline>
                                                                            <path
                                                                                d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                                            </path>
                                                                            <line x1="10" y1="11"
                                                                                x2="10" y2="17"></line>
                                                                            <line x1="14" y1="11"
                                                                                x2="14" y2="17"></line>
                                                                        </svg>
                                                                        <p class="w-full text-left">Delete</p>
                                                                    </a>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </template>

                        <template x-if="tab === 'draft'">
                            <tbody>
                                @foreach ($products as $product)
                                    @if ($product->status === 'draft')
                                        <tr class="text-sm border-b-2">
                                            <td class="px-4 py-2">
                                                <img src="{{ $product->picture }}" alt=""
                                                    class="w-20 h-20 object-cover rounded-md">
                                            </td>
                                            <td class="px-4 py-2">{{ $product->name }}</td>
                                            <td class="px-4 py-2">${{ $product->price }}</td>
                                            <td class="px-4 py-2">
                                                <span
                                                    class="bg-slate-200 text-slate-600 px-2 py-1 rounded-full text-xs">{{ ucwords($product->status) }}</span>
                                            </td>
                                            <td class="px-4 py-2">
                                                <div class="flex items-center">

                                                    <!-- Action dropdown -->
                                                    <div class="relative px-4 text-gray-400 text-sm cursor-pointer"
                                                        x-data="{ open: false }">
                                                        <div class="flex items-center min-h-full" @click="open = !open">

                                                            <div class="max-w-xs rounded-full flex items-center text-sm"
                                                                id="user-menu-button" aria-expanded="false"
                                                                aria-haspopup="true">
                                                                <span class="sr-only">Open user menu</span>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                    height="20" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round">
                                                                    <circle cx="12" cy="12" r="1">
                                                                    </circle>
                                                                    <circle cx="12" cy="5" r="1">
                                                                    </circle>
                                                                    <circle cx="12" cy="19" r="1">
                                                                    </circle>
                                                                </svg>
                                                            </div>
                                                        </div>

                                                        <div x-show="open" @click.away="open = false"
                                                            class="origin-top-right absolute z-[1] right-8 mt-0 rounded-b-md py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none w-[200px] shadow-md"
                                                            x-transition:enter="transition ease-out duration-100"
                                                            x-transition:enter-start="transform opacity-0 scale-95"
                                                            x-transition:enter-end="transform opacity-100 scale-100"
                                                            x-transition:leave="transition ease-in duration-75"
                                                            x-transition:leave-start="transform opacity-100 scale-100"
                                                            x-transition:leave-end="transform opacity-0 scale-95"
                                                            role="menu" aria-orientation="vertical"
                                                            aria-labelledby="user-menu-button" tabindex="-1">
                                                            <a href="{{ route('store.product.details', $product) }}"
                                                                class="flex gap-2 items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"role="menuitem"
                                                                tabindex="-1" id="user-menu-item-0">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                    height="20" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round">
                                                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                                    </path>
                                                                    <circle cx="12" cy="12" r="3">
                                                                    </circle>
                                                                </svg>
                                                                <p>View</p>
                                                            </a>

                                                            <a href="{{ route('store.product.edit', $product) }}"
                                                                class="flex gap-2 items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"role="menuitem"
                                                                tabindex="-1" id="user-menu-item-0">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                    height="20" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round">
                                                                    <path
                                                                        d="M20 14.66V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h5.34">
                                                                    </path>
                                                                    <polygon points="18 2 22 6 12 16 8 16 8 12 18 2">
                                                                    </polygon>
                                                                </svg>
                                                                <p>Edit</p>
                                                            </a>

                                                            <form action="{{ route('store.product.delete', $product) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="w-full">
                                                                    <a href="#"
                                                                        class="flex gap-2 items-center px-4 py-2 text-sm text-red-700 hover:bg-gray-100"
                                                                        role="menuitem" tabindex="-1"
                                                                        id="user-menu-item-0">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="20" height="20"
                                                                            viewBox="0 0 24 24" fill="none"
                                                                            stroke="currentColor" stroke-width="2"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round">
                                                                            <polyline points="3 6 5 6 21 6">
                                                                            </polyline>
                                                                            <path
                                                                                d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                                            </path>
                                                                            <line x1="10" y1="11"
                                                                                x2="10" y2="17"></line>
                                                                            <line x1="14" y1="11"
                                                                                x2="14" y2="17"></line>
                                                                        </svg>
                                                                        <p class="w-full text-left">Delete</p>
                                                                    </a>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </template>

                        <template x-if="tab === 'sale'">
                            <tbody>
                                @foreach ($products as $product)
                                    @if ($product->status === 'sale')
                                        <tr class="text-sm border-b-2">
                                            <td class="px-4 py-2">
                                                <img src="{{ $product->picture }}" alt=""
                                                    class="w-20 h-20 object-cover rounded-md">
                                            </td>
                                            <td class="px-4 py-2">{{ $product->name }}</td>
                                            <td class="px-4 py-2">${{ $product->price }}</td>
                                            <td class="px-4 py-2">
                                                <span
                                                    class="bg-green-200 text-green-600' px-2 py-1 rounded-full text-xs">For
                                                    Sale</span>
                                            </td>
                                            <td class="px-4 py-2">
                                                <div class="flex items-center">

                                                    <!-- Action dropdown -->
                                                    <div class="relative px-4 text-gray-400 text-sm cursor-pointer"
                                                        x-data="{ open: false }">
                                                        <div class="flex items-center min-h-full" @click="open = !open">

                                                            <div class="max-w-xs rounded-full flex items-center text-sm"
                                                                id="user-menu-button" aria-expanded="false"
                                                                aria-haspopup="true">
                                                                <span class="sr-only">Open user menu</span>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                    height="20" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round">
                                                                    <circle cx="12" cy="12" r="1">
                                                                    </circle>
                                                                    <circle cx="12" cy="5" r="1">
                                                                    </circle>
                                                                    <circle cx="12" cy="19" r="1">
                                                                    </circle>
                                                                </svg>
                                                            </div>
                                                        </div>

                                                        <div x-show="open" @click.away="open = false"
                                                            class="origin-top-right absolute z-[1] right-8 mt-0 rounded-b-md py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none w-[200px] shadow-md"
                                                            x-transition:enter="transition ease-out duration-100"
                                                            x-transition:enter-start="transform opacity-0 scale-95"
                                                            x-transition:enter-end="transform opacity-100 scale-100"
                                                            x-transition:leave="transition ease-in duration-75"
                                                            x-transition:leave-start="transform opacity-100 scale-100"
                                                            x-transition:leave-end="transform opacity-0 scale-95"
                                                            role="menu" aria-orientation="vertical"
                                                            aria-labelledby="user-menu-button" tabindex="-1">
                                                            <a href="{{ route('store.product.details', $product) }}"
                                                                class="flex gap-2 items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"role="menuitem"
                                                                tabindex="-1" id="user-menu-item-0">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                    height="20" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round">
                                                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                                    </path>
                                                                    <circle cx="12" cy="12" r="3">
                                                                    </circle>
                                                                </svg>
                                                                <p>View</p>
                                                            </a>

                                                            <a href="{{ route('store.product.edit', $product) }}"
                                                                class="flex gap-2 items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"role="menuitem"
                                                                tabindex="-1" id="user-menu-item-0">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                    height="20" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round">
                                                                    <path
                                                                        d="M20 14.66V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h5.34">
                                                                    </path>
                                                                    <polygon points="18 2 22 6 12 16 8 16 8 12 18 2">
                                                                    </polygon>
                                                                </svg>
                                                                <p>Edit</p>
                                                            </a>

                                                            <form action="{{ route('store.product.delete', $product) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="w-full">
                                                                    <a href="#"
                                                                        class="flex gap-2 items-center px-4 py-2 text-sm text-red-700 hover:bg-gray-100"
                                                                        role="menuitem" tabindex="-1"
                                                                        id="user-menu-item-0">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="20" height="20"
                                                                            viewBox="0 0 24 24" fill="none"
                                                                            stroke="currentColor" stroke-width="2"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round">
                                                                            <polyline points="3 6 5 6 21 6">
                                                                            </polyline>
                                                                            <path
                                                                                d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                                            </path>
                                                                            <line x1="10" y1="11"
                                                                                x2="10" y2="17"></line>
                                                                            <line x1="14" y1="11"
                                                                                x2="14" y2="17"></line>
                                                                        </svg>
                                                                        <p class="w-full text-left">Delete</p>
                                                                    </a>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </template>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
