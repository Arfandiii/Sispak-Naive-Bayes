@extends('auth.layout')
@section('title', 'Register')

<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 bg-white p-8 rounded-lg shadow-lg">
        <div>
            <h2 class="text-center text-3xl font-extrabold text-blue-600">Daftar Akun</h2>
            <p class="text-center text-gray-600">Rekomendasi Karir Siswa</p>
        </div>

        <form class="mt-6 space-y-6" action="{{ route('register') }}" method="POST">
            @csrf
            <div class="space-y-2">
                <div>
                    <label class="text-sm font-medium text-gray-700"> Nama Lengkap </label>
                    <input id="name" name="name" type="text" autocomplete="name" required value="{{ old('name') }}"
                        class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm">
                </div>
                <div>
                    <label class="text-sm font-medium text-gray-700"> Email </label>
                    <input id="email" name="email" type="email" autocomplete="email" required value="{{ old('email') }}"
                        class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm">
                    @error('email')
                    <div class="text-red-600">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div>
                    <label class="text-sm font-medium text-gray-700"> Password </label>
                    <input id="password" name="password" type="password" autocomplete="new-password" required
                        class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm">
                </div>
                <div>
                    <label class="text-sm font-medium text-gray-700"> Konfirmasi Password </label>
                    <input id="password_confirmation" name="password_confirmation" type="password"
                        autocomplete="new-password" required
                        class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm">
                    @error('password')
                    <div class="text-red-600">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div>
                <button type="submit"
                    class="cursor-pointer group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Daftar
                </button>
            </div>
        </form>

        <div class="text-center text-sm text-gray-500">
            Sudah memiliki akun? <a href="{{ route('login') }}"
                class="font-medium text-blue-600 hover:text-blue-500">Masuk
                Disini</a>
        </div>
    </div>
</div>