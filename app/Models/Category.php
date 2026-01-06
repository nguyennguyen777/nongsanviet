<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'name_en',
        'name_zh',
        'slug',
        'description',
        'description_en',
        'description_zh',
        'image'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Lấy tên theo locale hiện tại
     */
    public function getNameAttribute($value)
    {
        $locale = app()->getLocale();
        if ($locale === 'en' && $this->attributes['name_en']) {
            return $this->attributes['name_en'];
        }
        if ($locale === 'zh' && $this->attributes['name_zh']) {
            return $this->attributes['name_zh'];
        }
        return $value;
    }

    /**
     * Lấy mô tả theo locale hiện tại
     */
    public function getDescriptionAttribute($value)
    {
        $locale = app()->getLocale();
        if ($locale === 'en' && $this->attributes['description_en']) {
            return $this->attributes['description_en'];
        }
        if ($locale === 'zh' && $this->attributes['description_zh']) {
            return $this->attributes['description_zh'];
        }
        return $value;
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
}
