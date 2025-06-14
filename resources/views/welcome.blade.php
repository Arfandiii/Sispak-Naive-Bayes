@extends('layouts.app')

@section('content')

<section class="py-20 bg-white">
    <div class="container mx-auto px-5 py-24">
        <h1 class="text-4xl text-center font-bold mb-8">Temukan Jurusan dan Karir yang Sesuai untukmu!</h1>
        <p class="text-center text-gray-600 mb-12">Sistem ini dirancang untuk membantu siswa memilih jurusan dan
            karir yang sesuai dengan minat dan kemampuan mereka.</p>

        <div class="flex flex-wrap justify-center">
            <div class="w-full md:w-1/2 p-6">
                <img src="https://source.unsplash.com/random/800x500/?career" alt="Karir"
                    class="w-full rounded-lg shadow-md">
            </div>
            <div class="w-full md:w-1/2 p-6">
                <h2 class="text-2xl font-bold mb-4">Mengapa Menggunakan Sistem Kami?</h2>
                <p class="text-gray-600 mb-6">
                    Sistem kami dikembangkan untuk membantu siswa mengenali minat dan potensi mereka, serta
                    memberikan rekomendasi jurusan dan karir yang sesuai.
                </p>
                <ul class="list-disc pl-5 mb-6">
                    <li>Analisis berbasis minat dan keahlian siswa</li>
                    <li>Informasi jurusan dan karir yang terkini</li>
                    <li>Bimbingan langsung dari guru BK</li>
                    <li>Antarmuka pengguna yang mudah digunakan</li>
                    <li>Dukungan terstruktur dalam proses pemilihan jurusan</li>
                </ul>
                <a href="#daftar"
                    class="inline-flex items-center bg-blue-600 border-0 py-2 px-6 focus:outline-none hover:bg-blue-700 rounded text-white">Mulai
                    Pengujian</a>
            </div>
        </div>
    </div>
</section>

<section id="tentang" class="bg-gray-100 py-20">
    <div class="container mx-auto px-5 py-24">
        <h2 class="text-3xl font-bold mb-12 text-center">Tentang Sistem Pakar</h2>

        <div class="flex flex-wrap">
            <div class="w-full md:w-1/2 p-6">
                <p class="text-gray-600 mb-6">
                    Sistem Pakar Rekomendasi Karir Siswa adalah alat yang dirancang khusus untuk membantu siswa
                    dalam memilih jurusan dan karir yang sesuai dengan profil pribadi mereka. Sistem ini
                    dioperasikan oleh guru BK yang profesional dan berpengalaman.
                </p>
                <p class="text-gray-600 mb-6">
                    Melalui serangkaian analisis minat, bakat, dan kemampuan, guru BK akan membantu siswa:
                </p>
                <ul class="list-disc pl-5 mb-6">
                    <li>Memahami minat dan keahlian mereka</li>
                    <li>Mengenal berbagai pilihan jurusan dan karir</li>
                    <li>Menghubungkan minat dengan pilihan jurusan yang tepat</li>
                    <li>Menyiapkan diri untuk masa depan</li>
                </ul>
            </div>
            <div class="w-full md:w-1/2 p-6">
                <img src="https://source.unsplash.com/random/800x500/?education" alt="Edukasi"
                    class="w-full rounded-lg shadow-md">
            </div>
        </div>
    </div>
</section>

<section id="fitur" class="bg-white py-20">
    <div class="container mx-auto px-5 py-24">
        <h2 class="text-3xl font-bold mb-12 text-center">Fitur Utama</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="p-6 bg-white rounded-lg shadow-md transform hover:scale-105 transition duration-300">
                <div class="text-center">
                    <svg class="w-16 h-16 mb-4 text-blue-500" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                    </svg>
                    <h3 class="text-xl font-bold mb-2">Analisis Minat dan Bakat</h3>
                    <p class="text-gray-600">Menganalisis minat dan bakat siswa dengan bimbingan dari guru BK</p>
                </div>
            </div>
            <div class="p-6 bg-white rounded-lg shadow-md transform hover:scale-105 transition duration-300">
                <div class="text-center">
                    <svg class="w-16 h-16 mb-4 text-blue-500" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <path d="M12 6v6l4 2"></path>
                    </svg>
                    <h3 class="text-xl font-bold mb-2">Rekomendasi Jurusan</h3>
                    <p class="text-gray-600">Menyarankan jurusan yang sesuai dengan profil dan bimbingan guru BK</p>
                </div>
            </div>
            <div class="p-6 bg-white rounded-lg shadow-md transform hover:scale-105 transition duration-300">
                <div class="text-center">
                    <svg class="w-16 h-16 mb-4 text-blue-500" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M23 21v-2a4 4 0 00-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 010 7.75"></path>
                    </svg>
                    <h3 class="text-xl font-bold mb-2">Informasi Jurusan dan Karir</h3>
                    <p class="text-gray-600">Akses informasi terkini tentang jurusan dan karir dari berbagai sumber
                    </p>
                </div>
            </div>
            <div class="p-6 bg-white rounded-lg shadow-md transform hover:scale-105 transition duration-300">
                <div class="text-center">
                    <svg class="w-16 h-16 mb-4 text-blue-500" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                    </svg>
                    <h3 class="text-xl font-bold mb-2">Bimbingan Langsung</h3>
                    <p class="text-gray-600">Konsultasi langsung dengan guru BK untuk bimbingan karir</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="proses" class="bg-gray-100 py-20">
    <div class="container mx-auto px-5 py-24">
        <h2 class="text-3xl font-bold mb-12 text-center">Proses Pemilihan Jurusan</h2>

        <div class="flex flex-wrap justify-center">
            <div class="w-full md:w-1/2 p-6">
                <img src="https://source.unsplash.com/random/800x500/?guidance" alt="Bimbingan"
                    class="w-full rounded-lg shadow-md">
            </div>
            <div class="w-full md:w-1/2 p-6">
                <h3 class="text-2xl font-bold mb-4">Bagaimana Guru BK Membantu?</h3>
                <p class="text-gray-600 mb-6">
                    Guru BK memiliki peran penting dalam membimbing siswa melalui proses pemilihan jurusan dan
                    karir. Proses ini meliputi:
                </p>
                <ul class="list-disc pl-5 mb-6">
                    <li>Membantu siswa memahami minat dan bakatnya</li>
                    <li>Menyediakan informasi tentang berbagai jurusan dan karir</li>
                    <li>Membantu siswa mengevaluasi pilihan yang sesuai</li>
                    <li>Menghubungkan minat siswa dengan pilihan jurusan</li>
                    <li>Memberikan dukungan psikologis dan motivasi</li>
                </ul>
                <p class="text-gray-600">
                    Melalui pendekatan yang pribadi dan terarah, guru BK akan membantu siswa membuat keputusan yang
                    tepat untuk masa depan akademik dan profesional mereka.
                </p>
            </div>
        </div>
    </div>
</section>
@endsection