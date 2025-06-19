<section class="py-20 bg-white">
    <div class="container mx-auto px-5 py-24">
        <h1 class="text-4xl text-center font-bold mb-8">Temukan Karir yang Sesuai untukmu!</h1>
        <p class="text-center text-gray-600 mb-12">Sistem ini dirancang untuk membantu siswa memilih
            karir yang sesuai dengan minat dan kemampuan mereka.</p>

        <div class="flex flex-wrap justify-center">
            <div class="w-full md:w-1/2 p-6">
                <img src="{{ asset('images/karir.jpg') }}" alt="Karir" class="w-full rounded-lg shadow-md">
            </div>
            <div class="w-full md:w-1/2 p-6">
                <h2 class="text-2xl font-bold mb-4">Mengapa Menggunakan Sistem Kami?</h2>
                <p class="text-gray-600 mb-6">
                    Sistem kami dikembangkan untuk membantu siswa mengenali minat dan potensi mereka, serta
                    memberikan rekomendasi karir yang sesuai.
                </p>
                <ul class="list-disc pl-6 mb-8 space-y-2 text-gray-800">
                    <li><span class="font-semibold text-blue-600">Analisis</span> berbasis minat dan keahlian siswa
                    </li>
                    <li><span class="font-semibold text-blue-600">Antarmuka</span> pengguna yang mudah digunakan
                    </li>
                    <li><span class="font-semibold text-blue-600">Dukungan</span> terstruktur dalam proses pemilihan
                        karir</li>
                    <li><span class="font-semibold text-blue-600">Rekomendasi</span> berdasarkan algoritma dengan naive
                        bayes
                    </li>
                </ul>
                <a href="{{ route('user.konsultasi.index') }}"
                    class="inline-flex items-center bg-blue-600 border-0 py-2 px-6 focus:outline-none hover:bg-blue-700 rounded text-white">Mulai
                    Pengujian</a>
            </div>
        </div>
    </div>
</section>