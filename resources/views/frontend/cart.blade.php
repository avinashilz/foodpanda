@extends('frontend.layouts.app')
@section('content')
</div>
<div> <h2> Your Order </h2> </div>
@foreach($detail as $details)
<div class="row">
     <div class="col-sm-1"><h4> {{$details['quantity']}} </h4> </div>
    <div class="col-sm-2"> <h4>  {{$details['name']}}</h4></div> 
    <div class="col-sm-2"><h4> {{$details['totalprice']}} </h4> </div>
</div>

 @endforeach
 

@endsection