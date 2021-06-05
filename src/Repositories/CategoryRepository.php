<?php

namespace Tperrelli\Inviare\Repositories;

use Tperrelli\Inviare\Models\Category;
use Tperrelli\Inviare\Repositories\AbstractRepository;

class CategoryRepository extends AbstractRepository
{
    protected $model = Category::class;

    public function findBySlug($slug)
    {
        $this->buildQuery()->where('slug', $slug)->firstOrFail();
        
        return $this->buildQuery()->where('slug', $slug)->first();
    }
}