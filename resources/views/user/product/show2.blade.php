@extends('layouts.user_layout')

@section('title', 'Checkout')

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
          <p class="text-gray-600 mb-4 text-xs md:text-sm">
            {{ $product->description }}
          </p>
          <div class="flex items-center space-x-4 mt-12">
            <button
              class="bg-dark text-white px-6 py-2 border hover:border-dark hover:bg-gray-50 hover:text-dark rounded-md mb-4 text-sm w-full"
            >
              Add to Cart
            </button>
            <button
              class="bg-cream text-dark px-6 py-2 border hover:border-dark hover:bg-gray-50 rounded-md mb-4 text-sm w-full"
            >
              Buy Now
            </button>
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
        <div id="description" class="py-4 text-xs md:text-sm">
          <p>
            Kaos dengan gaya thrift yang menghadirkan nuansa retro dan vintage
            yang unik. Desain grafis yang mencerminkan era 80-an dengan
            kombinasi warna yang kontras dan mencolok. Bahan katun ringan yang
            memberikan kenyamanan maksimal saat dipakai sehari-hari. Cocok untuk
            mereka yang menyukai gaya unik dan ingin tampil beda dengan pakaian
            yang menceritakan cerita masa lalu.
          </p>
        </div>
        <!-- <div id="reviews" class="py-4 hidden text-xs md:text-sm">
          <p>
            Kaos ini benar-benar sesuai dengan ekspektasi saya. Desainnya unik
            dan warnanya vibrant. Bahan katunnya lembut dan tidak membuat gerah.
            Bagus untuk dipakai casual maupun santai.
          </p>
        </div> -->
        <div class="border-t border-gray-300 my-6 mx-24" disabled></div>

        <!-- Store Information -->

        <div class="mt-4 border-t pt-4">
          <h2 class="text-2xl font-bold mb-2">Store Information</h2>
          <div class="flex gap-5 item-center my-5">
            <div class="drop-shadow-sm">
              <img
                src="../asset/img/Bucket-Hat.jpeg"
                alt=""
                srcset=""
                class="h-20 w-20 aspect-square object-cover rounded-full"
              />
            </div>
            <div>
              <p class="text-gray-600 text-sm md:text-lg">
                <strong>Store Name:</strong> Awesome Shoe Store
              </p>
              <p class="text-gray-600 text-sm md:text-lg">
                <strong>Location:</strong> 123 Shoe Street, Footwear City,
                Country
              </p>
              <p class="text-gray-600 text-sm md:text-lg">
                <strong>Contact:</strong> (123) 456-7890
              </p>
              <p class="text-gray-600 text-sm md:text-lg">
                <strong>Email:</strong> info@shoesstore.com
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Garis Pemisah -->
    <div class="border-t border-gray-300 my-6 mx-24" disabled></div>

    <!-- Section: Produk Terbaru -->
    <section class="container mx-auto mt-10 mb-8 px-4 md:px-8">
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
    </section>
    <div class="border-t border-gray-300 my-8 mx-24" disabled></div>

    <footer class="p-8 mx-auto bg-gray-100 text-sm">
      <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 md:gap-8">
        <div class="mb-8 md:mb-0">
          <h4 class="font-bold mb-4">Thriftify</h4>
          <ul>
            <li>
              <p class="text-sm">Thriftify is a platform for thrifting clothes and accessories. We provide a platform for sellers to sell their preloved items and buyers to buy them. We are committed to providing the best service for our users.</p>
            </li>
          </ul>
        </div>
        <div class="mb-8 md:mb-0">
          <h4 class="font-bold mb-4">Buy</h4>
          <ul>
            <li><a href="#" class="hover:underline">Men Clothes</a></li>
            <li><a href="#" class="hover:underline">Women Clothes</a></li>
            <li><a href="#" class="hover:underline">Sportwear</a></li>
          </ul>
          <h4 class="font-bold mt-8 mb-4">Sell</h4>
          <ul>
            <li>
              <a href="#" class="hover:underline">Seller Education Center</a>
            </li>
            <li>
              <a href="#" class="hover:underline">Official Store Registration</a>
            </li>
          </ul>
        </div>
        <div class="mb-8 md:mb-0">
          <h4 class="font-bold mb-4">Help</h4>
          <ul>
            <li><a href="#" class="hover:underline">Contact Us</a></li>
            <li>
              <a href="#" class="hover:underline">Terms and Conditions</a>
            </li>
            <li><a href="#" class="hover:underline">Privacy Policy</a></li>
          </ul>
        </div>
        <div>
          <h4 class="font-bold mb-4">Follow Us</h4>
          <div class="flex space-x-2">
            <a href="#" class="hover:underline">
              <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="#000"><path d="M12 0c6.627 0 12 5.373 12 12s-5.373 12-12 12S0 18.627 0 12 5.373 0 12 0zm4 7.278V4.5h-2.286c-2.1 0-3.428 1.6-3.428 3.889v1.667H8v2.777h2.286V19.5h2.857v-6.667h2.286L16 10.056h-2.857V8.944c0-1.11.572-1.666 1.714-1.666H16z"/></svg>
            </a>
            <a href="#" class="hover:underline">
              <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="#000"><path d="M12 0c6.627 0 12 5.373 12 12s-5.373 12-12 12S0 18.627 0 12 5.373 0 12 0zm3.193 7c-1.586 0-2.872 1.243-2.872 2.777 0 .217.025.43.074.633a8.251 8.251 0 0 1-5.92-2.902c-.247.41-.389.887-.389 1.397 0 .963.507 1.813 1.278 2.311a2.94 2.94 0 0 1-1.301-.348v.036c0 1.345.99 2.467 2.304 2.723a2.98 2.98 0 0 1-1.298.047c.366 1.103 1.427 1.906 2.683 1.928a5.889 5.889 0 0 1-3.567 1.19c-.231 0-.46-.014-.685-.04A8.332 8.332 0 0 0 9.903 18c5.283 0 8.172-4.231 8.172-7.901 0-.12-.002-.24-.008-.36A5.714 5.714 0 0 0 19.5 8.302a5.869 5.869 0 0 1-1.65.437 2.8 2.8 0 0 0 1.263-1.536 5.87 5.87 0 0 1-1.824.674A2.915 2.915 0 0 0 15.193 7z"/></svg>
            </a>
            <a href="#" class="hover:underline">
              <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="#000"><path d="M12 0c6.6274 0 12 5.3726 12 12s-5.3726 12-12 12S0 18.6274 0 12 5.3726 0 12 0zm3.115 4.5h-6.23c-2.5536 0-4.281 1.6524-4.3805 4.1552L4.5 8.8851v6.1996c0 1.3004.4234 2.4193 1.2702 3.2359.7582.73 1.751 1.1212 2.8818 1.1734l.2633.006h6.1694c1.3004 0 2.389-.4234 3.1754-1.1794.762-.734 1.1817-1.7576 1.2343-2.948l.0056-.2577V8.8851c0-1.2702-.4234-2.3589-1.2097-3.1452-.7338-.762-1.7575-1.1817-2.9234-1.2343l-.252-.0056zM8.9152 5.8911h6.2299c.9072 0 1.6633.2722 2.2076.8166.4713.499.7647 1.1758.8103 1.9607l.0063.2167v6.2298c0 .9375-.3327 1.6936-.877 2.2077-.499.4713-1.176.7392-1.984.7806l-.2237.0057H8.9153c-.9072 0-1.6633-.2722-2.2076-.7863-.499-.499-.7693-1.1759-.8109-2.0073l-.0057-.2306V8.885c0-.9073.2722-1.6633.8166-2.2077.4712-.4713 1.1712-.7392 1.9834-.7806l.2242-.0057h6.2299-6.2299zM12 8.0988c-2.117 0-3.871 1.7238-3.871 3.871A3.8591 3.8591 0 0 0 12 15.8408c2.1472 0 3.871-1.7541 3.871-3.871 0-2.117-1.754-3.871-3.871-3.871zm0 1.3911c1.3609 0 2.4798 1.119 2.4798 2.4799 0 1.3608-1.119 2.4798-2.4798 2.4798-1.3609 0-2.4798-1.119-2.4798-2.4798 0-1.361 1.119-2.4799 2.4798-2.4799zm4.0222-2.3589a.877.877 0 1 0 0 1.754.877.877 0 0 0 0-1.754z"/></svg>
            </a>
          </div>
        </div>
      </div>
      <div class="flex justify-between items-center mt-8">
        <div class="mb-4 md:mb-0">
          <span class="text-gray-700">&copy; <script>document.write(new Date().getFullYear())</script> Thriftify. All rights reserved.</span>
        </div>
      </div>
    </footer>

    <!-- JavaScript -->
    <script src="../src/js/index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
  </body>
</html>

@endsection
