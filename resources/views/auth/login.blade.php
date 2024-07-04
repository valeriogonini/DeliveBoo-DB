@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Accedi') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" id="loginForm">
                        @csrf

                        <div class="mb-4 row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>Dati inseriti errati</strong>
                                </span>
                                @enderror
                                <span class="invalid-feedback" role="alert" id="email-error"></span>
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <span class="invalid-feedback" role="alert" id="password-error"></span>
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Ricordami') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4 row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Accedi') }}
                                </button>

                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Non ricordi la tua password?') }}
                                </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


<script>
    document.addEventListener("DOMContentLoaded", function() {
        const form = document.getElementById("loginForm");
        const emailField = document.getElementById("email");
        const passwordField = document.getElementById("password");

        const emailError = document.getElementById("email-error");
        const passwordError = document.getElementById("password-error");


        function validateField(field, errorElement, validationFn) {
            field.addEventListener("input", function() {
                const errorMessage = validationFn(field.value);
                errorElement.innerText = errorMessage;
                field.classList.toggle("is-invalid", errorMessage.length > 0);
            });
        }

        function validateForm() {
            let valid = true;

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

            return valid;
        }

        validateField(emailField, emailError, value => !/^[^\s@]+@[^\s@]+.[^\s@]+$/.test(value) ? "L'email non è valida." : "");
        validateField(passwordField, passwordError, value => value.length < 8 ? "La password deve avere almeno 8 caratteri." : "");

        form.addEventListener("submit", function(event) {
            if (!validateForm()) {
                event.preventDefault(); // Previene l'invio del form
            }
        });
    });
</script>
