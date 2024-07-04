@extends('layouts.app')

@section('content')
<div class="container pt-5">
    <div class="card restaurant_card">
        <div class="row" style="width:">
            <div class="col-6"> 
                <img src="{{asset('storage/' . $restaurant->image)}}" class="img-fluid" alt="{{ $restaurant->name }}" style="">
    
            </div>
    
            <div class="col-6">
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
        <a class="btn btn-secondary me-2" href="{{ route('admin.restaurants.index') }}">Indietro</a>
        <a class="btn btn-warning ms_btn" href="{{ route('admin.dishes.index') }}">Menu</a>
    </div>
</div>

@endsection

<style>
    .restaurant_card{
        box-shadow: 0 0 8px lightgrey;
    }

    .ms_btn:hover {
        color: white !important;
    }
</style>