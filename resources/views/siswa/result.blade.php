@extends('siswa.layouts.app')

@section('content')
<div class="content ml-12 transform ease-in-out duration-500 pt-20 px-2 md:px-5 pb-4">
    {{-- <x-breadcrumb :breadcrumbs="$breadcrumbs"></x-breadcrumb> --}}
    <div class="flex flex-wrap w-full my-5 -mx-2">
        <div class="container mx-auto px-4 py-8">
            <div class="bg-white rounded-lg shadow-md p-6">
                @if (session('error'))
                <div class="mb-4 p-4 bg-red-100 text-red-800 border border-red-300 rounded">
                    {{ session('error') }}
                </div>
                @endif

                <h2 class="text-2xl font-semibold mb-6 text-gray-700">Hasil Rekomendasi Karir</h2>

                @if($career)
                <div class="bg-blue-50 p-4 rounded-md mb-4">
                    <div class="mb-4">
                        <p><span class="font-semibold">Karir:</span> {{ $career->nama_karir }}</p>
                        <p><span class="font-semibold">Tipe Kepribadian:</span> {{ $career->tipe_kepribadian }}</p>
                        <p><span class="font-semibold">Probabilitas (Posterior):</span> {{ $probabilitas }}</p>
                    </div>

                    @if(isset($prior) && isset($likelihood))
                    <div class="mb-4">
                        <p><span class="font-semibold">Probabilitas Prior:</span> {{ $prior }}</p>
                        <p><span class="font-semibold">Probabilitas Likelihood:</span> {{ $likelihood }}</p>
                    </div>
                    @endif

                    <div class="mt-4">
                        <h3 class="font-semibold text-gray-700 mb-2">Solusi / Saran:</h3>
                        <p class="text-gray-800">{{ $career->solusi }}</p>
                    </div>
                </div>
                @else
                <div class="bg-yellow-100 p-4 rounded text-yellow-800 border border-yellow-300">
                    <p>Tidak ada hasil ditemukan. Silakan coba lagi atau hubungi admin.</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection