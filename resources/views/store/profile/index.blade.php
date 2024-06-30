@extends('layouts.store_layout')

@section('title', 'Store Profile')

@section('content')
    <main class="bg-gray-100 mb-auto flex-grow font-poppins">
        <div class="px-8 py-12">
            <h1 class="font-bold text-2xl">Store Profile</h1>
            <div class="w-full mt-8">
                <div class="bg-white p-10 rounded-lg shadow-md">
                    <div class="my-4">
                        <div class="flex justify-between gap-3 items-start">
                            <img src="{{ auth()->user()->picture }}" alt="profile" class="w-24 h-24 rounded-full">

                            <div class="mt-6">
                                <a href="{{ route('store.profile.edit') }}"
                                    class="text-blue-500 transition-all hover:bg-blue-100 px-4 py-2 rounded-md flex gap-2 items-center"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <polygon points="16 3 21 8 8 21 3 21 3 16 16 3"></polygon>
                                    </svg> Edit</a>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-9 gap-4">
                        <div class="col-span-9 md:col-span-3 mt-4">
                            <label for="name" class="text-xs font-bold uppercase text-gray-400">Name</label>
                            <input type="text" id="name"
                                class="form-input w-full mt-1 py-3 px-2 border border-gray-200 outline-none rounded-lg text-xs md:text-sm"
                                value="{{ auth()->user()->name }}" disabled>
                        </div>
                        <div class="col-span-9 md:col-span-3 mt-4">
                            <label for="email" class="text-xs font-bold uppercase text-gray-400">Location</label>
                            <input type="email" id="email"
                                class="form-input w-full mt-1 py-3 px-2 border border-gray-200 outline-none rounded-lg text-xs md:text-sm"
                                value="{{ auth()->user()->location }}" disabled>
                        </div>
                        <div class="col-span-9 md:col-span-3 mt-4">
                            <label for="email" class="text-xs font-bold uppercase text-gray-400">Email</label>
                            <input type="email" id="email"
                                class="form-input w-full mt-1 py-3 px-2 border border-gray-200 outline-none rounded-lg text-xs md:text-sm"
                                value="{{ auth()->user()->email }}" disabled>
                        </div>
                        <div class="col-span-9 mt-4">
                            <label for="bio" class="text-xs font-bold uppercase text-gray-400">Bio</label>
                            <textarea name="bio" id="bio"
                                class="form-textarea w-full mt-1 py-3 px-2 border border-gray-200 outline-none rounded-lg text-xs md:text-sm"
                                rows="10" disabled>{{ auth()->user()->bio }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
