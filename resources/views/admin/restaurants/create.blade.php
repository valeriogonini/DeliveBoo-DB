@extends('layouts.app')
@section('content')




    <div class="container py-4">
        <form action="{{ route('admin.restaurants.store') }}" method="POST" enctype="multipart/form-data"
            id="createRestaurantForm">
            {{-- Cross Site Request Forgering --}}
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nome<span class="required">*</span></label>
                <input class="form-control" name="name" id="name" rows="3" placeholder="name"
                    value="{{ old('name') }}">
                <span class="invalid-feedback" role="alert" id="name-error"></span>

            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Indirizzo Email<span class="required">*</span></label>
                <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp"
                    placeholder="ristorante@..." value="{{ old('email') }}">
                <span class="invalid-feedback" role="alert" id="email-error"></span>

            </div>
            <div class="mb-3">
                <label for="p_iva" class="form-label">Partita Iva<span class="required">*</span></label>
                <input class="form-control" name="p_iva" id="p_iva" rows="3" placeholder="23457..."
                    value="{{ old('p_iva') }}">
                <span class="invalid-feedback" role="alert" id="p_iva-error"></span>

            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Indirizzo<span class="required">*</span></label>
                <input class="form-control" name="address" id="address" rows="3" placeholder="Via Roma ,15..."
                    value="{{ old('address') }}">
                <span class="invalid-feedback" role="alert" id="address-error"></span>

            </div>
            <div class="mb-3">Tipologia/e<span class="required">*</span></div>
            <div class="d-flex gap-2">
                @foreach ($types as $type)
                    <div class="form-check">
                        <input @checked(in_array($type->id, old('types', []))) name="types[]" class="form-check-input" type="checkbox"
                            value="{{ $type->id }}" id="type-{{ $type->id }}">
                        <label class="form-check-label" for="type-{{ $type->id }}">
                            {{ $type->label }}
                        </label>

                    </div>
                    
                @endforeach

            </div>
            <span class="invalid-feedback my-3" role="alert" id="type-error"></span>

            {{-- <div class="mb-3">
      <label for="image" class="form-label">Inserisci l'immagine del tuo ristorante</label>
      <input class="form-control" type="file" id="image" name="image">
    </div> --}}
            <div class="mb-3">
                <label for="image" class="form-label">Immagine</label>
                <input class="form-control" type="file" id="image" name="image">
            </div>




            <div class="d-flex justify-content-end">
                <a class="btn btn-secondary mx-2" href="{{ route('admin.restaurants.index') }}">Indietro</a>
                <button class="btn btn-bg">Crea Ristorante</button>
            </div>

            <div class="mb-3 required">
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
        const form = document.getElementById("createRestaurantForm");
        const nameField = document.getElementById("name");
        const emailField = document.getElementById("email");
        const p_ivaField = document.getElementById("p_iva");
        const addressField = document.getElementById("address");
        const checkboxes = document.querySelectorAll('input[name="types[]"]');



        const nameError = document.getElementById("name-error");
        const emailError = document.getElementById("email-error");
        const p_ivaError = document.getElementById("p_iva-error");
        const addressError = document.getElementById("address-error");
        const typeError = document.getElementById("type-error");


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

            const emailPattern = /^[^\s@]+@[^\s@]+.[^\s@]+$/;
            if (!emailPattern.test(emailField.value)) {
                emailError.innerText = "L'email non è valida.";
                emailField.classList.add("is-invalid");
                valid = false;
            } else {
                emailError.innerText = "";
                emailField.classList.remove("is-invalid");
            }

            if (p_ivaField.value.length !== 11) {
                p_ivaError.innerText = "p_iva non valida";
                p_ivaField.classList.add("is-invalid");
                valid = false;
            } else {
                p_ivaError.innerText = "";
                p_ivaField.classList.remove("is-invalid");
            }

            if (addressField.value.length < 3) {
                addressError.innerText = "indirizzo non valido";
                addressField.classList.add("is-invalid");
                valid = false;
            } else {
                addressError.innerText = "";
                addressField.classList.remove("is-invalid");
            }

            let isTypeChecked = false;
            checkboxes.forEach((checkbox) => {
                if (checkbox.checked) {
                    isTypeChecked = true;
                }
            });

            if (!isTypeChecked) {
                typeError.innerText = "Seleziona almeno una tipologia.";
                typeError.style.display = "block";
                valid = false;
            } else {
                typeError.innerText = "";
                typeError.style.display = "none";
            }

            return valid;
        }

        validateField(nameField, nameError, value => value.length < 3 ? "Il nome deve avere almeno 3 caratteri." : "");
        validateField(emailField, emailError, value => !/^[^\s@]+@[^\s@]+.[^\s@]+$/.test(value) ? "L'email non è valida." : "");
        validateField(p_ivaField, p_ivaError, value => value.length !== 11 ? "La partita IVA deve avere 11 caratteri." : "");
        validateField(addressField, addressError, value => value.length < 3 ? "L'indirizzo deve avere almeno 3 caratteri." : "");

        form.addEventListener("submit", function(event) {
            if (!validateForm()) {
                event.preventDefault(); // Previene l'invio del form
            }
        });
    });
</script>

<style>
    .ms_btn:hover {
        color: white !important;
    }
    .required {
        color: red
    }
    .btn-bg {
        background-color: #FAAF4D !important;
        color: white;

    }
</style>
