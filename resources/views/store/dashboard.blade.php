@extends('layouts.store_layout')

@section('title', 'Detail Order')

@section('content')
    <main class="bg-gray-100 mb-auto flex-grow font-poppins">
        <!-- Hello -->
        <div class="p-6 grid gap-5">
            <div>
                <div class="bg-white py-6 px-8 border border-gray-200 rounded-xl">
                    <h1 class="font-bold text-2xl">Selamat Datang,<br>{{ auth()->user()->name }}</h1>
                    <p class="text-sm py-2">Jelajahi koleksi barang-barang unik dan berkualitas yang telah dipilih dengan
                        cermat dari berbagai tempat. Nikmati pengalaman belanja thrift yang ramah lingkungan dan hemat di
                        toko kami!</p>
                </div>
            </div>

            <!-- Overview Cards -->
            <div class="grid grid-cols-12 gap-3">
                <div class="col-span-6 md:col-span-4">
                    <div class="bg-white py-6 px-8 border border-gray-200 rounded-xl">
                        <p class="text-xxs md:text-xs font-semibold">Total Orders</p>
                        <h1 class="font-bold py-2 text-2xl">{{ $orders->count() }}</h1>
                        <p class="text-xxs">+3 Last 7 Days</p>
                    </div>
                </div>
                <div class="col-span-6 md:col-span-4">
                    <div class="bg-white py-6 px-8 border border-gray-200 rounded-xl">
                        <p class="text-xxs md:text-xs font-semibold">Need Confirmation</p>
                        <h1 class="font-bold py-2 text-2xl">
                            {{ $orders->filter(function ($order) {
                                    return $order->status == 'need_confirmation';
                                })->count() }}
                        </h1>
                        <p class="text-xxs">+5 Last 7 Days</p>
                    </div>
                </div>
                <div class="col-span-12 md:col-span-4">
                    <div class="bg-white py-6 px-8 border border-gray-200 rounded-xl text-center md:text-left">
                        <p class="text-xxs md:text-xs font-semibold">Succesfull Orders</p>
                        <h1 class="font-bold py-2 text-2xl">
                            {{ $orders->filter(function ($order) {
                                    return $order->status == 'success';
                                })->count() }}
                        </h1>
                        <p class="text-xxs">+10 Last 7 Days</p>
                    </div>
                </div>
            </div>

            <!-- Recent Sales Table -->
            <div class="bg-white py-6 px-8 border border-gray-200 rounded-xl overflow-x-auto">
                <h1 class="font-bold text-2xl">Recent Sales <span class="text-xxs text-gray-500">( Last 7 days
                        )</span></h1>
                <table class="w-full min-w-[750px] mt-4 border-separate border-spacing-4">
                    <thead>
                        <tr>
                            <th class="text-left text-xs font-semibold text-gray-500">Invoice ID</th>
                            <th class="text-left text-xs font-semibold text-gray-500">Product</th>
                            <th class="text-left text-xs font-semibold text-gray-500">Price</th>
                            <th class="text-left text-xs font-semibold text-gray-500">Date</th>
                            <th class="text-left text-xs font-semibold text-gray-500">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            @if ($order->status === 'success')
                                <tr>
                                    <td class="text-xs">INV-0{{ $order->id }}</td>
                                    <td class="text-xs">
                                        @foreach ($order->orderItems as $item)
                                            {{ $item->product->name }}
                                        @endforeach
                                    </td>
                                    <td class="text-xs">${{ $order->total_price }}</td>
                                    <td class="text-xs">{{ $order->updated_at->format('Y/m/d') }}</td>
                                    <td class="text-xs">
                                        <span class="bg-green-200 text-green-600 px-2 py-1 rounded-full">Success</span>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
@endsection
