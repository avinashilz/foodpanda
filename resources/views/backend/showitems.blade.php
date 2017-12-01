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
    <div class="row">
        <h2> <b> </b></h2> <br>
        @foreach($item as $items)

        <div class="col-sm-6 display"> 

            <h3> Item Name :{{$items->name}}  </h3> <br>
            <h4> Price :{{$items->price}} </h4><br>
            <h4> Category: {{$items->category_id}} </h4> <br> 

        </div>
        @endforeach
    </div>

</div>
</div>

@endsection