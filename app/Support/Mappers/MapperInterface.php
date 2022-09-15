<?php

namespace App\Support\Mappers;

use SimpleXMLElement;

interface MapperInterface
{
    public function processFields(SimpleXMLElement $element): array;
    public function getFields(): array;
}