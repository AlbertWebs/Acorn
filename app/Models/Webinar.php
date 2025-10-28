<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Webinar extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'author',
        'excerpt',
        'content',
        'featured_image',
        'is_published',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($webinar) {
            $webinar->slug = Str::slug($webinar->title);
        });
    }
}


