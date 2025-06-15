<?php

namespace Database\Seeders;

use App\Models\Career;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CareerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['kode_karir' => 'K01', 'nama_karir' => 'Mekanik', 'tipe_kepribadian' => 'Realistic'],
            ['kode_karir' => 'K02', 'nama_karir' => 'Polisi', 'tipe_kepribadian' => 'Realistic'],
            ['kode_karir' => 'K03', 'nama_karir' => 'Dokter', 'tipe_kepribadian' => 'Investigative'],
            ['kode_karir' => 'K04', 'nama_karir' => 'Analis Kesehatan', 'tipe_kepribadian' => 'Investigative'],
            ['kode_karir' => 'K05', 'nama_karir' => 'Fotografer', 'tipe_kepribadian' => 'Artistic'],
            ['kode_karir' => 'K06', 'nama_karir' => 'Desainer Grafis', 'tipe_kepribadian' => 'Artistic'],
            ['kode_karir' => 'K07', 'nama_karir' => 'Pengacara', 'tipe_kepribadian' => 'Social'],
            ['kode_karir' => 'K08', 'nama_karir' => 'Guru', 'tipe_kepribadian' => 'Social'],
            ['kode_karir' => 'K09', 'nama_karir' => 'Pengusaha', 'tipe_kepribadian' => 'Enterprising'],
            ['kode_karir' => 'K10', 'nama_karir' => 'Programmer', 'tipe_kepribadian' => 'Conventional'],
            ['kode_karir' => 'K11', 'nama_karir' => 'Banker', 'tipe_kepribadian' => 'Conventional'],
        ];
        Career::insert($data);
    }
}
