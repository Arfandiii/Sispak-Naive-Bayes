@extends('admin.layouts.app')

{{-- @section('title', $title) --}}

@section('content')
<div class="content ml-12 transform ease-in-out duration-500 pt-20 px-2 md:px-5 pb-4">
    {{-- <x-breadcrumb :breadcrumbs="$breadcrumbs"></x-breadcrumb> --}}
    <div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-lg my-10">
        <h2 class="text-2xl font-bold mb-6">Edit Aturan</h2>
        <form action="{{ route('admin.rule.update', $rule->id) }}" method="POST">
            @csrf
            @method('PUT')
            <!-- Kode Rule (Opsional) -->
            <div class="mb-5">
                <label for="kode_rule" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Kode Rule
                </label>
                <input type="text" name="kode_rule" id="kode_rule"
                    class="bg-gray-50 focus:outline-none focus:ring-1 border border-indigo-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Contoh: R01" value="{{ old('kode_rule', $rule->kode_rule) }}">
                @error('kode_rule')
                <div class="text-red-600">{{ $message }}</div>
                @enderror
            </div>

            <!-- Pilih Karir -->
            <div class="mb-5">
                <label for="career_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Pilih Karir
                </label>
                <select name="career_id" id="career_id" required
                    class="bg-gray-50 border border-indigo-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="">-- Pilih Karir --</option>
                    @foreach ($careers as $career)
                    <option value="{{ $career->id }}" {{ old('career_id', $rule->career_id)==$career->id ? 'selected' :
                        '' }}>
                        {{ $career->nama_karir }} ({{ $career->kode_karir }})
                    </option>
                    @endforeach
                </select>
                @error('career_id')
                <div class="text-red-600">{{ $message }}</div>
                @enderror
            </div>

            <!-- Pilih Pernyataan -->
            <div class="mb-5">
                <label for="career_statement_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Pilih Pernyataan
                </label>
                <select name="career_statement_id" id="career_statement_id" required
                    class="bg-gray-50 border border-indigo-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="">-- Pilih Pernyataan --</option>
                    @foreach ($statements as $statement)
                    <option value="{{ $statement->id }}" {{ old('career_statement_id', $rule->
                        career_statement_id)==$statement->id ? 'selected' : ''
                        }}>
                        {{ $statement->kode_pernyataan }} - {{ Str::limit($statement->isi_pernyataan, 50) }}
                    </option>
                    @endforeach
                </select>
                @error('career_statement_id')
                <div class="text-red-600">{{ $message }}</div>
                @enderror
            </div>

            <!-- Tombol Aksi -->
            <div class="mt-8 flex flex-col md:flex-row justify-end md:space-x-4 space-y-3 md:space-y-0">
                <a href="{{ route('admin.data.index') }}"
                    class="inline-flex items-center justify-center px-6 py-2 bg-gray-200 text-gray-700 font-semibold rounded-md shadow hover:bg-gray-300 hover:text-gray-900 transition duration-150">
                    Kembali
                </a>
                <button type="submit"
                    class="cursor-pointer inline-flex items-center justify-center px-6 py-2 bg-indigo-600 text-white font-semibold rounded-md shadow hover:bg-indigo-700 transition duration-150">
                    Simpan Rule
                </button>
            </div>
        </form>
    </div>
</div>
@endsection