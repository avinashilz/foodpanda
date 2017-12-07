@extends('backend.layouts.app')

@section('page-header')

@endsection
@section('content')
<div class="row"> 
    <a href="{{ route('admin.restaurants.index')}}">
        <i class="fa fa-hand-o-left" aria-hidden="true"></i>
    </a> 
</div>

<div class="row"> 
    <a href="{{ route('admin.additemform', ['id' => $restroid])}}">
        Add Item
    </a> 
</div>
<div>
    @foreach($categories as $category)

    <div class="col-sm-6">
        <h2> <b> Category:{{$category->categories}} </b></h2> <br>
       
       
            <div class="row">
                <div class="col-sm-5"><h3> Item Name</h3></div>  <div class="col-sm-2"><h3>Price</h3> </div>
            </div>
            @foreach($category->items as $item)
            <div class="row">
                <div class="col-sm-5"> <h4>  {{$item->name}}</h4></div> <div class="col-sm-2"><h4> {{$item->price}} </h4> </div>
                <div class="col-sm-1">
                    <a href="{{ route('admin.edititemform', [$restroid, $item->id]) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>            
                </div>
                <div class="col-sm-1">
                    {{ Form::open([
                            'route' => ['admin.item.destroy', $restroid, $item->id],
                            'method' => 'delete'
                        ]) }}

                    {{ csrf_field() }}
                    {{ Form::submit('X',['class' => 'btn cross'])}}
                    {{ Form::close() }}
                </div>
            </div>
             @endforeach
  
       
    </div>

    @endforeach

</div>

@endsection
