@extends('layouts.app')
@section('content')

<div class="container">
    <h1>Il mio ristorante</h1>

    @if($restaurants->isEmpty())
        <p>Non hai ristoranti registrati.</p>
        <a class="btn btn-primary" href="{{ url('admin/restaurants/create') }}">Nuovo ristorante</a>
    @else
        @foreach($restaurants as $restaurant)
            <div class="card mb-2 p-3" style="width:">
                <img src="{{$restaurant->image}}" class="card-img-top" alt="{{ $restaurant->name }}" style=" max-height: 400px;">
                <div class="card-body">
                    <h5 class="card-title">{{$restaurant->name}}</h5>
                    <p>{{$restaurant->address}}</p>
                    <a href="{{ route('admin.restaurants.show', $restaurant ) }}" class="btn btn-primary">Menu</a>                      
                </div>
            </div>
        @endforeach
    @endif
</div>

@endsection
