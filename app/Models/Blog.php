<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class Blog extends Model
{
    use HasTranslations;

    protected $fillable = [
        'title',
        'slug',
        'category_id',
        'image',
        'description',
        'status',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(BlogCategory::class, 'category_id');
    }

    protected array $translatable = ['title', 'description', 'slug'];

    protected function casts(): array
    {
        return [
            'image' => 'array',
        ];
    }
}
