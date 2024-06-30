@extends('layouts.store_layout')

@section('title', 'Store Edit Profile')

@section('content')
    <main class="bg-gray-100 mb-auto flex-grow font-poppins">
        <div class="px-8 py-12">
            <h1 class="font-bold text-2xl">Edit Profile</h1>
            <div class="w-full mt-8">
                <form class="bg-white p-10 rounded-lg shadow-md" action="{{ route('store.profile.update') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="my-4">
                        <div class="flex justify-between gap-3 items-start">
                            <!-- input file foto profil -->
                            <input type="file" name="picture" id="profile-picture" class="hidden" onchange="showImage()">
                            <label for="profile-picture" class="cursor-pointer relative">
                                <img src="{{ $store->picture }}" alt="profile" class="w-24 h-24 rounded-full object-cover"
                                    id="pfp">

                                <div
                                    class="bg-black transition-all text-gray-300 bg-opacity-40 hover:bg-opacity-70 w-24 h-12 rounded-b-full bottom-0 left-0 absolute flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <g transform="translate(2 3)">
                                            <path
                                                d="M20 16a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V5c0-1.1.9-2 2-2h3l2-3h6l2 3h3a2 2 0 0 1 2 2v11z" />
                                            <circle cx="10" cy="10" r="4" />
                                        </g>
                                    </svg>
                                </div>
                            </label>

                            <div class="mt-6">
                                <button type="submit" href="edit-profile.html"
                                    class="text-green-500 transition-all hover:bg-green-100 px-4 py-2 rounded-md flex gap-2 items-center"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <polyline points="20 6 9 17 4 12"></polyline>
                                    </svg> Save</button>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-9 gap-4">
                        <div class="col-span-9 md:col-span-3 mt-4">
                            <label for="name" class="text-xs font-bold uppercase text-gray-400">Name</label>
                            <input type="text" name="name" id="name"
                                class="form-input w-full mt-1 py-3 px-2 border border-gray-200 outline-none rounded-lg text-xs md:text-sm"
                                value="{{ $store->name }}">
                        </div>
                        <div class="col-span-9 md:col-span-3 mt-4">
                            <label for="location" class="text-xs font-bold uppercase text-gray-400">Location</label>
                            <input type="text" name="location" id="location"
                                class="form-input w-full mt-1 py-3 px-2 border border-gray-200 outline-none rounded-lg text-xs md:text-sm"
                                value="{{ $store->location }}">
                        </div>
                        <div class="col-span-9 md:col-span-3 mt-4">
                            <label for="email" class="text-xs font-bold uppercase text-gray-400">Email</label>
                            <input type="email" name="email" id="email"
                                class="form-input w-full mt-1 py-3 px-2 border border-gray-200 outline-none rounded-lg text-xs md:text-sm"
                                value="{{ $store->email }}">
                        </div>
                        <div class="col-span-9 mt-4">
                            <label for="bio" class="text-xs font-bold uppercase text-gray-400">Bio</label>
                            <textarea name="bio" id="bio"
                                class="form-textarea w-full mt-1 py-3 px-2 border border-gray-200 outline-none rounded-lg text-xs md:text-sm"
                                rows="10">{{ $store->bio }}</textarea>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
