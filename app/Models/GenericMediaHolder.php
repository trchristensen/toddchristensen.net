<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class GenericMediaHolder extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $table = null; // No corresponding database table

    public function registerMediaConversions(Media $media = null): void
    {
        // Define your conversions here
    }
}