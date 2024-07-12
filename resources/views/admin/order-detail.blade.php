@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2>Dettagli dell'Ordine</h2>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <strong>ID Ordine:</strong>
                <p class="form-control-plaintext">{{$order->id}}</p>
            </div>
            <div class="mb-3">
                <strong>Nome Cliente:</strong>
                <p class="form-control-plaintext">{{$order->customer_name}}</p>
            </div>
            <div class="mb-3">
                <strong>Numero di Telefono:</strong>
                <p class="form-control-plaintext">{{$order->phone_number}}</p>
            </div>
            <div class="mb-3">
                <strong>Email:</strong>
                <p class="form-control-plaintext">{{$order->email}}</p>
            </div>
            <div class="mb-3">
                <strong>Indirizzo:</strong>
                <p class="form-control-plaintext">{{$order->address}}</p>
            </div>
            <div class="mb-3">
                <strong>Prezzo Totale:</strong>
                <p class="form-control-plaintext">{{$order->total_price}} €</p>
            </div>
            <div class="mt-4">
                <h4>Piatti Ordinati</h4>
                <ul class="list-group">
                    @foreach ($order->dishes as $dish)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <strong>{{$dish->name}}</strong>
                            </div>
                            <span>
                                Quantità: 
                                <strong><span class=" qty-badge">{{$dish->pivot->qty}}</span></strong>
                            </span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    .card-header {
        background-color: #007bff;
        color: #fff;
    }
    .qty-badge {
        color: #f59618;

        font-size: 20px

    }
</style>
