@extends('layouts.store_layout')

@section('title', 'Store Orders')

@section('content')
    <main class="bg-gray-100 mb-auto flex-grow font-poppins">
        <div class="px-8 py-12" x-data="{ tab: 'needconfirm' }">
            <h1 class="font-bold text-2xl">Orders</h1>

            <div class="flex justify-center md:justify-normal mt-8">
                <nav class="flex space-x-4">
                    <a href="#" @click.prevent="tab = 'needconfirm'"
                        :class="{ 'border-b-2 border-orange-500': tab === 'needconfirm' }"
                        class="px-4 py-2 text-xs md:text-sm">Need Confimation <span
                            class="ml-1 text-orange-600 rounded-full text-xs">{{ $orders->filter(function ($order) {
                                    return $order->status === 'need_confirmation';
                                })->count() }}</span></a>
                    <a href="#" @click.prevent="tab = 'ondelivery'"
                        :class="{ 'border-b-2 border-blue-500': tab === 'ondelivery' }"
                        class="px-4 py-2 text-xs md:text-sm">On Delivery<span
                            class="ml-1 text-blue-600 rounded-full text-xs">{{ $orders->filter(function ($order) {
                                    return $order->status === 'on_delivery';
                                })->count() }}</span></a>
                    <a href="#" @click.prevent="tab = 'success'"
                        :class="{ 'border-b-2 border-green-500': tab === 'success' }"
                        class="px-4 py-2 text-xs md:text-sm">Success<span
                            class="ml-1 text-green-600 rounded-full text-xs">{{ $orders->filter(function ($order) {
                                    return $order->status === 'success';
                                })->count() }}</span></a>
                    <a href="#" @click.prevent="tab = 'failed'"
                        :class="{ 'border-b-2 border-red-500': tab === 'failed' }"
                        class="px-4 py-2 text-xs md:text-sm">Failed<span
                            class="ml-1 text-red-600 rounded-full text-xs">{{ $orders->filter(function ($order) {
                                    return $order->status === 'sale';
                                })->count() }}</span></a>
                </nav>
            </div>

            <div class="mt-8">
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

                        <template x-if="tab === 'needconfirm'">
                            <tbody>
                                @foreach ($orders as $order)
                                    @if ($order->status === 'need_confirmation')
                                        {{ $item = $order->orderItems->first() }}
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
                                                    class="bg-orange-200 text-orange-600 px-2 py-1 rounded-full text-xs">Need
                                                    Confimation</span>
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
                                                                <form
                                                                    action="{{ route('store.confirmation.confirm', $order->id) }}"
                                                                    method="POST">
                                                                    @method('put')
                                                                    @csrf
                                                                    <button type="submit" class="btn">Accept</button>
                                                                </form>
                                                            </a>

                                                            <a href="#"
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
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </template>

                        <template x-if="tab === 'ondelivery'">
                            <tbody>
                                @foreach ($orders as $order)
                                    @if ($order->status === 'on_delivery')
                                        @foreach ($order->orderItems as $item)
                                            <tr class="text-sm border-b-2">
                                                <td class="px-4 py-2">INV-0{{ $order->id }}</td>
                                                <td class="px-4 py-2">
                                                    <img src="{{ $item->product->picture }}" alt=""
                                                        class="w-20 h-20 object-cover rounded-md">
                                                </td>
                                                <td class="px-4 py-2">{{ $item->product->name }}</td>
                                                <td class="px-4 py-2">{{ $order->orderItems->count() }}</td>
                                                <td class="px-4 py-2">${{ $order->total_price }}</td>
                                                <td class="px-4 py-2">{{ $order->updated_at->format('Y/m/d') }}</td>
                                                <td class="px-4 py-2">
                                                    <span
                                                        class="bg-blue-200 text-blue-600 px-2 py-1 rounded-full text-xs">On
                                                        Delivery</span>
                                                </td>
                                                <td class="px-4 py-2">
                                                    <div class="flex items-center">

                                                        <!-- Action dropdown -->
                                                        <div class="relative px-4 text-gray-400 text-sm cursor-pointer"
                                                            x-data="{ open: false }">
                                                            <div class="flex items-center min-h-full"
                                                                @click="open = !open">

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
                                                                <a href="{{ route('store.confirmation.show', $order->id) }}"
                                                                    class="flex gap-2 items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"role="menuitem"
                                                                    tabindex="-1" id="user-menu-item-0">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                        height="20" viewBox="0 0 24 24" fill="none"
                                                                        stroke="currentColor" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round">
                                                                        <path
                                                                            d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                                        </path>
                                                                        <circle cx="12" cy="12" r="3">
                                                                        </circle>
                                                                    </svg>
                                                                    <p>Order Details</p>
                                                                </a>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                @endforeach
                            </tbody>
                        </template>

                        <template x-if="tab === 'success'">
                            <tbody>
                                @foreach ($orders as $order)
                                    @if ($order->status === 'success')
                                        @foreach ($order->orderItems as $item)
                                            <tr class="text-sm border-b-2">
                                                <td class="px-4 py-2">INV-0{{ $order->id }}</td>
                                                <td class="px-4 py-2">
                                                    <img src="{{ $item->product->picture }}" alt=""
                                                        class="w-20 h-20 object-cover rounded-md">
                                                </td>
                                                <td class="px-4 py-2">{{ $item->product->name }}</td>
                                                <td class="px-4 py-2">{{ $order->orderItems->count() }}</td>
                                                <td class="px-4 py-2">${{ $order->total_price }}</td>
                                                <td class="px-4 py-2">{{ $order->updated_at->format('Y/m/d') }}</td>
                                                <td class="px-4 py-2">
                                                    <span
                                                        class="bg-green-200 text-green-600 px-2 py-1 rounded-full text-xs">Success</span>
                                                </td>
                                                <td class="px-4 py-2">
                                                    <div class="flex items-center">

                                                        <!-- Action dropdown -->
                                                        <div class="relative px-4 text-gray-400 text-sm cursor-pointer"
                                                            x-data="{ open: false }">
                                                            <div class="flex items-center min-h-full"
                                                                @click="open = !open">

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
                                                                <a href="{{ route('store.confirmation.show', $order->id) }}"
                                                                    class="flex gap-2 items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"role="menuitem"
                                                                    tabindex="-1" id="user-menu-item-0">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                        height="20" viewBox="0 0 24 24" fill="none"
                                                                        stroke="currentColor" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round">
                                                                        <path
                                                                            d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                                        </path>
                                                                        <circle cx="12" cy="12" r="3">
                                                                        </circle>
                                                                    </svg>
                                                                    <p>Order Details</p>
                                                                </a>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                @endforeach
                            </tbody>
                        </template>

                        <template x-if="tab === 'failed'">
                            <tbody>
                                @foreach ($orders as $order)
                                    @if ($order->status === 'sale')
                                        @foreach ($order->orderItems as $item)
                                            <tr class="text-sm border-b-2">
                                                <td class="px-4 py-2">INV-0{{ $order->id }}</td>
                                                <td class="px-4 py-2">
                                                    <img src="{{ $item->product->picture }}" alt=""
                                                        class="w-20 h-20 object-cover rounded-md">
                                                </td>
                                                <td class="px-4 py-2">{{ $item->product->name }}</td>
                                                <td class="px-4 py-2">{{ $order->orderItems->count() }}</td>
                                                <td class="px-4 py-2">${{ $order->total_price }}</td>
                                                <td class="px-4 py-2">{{ $order->updated_at->format('Y/m/d') }}</td>
                                                <td class="px-4 py-2">
                                                    <span
                                                        class="bg-red-200 text-red-600 px-2 py-1 rounded-full text-xs">Failed</span>
                                                </td>
                                                <td class="px-4 py-2">
                                                    <div class="flex items-center">

                                                        <!-- Action dropdown -->
                                                        <div class="relative px-4 text-gray-400 text-sm cursor-pointer"
                                                            x-data="{ open: false }">
                                                            <div class="flex items-center min-h-full"
                                                                @click="open = !open">

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
                                                                <a href="{{ route('store.confirmation.show', $order->id) }}"
                                                                    class="flex gap-2 items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"role="menuitem"
                                                                    tabindex="-1" id="user-menu-item-0">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                        height="20" viewBox="0 0 24 24" fill="none"
                                                                        stroke="currentColor" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round">
                                                                        <path
                                                                            d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                                        </path>
                                                                        <circle cx="12" cy="12" r="3">
                                                                        </circle>
                                                                    </svg>
                                                                    <p>Order Details</p>
                                                                </a>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
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
