@extends('siswa.layouts.app')

@section('content')
<div class="content ml-12 transform ease-in-out duration-500 pt-20 px-2 md:px-5 pb-4">
    @if (session('success'))
    <div class="w-full ">
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    </div>
    @endif <div class="flex flex-wrap w-full my-5 -mx-2">
        <div class="max-w-3xl mx-auto mt-10 bg-white p-8 rounded-lg shadow-lg">

            <div class="flex items-center mb-8">
                <div class="w-24 h-24 rounded-full overflow-hidden border-4 border-blue-200 mr-6">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=3b82f6&color=fff&size=128"
                        alt="Profile Picture" class="object-cover w-full h-full">
                </div>
                <div>
                    <h1 class="text-3xl font-bold text-blue-700 mb-1">{{ $user->name }}</h1>
                    <span class="inline-block bg-blue-100 text-blue-700 px-3 py-1 rounded text-sm capitalize">{{
                        $user->role }}</span>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-gray-700">
                <div>
                    <strong>Email:</strong>
                    <p>{{ $user->email }}</p>
                </div>
                <div>
                    <strong>NISN:</strong>
                    <p>{{ $user->nisn ?? '-' }}</p>
                </div>
                <div>
                    <strong>No. Telepon:</strong>
                    <p>{{ $user->phone ?? '-' }}</p>
                </div>
                <div>
                    <strong>Tanggal Lahir:</strong>
                    <p>{{ $user->dob ? \Carbon\Carbon::parse($user->dob)->format('d M Y') : '-' }}</p>
                </div>
                <div>
                    <strong>Email Terverifikasi:</strong>
                    <p>
                        @if($user->email_verified_at)
                        <span class="text-green-600 font-semibold">Terverifikasi</span>
                        @else
                        <span class="text-red-600 font-semibold">Belum</span>
                        @endif
                    </p>
                </div>
                <div>
                    <strong>Tanggal Bergabung:</strong>
                    <p>{{ $user->created_at->format('d M Y') }}</p>
                </div>
            </div>

            <div class="mt-8 flex flex-wrap gap-3">
                <a href="{{ route('user.profile.edit', $user->id) }}"
                    class="inline-block bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 transition">
                    Edit Profil
                </a>
                <a href="{{ route('user.dashboard') }}"
                    class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                    Kembali ke Dashboard
                </a>
            </div>
        </div>
    </div>
</div>
@endsection