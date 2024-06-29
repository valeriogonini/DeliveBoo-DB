@extends('layouts.app')
@section('content')



@foreach ($dishes as $dish)
    
<p>{{$dish->name}}</p>

@endforeach

<a href="{{ route('admin.restaurants.show', $dish->restaurant->id) }}" class="btn btn-primary">Vai al Menu</a>

@endsection




















