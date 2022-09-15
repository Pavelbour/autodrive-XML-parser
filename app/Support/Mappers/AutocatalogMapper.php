<?php

namespace App\Support\Mappers;

use SimpleXMLElement;

class AutocatalogMapper implements MapperInterface
{
    private array $fields = [
        'id',
        'mark',
        'model',
        'generation',
        'year',
        'run',
        'color',
        'body_type',
        'engine_type',
        'transmission',
        'gear_type',
        'generation_id',
    ];

    public function processFields(SimpleXMLElement $element): array
    {
        return [
            'id' => $element->id,
            'mark' => $element->mark,
            'model' => $element->model,
            'generation' => $element->generation,
            'year' => $element->year,
            'run' => $element->run,
            'color' => $element->color,
            'body_type' => $element->{'body-type'},
            'engine_type' => $element->{'engine-type'},
            'transmission' => $element->transmission,
            'gear_type' => $element->{'gear-type'},
            'generation_id' => strlen($element->{'generation_id'}->__toString()) == 0 ? null : $element->{'generation_id'},
        ];
    }

    public function getFields(): array
    {
        return $this->fields;
    }
}