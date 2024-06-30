@extends('layouts.app')

@section('content')
<div class="container">
    <img src="" class="card-img-top" alt="...">
    <div class="">
        <h1 class="card-title">{{$restaurant->name}}</h1>
        <p>{{$restaurant->address}}</p>                       
    </div>

    <div class="col mt-4">
        <h3>{{ __('Dishes') }}</h3>
        @if($restaurant->dishes->isEmpty())
            <p>No dishes available for this restaurant.</p>
        @else
            <ul>
                @foreach($restaurant->dishes as $dish)
                    <div class="card mb-2 p-3">
                        <p><strong>{{ $dish->name }}</strong></p>
                        <p>{{ $dish->description }}</p>
                        <p>{{$dish->availability ? 'disponibile' : 'non disponibile'}}</p>
                        @if($dish->image)
                            <img src="{{ asset('storage/' . $dish->image) }}" alt="{{ $dish->name }}" style="max-width: 100px; max-height: 100px;">
                        @else
                            <p>Nessuna immagine</p>
                        @endif
                        <a class="btn btn-primary me-4" href="{{ route('admin.dishes.show', $dish) }}">dettagli piatto</a>
                    </div>
                @endforeach
            </ul>
        @endif

        <a class="btn btn-primary me-4" href="{{ route('admin.dashboard') }}">Indietro</a>
        <a class="btn btn-success" href="{{ url('admin/dishes/create') }}">Nuovo piatto</a>
    </div>
</div>
@endsection