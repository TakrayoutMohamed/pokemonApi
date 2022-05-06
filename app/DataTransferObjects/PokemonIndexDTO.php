<?php
namespace App\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class PokemonIndexDTO extends DataTransferObject
{
    public array $results;
}