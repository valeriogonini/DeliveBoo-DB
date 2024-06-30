@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mb-2 p-3" style="width:">
        <img src="{{$restaurant->image}}" class="card-img-top" alt="{{ $restaurant->name }}" style=" max-height: 400px;">
        <div class="card-body">
            <h5 class="card-title">{{$restaurant->name}}</h5>
            <p>{{$restaurant->address}}</p>                     
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col mt-4">
            <h3>{{ __('Dishes') }}</h3>
            <div class="row">
                @if($restaurant->dishes->isEmpty())
                    <p>No dishes available for this restaurant.</p>
                @else
                    @foreach($restaurant->dishes as $dish)
                        <div class="col-3" >
                            <div class="card mb-2 p-3" style="width: 300px; min-height:400px">
                                @if($dish->image)
                                    <img src="{{ $dish->image }}" alt="{{ $dish->name }}" class="card-img-top" style=" min-height: 200px;">
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
                @endif
            </div>            
            <a class="btn btn-primary me-4" href="{{ route('admin.dashboard') }}">Indietro</a>
            <a class="btn btn-success" href="{{ url('admin/dishes/create') }}">Nuovo piatto</a>
        </div>
    </div>
</div>
@endsection