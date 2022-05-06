<?php
namespace App\DataTransferObjects;
use Spatie\DataTransferObject\DataTransferObject;

class PokemonFindedDTO extends DataTransferObject
{
    public array $pokemonsfinded;
    public bool $pokemonExist;
}