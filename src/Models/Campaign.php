<?php

namespace Tperrelli\Inviare\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Campaign extends Model
{
    use SoftDeletes;
    
    /**
     * The attributes that are mass assignable.
     *s
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'description', 'meta_title', 'meta_description', 'meta_keywords', 'category_id', 'published_at'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'published_at' => 'datetime'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}