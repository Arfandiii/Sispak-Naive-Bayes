@extends('admin.layouts.app')

@section('content')
<div class="content ml-12 transform ease-in-out duration-500 pt-20 px-2 md:px-5 pb-4">
    {{-- Massage --}}
    @if (session()->has('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        <p>{{ session('success')}}</p>
    </div>
    @endif
    @if(session('info'))
    <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative" role="alert">
        {{ session('info') }}
    </div>
    @endif
    @if (session()->has('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <p>{{ session('error')}}</p>
    </div>
    @endif
    <div class="p-6 max-w-7xl mx-auto bg-white rounded-lg shadow-md my-10">
        <h2 class="text-xl font-bold mb-4">Riwayat Konsultasi</h2>
        <div class="overflow-x-auto mb-4">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table
                    class="w-full text-sm text-left rtl:text-right text-gray-500 overflow-hidden border border-gray-200 border-collapse">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="border border-gray-300 py-2 text-center">No</th>
                            <th scope="col" class="border border-gray-300 py-2 text-center">Nama Siswa</th>
                            <th scope="col" class="border border-gray-300 py-2 text-center">Karir</th>
                            <th scope="col" class="border border-gray-300 py-2 text-center">Prior</th>
                            <th scope="col" class="border border-gray-300 py-2 text-center">Likelihood</th>
                            <th scope="col" class="border border-gray-300 py-2 text-center">Probabilitas</th>
                            <th scope="col" class="border border-gray-300 py-2 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $i => $user)
                        @foreach ($user->histories as $j => $history)
                        <tr class="bg-white border-b border-gray-200 bg">
                            @if ($j == 0)
                            <td class="py-2 border border-gray-300 text-center font-medium text-gray-900 whitespace-nowrap"
                                rowspan="{{ $user->histories->count() }}">{{
                                $users->firstItem() + $i }}</td>
                            <td class="py-2 border border-gray-300 text-center font-medium text-gray-900 whitespace-nowrap"
                                rowspan="{{ $user->histories->count() }}">{{ $user->name }}
                            </td>
                            @endif
                            <td class="py-2 border border-gray-300 text-center">
                                {{ $history->career->nama_karir ?? '-' }}</td>
                            <td class="py-2 border border-gray-300 text-center">
                                {{ number_format($history->prior, 6) }}</td>
                            <td class="py-2 border border-gray-300 text-center">
                                {{ number_format($history->likehood, 6) }}</td>
                            <td class="py-2 border border-gray-300 text-center">
                                {{ number_format($history->probabilitas, 6) }}</td>
                            @if ($j == 0)
                            <td class="py-2 border border-gray-300 text-center font-medium text-gray-900 whitespace-nowrap"
                                rowspan="{{ $user->histories->count() }}">
                                <form action="{{ route('admin.history.destroy', $history->id) }}" method="POST"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus data {{ $user->name }}?')"
                                    class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="cursor-pointer flex items-center justify-center w-8 h-8 text-white transition-colors duration-150 rounded-full bg-red-600 hover:bg-red-500"
                                        title="Hapus Riwayat">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                            class="w-5 h-5">
                                            <path fill-rule="evenodd"
                                                d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </form>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                        @empty
                        <tr class="border border-gray-300 text-center">
                            <th class="py-4 text-red-500" colspan="7">Data history tidak ditemukan.</th>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                {{-- Paginasi --}}
                <div class="mt-4">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection