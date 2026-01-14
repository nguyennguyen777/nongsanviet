<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'type',
        'parent_id',
        'province_id',
        'content_type',
        'sort_order',
        'icon',
        'title',
        'title_en',
        'title_zh',
        'slug',
        'description',
        'description_en',
        'description_zh',
        'image',
        'title1',
        'title1_en',
        'title1_zh',
        'image2',
        'image3',
        'image4',
        'image5',
        'image6',
        'image7',
        'image8',
        'title2',
        'title2_en',
        'title2_zh',
        'title3',
        'title3_en',
        'title3_zh',
        'title4',
        'title4_en',
        'title4_zh',
        'title5',
        'title5_en',
        'title5_zh',
        'title6',
        'title6_en',
        'title6_zh',
        'title7',
        'title7_en',
        'title7_zh',
        'title8',
        'title8_en',
        'title8_zh',
        'description2',
        'description2_en',
        'description2_zh',
        'description3',
        'description3_en',
        'description3_zh',
        'description4',
        'description4_en',
        'description4_zh',
        'description5',
        'description5_en',
        'description5_zh',
        'description6',
        'description6_en',
        'description6_zh',
        'description7',
        'description7_en',
        'description7_zh',
        'description8',
        'description8_en',
        'description8_zh',
        'meta_title',
        'meta_description',
        'view_count',
        'status',
    ];

    /**
     * Relationship: Parent service
     */
    public function parent()
    {
        return $this->belongsTo(Service::class, 'parent_id');
    }

    /**
     * Relationship: Children services
     */
    public function children()
    {
        return $this->hasMany(Service::class, 'parent_id')
            ->where('status', 1)
            ->orderBy('sort_order', 'asc')
            ->orderBy('title', 'asc');
    }

    /**
     * Relationship: Province
     */
    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }

    /**
     * Scope: Chỉ lấy categories (không phải articles)
     */
    public function scopeCategories($query)
    {
        return $query->where('content_type', 'category');
    }

    /**
     * Scope: Chỉ lấy articles
     */
    public function scopeArticles($query)
    {
        return $query->where('content_type', 'article');
    }

    /**
     * Scope: Lọc theo type
     */
    public function scopeOfType($query, $type)
    {
        return $query->where('type', $type);
    }

    /**
     * Scope: Lọc theo region
     */
    public function scopeOfRegion($query, $region)
    {
        return $query->where('region', $region);
    }

    /**
     * Check if this is a category
     */
    public function isCategory()
    {
        return $this->content_type === 'category';
    }

    /**
     * Check if this is an article
     */
    public function isArticle()
    {
        return $this->content_type === 'article';
    }

    /**
     * Lấy tên tỉnh theo locale
     */
    public function getProvinceNameAttribute()
    {
        $locale = app()->getLocale();
        if ($locale === 'en' && $this->province_en) {
            return $this->province_en;
        }
        if ($locale === 'zh' && $this->province_zh) {
            return $this->province_zh;
        }
        return $this->province;
    }

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

    /**
     * Lấy mô tả 2 theo locale hiện tại
     */
    public function getDescription2Attribute($value)
    {
        $locale = app()->getLocale();
        if ($locale === 'en' && $this->attributes['description2_en']) {
            return $this->attributes['description2_en'];
        }
        if ($locale === 'zh' && $this->attributes['description2_zh']) {
            return $this->attributes['description2_zh'];
        }
        return $value;
    }

    /**
     * Lấy mô tả 3 theo locale hiện tại
     */
    public function getDescription3Attribute($value)
    {
        $locale = app()->getLocale();
        if ($locale === 'en' && $this->attributes['description3_en']) {
            return $this->attributes['description3_en'];
        }
        if ($locale === 'zh' && $this->attributes['description3_zh']) {
            return $this->attributes['description3_zh'];
        }
        return $value;
    }

    /**
     * Lấy mô tả 4 theo locale hiện tại
     */
    public function getDescription4Attribute($value)
    {
        $locale = app()->getLocale();
        if ($locale === 'en' && $this->attributes['description4_en']) {
            return $this->attributes['description4_en'];
        }
        if ($locale === 'zh' && $this->attributes['description4_zh']) {
            return $this->attributes['description4_zh'];
        }
        return $value;
    }

    /**
     * Lấy mô tả 5 theo locale hiện tại
     */
    public function getDescription5Attribute($value)
    {
        $locale = app()->getLocale();
        if ($locale === 'en' && $this->attributes['description5_en']) {
            return $this->attributes['description5_en'];
        }
        if ($locale === 'zh' && $this->attributes['description5_zh']) {
            return $this->attributes['description5_zh'];
        }
        return $value;
    }

    /**
     * Lấy mô tả 6 theo locale hiện tại
     */
    public function getDescription6Attribute($value)
    {
        $locale = app()->getLocale();
        if ($locale === 'en' && $this->attributes['description6_en']) {
            return $this->attributes['description6_en'];
        }
        if ($locale === 'zh' && $this->attributes['description6_zh']) {
            return $this->attributes['description6_zh'];
        }
        return $value;
    }

    /**
     * Lấy mô tả 7 theo locale hiện tại
     */
    public function getDescription7Attribute($value)
    {
        $locale = app()->getLocale();
        if ($locale === 'en' && $this->attributes['description7_en']) {
            return $this->attributes['description7_en'];
        }
        if ($locale === 'zh' && $this->attributes['description7_zh']) {
            return $this->attributes['description7_zh'];
        }
        return $value;
    }

    /**
     * Lấy mô tả 8 theo locale hiện tại
     */
    public function getDescription8Attribute($value)
    {
        $locale = app()->getLocale();
        if ($locale === 'en' && $this->attributes['description8_en']) {
            return $this->attributes['description8_en'];
        }
        if ($locale === 'zh' && $this->attributes['description8_zh']) {
            return $this->attributes['description8_zh'];
        }
        return $value;
    }

    /**
     * Lấy tiêu đề 1 theo locale hiện tại
     */
    public function getTitle1Attribute($value)
    {
        $locale = app()->getLocale();
        if ($locale === 'en' && $this->attributes['title1_en']) {
            return $this->attributes['title1_en'];
        }
        if ($locale === 'zh' && $this->attributes['title1_zh']) {
            return $this->attributes['title1_zh'];
        }
        return $value;
    }

    /**
     * Lấy tiêu đề 2 theo locale hiện tại
     */
    public function getTitle2Attribute($value)
    {
        $locale = app()->getLocale();
        if ($locale === 'en' && $this->attributes['title2_en']) {
            return $this->attributes['title2_en'];
        }
        if ($locale === 'zh' && $this->attributes['title2_zh']) {
            return $this->attributes['title2_zh'];
        }
        return $value;
    }

    /**
     * Lấy tiêu đề 3 theo locale hiện tại
     */
    public function getTitle3Attribute($value)
    {
        $locale = app()->getLocale();
        if ($locale === 'en' && $this->attributes['title3_en']) {
            return $this->attributes['title3_en'];
        }
        if ($locale === 'zh' && $this->attributes['title3_zh']) {
            return $this->attributes['title3_zh'];
        }
        return $value;
    }

    /**
     * Lấy tiêu đề 4 theo locale hiện tại
     */
    public function getTitle4Attribute($value)
    {
        $locale = app()->getLocale();
        if ($locale === 'en' && $this->attributes['title4_en']) {
            return $this->attributes['title4_en'];
        }
        if ($locale === 'zh' && $this->attributes['title4_zh']) {
            return $this->attributes['title4_zh'];
        }
        return $value;
    }

    /**
     * Lấy tiêu đề 5 theo locale hiện tại
     */
    public function getTitle5Attribute($value)
    {
        $locale = app()->getLocale();
        if ($locale === 'en' && $this->attributes['title5_en']) {
            return $this->attributes['title5_en'];
        }
        if ($locale === 'zh' && $this->attributes['title5_zh']) {
            return $this->attributes['title5_zh'];
        }
        return $value;
    }

    /**
     * Lấy tiêu đề 6 theo locale hiện tại
     */
    public function getTitle6Attribute($value)
    {
        $locale = app()->getLocale();
        if ($locale === 'en' && $this->attributes['title6_en']) {
            return $this->attributes['title6_en'];
        }
        if ($locale === 'zh' && $this->attributes['title6_zh']) {
            return $this->attributes['title6_zh'];
        }
        return $value;
    }

    /**
     * Lấy tiêu đề 7 theo locale hiện tại
     */
    public function getTitle7Attribute($value)
    {
        $locale = app()->getLocale();
        if ($locale === 'en' && $this->attributes['title7_en']) {
            return $this->attributes['title7_en'];
        }
        if ($locale === 'zh' && $this->attributes['title7_zh']) {
            return $this->attributes['title7_zh'];
        }
        return $value;
    }

    /**
     * Lấy tiêu đề 8 theo locale hiện tại
     */
    public function getTitle8Attribute($value)
    {
        $locale = app()->getLocale();
        if ($locale === 'en' && $this->attributes['title8_en']) {
            return $this->attributes['title8_en'];
        }
        if ($locale === 'zh' && $this->attributes['title8_zh']) {
            return $this->attributes['title8_zh'];
        }
        return $value;
    }
}
