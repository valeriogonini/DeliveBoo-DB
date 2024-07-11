@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="my-4 m-0">
        Dashboard
    </h3>

    @if (!$restaurants->isEmpty())
        @foreach($restaurants as $restaurant)
            <div class="row justify-content-center">
                <div class="col">
                    <div class="card">
                        <div class="card-header card-bg"><strong>{{ $restaurant->name }}</strong></div>

                        <div class="card-body d-flex justify-content-between">
                            <p>{{ $restaurant->address }}</p>
                            <a class="btn me-4 ms_btn btn-bg"
                                href="{{ route('admin.restaurants.show', $restaurant) }}">Dettagli</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <h3>Non hai nessun ristorante</h3>
        <a class="btn btn-warning ms_btn " href="{{ url('admin/restaurants/create') }}">Nuovo ristorante</a>
    @endif

    @if (isset($myOrders))
        <h3 class="m-0 mt-3">Ordini ricevuti</h3>
        <table class="table custom-table mb-5">
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
                        <th>{{ $order->id }}</th>
                        <td>{{ $order->customer_name }}</td>
                        <td>{{ $order->phone_number }}</td>
                        <td>{{ $order->email }}</td>
                        <td>{{ $order->address }}</td>
                        <td>{{ $order->total_price }} €</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <canvas id="bar-chart" width="800" height="400"></canvas>
</div>





<script>
    if (typeof $jsonMonthlyTotalPricesv !== undefined) {
        $(function () {


            var jsonData = {!! isset($jsonMonthlyTotalPrices) ? json_encode($jsonMonthlyTotalPrices) : '{}' !!};
            console.log('jsonData',jsonData);
            const labels = [];
            const data = [];

            jsonData.forEach(function (item) {
                labels.push(item.month);
                data.push(item.total_price);
            });

            let ctx = document.getElementById('bar-chart').getContext('2d');

            let chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Totale per ogni mese',
                        data: data,
                        backgroundColor: '#FE8B79',
                        borderColor: '#FE8B79',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'bottom',
                            labels: {
                                fontColor: '#333',
                                fontSize: 16
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Totale Mensile',
                                color: '#333',
                                font: {
                                    size: 18,
                                    weight: 'bold'
                                }
                            }
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'Mese',
                                color: '#333',
                                font: {
                                    size: 18,
                                    weight: 'bold'
                                }
                            }
                        }
                    }
                }
            });


        });
    }

</script>

<style>
    .btn-bg {
        background-color: #FAAF4D;

    }

    .card-bg {
        background-color: #F4EFE7;
    }

    .ms_btn:hover {
        background-color: #FAAF4D;
        color: black !important;
    }

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

    .custom-table th,
    .custom-table td {
        padding: 12px 15px;
        text-align: left;
        border: 1px solid #ddd;
    }

    .custom-table thead th {
        background-color: #F4EFE7;
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

    .custom-table th,
    .custom-table td {
        text-align: center;
    }

    .custom-table thead th {
        text-transform: uppercase;
        letter-spacing: 0.1em;
    }
</style>
@endsection