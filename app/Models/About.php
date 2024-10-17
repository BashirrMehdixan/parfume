<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class About extends Model
{
    use HasTranslations;

    protected $fillable = [
        'name',
        'title',
        'description',
        'logo',
        'favicon',
    ];
    protected array $translatable = ['name', 'title', 'description'];
}
