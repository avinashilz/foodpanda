@extends('frontend.layouts.app')

@section('content')

@foreach ($restaurants as $restro)
<img src="/uploads/{{$restro->image}}" height="150px" width="288px" /> <br> 
<h3> <a href="{{route('frontend.user.show', $restro->id)}}">
        {{$restro->name}}</b>
    </a></h3>
<h4>{{$restro->contact_person}}</h4>
<h4>{{$restro->phone}}</h4>
<h4>{{$restro->address}}</h4>
@endforeach
@endsection
