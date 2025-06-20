@extends('admin.layouts.app')

@section('content')
<!-- CONTENT -->
<div class="content ml-12 transform ease-in-out duration-500 pt-20 px-2 md:px-5 pb-4">
    {{-- <x-breadcrumb :breadcrumbs="$breadcrumbs"></x-breadcrumb> --}}
    <div class="flex flex-wrap w-full my-5 -mx-2">
        <div class="w-full md:w-1/2 lg:w-1/2 p-2">
            <a href="{{ route('admin.users.index') }}">
                <div
                    class="flex items-center flex-row w-full hover:shadow hover:bg-blue-500 bg-blue-600 rounded-md p-3">
                    <div
                        class="flex text-blue-600 items-center bg-white p-2 rounded-md flex-none w-8 h-8 md:w-12 md:h-12 ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="object-scale-down transition duration-500">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                        </svg>
                    </div>
                    <div class="flex flex-col justify-around flex-grow ml-5 text-white">
                        <div class="whitespace-nowrap">
                            Total Siswa
                        </div>
                        <div>
                            {{ $totalUsers }}
                        </div>
                    </div>
                    <div class=" flex items-center flex-none text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
                            stroke="currentColor" class="w-6 h-6">
                            <path strokeLinecap="round" strokeLinejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>
                    </div>
                </div>
            </a>
        </div>
        <div class="w-full md:w-1/2 lg:w-1/2 p-2">
            <a href="{{ route('admin.history.index') }}">
                <div
                    class="flex items-center flex-row w-full hover:shadow hover:bg-blue-500 bg-blue-600 rounded-md p-3">
                    <div
                        class="flex text-blue-600 items-center bg-white p-2 rounded-md flex-none w-8 h-8 md:w-12 md:h-12 ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="object-scale-down transition duration-500">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0 1 18 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3 1.5 1.5 3-3.75" />
                        </svg>
                    </div>
                    <div class="flex flex-col justify-around flex-grow ml-5 text-white">
                        <div class="whitespace-nowrap">
                            Data Konsultasi Tersimpan
                        </div>
                        <div>
                            {{ $totalHistory }}
                        </div>
                    </div>
                    <div class=" flex items-center flex-none text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
                            stroke="currentColor" class="w-6 h-6">
                            <path strokeLinecap="round" strokeLinejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>
                    </div>
                </div>
            </a>
        </div>
        <div class="w-full md:w-1/2 lg:w-1/2 p-2">
            <a href="{{ route('admin.data.index') }}">
                <div
                    class="flex items-center flex-row w-full hover:shadow hover:bg-blue-500 bg-blue-600 rounded-md p-3">
                    <div
                        class="flex text-blue-600 items-center bg-white p-2 rounded-md flex-none w-8 h-8 md:w-12 md:h-12 ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="object-scale-down transition duration-500">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125" />
                        </svg>
                    </div>
                    <div class="flex flex-col justify-around flex-grow ml-5 text-white">
                        <div class="whitespace-nowrap">
                            Total Karir / Profesi
                        </div>
                        <div>
                            {{ $totalCareer }}
                        </div>
                    </div>
                    <div class=" flex items-center flex-none text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
                            stroke="currentColor" class="w-6 h-6">
                            <path strokeLinecap="round" strokeLinejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>
                    </div>
                </div>
            </a>
        </div>
        <div class="w-full md:w-1/2 lg:w-1/2 p-2">
            <a href="{{ route('admin.data.index') }}">
                <div
                    class="flex items-center flex-row w-full hover:shadow hover:bg-blue-500 bg-blue-600 rounded-md p-3">
                    <div
                        class="flex text-blue-600 items-center bg-white p-2 rounded-md flex-none w-8 h-8 md:w-12 md:h-12 ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="object-scale-down transition duration-500">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125" />
                        </svg>
                    </div>
                    <div class="flex flex-col justify-around flex-grow ml-5 text-white">
                        <div class="whitespace-nowrap">
                            Total Pertanyaan Konsultasi
                        </div>
                        <div>
                            {{ $totalCareerStatement }}
                        </div>
                    </div>
                    <div class=" flex items-center flex-none text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
                            stroke="currentColor" class="w-6 h-6">
                            <path strokeLinecap="round" strokeLinejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>
                    </div>
                </div>
            </a>
        </div>
    </div>


    <div class="flex flex-wrap w-full my-5 -mx-2">
        <!-- Statistik Peminjaman Buku -->
        <div class="w-full lg:w-1/2 p-2">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-bold text-gray-800 mb-4">Statistik Pengguna</h3>
                <canvas id="userChart" height="200" width="400"></canvas>
            </div>
        </div>

        <!-- Aktivitas Pengguna -->
        <div class="w-full lg:w-1/2 p-2">
            <div class="bg-white rounded-lg shadow p-3">
                <h3 class="text-xl font-bold text-gray-800 mb-4">Aktivitas Pengguna</h3>
                <canvas id="userActivityChart" width="400" height="200"></canvas>
            </div>
        </div>
    </div>

    <div class="bg-white mt-6 rounded-lg shadow p-4">
        <h3 class="text-lg font-bold mb-4">Aktivitas Terbaru</h3>
        <ul class="divide-y">
            @foreach ($recentActivities as $activity)
            <li class="flex items-center justify-between py-2 border-b">
                <div class="flex items-center">
                    <img class="w-10 h-10 rounded-full"
                        src="https://ui-avatars.com/api/?name={{ urlencode($activity->user->name) }}&background=0D8ABC&color=fff"
                        alt="User Avatar">
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-800">{{ $activity->user->name }}</p>
                        <p class="text-xs text-gray-500">{{ $activity->created_at->diffForHumans() }}</p>
                    </div>
                </div>
                <span class="text-xs bg-green-100 text-green-600 px-2 py-1 rounded">Konsultasi</span>
            </li>
            @endforeach
        </ul>
    </div>
</div>

<script>
    const ctx2 = document.getElementById('userActivityChart').getContext('2d');
    const activityChart = new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: @json($days),
            datasets: [{
                label: 'Jumlah Konsultasi',
                data: @json($dailyHistories),
                backgroundColor: 'rgba(34, 197, 94, 0.2)',
                borderColor: 'rgba(34, 197, 94, 1)',
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
</script>
<script>
    const ctx = document.getElementById('userChart').getContext('2d');
    const userChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: @json($days), // otomatis dari controller
            datasets: [{
                label: 'Jumlah Pengguna',
                data: @json($dailyUsers),
                backgroundColor: 'rgba(59, 130, 246, 0.2)',
                borderColor: 'rgba(59, 130, 246, 1)',
                borderWidth: 2,
                tension: 0.3
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection