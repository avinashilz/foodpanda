@extends('backend.layouts.app')

@section('page-header')

@endsection
@section('content')
<div class="row"> 
    <a href="{{ route('admin.restaurants.index')}}">
         <i class="fa fa-hand-o-left" aria-hidden="true"></i>
    </a> 
</div>

<div class="row" style="text-align: center">


    <h3> Item Name : <b><b> </h3> <br>
                <h4> Price : ₹ </h5> <br>
                    </div>
                    @endsection