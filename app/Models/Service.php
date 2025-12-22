<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'title', 'title_en', 'title_zh',
        'slug',
        'description', 'description_en', 'description_zh',
        'image',
        'status',
    ];

    /**
     * Lấy tiêu đề theo locale hiện tại
     */
    public function getTitleAttribute($value)
    {
        $locale = app()->getLocale();
        if ($locale === 'en' && $this->attributes['title_en']) {
            return $this->attributes['title_en'];
        }
        if ($locale === 'zh' && $this->attributes['title_zh']) {
            return $this->attributes['title_zh'];
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
