@extends('layouts.app')

@section('content')
    
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>All Pokemon</h2>
                <ul id="sortable1" class="connectedSortable allPokemonList">
                @foreach ($pokemon as $poke)
                    <li id="{{$poke->id}}" class="ui-state-default list-group-item">{{$poke->id}} - {{$poke->name}}</li>
                @endforeach
                </ul>
            </div>
          
            <div class="col-md-6">
               <h2>Your Pokemon</h2>
                <ul id="sortable2" class="connectedSortable userPokemonList">
                    @foreach ($userPokemon as $uPoke)
                        <li class="ui-state-default list-group-item">{{$uPoke->id}} - {{$uPoke->name}}</li>
                    @endforeach 
                </ul>
            </div>
            <script>
                $("#sortable1, #sortable2").sortable({
                    receive: function( event, ui ) {
                        var data = ui.item.context.id;
                        $.ajax({
                            type: "POST",
                            url: 'http://pokemon.app/api/createPokemonUser?id='+data,
                            
                            success: function(){
                                console.log(data);
                                
                            },
                        });
                        
                    }
                });
            </script>
@endsection
