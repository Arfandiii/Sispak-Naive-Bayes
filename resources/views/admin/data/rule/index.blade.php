<!-- Rule Table -->
@if(request('filter') === 'all' || request('filter') === 'rules' || !request('filter'))
<div id="rules" class="{{ request('filter') === 'careers' || request('filter') === 'statements' ? 'hidden' : '' }}">
    <!-- Header -->
    <div class="sm:flex items-center justify-between mb-4">
        <div>
            <h2 class="text-lg font-semibold text-gray-900">Daftar Rules</h2>
        </div>
        <div class="mt-4">
            <a href="{{ route('admin.rule.create') }}">
                <button class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-500 cursor-pointer">
                    Tambah Rules
                </button>
            </a>
        </div>
    </div>
    <div class="overflow-x-auto mb-4">
        <div class="relative overflow-x-auto shadow-lg sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 overflow-hidden">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">No</th>
                        <th scope="col" class="px-6 py-3">Kode Rule</th>
                        <th scope="col" class="px-6 py-3">Kode Karir</th>
                        <th scope="col" class="px-6 py-3">Kode Pernyataan</th>
                        <th scope="col" class="px-6 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Example User Row -->
                    @foreach ($rules as $rule)
                    <tr class="bg-white border-b border-gray-200">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{
                            (($rules->currentPage() - 1) * $rules->perPage()) + $loop->iteration
                            }}</th>
                        <td class="px-6 py-4">{{ $rule->kode_rule }}</td>
                        <td class="px-6 py-4">{{ $rule->career->kode_karir }}</td>
                        <td class="px-6 py-4">{{ $rule->careerStatement->kode_pernyataan }}</td>
                        <td class="py-4 px-6">
                            <div class="flex space-x-2">
                                <!-- Edit Button -->
                                <div class="relative before:content-[attr(data-tip)] before:absolute before:px-2 before:py-1 before:left-1/2 before:-top-3 before:w-max before:max-w-xs before:-translate-x-1/2 before:-translate-y-full before:bg-gray-700 before:text-white before:rounded-md before:opacity-0 before:transition-all after:absolute after:left-1/2 after:-top-3 after:h-0 after:w-0 after:-translate-x-1/2 after:border-8 after:border-t-gray-700 after:border-l-transparent after:border-b-transparent after:border-r-transparent after:opacity-0 after:transition-all hover:before:opacity-100 hover:after:opacity-100"
                                    data-tip="Edit Data">
                                    <a href="{{ route('admin.rule.edit', $rule->id) }}"
                                        class="flex items-center justify-center w-8 h-8 text-white transition-colors duration-150 rounded-full bg-green-600 hover:bg-green-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="size-5 fill-current">
                                            <path
                                                d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                                            <path
                                                d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                                        </svg>
                                    </a>
                                </div>
                                <form action="{{ route('admin.rule.destroy', $rule->id) }}" method="POST"
                                    class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <div class="relative before:content-[attr(data-tip)] before:absolute before:px-2 before:py-1 before:left-1/2 before:-top-3 before:w-max before:max-w-xs before:-translate-x-1/2 before:-translate-y-full before:bg-gray-700 before:text-white before:rounded-md before:opacity-0 before:transition-all after:absolute after:left-1/2 after:-top-3 after:h-0 after:w-0 after:-translate-x-1/2 after:border-8 after:border-t-gray-700 after:border-l-transparent after:border-b-transparent after:border-r-transparent after:opacity-0 after:transition-all hover:before:opacity-100 hover:after:opacity-100"
                                        data-tip="Delete Data">
                                        <button type="submit"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus aturan ``{{ $rule->kode_rule }}`` ini?')"
                                            class="cursor-pointer flex items-center justify-center w-8 h-8 text-white transition-colors duration-150 rounded-full bg-red-600 hover:bg-red-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="size-5 fill-current">
                                                <path fill-rule="evenodd"
                                                    d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-4">
                {{ $rules->appends(['filter' => request('filter')])->links() }}
            </div>
        </div>
    </div>
</div>
@endif