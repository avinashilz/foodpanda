@extends('backend.layouts.app')

@section('page-header')

@endsection
@section('content')

<div>
    <div class="row center">
        <h2> <b> </b></h2> <br>
    </div>
    <div class="row">
        @foreach($item as $items)
        <div class="col-sm-6 display"> 

            <h3> Item Name :{{$items->name}}  </h3> <br>
            <h4> Price :{{$items->price}} </h4><br>
            <h4> Category:  </h4> <br> 

        </div>
        @endforeach
    </div>
   
</div>
</div>

@endsection