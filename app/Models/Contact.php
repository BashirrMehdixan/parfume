<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'phone_number',
        'address',
        'url',
        'facebook',
        'twitter',
        'tiktok',
        'instagram',
        'youtube',
    ];
}
