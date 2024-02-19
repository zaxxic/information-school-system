<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\SlugOptions;

class Announcement extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'user_id', 'paragraf1', 'paragraf2', 'paragraf3', 'morePhoto', 'area', 'video'];
    protected $casts = [
        'more' => 'array',
    ];



    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }
}
