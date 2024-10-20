<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class Watch extends Model
{
    use HasTranslations;

    protected $fillable = [
        'name',
        'slug',
        'category_id',
        'gender',
        'price',
        'discount',
        'special_offer',
        'best_selling',
        'image',
        'status',
    ];

    protected array $translatable = [
        'name',
        'slug',
        'description',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(WatchCategory::class, 'category_id');
    }

    protected function casts(): array
    {
        return [
            'image' => 'array',
        ];
    }
}
