@extends('admin.layouts.app')

{{-- @section('title', $title) --}}

@section('content')
<div class="content ml-12 transform ease-in-out duration-500 pt-20 px-2 md:px-5 pb-4">
    {{-- <x-breadcrumb :breadcrumbs="$breadcrumbs"></x-breadcrumb> --}}
    <div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-lg my-10">
        <h2 class="text-2xl font-bold mb-6">Edit Karir</h2>
        <form action="{{ route('admin.career.update', $career->id) }}" method="POST">
            @csrf
            @method('PUT')
            <!-- Kode Karir -->
            <div class="mb-5">
                <label for="kode_karir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode
                    Karir</label>
                <input type="text" name="kode_karir" id="kode_karir" required
                    class="bg-gray-50 focus:outline-none focus:ring-1 border border-indigo-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Masukkan kode karir" value="{{ old('kode_karir', $career->kode_karir) }}">
                @error('kode_karir')
                <div class="text-red-600">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <!-- Nama Karir -->
            <div class="mb-5">
                <label for="nama_karir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                    Karir</label>
                <input type="text" name="nama_karir" id="nama_karir" required
                    class="bg-gray-50 focus:outline-none focus:ring-1 border border-indigo-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Masukkan nama karir" value="{{ old('nama_karir', $career->nama_karir) }}">
                @error('nama_karir')
                <div class="text-red-600">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <!-- Tipe Kepribadian -->
            <div class="mb-5">
                <label for="tipe_kepribadian" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipe
                    Kepribadian</label>
                <select name="tipe_kepribadian" id="tipe_kepribadian" required
                    class="bg-gray-50 focus:outline-none focus:ring-1 border border-indigo-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="">Pilih tipe kepribadian</option>
                    <option value="Realistic" {{ old('tipe_kepribadian', $career->tipe_kepribadian)=='Realistic' ?
                        'selected' : '' }}>Realistic</option>
                    <option value="Investigative" {{ old('tipe_kepribadian', $career->tipe_kepribadian)=='Investigative'
                        ? 'selected' : '' }}>Investigative</option>
                    <option value="Artistic" {{ old('tipe_kepribadian', $career->tipe_kepribadian)=='Artistic' ?
                        'selected' : '' }}>Artistic</option>
                    <option value="Social" {{ old('tipe_kepribadian', $career->tipe_kepribadian)=='Social' ? 'selected'
                        : '' }}>Social</option>
                    <option value="Enterprising" {{ old('tipe_kepribadian', $career->tipe_kepribadian)=='Enterprising' ?
                        'selected' : '' }}>Enterprising</option>
                    <option value="Conventional" {{ old('tipe_kepribadian', $career->tipe_kepribadian)=='Conventional' ?
                        'selected' : '' }}>Conventional</option>
                </select>
                @error('tipe_kepribadian')
                <div class="text-red-600">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <!-- Tipe Kepribadian Solusi -->
            <div class="mb-5">
                <label for="solusi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Solusi
                    Karir</label>
                <textarea name="solusi" id="solusi" required rows="9"
                    class="bg-gray-50 focus:outline-none focus:ring-1 border border-indigo-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Masukkan solusi">{{ old('solusi', $career->solusi) }}</textarea>
                @error('solusi')
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
                    Ubah Karir
                </button>
            </div>
        </form>
    </div>
</div>
@endsection