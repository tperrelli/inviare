<?php

namespace Tperrelli\Inviare;

use Illuminate\Support\Str;
use Tperrelli\Inviare\Repositories\CampaignRepository;
use Tperrelli\Inviare\Repositories\CategoryRepository;
use Tperrelli\Inviare\Exceptions\InvalidCategoryException;

class Inviare
{
    public function __construct(
        CampaignRepository $campaign,
        CategoryRepository $category
    )
    {
        $this->campaign = $campaign;
        $this->category = $category;
    }

    public function newCategory($data)
    {
        if (is_null($data['slug'] ?? null)) $data['slug'] = Str::slug($data['name']);

        return $this->category->create($data);
    }

    public function updateCagegory($id, $data)
    {
        return $this->category->update($id, $data);
    }

    public function newCampaign($data)
    {
        if (is_null($data['slug'] ?? null)) $data['slug'] = Str::slug($data['name']);
        
        return $this->campaign->create($data);
    }

    public function updateCampaign($id, $data)
    {
        return $this->campaign->update($id, $data);
    }
}
