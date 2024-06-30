@extends('layouts.store_layout')

@section('title', 'Store Orders')

@section('content')
    <main class="bg-gray-100 mb-auto flex-grow font-poppins">
        <div class="px-8 py-12" x-data="{ tab: 'needconfirm' }">
            <h1 class="font-bold text-2xl">{{ $order->user->first_name . ' ' . $order->user->last_name . "'s" }} Order</h1>
            <h1 class="font-bold text-sm text-slate-500">[INV-0{{ $order->id }}]</h1>

            <div class="grid grid-cols-12 gap-3 mt-6">
                <div class="col-span-6">
                    <div class="bg-white py-6 px-8 border border-gray-200 rounded-xl">
                        <p class="text-xxs md:text-xs font-semibold">Shipping Method</p>
                        <h1 class="font-bold py-2 text-2xl">{{ $order->shipping_method }}</h1>
                    </div>
                </div>
                <div class="col-span-6">
                    <div class="bg-white py-6 px-8 border border-gray-200 rounded-xl">
                        <p class="text-xxs md:text-xs font-semibold">Payment Method</p>
                        <h1 class="font-bold py-2 text-2xl">
                            {{ $order->payment_method }}
                        </h1>
                    </div>
                </div>
                <div class="col-span-12">
                    <div class="bg-white py-6 px-8 border border-gray-200 rounded-xl">
                        <p class="text-xxs md:text-xs font-semibold">Payment Method</p>
                        <h1 class="font-bold py-2 text-2xl">
                            ${{ $order->total_price }}
                        </h1>
                    </div>
                </div>
            </div>

            <div class="mt-8">
                <div class="py-3 overflow-x-auto bg-white rounded-xl">
                    <table class="table-auto w-full min-w-[750px]">
                        <thead>
                            <tr class="text-left text-xs">
                                <th class="px-4 py-2">Product Image</th>
                                <th class="px-4 py-2">Product Name</th>
                                <th class="px-4 py-2">Price</th>
                                <th class="px-4 py-2">Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($order->orderItems as $item)
                                <tr class="text-sm border-b-2">
                                    <td class="px-4 py-2">
                                        <img src="{{ $item->product->picture }}" alt=""
                                            class="w-20 h-20 object-cover rounded-md">
                                    </td>
                                    <td class="px-4 py-2">
                                        {{ $item->product->name }}
                                    </td>
                                    <td class="px-4 py-2">
                                        {{ $item->price }}
                                    </td>
                                    <td class="px-4 py-2">
                                        <span class="bg-orange-200 text-orange-600 px-2 py-1 rounded-full text-xs">Need
                                            Confimation</span>
                                    </td>
                            @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
