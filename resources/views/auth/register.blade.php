@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Registrazione') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}" id="registrationForm">
                            @csrf

                            <div class="mb-4 row">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}*</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    {{-- @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror --}}
                                    <span class="invalid-feedback" role="alert" id="name-error"></span>
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <label for="last_name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Cognome') }}*</label>

                                <div class="col-md-6">
                                    <input id="last_name" type="text"
                                        class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                                        value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>
{{-- 
                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror --}}
                                    <span class="invalid-feedback" role="alert" id="lastname-error"></span>

                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}*</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    {{-- @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror --}}
                                    <span class="invalid-feedback" role="alert" id="email-error"></span>

                                </div>
                            </div>


                            <div class="mb-4 row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}*</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    {{-- @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror --}}
                                    <span class="invalid-feedback" role="alert" id="password-error"></span>
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}*</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                    <span class="invalid-feedback" role="alert" id="password-confirm-error"></span>

                                </div>
                            </div>

                            <div class="mb-4 row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Registrati') }}
                                    </button>
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <div>Campi obbligatori*</div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    //  document.addEventListener("DOMContentLoaded", function() {
    //         const form = document.getElementById("registrationForm");
    //         form.addEventListener("submit", function(event) {
    //             const password = document.getElementById("password").value;
    //             const passwordConfirm = document.getElementById("password-confirm").value;
    //             const errors = [];

    //             if (password !== passwordConfirm) {
    //                 errors.push("Le password non corrispondono.");
    //             }

    //             if (errors.length > 0) {
    //                 event.preventDefault(); // Previene l'invio del form
    //                 alert(errors.join("\n"));
    //             }
    //         });
    //     });

    document.addEventListener("DOMContentLoaded", function() {
        const form = document.getElementById("registrationForm");
        const nameField = document.getElementById("name");
        const lastNameField = document.getElementById("last_name");

        const emailField = document.getElementById("email");
        const passwordField = document.getElementById("password");
        const passwordConfirmField = document.getElementById("password-confirm");

        const nameError = document.getElementById("name-error");
        const lastNameError = document.getElementById("lastname-error");
        const emailError = document.getElementById("email-error");
        const passwordError = document.getElementById("password-error");
        const passwordConfirmError = document.getElementById("password-confirm-error");

        function validateField(field, errorElement, validationFn) {
            field.addEventListener("input", function() {
                const errorMessage = validationFn(field.value);
                errorElement.innerText = errorMessage;
                field.classList.toggle("is-invalid", errorMessage.length > 0);
            });
        }

        function validateForm() {
            let valid = true;

            if (nameField.value.length < 3 ) {
                nameError.innerText = "Il nome deve avere almeno 3 caratteri.";
                nameField.classList.add("is-invalid");
                valid = false;
            } else {
                nameError.innerText = "";
                nameField.classList.remove("is-invalid");
            }

            if (lastNameField.value.length < 3 ) {
                nameError.innerText = "Il cognome deve avere almeno 3 caratteri.";
                lastNameField.classList.add("is-invalid");
                valid = false;
            } else {
                nameError.innerText = "";
                lastNameField.classList.remove("is-invalid");
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

            if (passwordField.value.length < 8) {
                passwordError.innerText = "La password deve avere almeno 8 caratteri.";
                passwordField.classList.add("is-invalid");
                valid = false;
            } else {
                passwordError.innerText = "";
                passwordField.classList.remove("is-invalid");
            }

            if (passwordField.value !== passwordConfirmField.value) {
                passwordConfirmError.innerText = "Le password non corrispondono.";
                passwordConfirmField.classList.add("is-invalid");
                valid = false;
            } else {
                passwordConfirmError.innerText = "";
                passwordConfirmField.classList.remove("is-invalid");
            }

            return valid;
        }

        validateField(nameField, nameError, value => value.length < 3 ?
            "Il nome deve avere almeno 3 caratteri." : "");
            validateField(lastNameField, lastNameError, value => value.length < 3 ?
            "Il cognome deve avere almeno 3 caratteri." : "");
        validateField(emailField, emailError, value => !/^[^\s@]+@[^\s@]+.[^\s@]+$/.test(value) ?
            "L'email non è valida." : "");
        validateField(passwordField, passwordError, value => value.length < 8 ?
            "La password deve avere almeno 8 caratteri." : "");
        validateField(passwordConfirmField, passwordConfirmError, value => value !== passwordField.value ?
            "Le password non corrispondono." : "");

        form.addEventListener("submit", function(event) {
            if (!validateForm()) {
                event.preventDefault(); // Previene l'invio del form
            }
        });
    });
</script>
