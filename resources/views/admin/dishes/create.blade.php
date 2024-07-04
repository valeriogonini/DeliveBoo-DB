@extends('layouts.app')
@section('content')



    <div class="container">
        <form action="{{ route('admin.dishes.store') }}" method="POST" enctype="multipart/form-data" id="createDishForm">
            {{-- Cross Site Request Forgering --}}
            @csrf


            <div class="mb-3">
                <label for="name" class="form-label">Nome*</label>
                <input class="form-control" name="name" id="name" rows="3" placeholder="name"
                    value="{{ old('name') }}">
                <span class="invalid-feedback" role="alert" id="name-error"></span>
            </div>


            {{-- <div class="mb-3">
            <label for="image" class="form-label">Inserisci l'immagine del tuo ristorante</label>
            <input class="form-control" type="file" id="image" name="image">
        </div> --}}
            <div class="mb-3">
                <label for="image" class="form-label">Immagine</label>
                <input class="form-control" type="file" id="image" name="image">
            </div>


            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="form-control" name="description" id="description" rows="3" placeholder="Descrizione"> {{ old('description') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price*</label>
                <input type="number" name="price" class="form-control" id="price" placeholder="0.00"
                    value="{{ old('price') }}" step="0.01" max="9999.99" min="1">
                <span class="invalid-feedback " role="alert" id="price-error"></span>

            </div>

            <!-- <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="availability">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Default switch checkbox input</label>
                            </div> -->

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
                <a class="btn btn-secondary mx-2" href="{{ route('admin.restaurants.show', $restaurant->id) }}">Indietro</a>
                <button class="btn btn-primary">Crea</button>
            </div>

            <div class="mt-3">
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

            if (parseInt(priceField.value) <= 0) {
                priceError.innerText = "il prezzo è troppo basso";
                priceField.classList.add("is-invalid");
                valid = false;
            } else if (parseInt(priceField.value) > 9999) {
                priceError.innerText = "il prezzo è troppo alto";
                priceField.classList.add("is-invalid");
                valid = false;
            } else if (typeof priceField.value !== number) {
                priceError.innerText = "inserire un prezzo numerico";
                priceField.classList.add("is-invalid");
                valid = false;
            } else {
                priceError.innerText = "";
                priceField.classList.remove("is-invalid");
            }
            console.log(parseInt(priceField.value));
            console.log(typeof parseInt(priceField.value));



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


    // document.addEventListener("DOMContentLoaded", function() {
    //     const form = document.getElementById("createDishForm");
    //     const nameField = document.getElementById("name");
    //     const priceField = document.getElementById("price");

    //     const nameError = document.getElementById("name-error");
    //     const priceError = document.getElementById("price-error");

    //     function validateField(field, errorElement, validationFn, errorMessage) {
    //         field.addEventListener("input", function() {
    //             const isValid = validationFn(field.value);
    //             errorElement.innerText = isValid ? "" : errorMessage;
    //             field.classList.toggle("is-invalid", !isValid);
    //         });
    //     }

    //     function validateForm() {
    //         let valid = true;

    //         validateField(nameField, nameError, value => value.length >= 3, "Il nome deve avere almeno 3 caratteri.");
    //         validateField(priceField, priceError, value => parseFloat(value) >= 0.01 && parseFloat(value) <= 9999.99, "Il prezzo deve essere compreso tra 0.01 e 9999.99.");

    //         if (nameField.value.length < 3  !validateField(nameField, nameError)) {
    //             nameError.innerText = "Il nome deve avere almeno 3 caratteri.";
    //             nameField.classList.add("is-invalid");
    //             valid = false;
    //         } else {
    //             nameError.innerText = "";
    //             nameField.classList.remove("is-invalid");
    //         }

    //         const price = parseFloat(priceField.value);
    //         if (isNaN(price)  price < 0.01 || price > 9999.99) {
    //             priceError.innerText = "Il prezzo deve essere compreso tra 0.01 e 9999.99.";
    //             priceField.classList.add("is-invalid");
    //             valid = false;
    //         } else {
    //             priceError.innerText = "";
    //             priceField.classList.remove("is-invalid");
    //         }

    //         return valid;
    //     }

    //     form.addEventListener("submit", function(event) {
    //         if (!validateForm()) {
    //             event.preventDefault(); // Previene l'invio del form se la validazione non è superata
    //         }
    //     });
    // });

    //  document.addEventListener("DOMContentLoaded", function() {
    //         const form = document.getElementById("createDishForm");
    //         form.addEventListener("submit", function(event) {
    //             const name = document.getElementById("name").value;
    //             const price = document.getElementById("price").value;
    //             const errors = [];

    //             if (name.lenght < 3) {
    //                 errors.push("nome non valido");
    //             }

    //             if(price <= 0){
    //                 errors.push("il prezzo non è valido");

    //             }

    //             if (errors.length > 0) {
    //                 event.preventDefault(); // Previene l'invio del form
    //                 alert(errors.join("\n"));
    //             }
    //         });
    //     });
</script>
