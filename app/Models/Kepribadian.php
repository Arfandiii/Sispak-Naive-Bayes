<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kepribadian extends Model
{
    protected $primaryKey = 'id_kepribadian';
    protected $fillable = ['kode', 'deskripsi'];

    public function karir()
    {
        return $this->hasMany(Karir::class, 'id_kepribadian');
    }
}

