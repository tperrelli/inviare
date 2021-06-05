<?php

namespace Tperrelli\Inviare\Repositories;

use Tperrelli\Inviare\Models\Campaign;
use Tperrelli\Inviare\Repositories\AbstractRepository;

class CampaignRepository extends AbstractRepository
{
    protected $model = Campaign::class;

    public function findBySlug($slug)
    {
        $this->buildQuery()->where('slug', $slug)->firstOrFail();
        
        return $this->buildQuery()->where('slug', $slug)->first();
    }
}