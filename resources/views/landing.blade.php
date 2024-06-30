@extends(auth()->guard('store')->check() ? 'layouts.store_layout' : 'layouts.user_layout')

@section('title', 'Thriftify')


@section('content')
    <!-- Banner Section -->
    <section class="container relative mx-auto px-4 md:px-8 z-0 mb-8 mt-40 lg:mt-28">
        <div class="relative rounded-lg overflow-hidden">
            <ul id="slider" class="relative flex transition-transform duration-700 ease-in-out">
                <li class="relative w-full flex-shrink-0">
                    <img src="../asset/banner/banner1.jpg" alt="Image 1"
                        class="rounded-lg shadow-sm w-full h-48 md:h-96 object-cover" />
                </li>
                <li class="relative w-full flex-shrink-0">
                    <img src="../asset/banner/banner2.jpg" alt="Image 2"
                        class="rounded-lg w-full h-48 md:h-96 object-cover" />
                </li>
                <li class="relative w-full flex-shrink-0">
                    <img src="../asset/banner/banner3.jpg" alt="Image 1"
                        class="rounded-lg shadow-sm w-full h-48 md:h-96 object-cover" />
                </li>
            </ul>

            <!-- Add Navigation -->
            <div class="absolute px-5 flex bottom-4 left-0 right-0 justify-center items-end space-x-2">
                <button aria-current="true" data-testid="spnPageControl0" tabindex="-1"
                    class="p-1 bg-blue-500 text-white rounded-md focus:outline-none"></button>
                <button aria-current="false" data-testid="spnPageControl1" tabindex="-1"
                    class="p-1 bg-gray-200 text-gray-800 rounded-md focus:outline-none"></button>
                <button aria-current="false" data-testid="spnPageControl2" tabindex="-1"
                    class="p-1 bg-gray-200 text-gray-800 rounded-md focus:outline-none"></button>
            </div>

            <!-- Navigation Arrows -->
            <div class="absolute px-5 flex top-1/2 transform -translate-y-1/2 w-full justify-between">
                <div class="my-auto">
                    <button onclick="prev()" id="prev"
                        class="p-1 bg-cream rounded-full bg-opacity-45 transition-opacity duration-300 hover:opacity-100 opacity-50">
                        <img src="../asset/svg/arrow-left.svg" alt="Previous" width="20" />
                    </button>
                </div>
                <div class="my-auto">
                    <button onclick="next()" id="next"
                        class="bg-cream rounded-full bg-opacity-45 p-1 transition-opacity duration-300 hover:opacity-100 opacity-50">
                        <img src="../asset/svg/arrow-right.svg" alt="Next" width="20" />
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- category filter Section -->
    <section class="container relative mx-auto px-4 md:px-8">
        <div class="bg-white p-4 rounded-lg shadow-sm">
            <!-- Bottom Section Content -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="flex items-center justify-between grid-item cursor-pointer">
                    <img src="../asset/img/man.jpg" alt="Men's Clothing" class="h-12 w-12 ml-4 rounded-full shadow-sm" />
                    <div class="flex-1 ml-2">
                        <p class="font-bold">Men's Clothing</p>
                        <p class="text-gray-600 text-xs md:text-sm">
                            Explore our collection of men's clothing.
                        </p>
                    </div>
                </div>
                <div class="flex items-center justify-between grid-item cursor-pointer">
                    <img src="../asset/img/woman.jpg" alt="Women's Clothing"
                        class="h-12 w-12 ml-4 rounded-full shadow-sm" />
                    <div class="flex-1 ml-2">
                        <p class="font-bold">Women's Clothing</p>
                        <p class="text-gray-600 text-xs md:text-sm">Discover new styles for women</p>
                    </div>
                </div>
                <div class="flex items-center justify-between grid-item cursor-pointer">
                    <img src="../asset/img/kids.png" alt="Kids' Clothing" class="h-12 w-12 ml-4 rounded-full shadow-sm" />
                    <div class="flex-1 ml-2">
                        <p class="font-bold">Kids' Clothing</p>
                        <p class="text-gray-600 text-xs md:text-sm">Find the latest trends for kids</p>
                    </div>
                </div>
                <div class="flex items-center justify-between grid-item cursor-pointer">
                    <img src="../asset/img/acess.jpeg" alt="Accessories" class="h-12 w-12 ml-4 rounded-full shadow-sm" />
                    <div class="flex-1 ml-2">
                        <p class="font-bold">Accessories</p>
                        <p class="text-gray-600 text-xs md:text-sm">
                            Complete your look with stylish accessories
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Garis Pemisah -->
    <div class="border-t border-gray-300 my-8 mx-24"></div>

    <!-- Section: Produk Terbaru -->
    <section class="container mx-auto mt-4 px-4 md:px-8">
        <!-- Produk Terbaru Content -->
        <div class="mb-4">
            <h2 class="text-gray-800 font-bold text-xl mb-2 sm:ml-4">Produk Terbaru</h2>
            <!-- contents -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-2 md:gap-4">
                <!-- product 1 -->
                <div class="bg-white rounded-md shadow-sm p-4">
                    <img src="../asset/img/backpack.jpeg" alt="Product"
                        class="w-full rounded-md mb-3 h-32 md:h-52 object-cover" />
                    <h3
                        class="text-sm md:text-lg font-semibold mb-2 line-clamp-2 leading-[1.3em] text-ellipsis h-[39px] md:h-[52px] overflow-hidden">
                        Backpack Vintage Y2K</h3>
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-gray-600 text-sm">Rp 200.999</span>
                        <!-- <span class="text-red-500 font-bold">-38%</span> -->
                    </div>
                    <p class="text-gray-500 mb-2 text-xs md:text-sm">Backpack vintage</p>
                </div>

                <!-- product 2 -->
                <div class="bg-white rounded-md shadow-sm p-4">
                    <img src="../asset/img/clothes.png" alt="Product"
                        class="w-full rounded-md mb-3 h-32 md:h-52 object-cover" />
                    <h3
                        class="text-sm md:text-lg font-semibold mb-2 line-clamp-2 leading-[1.3em] text-ellipsis h-[39px] md:h-[52px] overflow-hidden">
                        Sepatu Lari Pria Sport</h3>
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-gray-600 text-sm">Rp 350.000</span>
                    </div>
                    <p class="text-gray-500 mb-2 text-xs md:text-sm">Brand Y2K</p>
                </div>

                <!-- product 3 -->
                <div class="bg-white rounded-md shadow-sm p-4">
                    <img src="../asset/img/man2.jpeg" alt="Product"
                        class="w-full rounded-md mb-3 h-32 md:h-52 object-cover" />
                    <h3
                        class="text-sm md:text-lg font-semibold mb-2 line-clamp-2 leading-[1.3em] text-ellipsis h-[39px] md:h-[52px] overflow-hidden">
                        Kaos Necropolis</h3>
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-gray-600 text-sm">Rp 150.000</span>
                    </div>
                    <p class="text-gray-500 mb-2 text-xs md:text-sm">Bahan Berkualitas</p>
                </div>

                <!-- product 4 -->
                <div class="bg-white rounded-md shadow-sm p-4">
                    <img src="../asset/img/woman2.jpeg" alt="Product"
                        class="w-full rounded-md mb-3 h-32 md:h-52 object-cover" />
                    <h3
                        class="text-sm md:text-lg font-semibold mb-2 line-clamp-2 leading-[1.3em] text-ellipsis h-[39px] md:h-[52px] overflow-hidden">
                        Jaket Vintage Brown</h3>
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-gray-600 text-sm">Rp 150.000</span>
                        <!-- <span class="text-green-500 font-bold">Good</span> -->
                    </div>
                    <p class="text-gray-500 mb-2 text-xs md:text-sm">Bahan Berkualitas</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Garis Pemisah -->
    <div class="border-t border-gray-300 my-6 mx-24" disabled></div>

    <!-- Section: Shop -->
    <section class="container mx-auto mt-2 px-4 md:px-8">
        <!-- filter -->
        <div class="flex flex-wrap items-center space-x-2 mb-4 gap-y-3">
            <!-- Category Filter -->
            <div class="relative inline-block w-auto text-xs md:text-sm">
                <select
                    class="block w-full border border-gray-300 rounded-full p-2 focus:outline-none focus:ring focus:border-dark">
                    <option class="text-gray-400">Category</option>
                    <option>Tops</option>
                    <option>Bottoms</option>
                    <option>Outwear</option>
                    <option>Accessories</option>
                    <option>Footwear</option>
                    <option>Sports</option>
                    <option>Kids</option>
                    <option>Others</option>
                </select>
            </div>

            <!-- Gender Filter -->
            <div class="relative inline-block w-auto text-xs md:text-sm">
                <select
                    class="block w-full border border-gray-300 rounded-full p-2 focus:outline-none focus:ring focus:border-dark">
                    <option class="text-gray-400">Gender</option>
                    <option>Male</option>
                    <option>Female</option>
                </select>
            </div>

            <!-- Size Filter -->
            <div class="relative inline-block w-auto text-xs md:text-sm">
                <select
                    class="block w-full border border-gray-300 rounded-full p-2 focus:outline-none focus:ring focus:border-dark">
                    <option class="text-gray-400">Size</option>
                    <option>S</option>
                    <option>M</option>
                    <option>L</option>
                    <option>XL</option>
                </select>
            </div>

            <!-- Condition Filter -->
            <div class="relative inline-block w-auto text-xs md:text-sm">
                <select
                    class="block w-full border border-gray-300 rounded-full p-2 focus:outline-none focus:ring focus:border-dark">
                    <option class="text-gray-400">Condition</option>
                    <option>Very Good</option>
                    <option>Good</option>
                    <option>Bad</option>
                </select>
            </div>

            <!-- Apply Filters Button -->
            <button class="bg-cream p-1 rounded-full hover:opacity-50 transition">
                <img src="../asset/svg/check-.svg" alt="" srcset="" />
            </button>
        </div>

        <!-- Grid -->
        <div id="cards-container"
            class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-4 xl:grid-cols-4 gap-2 md:gap-4">
            @foreach ($products as $product)
                <div class="bg-white p-4 rounded-lg shadow-md">
                    <a href="{{ route('product.show', $product->id) }}">
                        <img src="https://fakestoreapi.com/img/81fPKd-2AYL._AC_SL1500_.jpg" alt="{{ $product->name }}"
                            class="w-full h-48 object-cover rounded-md mb-4">
                        <h2 class="text-lg font-semibold mb-2">{{ $product->name }}</h2>
                        <p class="text-gray-600 mb-2">{{ $product->price }}</p>
                        <p class="text-gray-500 mb-2">{{ $product->store->name }}</p>
                    </a>
                </div>
            @endforeach
        </div>

        <div class="container mx-auto px-4 py-8">
            <div class="flex justify-between items-center mb-4">
                <div class="flex items-center">
                    <span class="text-gray-700">Jumlah produk per halaman:</span>
                    <span class="ml-4">
                        <a href="#" class="text-dark hover:bg-cream px-2 py-1 rounded" data-items="10">10</a>
                    </span>
                    <span class="ml-4">
                        <a href="#" class="text-dark hover:bg-cream px-2 py-1 rounded" data-items="20">20</a>
                    </span>
                </div>
                <ul class="flex items-center space-x-2">
                    <a id="prevPage" class="px-2 border rounded bg-white hover:bg-cream shadow-sm" href="#">
                        <img src="../asset/svg/arrow-left.svg" alt="Previous" width="18" class="my-auto py-3" />
                    </a>
                    <a id="nextPage" class="px-2 border rounded bg-white hover:bg-cream shadow-sm" href="#">
                        <img src="../asset/svg/arrow-right.svg" alt="Next" width="18" class="my-auto py-3" />
                    </a>
                </ul>
            </div>
        </div>
    </section>
@endsection
