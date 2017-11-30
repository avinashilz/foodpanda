@extends('backend.layouts.app')

@section('page-header')
<h1>
    {{ app_name() }}
    <small>{{ trans('strings.backend.dashboard.title') }}</small>
</h1>
@endsection
@section('content')

<div class="row"> 
    <div class="col-sm-6"> 
        <a href="{{ route('admin.addrestaurantform')}}">
            {{Form::submit('Restaurant',['class' => 'btn'])}}
        </a>
        <a href="{{ route('admin.additemform')}}">
            {{Form::submit('Item',['class' => 'btn'])}}
        </a>
    </div>
</div>
<div class="row">
    @foreach($restaurant as $restro)
    <div class="col-sm-6"> 
        {{$restro->name}} <br>
        {{$restro->address}}<br>
        {{$restro->phone}}<br>
        {{$restro->contact_person}}<br>
        {{$restro->image}}<br>
        
        <img src="/uploads/{{$restro->image}}" height="150px" width="250px" /> <br> 
        <a href="{{ route('admin.edititemform',['id'=> $restro->id])  }}">
            {{Form::button('Edit',['class' => 'btn'])}} 
        </a>
        <a href="{{ route('admin.restaurant.destroy',['id'=> $restro->id])}}">
            {{Form::button('Delete',['class' => 'btn'])}}
        </a>
    </div>
    <br>
    @endforeach

</div>
@endsection
