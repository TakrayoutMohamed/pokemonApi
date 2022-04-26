<?php

namespace App\Http\Controllers;

use App\Actions\IndexPokemonAction;
use App\Actions\DetailPokemonAction;
use App\Actions\SearchPokemonAction;
use App\Http\Requests\SearchPokemonRequest;

class PokemonController extends Controller
{
    public function index(IndexPokemonAction $pokemonAction) 
    {
        $pokemons = $pokemonAction->getPokemonData();

        return view('pokemon.index',compact('pokemons'));
    }

    public function detail($pokemonName,DetailPokemonAction $detailPokemonAction)
    {
        $detailPokemon = $detailPokemonAction->getPokemonDetail($pokemonName);

        return view('pokemon.detail',compact('detailPokemon'));
    }

    public function search(SearchPokemonRequest $request,SearchPokemonAction $searchPokemonAction)
    {
        $pokemons = $searchPokemonAction->searchPokemon($request->search);
        $pokemonExist=$pokemons['pokemonExist'] ? '' : 'no record data with name "'.$request->search.'"';
        $pokemons['results']=$pokemons['pokemonsfinded'] ;
        return view('pokemon.index',compact('pokemons','pokemonExist'));
    }
}
