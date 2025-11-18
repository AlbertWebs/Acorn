<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Csr extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'pdf_file',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($csr) {
            if (empty($csr->slug)) {
                $csr->slug = Str::slug($csr->title);
            }
        });
        static::updating(function ($csr) {
            if ($csr->isDirty('title') && empty($csr->slug)) {
                $csr->slug = Str::slug($csr->title);
            }
        });
    }

    // Relationship with gallery images
    public function galleryImages()
    {
        return $this->hasMany(Gallery::class, 'context_slug', 'id')
                    ->where('context_type', 'csr');
    }

    // Accessor for gallery images
    public function getGalleryImagesAttribute()
    {
        return Gallery::where('context_type', 'csr')
            ->where('context_slug', (string)$this->id)
            ->where('is_active', true)
            ->get();
    }
}

