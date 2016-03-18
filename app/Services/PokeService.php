<?php

namespace App\Services;

use App\Ticket;
use GuzzleHttp\Client;
use File;
use App\Pokemon;


/**
 * Description of PokeService
 *
 * @author joris
 */
class PokeService {

        public function getPokedex()
        {
            $client = new Client([
                    'base_uri' => getenv('POKEAPI_BASE_URI'),
            ]);
            $response = $client->request('GET', 'pokedex/kanto');
            $list = $response->getBody();

            //dd(json_decode($list));

            $pokedex = json_decode($list);
            // dd($pokedex->pokemon_entries);

            foreach ($pokedex->pokemon_entries as $singlePokemon) {
                $pokemon = new Pokemon;
                $pokemon->name = $singlePokemon->pokemon_species->name;
                $pokemon->nr = $singlePokemon->entry_number;
                $pokemon->save();
            }
            // foreach ($pokemonlist as $singlePokemon) {
            //     $pokemon = new Pokemon;
            //     $pokemon->name = $singlePokemon->pokemon_species->name;
            //     $pokemon->id = $singlePokemon->entry_number;
            //     $pokemon->save();
            // }

            // return $pokedex->pokemon_entries;
        }
}
