@extends('admin.layouts.app')

{{-- @section('title', $title) --}}

@section('content')
<!-- CONTENT -->
<div class="content ml-12 transform ease-in-out duration-500 pt-20 px-2 md:px-5 pb-4">
    {{-- <x-breadcrumb :breadcrumbs="$breadcrumbs"></x-breadcrumb> --}}
    <div class="flex flex-wrap w-full my-5 -mx-2">
        <div class="w-full md:w-1/2 lg:w-1/2 p-2">
            <a href="#">
                <div
                    class="flex items-center flex-row w-full hover:shadow hover:bg-indigo-500 bg-indigo-600 rounded-md p-3">
                    <div
                        class="flex text-indigo-600 items-center bg-white p-2 rounded-md flex-none w-8 h-8 md:w-12 md:h-12 ">
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
                        <div class="">
                            {{-- {{ $totalUsers }} --}}
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
            <a href="#">
                <div
                    class="flex items-center flex-row w-full hover:shadow hover:bg-indigo-500 bg-indigo-600 rounded-md p-3">
                    <div
                        class="flex text-indigo-600 items-center bg-white p-2 rounded-md flex-none w-8 h-8 md:w-12 md:h-12 ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="object-scale-down transition duration-500">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                        </svg>
                    </div>
                    <div class="flex flex-col justify-around flex-grow ml-5 text-white">
                        <div class="whitespace-nowrap">
                            Data Karir Tersimpan
                        </div>
                        <div class="">
                            {{-- {{ $totalBooks }} --}}
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

    <div class="bg-white shadow rounded-lg p-4 mt-4">
        <h3 class="text-lg font-bold mb-4">Aktivitas Terbaru</h3>
        <ul>
            {{-- @foreach ($activities as $activity)
            <li class="flex items-center justify-between py-2 border-b">
                <div class="flex items-center">
                    <img class="w-10 h-10 rounded-full"
                        src="{{ $activity['avatar'] ? asset('storage/' . $activity['avatar']) : asset('assets/img/default-profile.png') }}"
                        alt="User Avatar">
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-800">{{ $activity['name'] }}</p>
                        <p class="text-xs text-gray-500">{{ $activity['user'] ?? '' }} {{ $activity['time'] }}</p>
                    </div>
                </div>
                <span
                    class="text-xs {{ $activity['status'] == 'Baru' ? 'bg-green-100 text-green-600' : 'bg-blue-100 text-blue-600' }} px-2 py-1 rounded">
                    {{ $activity['status'] }}
                </span>
            </li>
            @endforeach --}}
        </ul>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Inisialisasi chart
    const ctx = document.getElementById('userChart').getContext('2d');
    const userChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Jumlah Pengguna',
                data: [750, 820, 950, 1050, 1150, 1245],
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
{{-- <script>
    // Peminjaman Buku (Bar Chart)
        const borrowCtx = document.getElementById('borrowChart').getContext('2d');
        new Chart(borrowCtx, {
            type: 'bar',
            data: {
                labels: @json($days), // Menggunakan data dari controller
                datasets: [{
                    label: 'Jumlah Peminjaman',
                    data: @json($total_loans), // Menggunakan data dari controller
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });
    
        // Kategori Buku Populer (Pie Chart)
        const categoryCtx = document.getElementById('categoryChart').getContext('2d');
        new Chart(categoryCtx, {
            type: 'pie',
            data: {
                labels: @json($categories), // Menggunakan data dari controller
                datasets: [{
                    label: 'Kategori Populer',
                    data: @json($categoryLoans), // Menggunakan data dari controller
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1
                }]
            }
        });
    
        // Aktivitas Pengguna (Line Chart)
        const userActivityCtx = document.getElementById('userActivityChart').getContext('2d');
        new Chart(userActivityCtx, {
            type: 'line',
            data: {
                labels: @json($activityDays), // Menggunakan data dari controller
                datasets: [{
                    label: 'Jumlah Login',
                    data: @json($logins), // Menggunakan data dari controller
                    borderColor: 'rgba(153, 102, 255, 1)',
                    backgroundColor: 'rgba(153, 102, 255, 0.2)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4 // Membuat garis lebih halus
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });
</script> --}}
@endsection