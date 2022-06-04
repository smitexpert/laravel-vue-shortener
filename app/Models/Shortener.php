<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shortener extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
        'hash',
        'is_spam',
        'visited',
    ];

    protected $casts = [
        'is_spam' => 'boolean'
    ];
}
