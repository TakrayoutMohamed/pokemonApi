<?php
namespace App\Actions;

use App\DataTransferObjects\PokemonIndexDTO;

class IndexPokemonAction extends PokemonAction
{
    public function getPokemonData():PokemonIndexDTO
    {
        return new PokemonIndexDTO(
            results:$this->connectToApi()->results,
        );
    }
}
