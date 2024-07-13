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
                    <th scope="col" class="d-none d-lg-block">Numero di telefono</th>
                    <th scope="col" class="d-none d-lg-block">Email</th>
                    <th scope="col" class="d-none d-lg-block">Indirizzo</th>
                    <th scope="col" class="d-none d-lg-block">Totale Ordine</th>
                    <th scope="col" > Dettagli</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($myOrders as $order)
                    <tr>
                        <th>{{ $order->id }}</th>
                        <td >{{ $order->customer_name }}</td>
                        <td class="d-none d-lg-block">{{ $order->phone_number }}</td>
                        <td class="d-none d-lg-block">{{ $order->email }}</td>
                        <td class="d-none d-lg-block">{{ $order->address }}</td>
                        <td class="d-none d-lg-block">{{ $order->total_price }} €</td>
                        <td><a class="btn btn-bg ms_btn" href="{{route('admin.orders.show', $order)}}">Dettagli</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <canvas id="bar-chart" width="800" height="400"></canvas>
</div>





<script>
    if (typeof $jsonMonthlyTotalPrices !== undefined) {
        $(function () {


            var jsonData = {!! isset($jsonMonthlyTotalPrices) ? json_encode($jsonMonthlyTotalPrices) : '{}' !!};
            console.log('jsonData', jsonData);
        
            const allMonths = ['Jan-2024', 'Feb-2024', 'Mar-2024', 'Apr-2024', 'May-2024', 'Jun-2024', 'Jul-2024', 'Aug-2024', 'Sep-2024', 'Oct-2024', 'Nov-2024', 'Dec-2024'];
            const labels = [];
            const data = [];

            // Initialize labels and data arrays with all months
            allMonths.forEach(function (month) {
                labels.push(month);
                // Check if there is data available for this month in jsonData
                const found = jsonData.find(function (item) {
                    return item.month === month;
                });
                if (found) {
                    data.push(found.total_price);
                } else {
                    data.push(0); // If no data found, push 0
                }
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
        color: white

    }

    .card-bg {
        background-color: #F4EFE7;
    }

    .ms_btn:hover {
        background-color: #FAAF4D;
        color: black !important;
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