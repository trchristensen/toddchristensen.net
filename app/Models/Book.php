<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // fillable
    protected $fillable = [
        'title',
        'author',
        'description',
        'isbn',
        'rating',
        'year'
    ];

    public function rating()
    {
        return $this->morphOne('App\Models\Rating', 'rateable');
    }
}