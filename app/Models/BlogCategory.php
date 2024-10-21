<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class BlogCategory extends Model
{
    use HasTranslations;

    protected $fillable = [
        'title',
        'slug',
        'image',
        'description',
        'status',
    ];

    protected array $translatable = ['title', 'slug', 'description'];
}
