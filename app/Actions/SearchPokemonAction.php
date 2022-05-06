<?php 
namespace App\Actions;

use Illuminate\Support\Str;
use App\DataTransferObjects\PokemonFindedDTO;
use App\DataTransferObjects\PokemonSearchDTO;

class SearchPokemonAction extends PokemonAction
{
    public function searchPokemon(PokemonSearchDTO $pokemonSearchDTO):PokemonFindedDTO
    {
        $pokemonData = $this->connectToApi();
        $pokemonsfinded=[];
        $pokemonExist=false;
        foreach ($pokemonData->results as $key => $pokemon) {
            if(Str::contains(Str::upper($pokemon->name),Str::upper($pokemonSearchDTO->search)))
            {
                $pokemonsfinded[$key]=$pokemon;
            }
        }
        $pokemonsfinded ? $pokemonExist=true :($pokemonsfinded=$pokemonData->results); 
        return new PokemonFindedDTO(
            pokemonsfinded: $pokemonsfinded,
            pokemonExist:$pokemonExist
        );
    }
}