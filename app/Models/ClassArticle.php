<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;



class ClassArticle extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $fillable = ['title', 'slug', 'class_category_id', 'paragraf1', 'paragraf2', 'paragraf3', 'morePhoto', 'area', 'video', 'user_id'];
    protected $casts = [
        'more' => 'array',
    ];


    public function class()
    {
        return $this->belongsTo(ClassCategory::class, 'class_category_id');
    }

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
