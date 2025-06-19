@extends('admin.layouts.app')

{{-- @section('title', $title) --}}

@section('content')
<div class="content ml-12 transform ease-in-out duration-500 pt-20 px-2 md:px-5 pb-4">
    {{-- <x-breadcrumb :breadcrumbs="$breadcrumbs"></x-breadcrumb> --}}
    <div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-lg my-10">
        <h2 class="text-2xl font-bold mb-6">Tambah Pernyataan Karir Baru</h2>
        <form action="{{ route('admin.careerStatement.update', $careerStatement->id) }}" method="POST">
            @csrf
            @method('PUT')
            <!-- Kode Pernyataan -->
            <div class="mb-5">
                <label for="kode_pernyataan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Kode Pernyataan
                </label>
                <input type="text" name="kode_pernyataan" id="kode_pernyataan" required
                    class="bg-gray-50 focus:outline-none focus:ring-1 border border-indigo-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Masukkan kode pernyataan"
                    value="{{ old('kode_pernyataan', $careerStatement->kode_pernyataan) }}">
                @error('kode_pernyataan')
                <div class="text-red-600">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <!-- Isi Pernyataan -->
            <div class="mb-5">
                <label for="isi_pernyataan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Isi Pernyataan
                </label>
                <textarea name="isi_pernyataan" id="isi_pernyataan" required rows="4"
                    class="bg-gray-50 focus:outline-none focus:ring-1 border border-indigo-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Masukkan isi pernyataan">{{ old('isi_pernyataan', $careerStatement->isi_pernyataan) }}</textarea>
                @error('isi_pernyataan')
                <div class="text-red-600">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <!-- Action & Submit Buttons -->
            <div class="mt-8 flex flex-col md:flex-row justify-end md:space-x-4 space-y-3 md:space-y-0 ">
                <a href="{{ route('admin.data.index') }}"
                    class="inline-flex items-center justify-center px-6 py-2 bg-gray-200 text-gray-700 font-semibold rounded-md shadow hover:bg-gray-300 hover:text-gray-900 transition duration-150">
                    Kembali
                </a>
                <button type="submit"
                    class="cursor-pointer inline-flex items-center justify-center px-6 py-2 bg-indigo-600 text-white font-semibold rounded-md shadow hover:bg-indigo-700 transition duration-150">
                    Ubah Pernyataan Karir
                </button>
            </div>
        </form>
    </div>
</div>
@endsection