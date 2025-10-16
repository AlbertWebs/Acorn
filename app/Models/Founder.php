<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Founder extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'title',
        'roles',
        'about',
        'catalyst_for_change',
        'community_impact',
        'leadership',
        'image',
        'facebook',
        'linkedin',
        'instagram',
        'twitter',
    ];
}
