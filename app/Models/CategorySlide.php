<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategorySlide extends Model
{
    protected $fillable = [
        'category_id',
        'title',
        'image',
        'link',
        'sort_order',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
