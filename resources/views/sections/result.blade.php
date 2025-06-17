@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    @if (session('error'))
    <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
        {{ session('error') }}
    </div>
    @endif

    <div class="bg-white rounded-lg shadow-md p-6">
        <h1 class="text-2xl font-bold text-center mb-6">Hasil Pengujian Karir</h1>

        <!-- Display the career recommendations here -->
        <div class="mt-6">
            <h2 class="text-xl font-semibold mb-4">Rekomendasi Karir untuk Anda</h2>

            <!-- Example logic to display recommended careers -->
            @foreach ($careers as $career)
            <!-- Implement your logic to determine if this career should be recommended -->
            <div class="bg-blue-50 p-4 rounded-md mb-4">
                <h3 class="text-lg font-semibold">{{ $career->nama_karir }}</h3>
                <p>{{ $career->tipe_kepribadian }}</p>
                <p class="mt-2">{{ $career->solusi }}</p>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection