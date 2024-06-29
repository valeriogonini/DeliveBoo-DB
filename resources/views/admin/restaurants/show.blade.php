@extends('layouts.app')

@section('content')
<div class="card">
    <img src="" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">{{$restaurant->name}}</h5>
        <p>{{$restaurant->address}}</p>                       
    </div>

    <div class="col mt-4">
        <h3>{{ __('Dishes') }}</h3>
        @if($restaurant->dishes->isEmpty())
            <p>No dishes available for this restaurant.</p>
        @else
            <ul>
                @foreach($restaurant->dishes as $dish)
                    <li>
                        <p><strong>{{ $dish->name }}</strong></p>
                        <p>{{ $dish->description }}</p>
                        @if($dish->image)
                            <img src="{{ asset('storage/' . $dish->image) }}" alt="{{ $dish->name }}" style="max-width: 100px; max-height: 100px;">
                        @else
                            <p>Nessuna immagine</p>
                        @endif
                    </li>
                @endforeach
            </ul>
        @endif

        <a class="btn btn-success" href="{{ url('admin/dishes/create') }}">Nuovo piatto</a>
    </div>
</div>
@endsection