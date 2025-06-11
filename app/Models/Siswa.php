<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $primaryKey = 'id_siswa';
    protected $fillable = ['nama', 'kelas', 'hasil_karir'];

    public function jawaban()
    {
        return $this->hasMany(Jawaban::class, 'id_siswa');
    }
}

