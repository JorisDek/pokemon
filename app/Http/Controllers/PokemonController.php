<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Services\PokeService;
use App\Pokemon;
use App\User;

class PokemonController extends Controller
{


    public function index(PokeService $service)
    {
//        $service->getPokedex();
        $userPokemon = \Auth::user()->pokemons;
        $pokemon = Pokemon::all();

        return view('pokemon.index', compact('userPokemon', 'pokemon'));
    }
    public function create()
    {
        return view('pokemon.create');
    }
    
    public function storeUserPokemon(Request $request)
    {
        $id = $request->all();
        $pokemon = Pokemon::findOrFail($id);
        \Auth::user()->pokemons()->attach($id);
        
        $pokemon = Pokemon::findOrFail($id);
        
        return $pokemon;
    }
}
