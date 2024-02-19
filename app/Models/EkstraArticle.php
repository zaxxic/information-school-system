<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\SlugOptions;

class EkstraArticle extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }
    protected $casts = [
        'more' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function name_ekstra()
    {
        return $this->belongsTo(Ekstra::class,'ekstra_id');
    }
}
