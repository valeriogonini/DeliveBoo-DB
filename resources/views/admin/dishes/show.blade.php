@extends('layouts.app')
@section('name', 'show')

@section('content')
<div class="container pt-5">
    <div class="card">
        <div class="row">
            <div class="col-sm-5">
                <div class="justify-content-center d-flex align-items-center">
    
                    @if (!$dish->image)
                        <img style="width:100%" src="../../img/notfound.png">
                    @else
                        <img style="width:100%" src="{{asset('storage/' . $dish->image)}}">
                    @endif
    
    
                </div>
            </div>
            <div class="col-sm-7">
                <div class="card-body">
                    <h5 class="my-1 card-title"><strong>Nome:</strong> {{$dish->name}}</h5>
                    <p class="my-1"><strong>Disponibilità:</strong>
                        {{$dish->availability ? 'disponibile' : 'non disponibile'}}</p>
                    <p class="my-1"><strong>Prezzo:</strong> {{$dish->price}} €</p>
     
                    <p class="pt-3 pe-5"><strong>Descrizione:</strong> {{$dish->description}}</p>
    
                </div>
            </div>
    
        </div>
    </div>


    <div class="d-flex justify-content-between mt-3">
        <div>
            <a class="btn btn-secondary" href="{{ route('admin.dishes.index') }}">Indietro</a>
            <a href="{{ route('admin.dishes.edit', $dish)}}" class="btn btn-bg ms_btn">Modifica</a>
        </div>
        <div>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                data-bs-target="#exampleModal{{$dish->id}}">
                Elimina
            </button>

            <div class="modal fade" id="exampleModal{{$dish->id}}" tabindex="-1"
                aria-labelledby="exampleModalLabel{{$dish->id}}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel{{$dish->id}}">Attenzione</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Vuoi davvero eliminare {{ $dish->name }}?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>

                            <form class="delete-dish" action="{{ route('admin.dishes.destroy', $dish) }}"
                                method="POST">


                                @method('DELETE')
                                @csrf

                                <button class="btn btn-danger">Elimina</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

@endsection

<style>
    .ms_btn:hover{
        color: white !important;
    }
    .btn-bg {
        background-color: #FAAF4D !important;
        color: white;

    }
</style>