

@foreach ($pokemon as $poke)
    <li>{{$poke->nr}} - {{$poke->name}}</li>
@endforeach
