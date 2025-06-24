@extends('siswa.layouts.app')

@section('content')
<!-- Main Content -->
<div class="content ml-12 transform ease-in-out duration-500 pt-20 px-2 md:px-5 pb-4">
    <div class="flex flex-wrap w-full my-5 -mx-2">
        <div class="bg-white rounded-lg shadow-md p-6 mb-8 w-full">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h1 class="text-2xl font-bold">Selamat Datang, {{ Auth::user()->name }}</h1>
                    <p class="text-gray-600">Dashboard Siswa</p>
                </div>
            </div>
            @if (session('error'))
            <div class="mb-4 p-4 bg-red-100 text-red-800 border border-red-300 rounded">
                {{ session('error') }}
            </div>
            @endif
            <!-- Stats -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-8">
                <a href="{{ route('user.konsultasi.result') }}">
                    <div
                        class="bg-green-100 p-4 rounded-lg shadow-lg transition duration-500 hover:scale-102 transform">
                        <h3 class="text-lg font-medium text-green-800">Nilai Posterior Tertinggi</h3>
                        <p class="text-2xl font-bold text-green-600">
                            {{ $rekomendasiTertinggi ? number_format($rekomendasiTertinggi->probabilitas * 100, 2) . '%'
                            : '0' }}
                        </p>
                    </div>
                </a>
                <a href="{{ route('user.konsultasi.result') }}">
                    <div
                        class="bg-yellow-100 p-4 rounded-lg shadow-lg transition duration-500 hover:scale-102 transform">
                        <h3 class="text-lg font-medium text-yellow-800">Jumlah Rekomendasi Karir</h3>
                        <p class="text-2xl font-bold text-yellow-600">{{ $jumlahRekomendasi }}</p>
                    </div>
                </a>
                <a href="{{ route('user.konsultasi.result') }}">
                    <div
                        class="bg-purple-100 p-4 rounded-lg shadow-lg transition duration-500 hover:scale-102 transform">
                        <h3 class="text-lg font-medium text-purple-800">Data Pernyataan (Ya)</h3>
                        <p class="text-2xl font-bold text-purple-600">{{ $jumlahPernyataan }}</p>
                    </div>
                </a>
            </div>
            @if ($topRekomendasi->count())
            <div class="mt-8 bg-white p-4 rounded-lg shadow">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Rekomendasi Karir Teratas</h2>
                <ul class="space-y-3">
                    @foreach ($topRekomendasi as $item)
                    <li class="flex justify-between items-center border-b pb-2">
                        <div>
                            <p class="text-lg font-bold text-blue-700">{{ $item->career->nama_karir }}</p>
                            <p class="text-sm text-gray-500">
                                Posterior: {{ number_format($item->probabilitas, 6) }}
                            </p>
                        </div>
                        <a href="{{ route('user.konsultasi.resultDetail', ['career_id' => $item->career_id]) }}"
                            class="text-sm text-blue-600 hover:underline">
                            Detail →
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection