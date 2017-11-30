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
    <div class="col-sm-6 display"> 
        <h3> Restaurant Name : <b> {{$restro->name}}<b> </h3> <br>
        <h4> Address : {{$restro->address}} </h5> <br>
        <h4> Contact Number : {{$restro->phone}}</h4><br>
        <h4> Contact Person : {{$restro->contact_person}} </h4> <br>
        <img src="/uploads/{{$restro->image}}" height="150px" width="250px" /> <br> 
        <a href="{{ route('admin.editrestaurantform',['id'=> $restro->id])  }}">
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
