<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'title_en', 'title_zh',
        'slug',
        'content', 'content_en', 'content_zh',
        'image',
        'status'
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
     * Lấy nội dung theo locale hiện tại
     */
    public function getContentAttribute($value)
    {
        $locale = app()->getLocale();
        if ($locale === 'en' && $this->attributes['content_en']) {
            return $this->attributes['content_en'];
        }
        if ($locale === 'zh' && $this->attributes['content_zh']) {
            return $this->attributes['content_zh'];
        }
        return $value;
    }
}
