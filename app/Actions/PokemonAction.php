<?php

namespace App\Actions;

use GuzzleHttp\Client;

class PokemonAction
{
    protected $client;
    protected const url="https://pokeapi.co/api/v2/pokemon/";
    
    public function __construct(Client $client)
    {
        $this->client=$client;
    }
    public function connectToApi(String $pokemonName=""):Object
    {
        $data = $this->client->get(Self::url.$pokemonName);
        $detaildata=json_decode((string) $data->getBody());
        return $detaildata;
    }
}