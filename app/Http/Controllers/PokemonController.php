<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Services\PokeService;
use App\Pokemon;

class PokemonController extends Controller
{


    public function index(PokeService $service)
    {
        // $service->getPokedex();
        $pokemon = Pokemon::all();

        return view('pokemon.index', compact('pokemon'));
    }
    public function create()
    {
        return view('pokemon.create');
    }
}
