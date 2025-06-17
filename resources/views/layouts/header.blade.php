<header class="bg-blue-600 text-white px-4">
    <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
        <a href="/" class="flex title-font font-medium items-center text-white mb-4 md:mb-0">
            <span class="ml-3 text-xl">Sistem Pakar Rekomendasi Karir Siswa</span>
        </a>
        <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
            <a href="#tentang" class="mr-5 hover:text-white">Tentang</a>
        </nav>
        @auth
        <div class="inline-flex">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                    class="inline-flex items-center bg-white border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base mt-4 md:mt-0 text-blue-600">
                    Logout
                </button>
            </form>
        </div>
        @else
        <div class="inline-flex">
            <a href="{{ route('login') }}"
                class="inline-flex items-center bg-white border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base mt-4 md:mt-0 text-blue-600">Masuk</a>
        </div>
        @endauth
    </div>
</header>