<?php 
namespace App\Actions;

use Illuminate\Support\Str;

class SearchPokemonAction extends IndexPokemonAction
{
    public function searchPokemon(string $search):array
    {
        $pokemonData = $this->getPokemonData();
        $pokemonsfinded=[];
        $pokemonExist=false;
        foreach ($pokemonData['results'] as $key => $pokemon) {
            if(Str::contains(Str::upper($pokemon->name),Str::upper($search)))
            {
                $pokemonsfinded[$key]=$pokemon;
            }
        }
        
        $pokemonsfinded ? $pokemonExist=true :($pokemonsfinded=$pokemonData['results']); 
        
        return [
            'pokemonsfinded'=>$pokemonsfinded,
            'pokemonExist'=>$pokemonExist
        ];
    }
}