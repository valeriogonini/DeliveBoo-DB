@extends('layouts.app')
@section('content')




<div class="container py-4">
  <form action="{{ route('admin.restaurants.store') }}" method="POST" enctype="multipart/form-data">
    {{-- Cross Site Request Forgering --}}
    @csrf

    <div class="mb-3">
      <label for="name" class="form-label">Nome*</label>
      <input class="form-control" name="name" id="name" rows="3" placeholder="name" value="{{old('name')}}"> </input>
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Indirizzo Email*</label>
      <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp"
        placeholder="ristorante@..." value="{{old('email')}}"></input>
    </div>
    <div class="mb-3">
      <label for="p_iva" class="form-label">Partita Iva*</label>
      <input class="form-control" name="p_iva" id="p_iva" rows="3" placeholder="23457..." value="{{old('p_iva')}}">
      </input>
    </div>
    <div class="mb-3">
      <label for="address" class="form-label">Indirizzo*</label>
      <input class="form-control" name="address" id="address" rows="3" placeholder="Via Roma ,15..."
        value="{{old('address')}}">
      </input>
    </div>
    <div class="mb-3">Tipologia/e*</div>
    <div class="d-flex gap-2">
      @foreach ($types as $type)

      <div class="form-check">
      <input @checked(in_array($type->id, old('types', []))) name="types[]" class="form-check-input" type="checkbox"
        value="{{ $type->id }}" id="type-{{$type->id}}">
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
      <label for="image" class="form-label">Immagine</label>
      <input class="form-control" type="file" id="image" name="image">
    </div>




    <div class="d-flex justify-content-end">
      <a class="btn btn-secondary mx-2" href="{{ route('admin.restaurants.index') }}">Back</a>
      <button class="btn btn-primary">Create</button>
    </div>

    <div class="mb-3">
      Campi obbligatori*
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

<script>
  document.addEventListener("DOMContentLoaded", function() {
        const form = document.getElementById("createDishForm");
        const nameField = document.getElementById("name");
        const priceField = document.getElementById("price");



        const nameError = document.getElementById("name-error");
        const priceError = document.getElementById("price-error");



        function validateField(field, errorElement, validationFn) {
            field.addEventListener("input", function() {
                const errorMessage = validationFn(field.value);
                errorElement.innerText = errorMessage;
                field.classList.toggle("is-invalid", errorMessage.length > 0);
            });
        }

        function validateForm() {
            let valid = true;

            if (nameField.value.length < 3) {
                nameError.innerText = "Il nome deve avere almeno 3 caratteri.";
                nameField.classList.add("is-invalid");
                valid = false;
            } else {
                nameError.innerText = "";
                nameField.classList.remove("is-invalid");
            }

            if (priceField.value.length < 0, 4) {
                priceError.innerText = "il prezzo è troppo basso";
                priceField.classList.add("is-invalid");
                valid = false;
            }
            if
            else(priceField.value.length > 9999, 99) {
                priceError.innerText = "il prezzo è troppo alto";
                priceField.classList.add("is-invalid");
                valid = false;
            } else {
                priceError.innerText = "";
                priceField.classList.remove("is-invalid");
            }




            return valid;
        }

        validateField(nameField, nameError, value => value.length < 3 ?
            "Il nome deve avere almeno 3 caratteri." : "");
        validateField(priceField, priceError, value => value < 0, 5 ?
            "il prezzo è troppo basso" : "");
        validateField(priceField, priceError, value => value > 9999, 99 ?
            "il prezzo è troppo alto" : "");

        form.addEventListener("submit", function(event) {
            if (!validateForm()) {
                event.preventDefault(); // Previene l'invio del form
            }
        });
    });
  

   

</script>