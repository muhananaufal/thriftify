<!-- Top navbar -->
<nav class="sticky w-full top-0 text-black z-50 bg-white shadow-sm" x-data="{ mobilemenue: false }">
    <div class="mx-auto ">
        <div class="flex items-stretch justify-between px-10 h-16">

            <div class="flex items-center md:hidden">
                <div class="-mr-2 flex" x-data>
                    <!-- Mobile menu button -->
                    <button type="button" @click="$dispatch('togglesidebar')"
                        class=" inline-flex items-center justify-center p-2 rounded-md text-black focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-200 focus:ring-white"
                        aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>

                        <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>

                        <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>

            <div class="flex items-center pl-6">
                <div class="flex-shrink-0 md:hidden">

                    <a href="#" class="text-white flex items-center space-x-2 group">
                        <div>
                            <svg class="h-8 w-8 transition-transform duration-300 group-hover:-rotate-45 "
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>

                        <div>
                            <h1 class="font-bold uppercase text-black text-2xl">Thriftify<span
                                    class="text-xs">&copy;</span></h1>
                        </div>
                    </a>
                </div>

                <!-- toggel sidebar -->
                <div class="text-white cursor-pointer hidden md:block" @click="$dispatch('togglesidebar')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                        fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg>
                </div>

                <!-- Page Title -->
                <div class="hidden lg:block px-10">
                    <h1 class="font-semibold text-xl">Dashboard</h1>
                </div>
            </div>
            <div class="flex items-center">
                <!-- <div class="hidden lg:block">
                                <form action="" class="app-search" method="GET">
                                    <div class="relative group ">
                                        <input type="text"
                                            class="form-input rounded-md bg-gray-100 text-sm pl-10 py-1.5 ml-5 border-transparent border-none outline-none focus:ring-0 transition-all duration-300 ease-in-out focus:w-60 w-48"
                                            placeholder="Search..." autocomplete="off">
                                        <span
                                            class="absolute left-44 bottom-2 text-gray-400 transition-all duration-300 ease-in-out group-focus-within:left-8">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                            </svg>
                                        </span>
                                    </div>
                                </form>
                            </div> -->

                <!-- Profile Menu DT -->
                <div class="ml-4 flex md:ml-6">

                    <!-- Profile dropdown -->
                    <div class="relative px-4 text-gray-400 hover:text-white text-sm cursor-pointer"
                        x-data="{ open: false }">
                        <div class="flex items-center min-h-full" @click="open = !open">

                            <div class="max-w-xs rounded-full flex items-center text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
                                id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <span class="sr-only">Open user menu</span>
                                <img class="h-8 w-8 rounded-full" src="{{ auth()->guard('store')->user()->picture }}" alt="">
                            </div>
                        </div>

                        <div x-show="open" @click.away="open = false"
                            class="origin-top-right absolute right-0 mt-0 rounded-b-md py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none w-[200px] shadow-md"
                            x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95" role="menu"
                            aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                            <a href="{{ route('store.profile.index') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem"
                                tabindex="-1" id="user-menu-item-0">My Profile<a>

                                    <a href="{{ route('store.logout') }}"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                        role="menuitem" tabindex="-1" id="user-menu-item-1">Sign
                                        out</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
<!-- End Top navbar -->
