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
        <div class="col-sm-3 display"> 
            <h3> Item Name :{{$item->name}}  </h3> <br>
            <h4> Price :{{$item->price}} </h4><br>
            <div class=""col-sm-4 align> <a href="{{ route('admin.edititemform',['id'=> $item->id]) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>            {{ Form::open([
                            'route' => ['admin.item.destroy', $item->id],
                            'method' => 'delete'
                        ]) }}
               
                {{ csrf_field() }}
                {{ Form::submit('X',['class' => 'btn btn-danger edit'])}}
                {{ Form::close() }}
            </div>
        </div>
        @endforeach

    </div>
    @endforeach

</div>
</div>

@endsection
