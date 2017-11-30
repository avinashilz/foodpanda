@extends('backend.layouts.app')

@section('page-header')

@endsection
@section('content')

<div class="row" style="text-align: center;"> 
    
        <a class="btn btn-info" href="{{ route('admin.restaurants.create')}}">Restaurant</a>
        <a class="btn btn-info" href="{{ route('admin.additemform')}}">Item</a>
    
</div>
<div class="row">
    @foreach($restaurant as $restro)
    <div class="col-sm-6 display"> 
        <h3> Restaurant Name : <b> {{$restro->name}}</b> </h3> <br>
                    <h4> Address : {{$restro->address}} </h5> <br>
                        <h4> Contact Number : {{$restro->phone}}</h4><br>
                        <h4> Contact Person : {{$restro->contact_person}} </h4> <br>
                        <img src="/uploads/{{$restro->image}}" height="150px" width="280px" /> <br> 
                        <div class=""col-sm-4 align><a class="btn btn-warning" href="{{ route('admin.restaurants.edit',['id'=> $restro->id]) }}">Edit Restaurant</a></div>
                        <div class=""col-sm-4 align> <a class="btn btn-warning" href="{{ route('admin.edititemform',['id'=> $restro->id]) }}">Edit Item</a></div>
                        <div class=""col-sm-4 align> {{ Form::open([
                            'route' => ['admin.restaurants.destroy', $restro->id],
                            'method' => 'delete'
                        ]) }}
                            {{ csrf_field() }}
                            {{ Form::submit('Delete',['class' => 'btn btn-danger edit'])}}
                            {{ Form::close() }}
                        </div>
                        </div>
                        <br>
                        @endforeach

                        </div>
                        @endsection
