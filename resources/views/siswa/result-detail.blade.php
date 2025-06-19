@extends('siswa.layouts.app')

@section('content')
<div class="content ml-12 transform ease-in-out duration-500 pt-20 px-2 md:px-5 pb-4">
    <div class="flex flex-wrap w-full my-5 -mx-2">
        <div
            class="max-w-3xl mx-auto mt-10 bg-gradient-to-br from-blue-50 to-blue-100 p-8 rounded-2xl shadow-lg border border-blue-200">
            <div class="flex items-center mb-6">
                <div
                    class="bg-blue-600 text-white rounded-full h-14 w-14 flex items-center justify-center text-2xl font-bold shadow object-cover overflow-hidden border-4 border-blue-200">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=3b82f6&color=fff&size=128"
                        alt="Profile Picture" class="object-cover w-full h-full">
                </div>
                <div class="ml-4">
                    <h2 class="text-lg text-gray-700">Halo,</h2>
                    <h1 class="text-2xl font-bold text-blue-700">{{ Auth::user()->name }}</h1>
                </div>
            </div>

            <div class="mb-6">
                <h1 class="text-3xl font-extrabold mb-2 text-blue-800">{{ $career->nama_karir }}</h1>
                <span
                    class="inline-block bg-blue-200 text-blue-800 text-xs px-3 py-1 rounded-full font-semibold mb-2">{{
                    $career->kode_karir }}</span>
                <p class="text-lg text-gray-700 mb-2"><strong>Tipe Kepribadian:</strong> <span
                        class="font-semibold text-blue-600">{{ $career->tipe_kepribadian }}</span></p>
            </div>

            <div class="mt-4 bg-white rounded-lg p-5 shadow-inner border-l-4 border-blue-400">
                <h2 class="text-xl font-semibold text-blue-700 mb-2">Solusi / Saran untuk Anda:</h2>
                <p class="text-gray-700 leading-relaxed">{{ $career->solusi }}</p>
            </div>

            <div class="mt-8 text-center">
                <a href="{{ route('user.dashboard') }}"
                    class="inline-block bg-blue-600 text-white px-6 py-2 rounded-full shadow hover:bg-blue-700 transition">&larr;
                    Kembali ke dashboard</a>
            </div>
        </div>
    </div>
</div>
@endsection