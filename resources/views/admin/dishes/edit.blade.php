@extends('layouts.app')
@section('content')



<div class="container">
    <form action="{{ route('admin.dishes.update', $dish) }}" method="POST" enctype="multipart/form-data">
        {{-- Cross Site Request Forgering --}}
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label"><strong>Nome*</strong></label>
            <input class="form-control" name="name" id="name" rows="3" placeholder="name" value="{{old('name',$dish->name)}}">
            <span class="invalid-feedback" role="alert" id="name-error">ciao</span>

        </div>


        {{-- <div class="mb-3">
            <label for="image" class="form-label">Inserisci l'immagine del tuo ristorante</label>
            <input class="form-control" type="file" id="image" name="image">
        </div> --}}
        @if (old('image',$dish->image))
            <div class="mb-3">
                <p>Immagine corrente:</p>
                <img src="{{asset('storage/' . $dish->image)}}" style="width:300px; " alt="{{old('image',$dish->image)}}">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label" ><strong>Cambia immagine</strong></label>
                <input class="form-control" type="file" id="image" name="image" value="{{old('image',$dish->image)}}">
            </div>
        @else
            <div class="mb-3">
                <label for="image" class="form-label"><strong>Immagine</strong></label>
                <input class="form-control" type="file" id="image" name="image">
            </div>
        @endif

        <div class="mb-3">
            <label for="description" class="form-label"><strong>Descrizione</strong></label>
            <textarea class="form-control" name="description" id="description" rows="3"
                placeholder="Descrizione"> {{old('description',$dish->description)}}</textarea>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label"><strong>price*</strong></label>
            <input type="number" name="price" class="form-control" id="price" placeholder="" value="{{ old('price',$dish->price) }}"  max="9999.99" min="1">
            <span class="invalid-feedback " role="alert" id="price-error"></span>

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

        <div class="mt-3">
            <strong>Campi obbligatori*</strong>
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

            if ( parseInt( priceField.value ) < 0) {
                priceError.innerText = "il prezzo è troppo basso";
                priceField.classList.add("is-invalid");
                valid = false;
            } else if ( parseInt( priceField.value ) > 9999) {
                priceError.innerText = "il prezzo è troppo alto";
                priceField.classList.add("is-invalid");
                valid = false;
            } else {
                priceError.innerText = "";
                priceField.classList.remove("is-invalid");
            }
            console.log( priceField.value );
            console.log(nameField.value);

            return valid;
        }
        

        validateField(nameField, nameError, value => value.length < 3 ?
            "Il nome deve avere almeno 3 caratteri." : "");
        validateField(priceField, priceError, value => value < 0 ?
            "il prezzo è troppo basso" : "");
        validateField(priceField, priceError, value => value > 9999 ?
            "il prezzo è troppo alto" : "");

        form.addEventListener("submit", function(event) {
            if (!validateForm()) {
                event.preventDefault(); // Previene l'invio del form
            }
        });
    });
</script>