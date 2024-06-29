@extends('layouts.app')
@section('content')

<div class="card mb-2 p-3">
    <p><strong>{{ $dish->name }}</strong></p>
    <p>{{ $dish->description }}</p>
    @if($dish->image)
        <img src="{{ asset('storage/' . $dish->image) }}" alt="{{ $dish->name }}" style="max-width: 100px; max-height: 100px;">
    @else
        <p>Nessuna immagine</p>
    @endif
    <a class="btn btn-primary me-4" href="{{ route('admin.restaurants.show', $dish->restaurant->id) }}">Torna al menu</a>
</div>

@endsection




















