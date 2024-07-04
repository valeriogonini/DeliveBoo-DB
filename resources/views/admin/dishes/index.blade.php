@extends('layouts.app')
@section('content')



<div class="container">
<div class="d-flex justify-content-between pt-3">
<a class="btn btn-secondary" href="{{ route('admin.restaurants.show', $restaurant) }}">&#x2190;</a>
<a class="btn btn_salmon" href="{{ route('admin.dishes.create') }}">Nuovo piatto</a>
</div>

    <div class="row">
        <div class="col mt-4">
            <h3>I miei piatti</h3>
            <div class="row">
                @if($restaurant->dishes->isEmpty())
                    <p>Non ci sono piatti disponibili.</p>
                @else
                    @foreach($restaurant->dishes as $dish)
                        <div class="col-4" >
                            <div class="card mb-2 p-3" style=" height:550px">
                                @if($dish->image)
                                    <img src=" {{asset('storage/' . $dish->image)}} " alt="{{ $dish->name }}" class="card-img-top" style=" height: 250px;">
                                @else
                                <img style="width:100%; height: 250px;" src="../img/notfound.png" >
                                @endif
                                <div class="card-body">
                                    <p class="card-title"><strong>{{ $dish->name }}</strong></p>
                                    <p class="card-text">{{ Str::limit($dish->description, 100) }}</p>
                                    <p>{{$dish->availability ? 'disponibile' : 'non disponibile'}}</p>
                                    <p>€ {{$dish->price}}</p>
                                </div>
                                <a class="btn btn-warning ms_btn me-4" href="{{ route('admin.dishes.show', $dish) }}">Dettagli piatto</a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>            
            
        </div>
    </div>
</div>


@endsection

<style>

    .btn_salmon{
        background-color: #FE8B79 !important;
        color: white !important;
    }

    .btn_salmon:hover{
        background-color: #fe4e33 !important;
    }
    .ms_btn:hover {
        color: white !important;
    }
</style>