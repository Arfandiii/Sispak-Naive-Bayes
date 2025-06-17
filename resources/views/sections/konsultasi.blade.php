@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white rounded-lg shadow-md p-6 mb-8">
        <h1 class="text-2xl font-bold text-center mb-6">Sistem Pakar Pemilihan Karir</h1>

        <form id="careerTestForm" class="space-y-6" method="POST" action="{{ route('user.student-answers.store') }}">
            @csrf
            <!-- Karir Pernyataan -->
            <div>
                <h2 class="text-xl font-bold mb-4">Pernyataan Karir</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach ($careerStatements as $statement)
                    <div class="flex items-center">
                        <input type="checkbox" id="statement_{{ $statement->id }}" name="statements[]"
                            value="{{ $statement->id }}" class="mr-3 w-5 h-5 cursor-pointer">
                        <label for="statement_{{ $statement->id }}"
                            class="text-lg text-gray-800 font-medium cursor-pointer">{{
                            $statement->isi_pernyataan }}</label>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="text-center">
                <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-500 font-bold cursor-pointer">Lihat
                    Hasil</button>
            </div>
        </form>
    </div>

    <!-- Hasil Pengujian -->
    <div id="testResults" class="bg-white rounded-lg shadow-md p-6 hidden">
        <h2 class="text-lg font-semibold mb-4">Hasil Pengujian</h2>
        <div id="resultsContent" class="space-y-4">
            <!-- Hasil akan dimuat di sini -->
        </div>
    </div>
</div>

@endsection