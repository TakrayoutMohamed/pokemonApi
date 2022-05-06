<?php
namespace App\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class PokemonSearchDTO extends DataTransferObject
{
    public string $search;
}