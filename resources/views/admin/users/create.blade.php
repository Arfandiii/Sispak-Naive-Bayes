@extends('admin.layouts.app')

{{-- @section('title', $title) --}}

@section('content')
<div class="content ml-12 transform ease-in-out duration-500 pt-20 px-2 md:px-5 pb-4">
    {{-- <x-breadcrumb :breadcrumbs="$breadcrumbs"></x-breadcrumb> --}}
    <div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-lg my-10">
        <h2 class="text-2xl font-bold mb-6">Tambah Pengguna Baru</h2>
        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf
            <!-- Nama -->
            <div class="mb-5">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                    Lengkap</label>
                <input type="text" name="name" id="name" required
                    class="bg-gray-50 focus:outline-none focus:ring-1 border border-indigo-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Masukkan nama lengkap" value="{{ old('name') }}">
            </div>

            <!-- NISN -->
            <div class="mb-5">
                <label for="nisn" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NISN</label>
                <input type="text" name="nisn" id="nisn" required
                    class="bg-gray-50 focus:outline-none focus:ring-1 border border-indigo-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Masukkan NISN" value="{{ old('nisn') }}">
                @error('nisn')
                <div class="text-red-600">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <!-- Email -->
            <div class=" mb-5">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                <input type="email" name="email" id="email" required
                    class="bg-gray-50 focus:outline-none focus:ring-1 border border-indigo-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Masukkan email" value="{{ old('email') }}">
                @error('email')
                <div class="text-red-600">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <!-- password -->
            <div class="mb-5">
                <label for="password"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                <input type="password" name="password" id="password" required
                    class="bg-gray-50 focus:outline-none focus:ring-1 border border-indigo-300 out text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Masukkan password" value="password">
                <p class="mt-2 text-xs font-thin">Default password user: <span class="font-semibold">password</span></p>
            </div>
            <!-- Action & Submit Buttons -->
            <div class="mt-8 flex flex-col md:flex-row justify-end md:space-x-4 space-y-3 md:space-y-0">
                <a href="{{ route('admin.users.index') }}"
                    class="inline-flex items-center justify-center px-6 py-2 bg-gray-200 text-gray-700 font-semibold rounded-md shadow hover:bg-gray-300 hover:text-gray-900 transition duration-150">
                    Kembali
                </a>
                <button type="submit"
                    class="cursor-pointer inline-flex items-center justify-center px-6 py-2 bg-indigo-600 text-white font-semibold rounded-md shadow hover:bg-indigo-700 transition duration-150">
                    Simpan Pengguna
                </button>
            </div>
        </form>
    </div>
</div>
@endsection