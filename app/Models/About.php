<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $table = 'about';

    protected $fillable = [
        'name',
        'title',
        'bio',
        'phone',
        'email',
        'address',
        'skills',
        'hero_image',
    ];

    protected $casts = [
        'skills' => 'array',
    ];

    /**
     * Get the singleton About record
     */
    public static function getAbout()
    {
        return static::first() ?? new static([
            'name' => 'Ahmad Farid',
            'title' => 'Fullstack Developer',
        ]);
    }
}
