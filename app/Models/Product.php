<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class Product extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $fillable = [
        'name',
        'slug',
        'brand_id',
        'collection_id',
        'gender',
        'description',
        'image',
        'price',
        'discount',
        'quantity',
        'stock',
        'special_offer',
        'best_selling',
        'status',
    ];
    protected array $translatable = [
        'name',
        'slug',
        'description',
    ];
    protected $casts = ['image' => 'array'];

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function collection(): BelongsTo
    {
        return $this->belongsTo(Collection::class);
    }
}
