@extends('layouts.store_layout')

@section('title', 'Store Sales')

@section('content')
    <main class="bg-gray-100 mb-auto flex-grow font-poppins">
        <!-- Table Sales -->
        <div class="px-8 py-12">
            <div class="flex flex-col md:flex-row gap-4 md:gap-0 md:justify-between items-center">
                <h1 class="font-bold text-2xl">Sales</h1>
            </div>

            <!-- Sales Detail Grid -->
            <div class="grid grid-cols-2 gap-4 mt-8">
                <!-- Total Sales -->
                <div class="bg-white col-span-2 md:col-span-1 rounded-xl p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <h1 class="text-sm md:text-lg font-semibold">Total Sales</h1>
                            <p class="text-gray-400 text-xs md:text-sm">${{ $orders->sum('total_price') }}</p>
                        </div>
                        <div class="bg-green-100 p-2 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="ww-4 md:-6 h-4 md:h-6 text-green-500"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <line x1="12" y1="1" x2="12" y2="23"></line>
                                <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                <!-- Total Orders -->
                <div class="bg-white col-span-2 md:col-span-1 rounded-xl p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <h1 class="text-sm md:text-lg font-semibold">Total Orders</h1>
                            <p class="text-gray-400 text-xs md:text-sm">{{ $orders->count() }} Orders</p>
                        </div>
                        <div class="bg-blue-100 p-2 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 md:w-6 h-4 md:h-6 text-blue-500"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="10" cy="20.5" r="1" />
                                <circle cx="18" cy="20.5" r="1" />
                                <path d="M2.5 2.5h3l2.7 12.4a2 2 0 0 0 2 1.6h7.7a2 2 0 0 0 2-1.6l1.6-8.4H7.1" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- table -->
            <div class="mt-8">
                <div class="flex gap-5 items-center mb-4">
                    <!-- search bar -->
                    <form action="">
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

                <div class="py-3 overflow-x-auto bg-white rounded-xl">
                    <table class="table-auto w-full min-w-[750px]">
                        <thead>
                            <tr class="text-left text-xs">
                                <th class="px-4 py-2">Invoice ID</th>
                                <th class="px-4 py-2">Product Image</th>
                                <th class="px-4 py-2">Product Name</th>
                                <th class="px-4 py-2">Price</th>
                                <th class="px-4 py-2">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                @foreach ($order->orderItems as $item)
                                    <tr class="text-sm border-b-2">
                                        <td class="px-4 py-2">INV-0{{ $order->id }}</td>
                                        <td class="px-4 py-2">
                                            <img src="{{ $item->product->picture }}" alt=""
                                                class="w-20 h-20 object-cover rounded-md">
                                        </td>
                                        <td class="px-4 py-2">{{ $item->product->name }}</td>
                                        <td class="px-4 py-2">${{ $order->total_price }}</td>
                                        <td class="px-4 py-2">
                                            {{ $order->updated_at->format('Y/m/d') }}
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                    </table>
                </div>
            </div>
        </div>

    </main>
@endsection
