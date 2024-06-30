@extends('layouts.app')
@section('name', 'show')

@section('content')

<div class="card">
    <div class="card-head justify-content-center">

        @if (!$dish->image)
            <img src="../../img/notfound.png">
        @else
            <img src="{{$dish->image}}">
        @endif
    </div>
    <div class="card-body">

        <p><strong>Nome:</strong> <a href="">{{$dish->name}}</a></p>
        <p><strong>Slug:</strong> {{$dish->slug}}</p>
        <p><strong>Descrizione:</strong> {{$dish->description}}</p>
        <p><strong>Prezzo:</strong> {{$dish->price}} €</p>
        <p><strong>Disponibilità:</strong> {{$dish->availability}}</p>

        <div class="d-flex justify-content-between">
            <div>
                <a class="btn btn-secondary" href="{{ route('admin.dishes.index') }}">Back</a>
                <a href="{{ route('admin.dishes.edit', $dish)}}" class="btn btn-primary">Edit</a>
            </div>
            <div>
                <form action="{{ route('admin.dishes.destroy', $dish)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>

    </div>

</div>









@endsection