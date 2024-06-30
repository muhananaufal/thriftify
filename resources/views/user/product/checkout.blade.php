@extends('layouts.user_layout')

@section('title', 'Checkout')

@section('content')
    <main class="bg-gray-100 mb-auto flex-grow font-poppins min-h-screen">
        <div class="px-8 py-12" x-data="{ tab: 'needconfirm' }">
            <h1 class="font-bold text-2xl">Checkout</h1>
            <p class="text-sm pl- py-2">Your orders will automatically expired
                after 200seconds system from checkout</p>


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
            <div class="mt-3">
                <div class="py-3 overflow-x-auto bg-white rounded-xl">
                    <table class="table-auto w-full min-w-[750px]">
                        <thead>
                            <tr class="text-left text-xs">
                                <th class="px-4 py-2">Invoice ID</th>
                                <th class="px-4 py-2">Product Image</th>
                                <th class="px-4 py-2">Product Name</th>
                                <th class="px-4 py-2">Total Item</th>
                                <th class="px-4 py-2">Total Price</th>
                                <th class="px-4 py-2">Date</th>
                                <th class="px-4 py-2">Status</th>
                                <th class="px-4 py-2">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($orders as $order)
                                @if ($order->status === 'waiting_for_payment')
                                    <p class="hidden">
                                        {{ $item = $order->orderItems->first() }}
                                    </p>
                                    <tr class="text-sm border-b-2">
                                        <td class="px-4 py-2">INV-0{{ $order->id }}</td>
                                        <td class="px-4 py-2">
                                            <img src="{{ $item->product->picture }}" alt=""
                                                class="w-20 h-20 object-cover rounded-md">
                                        </td>
                                        <td class="px-4 py-2">
                                            {{ $item->product->name }}
                                            @if ($order->orderItems->count())
                                                ...
                                            @endif
                                        </td>
                                        <td class="px-4 py-2">{{ $order->orderItems->count() }}</td>
                                        <td class="px-4 py-2">${{ $order->total_price }}</td>
                                        <td class="px-4 py-2">{{ $order->updated_at->format('Y/m/d') }}</td>
                                        <td class="px-4 py-2">
                                            <span
                                                class="bg-orange-200 text-orange-600 px-2 py-1 rounded-full text-xs">Waiting
                                                for Payment</span>
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
                                                        x-transition:leave-end="transform opacity-0 scale-95" role="menu"
                                                        aria-orientation="vertical" aria-labelledby="user-menu-button"
                                                        tabindex="-1">
                                                        <a href="{{ route('store.confirmation.show', $order->id) }}"
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
                                                            <p>Order Details</p>
                                                        </a>

                                                        <a href="#"
                                                            class="flex gap-2 items-center px-4 py-2 text-sm hover:bg-green-100 text-green-500"role="menuitem"
                                                            tabindex="-1" id="user-menu-item-0">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                height="20" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                                <polyline points="20 6 9 17 4 12"></polyline>
                                                            </svg>
                                                            <form action="{{ route('checkout.pay', $order->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                <button type="submit" class="btn">Pay</button>
                                                            </form>
                                                        </a>

                                                        {{-- <a href="#"
                                                        class="flex gap-2 items-center px-4 py-2 text-sm hover:bg-red-100 text-red-500"role="menuitem"
                                                        tabindex="-1" id="user-menu-item-0">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                            height="20" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <line x1="18" y1="6" x2="6"
                                                                y2="18"></line>
                                                            <line x1="6" y1="6" x2="18"
                                                                y2="18"></line>
                                                        </svg>
                                                        <form
                                                            action="{{ route('store.confirmation.reject', $order->id) }}"
                                                            method="POST">
                                                            @method('put')
                                                            @csrf
                                                            <button type="submit" class="btn">Decline</button>
                                                        </form>
                                                    </a> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </main>
@endsection
