<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Province extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'name_en',
        'name_zh',
        'slug',
        'region',
        'code',
        'description',
        'description_en',
        'description_zh',
        'image',
        'sort_order',
        'status',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'status' => 'boolean',
        'sort_order' => 'integer',
    ];

    /**
     * Get the services for this province.
     */
    public function services()
    {
        return $this->hasMany(Service::class, 'province_id');
    }

    /**
     * Get the province name by locale.
     */
    public function getNameByLocale($locale = null)
    {
        $locale = $locale ?? app()->getLocale();

        return match ($locale) {
            'en' => $this->name_en ?? $this->name,
            'zh' => $this->name_zh ?? $this->name,
            default => $this->name,
        };
    }

    /**
     * Accessor for locale-aware name.
     */
    public function getNameAttribute($value)
    {
        return $value;
    }

    /**
     * Scope to filter active provinces.
     */
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    /**
     * Scope to filter by region.
     */
    public function scopeOfRegion($query, $region)
    {
        return $query->where('region', $region);
    }

    /**
     * Scope to filter by multiple regions.
     */
    public function scopeOfRegions($query, $regions)
    {
        return $query->whereIn('region', (array) $regions);
    }

    /**
     * Scope ordered by sort order and name.
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('name');
    }

    /**
     * Get count of services for this province.
     */
    public function getServicesCountAttribute()
    {
        return $this->services()->count();
    }
}
