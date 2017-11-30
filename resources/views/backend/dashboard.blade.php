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
        <a class="btn btn-primary" href="{{ route('admin.restaurants.create')}}">Restaurant</a>
        <a class="btn btn-primary" href="{{ route('admin.additemform')}}">Item</a>
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
                        <a class="btn btn-info" href="{{ route('admin.restaurants.edit',['id'=> $restro->id]) }}">Edit Restaurant</a>
                        <a class="btn btn-info" href="{{ route('admin.edititemform',['id'=> $restro->id]) }}">Edit Item</a>
                        {{ Form::open([
                            'route' => ['admin.restaurants.destroy', $restro->id],
                            'method' => 'delete'
                        ]) }}
                        {{ csrf_field() }}
                        {{ Form::submit('Delete',['class' => 'btn btn-danger'])}}
                        {{ Form::close() }}

                        </div>
                        <br>
                        @endforeach

                        </div>
                        @endsection
