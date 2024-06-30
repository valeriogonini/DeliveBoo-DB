@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card mb-2 p-3" style="width: 300px">
        @if($dish->image)
            <img src="{{ $dish->image }}" alt="{{ $dish->name }}" class="card-img-top" style=" max-height: 200px;">
        @else
            <p>Nessuna immagine</p>
        @endif
        <div class="card-body">
            <p class="card-title"><strong>{{ $dish->name }}</strong></p>
            <p class="card-text">{{ $dish->description }}</p>
            <p>{{$dish->availability ? 'disponibile' : 'non disponibile'}}</p>
            <p>{{$dish->price}}</p>
        </div>
    </div>
    <a class="btn btn-primary me-4" href="{{ route('admin.restaurants.show', $dish->restaurant->id) }}">Torna al menu</a>

</div>

@endsection




















