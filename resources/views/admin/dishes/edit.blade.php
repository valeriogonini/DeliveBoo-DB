@extends('layouts.app')
@section('content')



<div class="container">
    <form action="{{ route('admin.dishes.update', $dish) }}" method="POST">
        {{-- Cross Site Request Forgering --}}
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input class="form-control" name="name" id="name" rows="3" placeholder="name"> {{old('name')}}</input>
        </div>


        {{-- <div class="mb-3">
            <label for="image" class="form-label">Inserisci l'immagine del tuo ristorante</label>
            <input class="form-control" type="file" id="image" name="image">
        </div> --}}
        <div class="mb-3">
            <label for="image" class="form-label">Url image</label>
            <input type="text" name="image" class="form-control" id="image" placeholder="http://...">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control" name="description" id="description" rows="3"
                placeholder="Descrizione"> {{old('description')}}</textarea>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label"><strong>price</strong></label>
            <input type="number" name="price" class="form-control" id="price" placeholder="" value="{{ old('price') }}">
        </div>

        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="availability">
            <label class="form-check-label" for="flexSwitchCheckDefault">Default switch checkbox input</label>
        </div>



        <div class="d-flex justify-content-end">
            <a class="btn btn-secondary mx-2" href="{{ route('admin.restaurants.index') }}">Back</a>
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