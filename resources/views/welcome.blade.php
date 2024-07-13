@extends('layouts.app')
@section('content')

    <head>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

    </head>

    <body>

        <div class="container-header">
            <div class="header">
                <h1>Benvenuto su Deliveboo admin!</h1>
                @guest
                    <h2 class="p-header">Sei un ristoratore?</h2>
                    <p class="fs-4">Entra a far parte del team Deliveboo, dove sicurezza, bellezza e praticità sono messi in
                        primo piano. Avrai tutto sotto controllo in un'unica app, sempre a portata di mano.</p>
                @endguest
            </div>

        </div>
        <div class="container">
            <div class="row justify-content-around">

                @auth
                    <div class="col justify-content-center ">
                        <div class="d-flex justify-content-center">
                            <h3>Accedi alla dashboard</h3>

                        </div>
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('admin.dashboard') }}" class="btn-cream">Dashboard</a>
                        </div>
                    </div>
                @endauth
                @guest
                    <div class="col-4 justify-content-center enter-card-blue">
                        <div class="d-flex justify-content-center">
                            <h3>Sei già nostro cliente?</h3>

                        </div>
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('login') }}" class="btn-cream">Accedi</a>
                        </div>
                    </div>
                    <div class="col-4 enter-card-red">
                        <div class="d-flex justify-content-center">
                            <h3>Vuoi entrare nel Team?</h3>
                        </div>
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('register') }}" class="btn-cream">Registrati</a>
                        </div>
                    </div>
                @endguest
            </div>
        </div>
    </body>

    </html>
@endsection

<style>
    body {
        font-family: 'Nunito', sans-serif;
        margin: 0;
        padding: 0;
    }

    a {
        text-decoration: none!important;
        color: inherit !important;
    }

    .container-header {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    .header {

        text-align: center;
    }

    .footer {
        background-color: #333;
        color: white;
        text-align: center;
        padding: 10px 0;
        position: fixed;
        bottom: 0;
        width: 100%;
    }

    .btn-cream {
        display: flex;
        flex-direction: column;
        align-items: center;
        border-radius: 20px;

        background-color: #F4EFE7;
        width: 110px;
        padding: 10px;
        cursor: pointer;

    }

    .btn-cream:hover {
        border: 1px solid black;
        box-shadow: #333
    }

    .main-center {
        text-align: center
    }

    .enter-card-red {
        padding: 20px;
        background-color: #FE8B79;
        flex: 0 0 auto;
        border-radius: 20px;
    }

    .enter-card-blue {
        padding: 20px;
        background-color: #7382C3;
        flex: 0 0 auto;
        border-radius: 20px;
    }
</style>
