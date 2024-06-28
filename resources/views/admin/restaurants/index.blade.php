@extends('layouts.app')
@section('content')

<h1>CIAO</h1>
@foreach ($restaurants as $restaurant)
    
<p>{{$restaurant->name}}</p>
<p></p>
<p></p>
@foreach($restaurant->types as $type)            
                <p>{{$type->label}}</p>
                <img src="{{$type->image}}" alt="">
            @endforeach

           
@endforeach

@endsection