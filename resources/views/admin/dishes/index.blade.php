@extends('layouts.app')
@section('content')



@foreach ($dishes as $dish)
    
<p>{{$dish->name}}</p>
<p></p>
<p></p>

@endforeach

@endsection




















