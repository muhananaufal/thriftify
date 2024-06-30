@extends('layouts.user_layout')

@section('title', 'Checkout')

@section('content')
<main class="bg-gray-100 mb-auto flex-grow font-poppins">
        <div class="px-8 py-12" x-data="{ tab: 'needconfirm' }">
            <h1 class="font-bold text-2xl">Invoice ID #{{ $order->id }}</h1>
            <p class="text-xxs text-gray-500 pl-">{{ $order->updated_at->format('Y/m/d') }}</p>
                    <p class="text-sm pl- pt-2">Total price ${{ $order->total_price }}</p>
                    <p class="text-sm pl- pt-1">Sell by {{ $order->store->name }}</p>
                    <p class="text-sm pl- pt-1">Shipping with {{ $order->shipping_method }}</p>
                    <p class="text-sm pl- pt-1">Purchase with {{ $order->payment_method }}</p>
            

            <div class="mt-8">
                    
            <div class="grid grid-cols-12 gap-3">
                @foreach($order->orderItems as $item)
                <div class="col-span-12 md:col-span-3">
                    <div class="bg-white py-6 px-8 border border-gray-200 rounded-xl">
                        <img src="{{ $item->product->picture }}" alt="profile" class="w-100 h-100 rounded-md">
                        <p class="text-xl font-semibold pt-2">{{ $item->product->name }}</p>
                        <p class="text-xs pb-2">Price: ${{ $item->product->price }}</p>
                        <p class="text-sm pt-1">Category: {{ $item->product->category->name }}</p>
                        <p class="text-sm pt-1">Gender: {{ $item->product->gender }}</p>
                        <p class="text-sm pt-1">Condition: {{ $item->product->condition }}</p>
                        </div>
                </div>
                @endforeach



        </div>
    </main>
@endsection
