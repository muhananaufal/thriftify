@extends('layouts.user_layout')

@section('title', 'Product Detail')

@section('content')

    <section class="container mx-auto relative px-8 z-0 mb-8 mt-28">
      <div class="flex flex-wrap">
        <!-- Image Gallery -->
        <div class="w-full md:w-1/2 pr-5">
          <div class="flex flex-col">
            <img
              src="{{ $product->picture }}"
              alt="Product Image"
              class="w-full mb-4 rounded-lg"
            />

          </div>
        </div>
        <!-- Product Details -->
        <div class="w-full md:w-1/2">
          <h1 class="text-3xl font-bold mt-8">{{ $product->name }}</h1>
          <div class="flex items-center mt-2 mb-4">
            <span class="-600 text-xl font-semibold">${{ $product->price }}</span>
          </div>
          <div class="flex items-center space-x-4 py-2">
            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                @csrf
            <button type="submit" href="edit-profile.html"
                class="text-blue-500 transition-all hover:bg-blue-100 px-4 py-2 rounded-md flex gap-2 items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg> Add to Cart</button>


            </form>

          </div>
          <div class="flex items-center space-x-4 text-xs pt-1 md:text-s,">
            <span>Categories: </span>
            <p href="#" class="text-gray-600 hover:text-gray-900">{{ $product->category->name }}</p>
          </div>
          <div class="flex items-center space-x-4 text-xs pt-1 md:text-s,">
            <span>Gender: </span>
            <p href="#" class="text-gray-600 hover:text-gray-900">{{ $product->gender }}</p>
          </div>
          <div class="flex items-center space-x-4 text-xs pt-1 md:text-s,">
            <span>Size: </span>
            <p href="#" class="text-gray-600 hover:text-gray-900">{{ $product->size }}</p>
          </div>
          <div class="flex items-center space-x-4 text-xs pt-1 md:text-s,">
            <span>Condition: </span>
            <p href="#" class="text-gray-600 hover:text-gray-900">{{ $product->condition }}</p>
          </div>
        </div>
      </div>
      <!-- Description and Reviews -->
      <div class="mt-8">
        <ul class="flex border-b">
          <li class="mr-1">
            <a
              class="bg-cream cursor-pointer inline-block py-2 px-4 text-gray-600 hover:text-gray-800 font-semibold text-sm"
              onclick="showDescription()"
              >Description</a
            >
          </li>
          <!-- <li class="mr-1">
            <a
              class="bg-cream cursor-pointer inline-block py-2 px-4 text-gray-600 hover:text-gray-800 font-semibold text-sm"
              onclick="showReviews()"
              >Reviews <span>(1)</span></a
            >
          </li> -->
        </ul>
        <div id="description" class="py-4 text-xs md:text-sm min-h-40">
          <p>{{ $product->description }}
          </p>
        </div>
        <!-- <div id="reviews" class="py-4 hidden text-xs md:text-sm">
          <p>
            Kaos ini benar-benar sesuai dengan ekspektasi saya. Desainnya unik
            dan warnanya vibrant. Bahan katunnya lembut dan tidak membuat gerah.
            Bagus untuk dipakai casual maupun santai.
          </p>
        </div> -->
        {{-- <div class="border-t border-gray-300 my-6 mx-24" disabled></div> --}}

        <!-- Store Information -->

        <div class="mt-4 border-t pt-4">
          <h2 class="text-2xl font-bold mb-2">Store Information</h2>
          <div class="flex gap-5 item-center my-5">
            <div class="drop-shadow-sm">
              <img
                src="{{ $product->store->picture }}"
                alt=""
                srcset=""
                class="h-20 w-20 aspect-square object-cover rounded-full"
              />
            </div>
            <div>
              <p class="text-gray-600 text-sm md:text-base ">
                  <strong>Store Name:</strong>
                {{ $product->store->name }}
            </p>
            <p class="text-gray-600 text-sm md:text-base">
                <strong>Location:</strong> {{ $product->store->location }}
              </p>
              {{-- <p class="text-gray-600 text-sm md:text-base">
                <strong>Contact:</strong> (123) 456-7890
              </p> --}}
              <p class="text-gray-600 text-sm md:text-base">
                <strong>Email:</strong> {{ $product->store->email }}
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Garis Pemisah -->
    <div class="border-t border-gray-300 my-6 mx-24" disabled></div>

    <!-- Section: Produk Terbaru -->
    {{-- <section class="container mx-auto mt-10 mb-8 px-4 md:px-8">
      <!-- Produk Terbaru Content -->
      <div class="mb-4">
        <h2 class="text-gray-800 font-bold text-xl mb-16 flex justify-center">
          Produk Lainnya
        </h2>
        <!-- contents -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-2 md:gap-4">
          <!-- product 1 -->
          <div class="bg-white rounded-md shadow-sm p-4">
            <img
              src="../asset/img/backpack.jpeg"
              alt="Product"
              class="w-full rounded-md mb-3 h-32 md:h-52 object-cover"
            />
            <h3 class="text-sm md:text-lg font-semibold mb-2 line-clamp-2 leading-[1.3em] text-ellipsis h-[39px] md:h-[52px] overflow-hidden">Backpack Vintage Y2K</h3>
            <div class="flex items-center justify-between mb-2">
              <span class="text-gray-600 text-sm">Rp 200.999</span>
              <!-- <span class="text-red-500 font-bold">-38%</span> -->
            </div>
            <p class="text-gray-500 mb-2 text-xs md:text-sm">Backpack vintage</p>
          </div>

          <!-- product 2 -->
          <div class="bg-white rounded-md shadow-sm p-4">
            <img
              src="../asset/img/clothes.png"
              alt="Product"
              class="w-full rounded-md mb-3 h-32 md:h-52 object-cover"
            />
            <h3 class="text-sm md:text-lg font-semibold mb-2 line-clamp-2 leading-[1.3em] text-ellipsis h-[39px] md:h-[52px] overflow-hidden">Sepatu Lari Pria Sport</h3>
            <div class="flex items-center justify-between mb-2">
              <span class="text-gray-600 text-sm">Rp 350.000</span>
            </div>
            <p class="text-gray-500 mb-2 text-xs md:text-sm">Brand Y2K</p>
          </div>

          <!-- product 3 -->
          <div class="bg-white rounded-md shadow-sm p-4">
            <img
              src="../asset/img/man2.jpeg"
              alt="Product"
              class="w-full rounded-md mb-3 h-32 md:h-52 object-cover"
            />
            <h3 class="text-sm md:text-lg font-semibold mb-2 line-clamp-2 leading-[1.3em] text-ellipsis h-[39px] md:h-[52px] overflow-hidden">Kaos Necropolis</h3>
            <div class="flex items-center justify-between mb-2">
              <span class="text-gray-600 text-sm">Rp 150.000</span>
            </div>
            <p class="text-gray-500 mb-2 text-xs md:text-sm">Bahan Berkualitas</p>
          </div>

          <!-- product 4 -->
          <div class="bg-white rounded-md shadow-sm p-4">
            <img
              src="../asset/img/woman2.jpeg"
              alt="Product"
              class="w-full rounded-md mb-3 h-32 md:h-52 object-cover"
            />
            <h3 class="text-sm md:text-lg font-semibold mb-2 line-clamp-2 leading-[1.3em] text-ellipsis h-[39px] md:h-[52px] overflow-hidden">Jaket Vintage Brown KAJjfkajdkawdjaiakldsfjakf djladjfalkdjsfkadslkjasdlkja</h3>
            <div class="flex items-center justify-between mb-2">
              <span class="text-gray-600 text-sm">Rp 150.000</span>
              <!-- <span class="text-green-500 font-bold">Good</span> -->
            </div>
            <p class="text-gray-500 mb-2 text-xs md:text-sm">Bahan Berkualitas</p>
          </div>
        </div>
      </div>
    </section> --}}
    {{-- <div class="border-t border-gray-300 my-8 mx-24" disabled></div> --}}
@endsection
