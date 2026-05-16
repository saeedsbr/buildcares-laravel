<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioItem extends Model
{
    protected $fillable = [
        'title', 'slug', 'category', 'description', 'location',
        'year', 'client', 'cover_image', 'gallery_images', 'tags',
        'featured', 'sort_order', 'is_active',
    ];

    protected $casts = [
        'gallery_images' => 'array',
        'tags' => 'array',
        'featured' => 'boolean',
        'is_active' => 'boolean',
    ];

    public static $categories = [
        'garage-conversion' => 'Garage Conversion',
        'loft-conversion'   => 'Loft Conversion',
        'extension'         => 'Extension',
        'new-build'         => 'New Build',
        'outbuilding'       => 'Outbuilding',
        'internal-changes'  => 'Internal Changes',
    ];

    public function getCategoryLabelAttribute(): string
    {
        return self::$categories[$this->category] ?? ucfirst($this->category);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }
}
