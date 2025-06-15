<?php

namespace Database\Seeders;
use App\Models\CareerStatement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CareerStatementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['kode_pernyataan' => 'KP01', 'isi_pernyataan' => 'Saya memiliki minat tentang otomotif'],
            ['kode_pernyataan' => 'KP02', 'isi_pernyataan' => 'Saya menyukai pekerjaan yang menggunakan alat atau mesin'],
            ['kode_pernyataan' => 'KP03', 'isi_pernyataan' => 'Saya memiliki keterampilan praktis seperti memperbaiki suatu benda'],
            ['kode_pernyataan' => 'KP04', 'isi_pernyataan' => 'Saya suka menganalisis masalah'],
            ['kode_pernyataan' => 'KP05', 'isi_pernyataan' => 'Saya cenderung menjaga kesehatan dan kebugaran fisik'],
            ['kode_pernyataan' => 'KP06', 'isi_pernyataan' => 'Saya suka kegiatan fisik seperti olahraga'],
            ['kode_pernyataan' => 'KP07', 'isi_pernyataan' => 'Saya memiliki sikap empati dan kepedulian terhadap orang lain'],
            ['kode_pernyataan' => 'KP08', 'isi_pernyataan' => 'Saya memiliki minat terhadap sains dan matematika'],
            ['kode_pernyataan' => 'KP09', 'isi_pernyataan' => 'Saya memiliki minat dalam bidang medis'],
            ['kode_pernyataan' => 'KP10', 'isi_pernyataan' => 'Saya senang melakukan kegiatan praktikum'],
            ['kode_pernyataan' => 'KP11', 'isi_pernyataan' => 'Saya dapat mengoperasikan komputer'],
            ['kode_pernyataan' => 'KP12', 'isi_pernyataan' => 'Saya suka pekerjaan yang melibatkan data dan angka'],
            ['kode_pernyataan' => 'KP13', 'isi_pernyataan' => 'Saya suka kegiatan yang teratur dan memiliki prosedur yang jelas'],
            ['kode_pernyataan' => 'KP14', 'isi_pernyataan' => 'Saya senang mengambil gambar atau video'],
            ['kode_pernyataan' => 'KP15', 'isi_pernyataan' => 'Saya terampil menggunakan alat bantu fotografi'],
            ['kode_pernyataan' => 'KP16', 'isi_pernyataan' => 'Saya mengenal alat bantu lighting dan fungsinya'],
            ['kode_pernyataan' => 'KP17', 'isi_pernyataan' => 'Saya terampil menggunakan software dan periferal digital audio, digital video dan visual effect'],
            ['kode_pernyataan' => 'KP18', 'isi_pernyataan' => 'Saya mempunyai keterampilan dalam proses pra produksi sampai pasca produksi di bidang multimedia'],
            ['kode_pernyataan' => 'KP19', 'isi_pernyataan' => 'Saya suka menggambar'],
            ['kode_pernyataan' => 'KP20', 'isi_pernyataan' => 'Saya terampil dalam pembuatan logo, banner, iklan baliho dan plakat'],
            ['kode_pernyataan' => 'KP21', 'isi_pernyataan' => 'Saya terampil menggunakan software dan periferal digital ilustration dan digital imaging'],
            ['kode_pernyataan' => 'KP22', 'isi_pernyataan' => 'Saya memiliki minat dalam bidang hukum'],
            ['kode_pernyataan' => 'KP23', 'isi_pernyataan' => 'Saya suka terlibat dalam diskusi suatu topik'],
            ['kode_pernyataan' => 'KP24', 'isi_pernyataan' => 'Saya suka membantu orang dalam menyelesaikan masalah'],
            ['kode_pernyataan' => 'KP25', 'isi_pernyataan' => 'Saya memiliki kemampuan berbicara di depan umum yang baik'],
            ['kode_pernyataan' => 'KP26', 'isi_pernyataan' => 'Saya suka melatih atau mengajar orang'],
            ['kode_pernyataan' => 'KP27', 'isi_pernyataan' => 'Saya suka berbagi tentang ilmu yang dimiliki'],
            ['kode_pernyataan' => 'KP28', 'isi_pernyataan' => 'Saya memiliki minat yang kuat dalam suatu mata pelajaran'],
            ['kode_pernyataan' => 'KP29', 'isi_pernyataan' => 'Saya suka berinteraksi dengan banyak orang'],
            ['kode_pernyataan' => 'KP30', 'isi_pernyataan' => 'Saya ingin memulai bisnis saya sendiri'],
            ['kode_pernyataan' => 'KP31', 'isi_pernyataan' => 'Saya berani mengambil risiko'],
            ['kode_pernyataan' => 'KP32', 'isi_pernyataan' => 'Saya cenderung fokus pada tujuan dan hasil'],
            ['kode_pernyataan' => 'KP33', 'isi_pernyataan' => 'Saya mampu melihat peluang'],
            ['kode_pernyataan' => 'KP34', 'isi_pernyataan' => 'Saya memiliki kemampuan memimpin'],
            ['kode_pernyataan' => 'KP35', 'isi_pernyataan' => 'Saya terampil dalam bahasa pemrograman'],
            ['kode_pernyataan' => 'KP36', 'isi_pernyataan' => 'Saya terampil dalam pembuatan aplikasi web dan desktop'],
            ['kode_pernyataan' => 'KP37', 'isi_pernyataan' => 'Saya mampu mengkonfigurasi database system'],
            ['kode_pernyataan' => 'KP38', 'isi_pernyataan' => 'Saya memahami tentang prototype'],
            ['kode_pernyataan' => 'KP39', 'isi_pernyataan' => 'Saya memiliki pemahaman tentang keuangan dan ekonomi'],
            ['kode_pernyataan' => 'KP40', 'isi_pernyataan' => 'Saya memiliki minat yang berhubungan dengan uang, bank, tabungan dan transaksi'],
        ];
        CareerStatement::insert($data);
    }
}
