<?php
namespace App\Actions;

use Exception;
use Illuminate\Support\Facades\Storage;
use App\DataTransferObjects\PokemonIndexDTO;

class IndexPokemonAction extends PokemonAction
{
    public function getPokemonData():PokemonIndexDTO
    {
        $this->uploadPokemonImages();
        return new PokemonIndexDTO(
            results:$this->connectToApi()->results,
        );
    }
    //store image of pokemons to the public path 
    public function uploadPokemonImages()
    {
        $pokemons = $this->connectToApi()->results;
        foreach($pokemons as $pokemonId => $pokemon)
        {
            if(!file_exists(storage_path().'/app/public/Pokemons/Images/'.$pokemon->name.'.png'))
            {
                $url = $this->connectToApi($pokemon->name)->sprites->front_shiny;
                $contents = file_get_contents($url);
                $name = $pokemon->name.substr($url,strrpos($url, "."));
                Storage::put('/public/Pokemons/Images/'.$name, $contents);
            }
        }
    }
}
