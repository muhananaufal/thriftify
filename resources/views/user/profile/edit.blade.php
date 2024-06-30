@extends('layouts.user_layout')

@section('title', 'Edit Profile')

@section('content')

{{-- @if ($errors->any())
    <h1>
        BAJINGANNNNN
    </h1>
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
@endif --}}

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
        <form
        class="flex flex-col md:flex-row items-start md:space-x-6 bg-white"
        id="Biodata" enctype="multipart/form-data" method="POST" action="{{ route('profile.update') }}"
        >
        @method('put')
        @csrf
        <div
          class="flex flex-col md:flex-row items-start md:space-x-6 bg-white"
          id="Biodata"
        >
          <!-- Your Biodata Diri Content Here -->
          <div
            class="relative p-4 items-center justify-start mb-6 md:mb-0"
          >
            <div class="max-w-xs p-4">
                <label for="picture" id="pictureInput" class="cursor-pointer">
              <input
                type="file"
                id="profilePictureInput"
                name="picture"
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
              <button
                
                class="flex items-center gap-1 transition-all text-green-500 text-sm hover:bg-green-200 px-3 py-2 rounded-lg"
                >
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="16 3 21 8 8 21 3 21 3 16 16 3"></polygon></svg> Update
                </
              >
            </div>
            <table class="min-w-full divide-y divide-gray-200 mb-4">
              <tbody class="space-y-2">
                <tr class="grid grid-cols-3 gap-1 md:gap-4 items-center">
                  <td class="text-left text-xs col-span-3 md:col-span-1 font-bold uppercase text-gray-500">
                    <label for="first_name">First Name</label>
                  </td>
                  <td class="text-left text-sm col-span-3 md:col-span-1">
                    <!-- input -->
                    <input type="text" name="first_name" id="first_name" value="{{ $user->first_name }}" class="py-2 px-1 outline-none border-b border-gray-300 focus:border-slate-800 transition-all w-full" />
                </td>
                </tr>
                <tr class="grid grid-cols-3 gap-1 md:gap-4 items-center">
                    <td class="text-left text-xs col-span-3 md:col-span-1 font-bold uppercase text-gray-500">
                        <label for="last_name">Last Name</label>
                    </td>
                    <td class="text-left text-sm col-span-3 md:col-span-1">
                        <input type="text" id="last_name" name="last_name" value="{{ $user->last_name }}" class="py-2 px-1 outline-none border-b border-gray-300 focus:border-slate-800 transition-all w-full" />
                    </td>
                </tr>
                <tr class="grid grid-cols-3 gap-1 md:gap-4 items-center">
                    <td class="text-left text-xs col-span-3 md:col-span-1 font-bold uppercase text-gray-500">
                        <label for="date_of_birth">Date of Birth</label>
                    </td>
                    <td class="text-left text-sm col-span-3 md:col-span-1">
                        <input type="date" id="date_of_birth" class="py-2 px-1 outline-none border-b border-gray-300 focus:border-slate-800 transition-all w-full" name="date_of_birth" value="{{ $user->date_of_birth }}" />
                    </td>
                </tr>
                <tr class="grid grid-cols-3 gap-1 md:gap-4 items-center">
                    <td class="text-left text-xs col-span-3 md:col-span-1 font-bold uppercase text-gray-500">
                        <label for="gender">Gender</label>
                    </td>
                    <td class="text-left text-sm col-span-3 md:col-span-1">
                        <select name="gender" id="gender" class="py-2 px-1 outline-none border-b border-gray-300 focus:border-slate-800 transition-all w-full">
                            <option value="male" @if ($user->gender === 'male') selected @endif>Male</option>
                            <option value="female" @if ($user->gender === 'female') selected @endif>Female</option>
                        </select>
                    </td>
</tr>
              </tbody>
            </table>
            <div class="border-t border-gray-300 my-6 mx-24" disabled></div>

            <div class="flex items-center justify-between mb-4">
              <h2 class="text-xl font-bold">Contact</h2>
            </div>
            <table class="min-w-full divide-y divide-gray-200 mb-4">
              <tbody class="space-y-2">
                <tr class="grid grid-cols-3 gap-1 md:gap-4 items-center">
                    <td class="text-left text-xs col-span-3 md:col-span-1 font-bold uppercase text-gray-500">
                        <label for="email">Email</label>
                    </td>
                    <td class="text-left text-sm col-span-3 md:col-span-1">
                        <input type="email" name="email" id="email" value="{{ $user->email }}" class="py-2 px-1 outline-none border-b border-gray-300 focus:border-slate-800 transition-all w-full" />
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
                <tr class="grid grid-cols-3 gap-1 md:gap-4 items-center">
                    <td class="text-left text-xs col-span-3 md:col-span-1 font-bold uppercase text-gray-500">
                        <label for="address">Address</label>
                    </td>
                    <td class="text-left text-sm col-span-3 md:col-span-1">
                        <input type="text" name="address" id="address" value="{{ $user->address }}" class="py-2 px-1 outline-none border-b border-gray-300 focus:border-slate-800 transition-all w-full" />
                    </td>
                </tr>       
                <tr class="grid grid-cols-3 gap-1 md:gap-4 items-center">
                    <td class="text-left text-xs col-span-3 md:col-span-1 font-bold uppercase text-gray-500">
                        <label for="phone_number">Phone Number</label>
                    </td>
                    <td class="text-left text-sm col-span-3 md:col-span-1">
                        <input type="text" name="phone_number" id="phone_number" value="{{ $user->phone_number }}" class="py-2 px-1 outline-none border-b border-gray-300 focus:border-slate-800 transition-all w-full" />
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
                      {{-- onclick="openModal('EditModal')" --}} 
                      {{-- href="{{ route('profile.edit') }}"
                      class="bg-green-300 shadow-sm px-2 rounded-md hover:bg-opacity-40 text-dark"
                    >
                      Edit
                    </a> --}}
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
    </form>

    </section>
    <!-- Garis Pemisah -->
    {{-- <div class="border-t border-gray-300 my-6 mx-24" disabled></div> --}}

    @endsection