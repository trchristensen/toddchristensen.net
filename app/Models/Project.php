<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Project extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    // fillable
    protected $fillable = [
        'name',
        'slug',
        'url',
        'description',
        'user_id',
        'status',
        'start_date',
        'launch_date',
        'created_at',
        'updated_at',
    ];

    protected $statuses = [
        'pending' => 'Pending',
        'in_progress' => 'In Progress',
        'completed' => 'Completed',
        'cancelled' => 'Cancelled',
    ];

    public function getReadableStatusAttribute()
    {
        return $this->statuses[$this->status] ?? 'Unknown Status';
    }

}