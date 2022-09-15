<?php

namespace App\Support;

use App\Support\Mappers\AutocatalogMapper;
use App\Support\Mappers\MapperInterface;
use SimpleXMLElement;

class XMLParser
{
    private SimpleXMLElement $xml;
    private MapperInterface $mapper;

    public function __construct(string $file)
    {
        $this->xml = simplexml_load_file($file);

        $this->mapper = new AutocatalogMapper;
    }

    public function parse(): array
    {
        $offersToUpsert = [];
        foreach($this->xml->offers->offer as $offer) {
            $offersToUpsert[] = $this->mapper->processFields($offer);
        }

        return $offersToUpsert;
    }

    public function getIds(): array
    {
        $ids = [];

        foreach($this->xml->offers->offer as $offer) {
            $ids[] = $offer->id;
        }
        
        return $ids;
    }
}