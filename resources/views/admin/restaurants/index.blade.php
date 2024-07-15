@extends('layouts.app')
@section('content')

<div class="container mt-4">
    <h1 class="my-3 fs-1"><strong>IL MIO RISTORANTE</strong></h1>

    @if($restaurants->isEmpty())
        <p>Non hai ristoranti registrati.</p>
        <a class="btn btn-warning ms_new_btn" href="{{ url('admin/restaurants/create') }}">Nuovo ristorante</a>

    @else
        @foreach($restaurants as $restaurant)
            <div class="card mb-2 restaurant_card" style="max-width: 1000px">
                <div class="card-head">
                    @if (!$restaurant->image)
                    <img style="width:100%" src="../../img/notfound.png">
                @else
                    <img src="{{asset('storage/' . $restaurant->image)}}" class="card-img-top" alt="{{ $restaurant->name }}"
                        style="">
                @endif
                </div>
               


                <div class="card-body d-flex">
                    <div>
                        <h4 class="card-title"><strong>Nome del ristorante: </strong>{{$restaurant->name}}</h4>
                        <h5><strong>Indirizzo: </strong> {{$restaurant->address}}</h5>
                    </div>

                    <a href="{{ route('admin.restaurants.show', $restaurant) }}"
                        class="btn ms_btn btn-bg me-0 ms-auto align-self-center" style="">Dettagli</a>
                </div>
            </div>
        @endforeach
    @endif
</div>

@endsection

<style lang="scss" scoped>
    .card-img-top{
      height: 100%;
      object-fit: cover;
    }
    .card-head{
        height: 450px;
        width: 100%;
    }
    
    .restaurant_card {
        box-shadow: 0 0 8px lightgrey;
    }

    .ms_btn {
        height: 100%;
    }

    .ms_btn:hover {
        color: white !important;
    }

    .ms_new_btn:hover {
        color: white !important;
    }
    .btn-bg {
        background-color: #FAAF4D !important;
        color: white;

    }
</style>