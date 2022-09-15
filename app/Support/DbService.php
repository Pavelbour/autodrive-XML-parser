<?php

namespace App\Support;

use App\Support\Mappers\AutocatalogMapper;
use App\Support\Mappers\MapperInterface;
use App\Models\Offer;

class DbService
{
    private MapperInterface $mapper;

    public function __construct()
    {
        $this->mapper = new AutocatalogMapper;
    }

    public function upsert(array $offersToUpsert): void
    {
        Offer::upsert($offersToUpsert, ['id'], $this->mapper->getFields());
    }

    public function purgeDb(array $idsToKeep): void
    {
        $offersToDestroy = Offer::all()->reject(function ($offer) use ($idsToKeep) {
            return in_array($offer->id, $idsToKeep);
        })->pluck('id')->all();

        Offer::destroy($offersToDestroy);
    }
}