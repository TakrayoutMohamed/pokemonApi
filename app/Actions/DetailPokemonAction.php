<?php
namespace App\Actions;

use App\DataTransferObjects\PokemonDetailDTO;

class DetailPokemonAction extends PokemonAction
{
    public function getPokemonDetail(string $pokemonName):PokemonDetailDTO
    {
        return new PokemonDetailDTO(
            height :$this->connectToApi($pokemonName)->height,
            weight :$this->connectToApi($pokemonName)->weight,
            abilities :$this->connectToApi($pokemonName)->abilities,
            base_experience :$this->connectToApi($pokemonName)->base_experience,
            stats  :$this->connectToApi($pokemonName)->stats,
            moves  : $this->connectToApi($pokemonName)->moves,
        );
    }
}