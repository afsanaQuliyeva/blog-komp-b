<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory, Sluggable;
    const PAGE_COUNT = 7;
    protected $fillable = [
        'title',
        'slug',
        'content',
        'image',
        'desc'
    ];
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function getCategories() {
        return $this->belongsToMany(Category::class, 'article_category', );
    }

}
