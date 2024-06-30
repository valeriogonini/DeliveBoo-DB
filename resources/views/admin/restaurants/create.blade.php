@extends('layouts.app')
@section('content')




<div class="container">
  <form action="{{ route('admin.restaurants.store') }}" method="POST">
    {{-- Cross Site Request Forgering --}}
    @csrf

    <div class="mb-3">
      <label for="name" class="form-label">nome</label>
      <input class="form-control" name="name" id="name" rows="3" placeholder="name" value="{{old('name')}}"> </input>
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Indirizzo Email</label>
      <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp"
        placeholder="ristorante@..." value="{{old('email')}}"></input>
    </div>
    <div class="mb-3">
      <label for="p_iva" class="form-label">Aggiungi la tua Partita Iva</label>
      <input class="form-control" name="p_iva" id="p_iva" rows="3" placeholder="23457..." value="{{old('p_iva')}}"> </input>
    </div>
    <div class="mb-3">
      <label for="address" class="form-label">inserisci l'indirizzo del tuo ristorante</label>
      <input class="form-control" name="address" id="address" rows="3" placeholder="Via Roma ,15..." value="{{old('p_iva')}}">
      </input>
    </div>
    <div class="mb-3">inserisci la/e tipologia/e del tuo ristorante</div>
    <div class="d-flex gap-2">
            @foreach ($types as $type)

              <div class="form-check">
                <input @checked( in_array($type->id, old('types',[])) ) name="types[]" class="form-check-input" type="checkbox" value="{{ $type->id }}" id="type-{{$type->id}}">
                <label class="form-check-label" for="type-{{$type->id}}">
                  {{ $type->label }}
                </label>
              </div>
                
            @endforeach
          </div>
    {{-- <div class="mb-3">
      <label for="image" class="form-label">Inserisci l'immagine del tuo ristorante</label>
      <input class="form-control" type="file" id="image" name="image">
    </div> --}}
    <div class="mb-3">
      <label for="image" class="form-label">Url image</label>
      <input type="text" name="image" class="form-control" id="image" placeholder="http://...">
    </div>




    <div class="d-flex justify-content-end">
      <a class="btn btn-secondary mx-2" href="{{ route('admin.restaurants.index') }}">Back</a>
      <button class="btn btn-primary">Create</button>
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