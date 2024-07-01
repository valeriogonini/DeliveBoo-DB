@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mb-2 p-3 d-flex justify-content-between">
        <div class="card-body">
            <img src="{{asset('storage/' . $restaurant->image)}}" class="card-img-top" alt="{{ $restaurant->name }}" style=" max-height: 400px;">
            <h5 class="card-title"><strong>Nome del ristorante: </strong> {{$restaurant->name}}</h5>
            <p><strong>Email: </strong> {{$restaurant->email}}</p>
            <p><strong>Partita IVA: </strong> {{$restaurant->p_iva}}</p>
            <p><strong>Indirizzo: </strong> {{$restaurant->address}}</p>
            <p><strong>Tipologia: </strong></p>
            <ul>
                @foreach($restaurant->types as $type)
                <li>{{$type->label}}</li>
                @endforeach
            </ul>


        </div>
        <div>
            <a class="btn btn-secondary me-2" href="{{ route('admin.restaurants.index') }}">Indietro</a>
            <a class="btn btn-primary" href="{{ route('admin.dishes.index') }}">Menu</a>
        </div>
    </div>
</div>

@endsection