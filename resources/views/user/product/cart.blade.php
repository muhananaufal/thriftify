@extends('layouts.user_layout')

@section('title', 'Cart')

@section('content')
<main class="bg-gray-100 mb-auto flex-grow font-poppins">
    <div class="px-8 py-12" x-data="{ tab: 'needconfirm' }">
        <h1 class="font-bold text-2xl">Cart</h1>
        @if($cart)
            
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
            <form action="{{ route('checkout.process') }}" method="POST">
                @csrf
            <div class="mt-3">
                <div class="py-3 overflow-x-auto bg-white rounded-xl">
                        <table class="table-auto w-full min-w-[750px]">
                        <thead>
                            <tr class="text-left text-xs">
                                <th class="px-4 py-2">Action</th>
                                <th class="px-4 py-2">Product Image</th>
                                <th class="px-4 py-2">Product Name</th>
                                <th class="px-4 py-2">Store</th>
                                <th class="px-4 py-2">Price</th>
                            </tr>
                        </thead>

                            <tbody>
                                @foreach ($cart as $id => $details)
                                        <tr class="text-sm border-b-2">
                                            <td class="px-4 py-2 "><input type="checkbox" name="products[]" value="{{ $id }}"></td>
                                            <td class="px-4 py-2">
                                                <img src="{{ $details['picture'] }}" alt=""
                                                    class="w-20 h-20 object-cover rounded-md">
                                            </td>
                                            <td class="px-4 py-2">
                                                {{ $details['name'] }}
                                            </td>
                                            <td class="px-4 py-2">
                                                {{ $details['store_name'] }}
                                            </td>
                                            <td class="px-4 py-2 ">${{ $details['price'] }}</td>
                                        </tr>
                                @endforeach
                            </tbody>
                    </table>
                </div>
            </div>


            <div class="grid grid-cols-8 gap-3">
                <div class="mt-4 col-span-2">
                    <label for="shipping_method" class="block text-sm font-medium text-gray-700">Shipping Method</label>
                    <select name="shipping_method" id="shipping_method"
                        class="mt-1 py-2 px-3 block w-full text-xs md:text-sm border-gray-300 focus:border-slate-800 transition-all border outline-none rounded-md">
                            <option value="jne">JNE</option>
                            <option value="tiki">TIKI</option>
                            <option value="wahana">Wahana</option>
                            <option value="sicepat">SiCepat</option>
                            <option value="j&t_express">J&T Express</option>
                            <option value="go_send">Go-Send</option>
                            <option value="grabexpress">GrapExpress</option>
                            <option value="anteraja">AnterAja</option>
                            <option value="sicepat">SiCepat </option>
                            <option value="lion_parcel">Lion Parcel</option>
                            <option value="paxel">Paxel</option>
                    </select>
                    @error('shipping_method')
                        <p class="small text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-4 col-span-2">
                    <label for="payment_method" class="block text-sm font-medium text-gray-700">Payment Method</label>
                    <select name="payment_method" id="payment_method"
                        class="mt-1 py-2 px-3 block w-full text-xs md:text-sm border-gray-300 focus:border-slate-800 transition-all border outline-none rounded-md">
                            <option value="thriftidy_pay">Thriftify Pay</option>
                            <option value="gopay">GoPay</option>
                            <option value="ovo">OVO</option>
                            <option value="virtual_account">Virtual Account</option>
                            <option value="transfer_bank">Transfer Bank</option>
                            <option value="bri_ceria">BRI Ceria</option>
                            <option value="bca_klikpay">BCA KlikPay</option>
                            <option value="mandiri_klikpay">Mandiri KlikPay</option>
                            <option value="linkaja">Link Aja</option>
                            <option value="brimo">BRImo</option>
                            <option value="cod">COD (cash on delivery)</option>
                    </select>
                    @error('payment_method')
                        <p class="small text-danger">{{ $message }}</p>
                    @enderror
                    
                </div>
            </div>
            <div class="mt-4">
                <button type="submit"
                    class="rounded-lg border border-green-500 hover:bg-green-500 hover:text-white transition-all text-green-500 flex gap-2 items-center text-sm py-2 px-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <polyline points="20 6 9 17 4 12"></polyline>
                    </svg> Checkout
                </button>
            </div>
        </form>
    @else
    <p class="text-sm py-2">Your cart is empty</p>
        @endif
        </div>
    </main>
@endsection
