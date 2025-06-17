@extends('siswa.layouts.app')

@section('content')
<!-- Main Content -->
<div class="content ml-12 transform ease-in-out duration-500 pt-20 px-2 md:px-5 pb-4">
    {{-- <x-breadcrumb :breadcrumbs="$breadcrumbs"></x-breadcrumb> --}}
    <div class="flex flex-wrap w-full my-5 -mx-2">
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h1 class="text-2xl font-bold">Selamat Datang, {{ Auth::user()->name }}</h1>
                    <p class="text-gray-600">Dashboard Siswa</p>
                </div>
            </div>

            <!-- Stats -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-8">
                <div class="bg-green-100 p-4 rounded-lg shadow-lg">
                    <h3 class="text-lg font-medium text-green-800">Nilai</h3>
                    <p class="text-2xl font-bold text-green-600">85%</p>
                </div>
                <div class="bg-yellow-100 p-4 rounded-lg shadow-lg">
                    <h3 class="text-lg font-medium text-yellow-800">Rekomendasi Karir</h3>
                    <p class="text-2xl font-bold text-yellow-600">3</p>
                </div>
                <div class="bg-purple-100 p-4 rounded-lg shadow-lg">
                    <h3 class="text-lg font-medium text-purple-800">Data Pernyataan</h3>
                    <p class="text-2xl font-bold text-purple-600">10</p>
                </div>
            </div>
            @include('siswa.rekomendasi-karir')
        </div>
    </div>
</div>
@endsection