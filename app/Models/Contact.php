<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone',
        'whatsapp',
        'email',
        'address',
        'map_embed_url',
        'map_link',
        'social_links',
    ];

    protected $casts = [
        'social_links' => 'array',
    ];

    /**
     * Get the singleton Contact record
     */
    public static function getContact()
    {
        return static::first() ?? new static();
    }
}
