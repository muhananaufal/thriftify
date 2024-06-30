<!-- sidebar -->
<div class="bg-white sidebar max-h-screen top-0 h-screen w-64 fixed inset-y-0 left-0 transform transition duration-200 ease-in-out z-50"
    x-data="{ open: true }" x-on:togglesidebar.window=" open = !open" x-show="true"
    :class="open === true ? 'md:translate-x-0 md:sticky ' : '-translate-x-full'">


    <header class=" h-[64px] py-6 px-8 md:sticky top-0 z-40">
        <!-- logo -->
        <h1 class="font-bold uppercase text-black text-2xl">Thriftify<span class="text-xs">&copy;</span></h1>
    </header>


    <!-- nav -->
    <nav class="px-4 pt-4 max-h-[calc(100vh-64px)]" x-data="{ selected: 'Tasks' }">
        <ul class="flex flex-col space-y-2">

            <!-- Section Devider -->
            <div class="section pt-4 mb-1 text-xs text-gray-600 uppercase pb-1 pl-3">
                Overview
            </div>
            <!-- ITEM -->
            <li class="text-sm">
                <a href="{{ route('store.dashboard') }}"
                    class="flex items-center w-full py-2 px-4 rounded relative {{ request()->routeIs('store.dashboard*') ? 'bg-black text-white' : 'hover:bg-gray-100 ' }}">
                    <div class="pr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <rect x="3" y="3" width="7" height="7"></rect>
                            <rect x="14" y="3" width="7" height="7"></rect>
                            <rect x="14" y="14" width="7" height="7"></rect>
                            <rect x="3" y="14" width="7" height="7"></rect>
                        </svg>
                    </div>
                    <div>Dashboard </div>
                </a>
            </li>

            <!-- ITEM -->
            <li class="text-sm">
                <a href="{{ route('store.sales.index') }}"
                    class="flex items-center w-full py-2 px-4 rounded relative {{ request()->routeIs('store.sales*') ? 'bg-black text-white' : 'hover:bg-gray-100 ' }}">
                    <div class="pr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M3 3v18h18" />
                            <path d="M18.7 8l-5.1 5.2-2.8-2.7L7 14.3" />
                        </svg>
                    </div>
                    <div>Sales </div>
                </a>
            </li>

            <!-- ITEM -->
            <li class="text-sm">
                <a href="{{ route('store.confirmation.index') }}"
                    class="flex items-center w-full py-2 px-4 rounded relative {{ request()->routeIs('store.confirmation*') ? 'bg-black text-white' : 'hover:bg-gray-100 ' }} ">
                    <div class="pr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <circle cx="10" cy="20.5" r="1" />
                            <circle cx="18" cy="20.5" r="1" />
                            <path d="M2.5 2.5h3l2.7 12.4a2 2 0 0 0 2 1.6h7.7a2 2 0 0 0 2-1.6l1.6-8.4H7.1" />
                        </svg>
                    </div>
                    <div>Orders </div>
                </a>
            </li>

            <!-- ITEM -->
            <li class="text-sm">
                <a href="{{ route('store.products.index') }}"
                    class="flex items-center w-full py-2 px-4 rounded relative {{ request()->routeIs('store.products*') ? 'bg-black text-white' : 'hover:bg-gray-100 ' }} ">
                    <div class="pr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <rect x="2" y="2" width="20" height="8" rx="2" ry="2">
                            </rect>
                            <rect x="2" y="14" width="20" height="8" rx="2" ry="2">
                            </rect>
                            <line x1="6" y1="6" x2="6.01" y2="6"></line>
                            <line x1="6" y1="18" x2="6.01" y2="18"></line>
                        </svg>
                    </div>
                    <div>Products </div>
                </a>
            </li>
        </ul>
    </nav>
</div>
<!-- End sidebar -->
