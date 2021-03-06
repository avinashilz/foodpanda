@extends('frontend.layouts.app')
@section('content')
</div>
<a href="#" onclick="history.go(-1)">
    <i class="fa fa-hand-o-left" aria-hidden="true"></i> </a>
<div class="order">
    <div> <h2> Your Order </h2> </div>

    @foreach($detail as $details)
    <div class="row">

        <div class="col-sm-2"> <h4> {{$details['quantity']}}x {{$details['name']}} </h4></div> 
        <div class="col-sm-1"><h4> {{$details['totalprice']}}.00  </h4> </div>
        <div class="col-sm-1">
            {{ Form::open([
                           
                        ]) }}
            {{ csrf_field() }}
            {{ Form::submit('X')}}
            {{ Form::close() }}
        </div>
    </div>

    @endforeach

    <div class="row">
        <div class="col-sm-2"><h4> Subtotal:</h4> </div>
        <div class="col-sm-2"><h4>{{$totalprice}}.00</h4></div>

    </div>
    <div class="row" id="delivery">
        <div class="col-sm-2"><h4> Delivery Fee:</h4> </div>
        <div class="col-sm-2"><h4> FREE</h4></div>
    </div>
    <div class="row">
        <div class="col-sm-2"> <h5> Total will be rounded off </h5> </div>
    </div>
    <div class="row">
        <div class="col-sm-2"> <h3> Total</h3></div> 
        <div class="col-sm-2"> <h2> Rs. {{$totalprice}}.00 </h2></div> 
    </div>

    <div class="row">
        <div class="col-sm-4">
            
            <a class="btn btn-primary" style="width:100%;" href="{{ route('frontend.user.checkout')}}"
               onclick="return confirm('Your Order Has Been Placed. Thank You!');"> Proceed To Checkout </a>
        </div>
    </div>
</div>
</div>
@endsection