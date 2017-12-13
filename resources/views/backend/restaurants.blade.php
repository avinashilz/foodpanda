@extends('backend.layouts.app')

@section('page-header')

@endsection
@section('content')

<div class="row" style="text-align: center;"> 

    <a class="btn btn-info" href="{{ route('admin.restaurants.create')}}">Add Restaurant</a>
    <a class="btn btn-info" href="{{ route('admin.additemform')}}">Add Item</a>

</div>
<div>
    <div class="row">
       
        @foreach($restaurant as $restro)
        
        <div class="col-sm-6 display"> 
            <h3> Restaurant Name : <b>
                    <a href="{{ route('admin.restaurants.show', $restro->id)}}">
                        {{$restro->name}}</b>
                </a>
            </h3> <br>
            <h4> Address : {{$restro->address}} </h5> <br>
                <h4> Contact Number : {{$restro->phone}}</h4><br>
                <h4> Contact Person : {{$restro->contact_person}} </h4> <br>
                <img src="{{ route('admin.getentry', $restro->fileentry['filename'])}}" height="150px" width="288px" /> <br> 
                <div class=""col-sm-4 align><a class="btn btn-warning" href="{{ route('admin.restaurants.edit',['id'=> $restro->id]) }}">Edit Restaurant</a></div>
                <div class=""col-sm-4 align> {{ Form::open([
                            'route' => ['admin.restaurants.destroy', $restro->id],
                            'method' => 'delete'
                        ]) }}
                    {{ csrf_field() }}
                    {{ Form::submit('Delete',['class' => 'btn btn-danger edit'])}}
                    {{ Form::close() }}
                </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
