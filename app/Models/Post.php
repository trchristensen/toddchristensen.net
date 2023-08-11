<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Post extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasFactory;

    // fillable
    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'body',
        'category_id',
        'user_id',
        'status',
    ];

    // author
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}