@extends('layouts.user_layout')

@section('title', 'Profile')

@section('content')

    <section class="container mx-auto px-4 py-8">
      <div class="p-6">
        <!-- Navigation -->
        <ul class="flex flex-col md:flex-row">
          <li
            class="nav-item rounded-t-lg px-4 py-2 mb-2 md:mb-0 md:mr-2 cursor-pointer bg-white"
          >
            <span class="block md:inline-block" onclick="BioM()"
              >Biodata Diri</span
            >
          </li>
        </ul>
        <!-- Biodata Sections -->
        <div
          class="flex flex-col md:flex-row items-start md:space-x-6 bg-white"
          id="Biodata"
        >
          <!-- Your Biodata Diri Content Here -->
          <div
            class="relative p-4 items-center justify-start mb-6 md:mb-0"
          >
            <div class="max-w-xs p-4">
              <input
                type="file"
                id="profilePictureInput"
                name="profilePicture"
                accept="image/jpeg, .jpeg, .jpg, image/png, .png"
                class="hidden"
              />
              <label for="profilePictureInput" class="cursor-pointer">
                <img
                  class="h-auto w-full"
                  src="https://images.tokopedia.net/img/cache/300/tPxBYm/2023/1/20/00d6ff75-2a9e-4639-9f11-efe55dcd0885.jpg"
                  alt="Profile Picture"
                />
              </label>
            </div>
          </div>
          <!-- Personal Data Section -->
          <div class="relative p-6 w-full">
            <div class="flex items-center justify-between mb-4">
              <h2 class="text-xl font-bold">User Profile</h2>
              <a
                href="{{ route('profile.edit') }}"
                class="flex items-center gap-1 transition-all text-blue-500 text-sm hover:bg-blue-200 px-3 py-2 rounded-lg"
                >
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="16 3 21 8 8 21 3 21 3 16 16 3"></polygon></svg> Edit
                </a
              >
            </div>
            <table class="min-w-full divide-y divide-gray-200 mb-4">
              <tbody class="space-y-2">
                <tr class="grid grid-cols-3 gap-1 md:gap-4 items-center">
                  <td class="text-left text-xs col-span-3 md:col-span-1 font-bold uppercase text-gray-500">Firstname</td>
                  <td class="text-left text-sm col-span-3 md:col-span-1">{{ auth()->user()->first_name }}</td>
                </tr>
                <tr class="grid grid-cols-3 gap-1 md:gap-4 items-center">
                  <td class="text-left text-xs col-span-3 md:col-span-1 font-bold uppercase text-gray-500">Lastname</td>
                  <td class="text-left text-sm col-span-3 md:col-span-1">{{ auth()->user()->last_name }}</td>
                </tr>
                <tr class="grid grid-cols-3 gap-1 md:gap-4 items-center">
                  <td class="text-left text-xs col-span-3 md:col-span-1 font-bold uppercase text-gray-500">Date of Birth</td>
                  <td class="text-left text-sm col-span-3 md:col-span-1">{{ auth()->user()->date_of_birth }}</td>
                </tr>
                <tr class="grid grid-cols-3 gap-1 md:gap-4 items-center">
                  <td class="text-left text-xs col-span-3 md:col-span-1 font-bold uppercase text-gray-500">Gender</td>
                  <td class="text-left text-sm col-span-3 md:col-span-1">{{ auth()->user()->gender }}</td>
                </tr>
              </tbody>
            </table>
            <div class="border-t border-gray-300 my-6 mx-24" disabled></div>

            <div class="flex items-center justify-between mb-4">
              <h2 class="text-xl font-bold">Contact</h2>
            </div>
            <table class="min-w-full divide-y divide-gray-200 mb-4">
              <tbody class="space-y-2">
                <tr
                  class="grid grid-cols-3 gap-1 md:gap-4 items-center md:mb-0"
                >
                  <td class="text-left text-xs col-span-3 md:col-span-1 font-bold uppercase text-gray-500">Email</td>
                  <td class="text-left text-sm col-span-3 md:col-span-2">
                    {{ auth()->user()->email }}
                  </td>
                </tr>
                <tr
                  class="grid grid-cols-3 gap-1 md:gap-4 items-center md:mb-0"
                >
                  <td class="text-left text-xs col-span-3 md:col-span-1 font-bold uppercase text-gray-500">Phone</td>
                  <td class="text-left text-sm col-span-3 md:col-span-2">
                    {{ auth()->user()->phone_number }}
                  </td>
                </tr>
              </tbody>
            </table>
            <div class="border-t border-gray-300 my-6 mx-24" disabled></div>

            <div class="flex items-center justify-between mb-4">
              <h2 class="text-xl font-bold">Address</h2>
            </div>
            <table class="min-w-full divide-y divide-gray-200 mb-4">
              <tbody class="space-y-2">
                <tr
                  class="grid grid-cols-3 gap-1 md:gap-4 items-center md:mb-0"
                >
                  <td class="text-left text-xs col-span-3 md:col-span-1 font-bold uppercase text-gray-500">Main Address</td>
                  <td class="text-left col-span-3 text-sm md:col-span-2">
                    {{ auth()->user()->address }}
                  </td>
                </tr>
              </tbody>
            </table>

            {{-- <div class="border-t border-gray-300 my-6 mx-24" disabled></div> --}}
          </div>
        </div>

        <!-- daftar Alamat -->
        <div class="mx-aut mt-4 hidden" id="Alamat">
          <div class="p-4">
            <div class="flex items-center justify-between mb-2">
              <h2 class="text-xl font-bold mb-4">Daftar Alamat</h2>
              <a
                href="#"
                class="bg-green-400 text-white text-sm shadow px-2 rounded-lg"
                onclick="openModal('tambahModal')"
                >Tambah</a
              >
            </div>
            <div class="bg-cream p-4 rounded-lg mb-4 shadow-sm">
              <div class="flex justify-between items-center">
                <div>
                  <span class="text-sm bg-gray-300 px-2 mb-2 rounded-full"
                    >Utama</span
                  >
                  <h2 class="text-lg font-semibold">jhonny</h2>
                  <p class="text-gray-700">62851234567890</p>
                  <p class="text-gray-700">
                    sepertinya kmu memang dari planet lain
                  </p>
                  <div class="flex items-center space-x-2 justify-start mt-4">
                    <button
                      onclick="openModal('EditModal')"
                      class="bg-green-300 shadow-sm px-2 rounded-md hover:bg-opacity-40 text-dark"
                    >
                      Edit
                    </button>
                    <!-- Tombol untuk menghapus alamat -->
                    <button
                      onclick="openModal('hapusM')"
                      class="bg-red-300 shadow-sm px-2 rounded-md hover:bg-opacity-40 text-dark"
                    >
                      Hapus
                    </button>
                  </div>
                </div>
                <img src="../asset/svg/check-.svg" alt="" />
              </div>
            </div>

            {{-- <div class="bg-white p-4 rounded-lg border shadow-sm">
              <div class="flex justify-between items-center">
                <div>
                  <h2 class="text-lg font-semibold text-gray-700">jhonny</h2>
                  <p class="text-gray-700">62861234567890</p>
                  <p class="text-gray-700">
                    dikirim ke bumi untuk seseorang seprtiku
                  </p>
                  <div class="flex items-center space-x-2 justify-start mt-4">
                    <a
                      {{-- onclick="openModal('EditModal')" --}} href="{{ route('profile.edit') }}"
                      class="bg-green-300 shadow-sm px-2 rounded-md hover:bg-opacity-40 text-dark"
                    >
                      Edit
                    {{-- </a> --}}
                    <!-- Tombol untuk menghapus alamat -->
                    {{-- <button
                      onclick="openModal('hapusM')"
                      class="bg-red-300 shadow-sm px-2 rounded-md hover:bg-opacity-40 text-dark"
                    >
                      Hapus
                    </button>
                  </div>
                </div>
                <button
                  class="bg-green-400 text-white text-sm shadow px-2 rounded-lg"
                >
                  Pilih
                </button>
              </div> --}}
            {{-- </div> --}}
          </div>
        </div>
      </div>
    </section>
    <!-- Garis Pemisah -->
    {{-- <div class="border-t border-gray-300 my-6 mx-24" disabled></div> --}}

    @endsection