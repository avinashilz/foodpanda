@extends('frontend.layouts.app')
@section('content')

<div>
    @foreach($categories as $category)

    <div class="col-sm-6">

        <h2> <b> Category:{{$category->categories}} </b></h2> <br>


        <div class="row">

            <div class="col-sm-5"><h3> Item Name</h3></div>  
            <div class="col-sm-2"><h3>Price</h3> </div>
            <div class="col-sm-1"><h3>Qty</h3> </div>

        </div>

        @foreach($category->items as $item)

        <div class="row">

            <div class="col-sm-5"> <h4>{{$item->name}}</h4></div> 
            <div class="col-sm-2"><h4> {{$item->price}} </h4> </div>
            <div class="col-sm-1">{{Form::number('qty','',['min'=>1,'max'=>10])}} </div>
            <div class="col-sm-2" style="text-align:  center;">
                <a href="">
                <i id="cart" class="fa  fa-cart-arrow-down" aria-hidden="true"></i>
                </a>
            </div>


        </div>
        @endforeach


    </div>

    @endforeach

</div>

@endsection