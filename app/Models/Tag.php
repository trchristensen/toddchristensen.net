<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    public function taggablePosts()
    {
        return $this->morphedByMany('App\Models\Post', 'taggable');
    }

    public function taggableProducts()
    {
        return $this->morphedByMany('App\Models\Project', 'taggable');
    }
}