@extends('layouts.app')

@section('content')
<div class="container pt-5">
    <div class="card restaurant_card">
        <div class="row ">
            <div class="col-12 col-sm-6">
                @if (!$restaurant->image)
                    <img style="width:100%" src="../../img/notfound.png">
                @else
                    <img src="{{asset('storage/' . $restaurant->image)}}" class="card-img-top" alt="{{ $restaurant->name }}"
                        style="">
                @endif

            </div>

            <div class="col-12 col-sm-6">
                <div class="card-body">
                    <h5 class="card-title my-3"><strong>Nome del ristorante: </strong> {{$restaurant->name}}</h5>
                    <p><strong>Email: </strong> {{$restaurant->email}}</p>
                    <p><strong>Partita IVA: </strong> {{$restaurant->p_iva}}</p>
                    <p><strong>Indirizzo: </strong> {{$restaurant->address}}</p>
                    <p><strong>Tipologia: </strong></p>
                    <ul class="d-flex flex-wrap list-unstyled" style="width: 100%">
                        @foreach($restaurant->types as $type) 
                            <li style="width:50%">- {{$type->label}}</li>
                        @endforeach
                    </ul>

                </div>


            </div>
        </div>
    </div>
    <div class="py-3 d-flex justify-content-between">
        <a class="btn btn-secondary me-2" href="{{ route('admin.restaurants.index' ) }}">Indietro</a>
        <a class="btn btn-bg ms_btn" href="{{ route('admin.dishes.index') }}">Menu</a>
    </div>
</div>

@endsection

<style>
    .restaurant_card {
        box-shadow: 0 0 8px lightgrey;
    }

    .ms_btn:hover {
        background-color: #FAAF4D;
        color: black !important;
    }

     .btn-bg {
        background-color: #FAAF4D !important;
        color: white;

    }

   
</style>