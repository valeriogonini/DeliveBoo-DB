@extends('layouts.app')
@section('name', 'show')

@section('content')
<div class="container pt-5">
    <div class="row">
        <div class="col-3">
            <div class="justify-content-center d-flex align-items-center">

                @if (!$dish->image)
                    <img style="width:100%" src="../../img/notfound.png">
                @else
                    <img src="{{$dish->image}}">
                @endif

               
            </div>
        </div>
        <div class="col-6">
            <div class="my-0">

                <div>
                    <p class="my-1"><strong>Nome:</strong> {{$dish->name}}</p>
                    <p class="my-1"><strong>Disponibilità:</strong> {{$dish->availability ? 'disponibile' : 'non disponibile'}}</p>
                    <p class="my-1"><strong>Prezzo:</strong> {{$dish->price}} €</p>
                </div>


            </div>
        </div>
        <div class="col-12">
            <p class="pt-3 pe-5"><strong>Descrizione:</strong> {{$dish->description}}</p>
        </div>

    </div>


    <div class="d-flex justify-content-between">
        <div>
            <a class="btn btn-secondary" href="{{ route('admin.dishes.index') }}">Indietro</a>
            <a href="{{ route('admin.dishes.edit', $dish)}}" class="btn btn-primary">Modifica</a>
        </div>
        <div>
            <form action="{{ route('admin.dishes.destroy', $dish)}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Elimina</button>
            </form>
        </div>
    </div>


</div>







@endsection