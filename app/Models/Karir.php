<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Karir extends Model
{
    protected $primaryKey = 'id_karir';
    protected $fillable = ['nama_karir', 'id_kepribadian'];

    public function kepribadian()
    {
        return $this->belongsTo(Kepribadian::class, 'id_kepribadian');
    }
}
