@extends('backend.layouts.app')

@section('page-header')
<h1>
    {{ app_name() }}
    <small>{{ trans('strings.backend.dashboard.title') }}</small>
</h1>
@endsection
@section('content')

<div class="row">
    @foreach($items as $item)
    <div class="col-sm-6 display"> 
        <h3> Item Name : <b> {{$item->name}}<b> </h3> <br>
        <h4> Price : ₹{{$item->price}} </h5> <br>    
    </div>
    <br>
    @endforeach

</div>
@endsection