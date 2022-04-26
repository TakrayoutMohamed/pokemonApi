<?php
namespace App\Actions;

class IndexPokemonAction extends PokemonAction
{
    public function getPokemonData():array
    {
        $data = $this->client->get('https://pokeapi.co/api/v2/pokemon?limit=20');
        $response_data = json_decode((string) $data->getBody());
        
        return [
            'count'=>$response_data->count,
            'results'=>$response_data->results,
            'next'=>$response_data->next,
            'previous'=>$response_data->previous
        ];
    }
}
