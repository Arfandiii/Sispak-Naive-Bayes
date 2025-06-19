@extends('siswa.layouts.app')

@section('content')
<div class="content ml-12 transform ease-in-out duration-500 pt-20 px-2 md:px-5 pb-4">
    {{-- <x-breadcrumb :breadcrumbs="$breadcrumbs"></x-breadcrumb> --}}
    <div class="flex flex-wrap w-full my-5 -mx-2">
        <div class="p-8 bg-white rounded-xl shadow-lg w-full max-w-5xl mx-auto">
            @if (session('error'))
            <div class="mb-4 p-4 bg-red-100 text-red-800 border border-red-300 rounded">
                {{ session('error') }}
            </div>
            @endif
            <h1 class="text-3xl font-extrabold mb-6 text-blue-700 text-center">Hasil Diagnosa Pemilihan Karir</h1>

            {{-- 1. Gejala yang dipilih --}}
            <div class="mb-8">
                <h2 class="font-semibold text-xl text-gray-700 mb-2 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                        class="size-5 text-blue-800">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm3.857-9.809a.75.75 0 0 0-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 1 0-1.06 1.061l2.5 2.5a.75.75 0 0 0 1.137-.089l4-5.5Z"
                            clip-rule="evenodd" />
                    </svg>
                    Gejala yang Dipilih
                </h2>
                <div class="overflow-x-auto rounded-lg shadow">
                    <table class="min-w-full bg-white border border-gray-200">
                        <thead>
                            <tr class="bg-blue-100 text-blue-800 text-left">
                                <th class="p-3 border-b">Kode Pernyataan</th>
                                <th class="p-3 border-b">Isi Pernyataan</th>
                                <th class="p-3 border-b">Jawaban</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($gejala_terpilih as $gejala)
                            <tr class="hover:bg-blue-50">
                                <td class="p-3 border-b">{{ $gejala->kode_pernyataan }}</td>
                                <td class="p-3 border-b">{{ $gejala->isi_pernyataan }}</td>
                                <td class="p-3 border-b">Ya</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- 2. Identifikasi Gejala ke Masalah --}}
            <div class="mb-8">
                <h2 class="font-semibold text-xl text-gray-700 mb-2 flex items-center gap-2">
                    Identifikasi Pernyataan terhadap Karir
                </h2>
                <div class="overflow-x-auto rounded-lg shadow">
                    <table class="min-w-full bg-white border border-gray-200">
                        <thead>
                            <tr class="bg-green-100 text-green-800 text-left">
                                <th class="p-3 border-b">Kode Pernyataan</th>
                                <th class="p-3 border-b">Kode Karir</th>
                                <th class="p-3 border-b">Nama Karir</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($identifikasi as $row)
                            <tr class="hover:bg-green-50">
                                <td class="p-3 border-b">{{ $row['kode_pernyataan'] }}</td>
                                <td class="p-3 border-b">{{ $row['kode_karir'] }}</td>
                                <td class="p-3 border-b">{{ $row['nama_karir'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- 3. Probabilitas Prior --}}
            <div class="mb-8">
                <h2 class="font-semibold text-xl text-gray-700 mb-2 flex items-center gap-2">
                    Perhitungan Probabilitas Prior
                </h2>
                <div class="overflow-x-auto rounded-lg shadow">
                    <table class="min-w-full bg-white border border-gray-200">
                        <thead>
                            <tr class="bg-yellow-100 text-yellow-800 text-left">
                                <th class="p-3 border-b">Kode Karir</th>
                                <th class="p-3 border-b">Nama Karir</th>
                                <th class="p-3 border-b">Nilai Prior</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($prior as $karir)
                            <tr class="hover:bg-yellow-50">
                                <td class="p-3 border-b">{{ $karir['kode_karir'] }}</td>
                                <td class="p-3 border-b">{{ $karir['nama_karir'] }}</td>
                                <td class="p-3 border-b">{{ number_format($karir['prior'], 6) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- 4. Probabilitas Likelihood --}}
            <div class="mb-8">
                <h2 class="font-semibold text-xl text-gray-700 mb-2 flex items-center gap-2">
                    Perhitungan Probabilitas Likehood
                </h2>
                <div class="overflow-x-auto rounded-lg shadow">
                    <table class="min-w-full bg-white border border-gray-200">
                        <thead>
                            <tr class="bg-purple-100 text-purple-800 text-left">
                                <th class="p-3 border-b">Kode Karir</th>
                                <th class="p-3 border-b">Nama Karir</th>
                                <th class="p-3 border-b">Nilai Likehood</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($likehood as $karir)
                            <tr class="hover:bg-purple-50">
                                <td class="p-3 border-b">{{ $karir['kode_karir'] }}</td>
                                <td class="p-3 border-b">{{ $karir['nama_karir'] }}</td>
                                <td class="p-3 border-b">{{ number_format($karir['likehood'], 6) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- 5. Probabilitas Posterior --}}
            <div class="mb-8">
                <h2 class="font-semibold text-xl text-gray-700 mb-2 flex items-center gap-2">
                    Perhitungan Probabilitas Posterior
                </h2>
                <div class="overflow-x-auto rounded-lg shadow">
                    <table class="min-w-full bg-white border border-gray-200">
                        <thead>
                            <tr class="bg-pink-100 text-pink-800 text-left">
                                <th class="p-3 border-b">Kode Karir</th>
                                <th class="p-3 border-b">Nama Karir</th>
                                <th class="p-3 border-b">Nilai Posterior</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posterior as $karir)
                            <tr @if ($karir['tertinggi']) class="bg-green-100 font-bold" @else class="hover:bg-pink-50"
                                @endif>
                                <td class="p-3 border-b">{{ $karir['kode_karir'] }}</td>
                                <td class="p-3 border-b">{{ $karir['nama_karir'] }}</td>
                                <td class="p-3 border-b">{{ number_format($karir['posterior'], 6) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Kesimpulan --}}
            @foreach ($kesimpulan as $karir)
            <a href="{{ route('user.konsultasi.resultDetail', ['career_id' => $karir['career_id']]) }}">
                <div
                    class="bg-gradient-to-r from-blue-400 to-blue-600 p-6 transition duration-500 hover:scale-102 transform rounded-xl shadow text-white text-center mt-8">
                    <p class="font-semibold text-lg mb-2">Kesimpulan:</p>
                    <p class="text-xl">Karir yang paling cocok untukmu adalah:</p>
                    <p class="text-2xl font-extrabold mt-2">
                        {{ $karir['nama_karir'] }} <span class="text-base font-normal">({{ $karir['kode_karir']
                            }})</span>
                    </p>
                    <p class="text-base italic">
                        Tipe Kepribadian: {{ $karir['tipe_kepribadian'] }} </p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</div>
@endsection