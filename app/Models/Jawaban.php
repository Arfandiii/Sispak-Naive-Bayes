<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    protected $fillable = ['id_siswa', 'id_kuisioner', 'jawaban'];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa');
    }

    public function kuisioner()
    {
        return $this->belongsTo(Kuisioner::class, 'id_kuisioner');
    }
}
