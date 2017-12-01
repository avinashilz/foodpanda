@extends('backend.layouts.app')

@section('page-header')

@endsection
@section('content')
<div class="row"> 
    <a href="{{ route('admin.restaurants.index')}}">
        <i class="fa fa-hand-o-left" aria-hidden="true"></i>
    </a> 
</div>

<div>
    @foreach($categories as $category)
    <div class="row">
        <h2> <b>Category: {{$category->categories}} </b></h2> <br>
        @foreach($category->items as $item)
        <div class="col-sm-6 display"> 
            <h3> Item Name :{{$item->name}}  </h3> <br>
            <h4> Price :{{$item->price}} </h4><br>
            <div class=""col-sm-4 align> <a class="btn btn-warning" href="{{ route('admin.edititemform',['id'=> $item->id]) }}">Edit Item</a></div>
            <div class=""col-sm-4 align> {{ Form::open([
                            'route' => ['admin.restaurants.destroy', $item->id],
                            'method' => 'delete'
                        ]) }}
                {{ csrf_field() }}
                {{ Form::submit('Delete',['class' => 'btn btn-danger edit'])}}
                {{ Form::close() }}
            </div>
        </div>
        @endforeach

    </div>
    @endforeach

</div>
</div>

@endsection
