@extends('layouts.app')
@section('content')


<div class="container">
    <div class="row">

        @foreach ($dishes as $dish)
            <div class="col-4">
                <a href="{{route('admin.dishes.show', $dish)}}">
                    <div class="card">
                        <div class="card-head justify-content-center">

                            @if (!$dish->image)
                                <img style="width:100%" src="../img/notfound.png">
                            @else
                                <img src="{{$dish->image}}">
                            @endif
                        </div>
                        <div class="card-body">

                            <p><strong>Nome:</strong> {{$dish->name}}</p>
                            <p><strong>Descrizione:</strong> {{$dish->description}}</p>
                            <p><strong>Prezzo:</strong> {{$dish->price}} €</p>
                            <p><strong>Disponibilità:</strong> @if ($dish->availability == 1)
                                Disponibile
                            @else
                                Non Disponibile
                            @endif
                            </p>

                        </div>


                    </div>
                </a>


            </div>
        @endforeach
    </div>
</div>


@endsection