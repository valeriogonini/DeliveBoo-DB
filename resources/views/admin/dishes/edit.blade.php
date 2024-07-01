@extends('layouts.app')
@section('content')



<div class="container">
    <form action="{{ route('admin.dishes.update', $dish) }}" method="POST" enctype="multipart/form-data">
        {{-- Cross Site Request Forgering --}}
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input class="form-control" name="name" id="name" rows="3" placeholder="name" value="{{old('name',$dish->name)}}"> </input>
        </div>


        {{-- <div class="mb-3">
            <label for="image" class="form-label">Inserisci l'immagine del tuo ristorante</label>
            <input class="form-control" type="file" id="image" name="image">
        </div> --}}
        @if (old('image',$dish->image))
            <div class="mb-3">
                <p>Immagine corrente:</p>
                <img src="{{asset('storage/' . $dish->image)}}" style="width:400px; height: 400px;" alt="{{old('image',$dish->image)}}">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label" >Cambia immagine</label>
                <input class="form-control" type="file" id="image" name="image" value="{{old('image',$dish->image)}}">
            </div>
        @else
            <div class="mb-3">
                <label for="image" class="form-label">Immagine</label>
                <input class="form-control" type="file" id="image" name="image">
            </div>
        @endif

        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control" name="description" id="description" rows="3"
                placeholder="Descrizione"> {{old('description',$dish->description)}}</textarea>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label"><strong>price</strong></label>
            <input type="number" name="price" class="form-control" id="price" placeholder="" value="{{ old('price',$dish->price) }}">
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="availability" id="available" value="1" checked>
            <label class="form-check-label" for="available">
                Disponibile
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="availability" id="unAvailable" value="0">
            <label class="form-check-label" for="available">
                Non Disponibile
            </label>
        </div>


        <div class="d-flex justify-content-end">
            <a class="btn btn-secondary mx-2" href="{{ route('admin.dishes.show', $dish) }}">Back</a>
            <button class="btn btn-primary">Edit</button>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger mt-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    </form>
</div>

@endsection