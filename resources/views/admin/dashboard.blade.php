@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        {{ ('Dashboard') }}
    </h2>

    @if (!$restaurants->isEmpty())
        @foreach($restaurants as $restaurant)
                <div class="row justify-content-center">
                    <div class="col">
                        <div class="card">
                            <div class="card-header"><strong>{{ $restaurant->name }}</strong></div>

                            <div class="card-body d-flex justify-content-between">
                                <p>{{$restaurant->address}}</p>
                                <a class="btn btn-warning me-4 ms_btn" href="{{ route('admin.restaurants.show', $restaurant) }}">Dettagli</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else 
        <h3>Non hai nessun ristorante</h3>
        <a class="btn btn-primary" href="{{ url('admin/restaurants/create') }}">Nuovo ristorante</a>
    @endif
@endsection

<style>
    .ms_btn:hover {
        color: white !important;
    }
</style>
