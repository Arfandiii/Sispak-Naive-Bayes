<!-- Sidebar -->
<aside
    class="w-60 -translate-x-48 fixed transition transform ease-in-out duration-1000 z-50 flex h-screen bg-blue shadow-lg ">
    <!-- open sidebar button -->
    <div
        class="max-toolbar translate-x-24 scale-x-0 w-full -right-6 transition transform ease-in duration-300 flex items-center justify-between border-4 border-white bg-blue-800  absolute top-2 rounded-full h-12">

        <div class="pl-4 items-center space-x-2 ">
            <div class="hover:cursor-pointer text-white hover:text-blue-600">
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
                        <path fill-rule="evenodd"
                            d="M12 5a4 4 0 0 0-8 0v2.379a1.5 1.5 0 0 1-.44 1.06L2.294 9.707a1 1 0 0 0-.293.707V11a1 1 0 0 0 1 1h2a3 3 0 1 0 6 0h2a1 1 0 0 0 1-1v-.586a1 1 0 0 0-.293-.707L12.44 8.44A1.5 1.5 0 0 1 12 7.38V5Zm-5.5 7a1.5 1.5 0 0 0 3 0h-3Z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
        </div>
        <div class="flex items-center space-x-3 group bg-blue-600  pl-10 pr-2 py-1 rounded-full text-white  ">
            <div class="transform ease-in-out duration-300 mr-12">
                Dashboard
            </div>
        </div>
    </div>
    <div onclick="openNav()"
        class="hover:cursor-pointer -right-6 transition transform ease-in-out duration-500 flex border-4 border-white bg-blue-800 hover:bg-blue-600 absolute top-2 p-3 rounded-full text-white hover:rotate-45">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={3} stroke="currentColor"
            class="w-4 h-4">
            <path strokeLinecap="round" strokeLinejoin="round"
                d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
        </svg>
    </div>

    <!-- MAX SIDEBAR-->
    <div class="max hidden text-white mt-20 flex-col space-y-2 w-full h-[calc(100vh)]">
        <a href="{{ route('user.dashboard') }}">
            <x-nav-link-user iconType="dashboard">Dashboard</x-nav-link-user>
        </a>
        <a href="{{ route('user.konsultasi.index') }}">
            <x-nav-link-user iconType="test">Konsultasi Karir</x-nav-link-user>
        </a>
        <a href="{{ route('user.konsultasi.result') }}">
            <x-nav-link-user iconType="result">Hasil Konsultasi</x-nav-link-user>
        </a>
        <a href="{{ route('user.dashboard.profile') }}">
            <x-nav-link-user iconType="profile">Profile</x-nav-link-user>
        </a>
        <form action="{{ route('logout') }}" method="post" class="border-t-2 border-blue-700 pt-2">
            @csrf
            <button type="submit" class="w-full text-left">
                <x-nav-link-user iconType="logout">Logout</x-nav-link-user>
            </button>
        </form>
    </div>
    <!-- MINI SIDEBAR-->
    <div class="mini mt-20 flex flex-col space-y-2 w-full h-[calc(100vh)]">
        <a href="{{ route('user.dashboard') }}">
            <x-nav-link-mini-user iconType="dashboard"></x-nav-link-mini-user>
        </a>
        <a href="{{ route('user.konsultasi.index') }}">
            <x-nav-link-mini-user iconType="test"></x-nav-link-mini-user>
        </a>
        <a href="{{ route('user.konsultasi.result') }}">
            <x-nav-link-mini-user iconType="result"></x-nav-link-mini-user>
        </a>
        <a href="{{ route('user.dashboard.profile') }}">
            <x-nav-link-mini-user iconType="profile"></x-nav-link-mini-user>
        </a>
        <form action="{{ route('logout') }}" method="post" class="border-t-2 border-blue-700 pt-2">
            @csrf
            <button type="submit" class="w-full text-left">
                <x-nav-link-mini-user iconType="logout"></x-nav-link-mini-user>
            </button>
        </form>
    </div>

</aside>