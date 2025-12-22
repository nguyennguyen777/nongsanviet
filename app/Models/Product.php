<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'name', 'name_en', 'name_zh',
        'slug',
        'price',
        'description', 'description_en', 'description_zh',
        'image',
        'is_featured',
        'status'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
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
}
