<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'full_description',
        'tech',
        'features',
        'color',
        'image',
        'year',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'tech' => 'array',
        'features' => 'array',
        'is_active' => 'boolean',
    ];

    /**
     * Scope untuk project aktif
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope untuk sorting
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('id', 'desc');
    }

    /**
     * Get active projects ordered
     */
    public static function getActiveProjects()
    {
        return static::active()->ordered()->get();
    }
}
