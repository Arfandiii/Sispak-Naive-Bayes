<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Solution extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
    ];
    public function career()
    {
        return $this->belongsTo(Career::class);
    }
    
}
