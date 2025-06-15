<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Rule extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function career()
    {
        return $this->belongsTo(Career::class);
    }
    public function careerStatement()
    {
        return $this->belongsTo(CareerStatement::class);
    }
}
