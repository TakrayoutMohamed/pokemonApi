<?php
namespace App\Actions;


class DetailPokemonAction extends PokemonAction
{
    

    public function getPokemonDetail(string $pokemonName):array
    {
        $data = $this->client->get('https://pokeapi.co/api/v2/pokemon/'.$pokemonName);
        $detaildata=json_decode((string) $data->getBody());


        
        return [
            'abilities'=>$detaildata->abilities,
            'height'=>$detaildata->height,
            'weight'=>$detaildata->weight,
            'base_experience'=>$detaildata->base_experience,
            'stats'=>$detaildata->stats,
            'moves'=>$detaildata->moves,
        ];
    }
}