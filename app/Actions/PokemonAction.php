<?php

namespace App\Actions;

use GuzzleHttp\Client;

class PokemonAction
{
    protected $client;
    public function __construct(Client $client)
    {
        $this->client=$client;
    }
}