@extends('siswa.layouts.app')

@section('content')
<div class="content ml-12 transform ease-in-out duration-500 pt-20 px-2 md:px-5 pb-4">
    <div class="flex flex-wrap w-full my-5 -mx-2">
        <div class="max-w-4xl mx-auto mt-10 bg-white p-8 rounded-xl shadow-lg">
            <h1 class="text-3xl font-semibold mb-8 text-blue-700 text-center">Edit Profil Siswa</h1>

            @if ($errors->any())
            <div class="mb-6 bg-red-100 text-red-800 p-4 rounded-lg">
                <ul class="list-disc list-inside ml-4">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('user.profile.update') }}" method="POST" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="flex flex-col gap-2">
                        <label for="name" class="text-gray-700 font-semibold">Nama Lengkap</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                            class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 transition">
                    </div>

                    <div class="flex flex-col gap-2">
                        <label for="email" class="text-gray-700 font-semibold">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                            class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 transition">
                    </div>

                    <div class="flex flex-col gap-2">
                        <label for="nisn" class="text-gray-700 font-semibold">NISN</label>
                        <input type="text" name="nisn" id="nisn" value="{{ old('nisn', $user->nisn ?? '') }}"
                            class="border border-gray-300 rounded-lg px-4 py-2 bg-gray-100 text-gray-700" readonly>
                    </div>

                    <div class="flex flex-col gap-2">
                        <label for="phone" class="text-gray-700 font-semibold">No. Telepon</label>
                        <input type="text" name="phone" id="phone" value="{{ old('phone', $user->phone ?? '') }}"
                            class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 transition">
                    </div>

                    <div class="flex flex-col gap-2">
                        <label for="birthdate" class="text-gray-700 font-semibold">Tanggal Lahir</label>
                        <input type="date" name="birthdate" id="birthdate"
                            value="{{ old('birthdate', $user->birthdate ?? '') }}"
                            class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 transition">
                    </div>

                    <div class="flex flex-col gap-2">
                        <label class="text-gray-700 font-semibold">Email Terverifikasi</label>
                        <input type="text" readonly value="{{ $user->email_verified_at ? 'Sudah' : 'Belum' }}"
                            class="border border-gray-300 rounded-lg px-4 py-2 bg-gray-100 text-gray-700">
                    </div>

                    <div class="flex flex-col gap-2">
                        <label class="text-gray-700 font-semibold">Tanggal Bergabung</label>
                        <input type="text" readonly
                            value="{{ \Carbon\Carbon::parse($user->created_at)->format('d M Y') }}"
                            class="border border-gray-300 rounded-lg px-4 py-2 bg-gray-100 text-gray-700">
                    </div>
                </div>

                <div class="flex items-center justify-between mt-8">
                    <a href="{{ route('user.dashboard.profile') }}"
                        class="text-gray-500 hover:text-blue-600 transition font-medium">← Batal</a>
                    <button type="submit"
                        class="bg-blue-600 text-white px-6 py-2 rounded-lg font-semibold hover:bg-blue-700 transition">Simpan
                        Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection