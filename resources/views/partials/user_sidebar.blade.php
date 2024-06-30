<!-- sidebar -->
<div class="bg-white sidebar max-h-screen top-0 h-screen w-64 fixed inset-y-0 left-0 transform transition duration-200 ease-in-out z-50"
    x-data="{ open: true }" x-on:togglesidebar.window=" open = !open" x-show="true"
    :class="open === true ? 'md:translate-x-0 md:sticky ' : '-translate-x-full'">


    <header class=" h-[64px] py-6 px-8 md:sticky top-0 z-40">
        <!-- logo -->
        <a href="{{ route('landing') }}">

            <h1 class="font-bold uppercase text-black text-2xl">Thriftify<span class="text-xs">&copy;</span></h1>
        </a>
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
                <a href="{{ route('cart.index') }}"
                    class="flex items-center w-full py-2 px-4 rounded relative {{ request()->routeIs('cart*') ? 'bg-black text-white' : 'hover:bg-gray-100 ' }}">
                    <div class="pr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <circle cx="10" cy="20.5" r="1" />
                            <circle cx="18" cy="20.5" r="1" />
                            <path d="M2.5 2.5h3l2.7 12.4a2 2 0 0 0 2 1.6h7.7a2 2 0 0 0 2-1.6l1.6-8.4H7.1" />
                        </svg>
                    </div>
                    <div>Cart </div>
                </a>
            </li>

            <!-- ITEM -->
            <li class="text-sm">
                <a href="{{ route('checkout.index') }}"
                    class="flex items-center w-full py-2 px-4 rounded relative {{ request()->routeIs('checkout*') ? 'bg-black text-white' : 'hover:bg-gray-100 ' }}">
                    <div class="pr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                    </div>
                    <div>Checkout </div>
                </a>
            </li>


            <!-- ITEM -->
            <li class="text-sm">
                <a href="{{ route('confirmation.index') }}"
                    class="flex items-center w-full py-2 px-4 rounded relative {{ request()->routeIs('confirmation.index*') ? 'bg-black text-white' : 'hover:bg-gray-100 ' }}">
                    <div class="pr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21.5 2v6h-6M2.5 22v-6h6M2 11.5a10 10 0 0 1 18.8-4.3M22 12.5a10 10 0 0 1-18.8 4.2"/></svg>                    </div>
                    <div>Waiting Confirmation </div>
                </a>
            </li>

            <!-- ITEM -->
            <li class="text-sm">
                <a href="{{ route('history.index') }}"
                    class="flex items-center w-full py-2 px-4 rounded relative {{ request()->routeIs('history*') ? 'bg-black text-white' : 'hover:bg-gray-100 ' }} ">
                    <div class="pr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                    </div>
                    <div>History </div>
                </a>
            </li>

        </ul>
    </nav>
</div>
<!-- End sidebar -->
