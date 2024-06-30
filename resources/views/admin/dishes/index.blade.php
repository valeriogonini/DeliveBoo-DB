@extends('layouts.app')
@section('content')


<div class="container">
    <div class="row">
        @foreach ($dishes as $dish)
            
        <div class="col-3" >
            <div class="card mb-2 p-3" style="width: 300px; height:500px">
                @if($dish->image)
                    <img src="{{ $dish->image }}" alt="{{ $dish->name }}" class="card-img-top" style=" min-height: 400px;">
                @else
                    <p>Nessuna immagine</p>
                @endif
                <div class="card-body">
                    <p class="card-title"><strong>{{ $dish->name }}</strong></p>
                    <p class="card-text">{{ $dish->description }}</p>
                    <p>{{$dish->availability ? 'disponibile' : 'non disponibile'}}</p>
                    <p>€{{$dish->price}}</p>
                </div>
                <a class="btn btn-primary me-4" href="{{ route('admin.dishes.show', $dish) }}">dettagli piatto</a>
            </div>
        </div>
        
        @endforeach

    </div>
    <a href="{{ route('admin.restaurants.show', $dish->restaurant->id) }}" class="btn btn-primary">Vai al Menu</a>
</div>


@endsection




















