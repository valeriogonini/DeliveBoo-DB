@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        {{ ('Dashboard') }}
    </h2>

    @if (!$restaurants->isEmpty())
        @foreach($restaurants as $restaurant)
                <div class="row justify-content-center">
                    <div class="col">
                        <div class="card">
                            <div class="card-header"><strong>{{ $restaurant->name }}</strong></div>

                            <div class="card-body d-flex justify-content-between">
                                <p>{{$restaurant->address}}</p>
                                <a class="btn btn-warning me-4 ms_btn" href="{{ route('admin.restaurants.show', $restaurant) }}">Dettagli</a>
                            </div>
                        </div>
                    </div>
                </div>
        @endforeach
    @else 
        <h3>Non hai nessun ristorante</h3>
        <a class="btn btn-warning ms_btn" href="{{ url('admin/restaurants/create') }}">Nuovo ristorante</a>
    @endif

    <h1>I miei ordini</h1>
    <table class="table custom-table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome Cliente</th>
            <th scope="col">Numero di telefono</th>
            <th scope="col">Email</th>
            <th scope="col">Indirizzo</th>
            <th scope="col">Totale Ordine</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($myOrders as $order)
                <tr>
                    <th>{{$order->id}}</th>
                    <td>{{$order->customer_name}}</td>
                    <td>{{$order->phone_number}}</td>
                    <td>{{$order->email}}</td>
                    <td>{{$order->address}}</td>
                    <td>{{$order->total_price}} €</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection

<style>
    .ms_btn:hover {
        color: white !important;
    }

    <style>
    .container {
        margin-top: 30px;
    }
    
    .custom-table {
        width: 100%;
        margin-top: 20px;
        border-collapse: collapse;
        font-size: 16px;
        background-color: #f9f9f9;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    
    .custom-table th, .custom-table td {
        padding: 12px 15px;
        text-align: left;
        border: 1px solid #ddd;
    }
    
    .custom-table thead th {
        background-color: #FAAF4D;
        color: white;
    }
    
    .custom-table tbody tr:nth-of-type(even) {
        background-color: #f2f2f2;
    }
    
    .custom-table tbody tr:hover {
        background-color: #e2e2e2;
    }
    
    .custom-table th {
        font-weight: bold;
    }
    
    .custom-table td {
        color: #555;
    }
    
    .custom-table th, .custom-table td {
        text-align: center;
    }
    
    .custom-table thead th {
        text-transform: uppercase;
        letter-spacing: 0.1em;
    }
</style>
