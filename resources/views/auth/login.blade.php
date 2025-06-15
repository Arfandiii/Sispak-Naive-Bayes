@extends('auth.layout')
@section('title', 'Login')

<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 bg-white p-8 rounded-lg shadow-lg ">

        <div>
            <h2 class="text-center text-3xl font-extrabold text-blue-600">Sistem Pakar</h2>
            <p class="text-center text-gray-600">Rekomendasi Karir Siswa</p>
        </div>

        <form class="mt-6 space-y-6" action="{{ route('login') }}" method="POST">
            @csrf
            <div class="space-y-2">
                <div>
                    <label class="text-sm font-medium text-gray-700"> Email </label>
                    <input id="email" name="email" type="email" autocomplete="email" required
                        class="appearance-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm">
                </div>
                <div>
                    <label class="text-sm font-medium text-gray-700"> Password </label>
                    <input id="password" name="password" type="password" autocomplete="current-password" required
                        class="appearance-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm">
                </div>
            </div>

            <div class="flex items-center justify-between">
                <p class="text-sm font-medium text-gray-500"> Lupa Password? Hubungi Admin Segera.</p>
            </div>

            <div>
                <button type="submit"
                    class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Masuk
                </button>
            </div>
        </form>

        <div class="text-center text-sm text-gray-500">
            Belum memiliki akun? <a href="{{ route('register') }}"
                class="font-medium text-blue-600 hover:text-blue-500">Daftar Disini</a>
        </div>
    </div>
</div>