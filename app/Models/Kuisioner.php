<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kuisioner extends Model
{
    protected $primaryKey = 'id_kuisioner';
    protected $fillable = ['pernyataan', 'kode_gejala'];

    public function jawaban()
    {
        return $this->hasMany(Jawaban::class, 'id_kuisioner');
    }
}
