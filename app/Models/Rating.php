<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    // fillable
    protected $fillable = [
        'user_id',
        'rateable_id',
        'rateable_type',
        'rating',
        'comment'
    ];

    public function rateable()
    {
        return $this->morphTo();
    }
}