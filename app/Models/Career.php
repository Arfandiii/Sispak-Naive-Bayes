<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Career extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function rules()
    {
        return $this->hasMany(Rule::class);
    }

    public function solutions()
    {
        return $this->hasMany(Solution::class);
    }
}
