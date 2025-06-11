@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-indigo-500 to-blue-600">
    <div class="bg-white shadow-2xl rounded-xl p-8 max-w-xl text-center">
        <h1 class="text-3xl font-bold text-gray-800 mb-4">Sistem Pakar Rekomendasi Karir</h1>
        <p class="text-gray-600 mb-6">Berdasarkan Kepribadian Holland & Metode Naive Bayes</p>
        <div class="space-x-4">
            <a href="{{ route('login') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">Login</a>
            <a href="{{ route('register') }}"
                class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-lg">Daftar Siswa</a>
        </div>
    </div>
</div>
@endsection