<?php

namespace Tperrelli\Inviare\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *s
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'description', 'meta_name', 'meta_descripion', 'meta_keywords', 'status', 'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class, 'category_id', 'id');
    }

    public function children()
    {
        return $this->categories()->with('children');
    }
}