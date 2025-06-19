@extends('admin.layouts.app')

@section('content')
<div class="content ml-12 transform ease-in-out duration-500 pt-20 px-2 md:px-5 pb-4">
    <div class="p-6 max-w-7xl mx-auto bg-white rounded-lg shadow-md my-10">
        {{-- Massage --}}
        @if (session()->has('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
        @endif
        @if(session('info'))
        <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('info') }}</span>
        </div>
        @endif
        @if (session()->has('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
        @endif

        <!-- Filter Section -->
        <h2 class="text-lg font-semibold text-gray-900 mb-4">Pilih Tabel untuk Ditampilkan</h2>
        <form method="GET" action="{{ route('admin.data.index') }}" class="flex space-x-4">
            <select name="filter" id="filter"
                class="p-2 bg-white border shadow-sm border-slate-300  focus:outline-none rounded-md sm:text-sm focus:ring-1">
                <option value="all" {{ request('filter')==='all' ? 'selected' : '' }}>Tampilkan Semua</option>
                <option value="careers" {{ request('filter')==='careers' ? 'selected' : '' }}>Jenis Karir
                </option>
                <option value="statements" {{ request('filter')==='statements' ? 'selected' : '' }}>Pernyataan
                </option>
                <option value="rules" {{ request('filter')==='rules' ? 'selected' : '' }}>Rules</option>
            </select>
            <button type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-500 cursor-pointer">Terapkan
                Filter</button>
        </form>

        <!-- Karir Table -->
        @include('admin.data.career.index')

        <!-- Pernyataan Table -->
        @include('admin.data.career_statement.index')

        <!-- Rules Table -->
        @include('admin.data.rule.index')
    </div>
</div>
@endsection