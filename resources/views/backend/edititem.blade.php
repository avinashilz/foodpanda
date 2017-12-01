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
    
    <div class="row"> <div class="col-sm-6">
            {{ Form::label('name','Item Name') }}
        </div>
        <div class="col-sm-6"> 
            {{Form::text('name','',['class'=>'textfield'])}}
        </div>
    </div>
    <div class="row"> <div class="col-sm-6">
            {{ Form::label('price','Item Price (in ₹:)') }}
        </div>
        <div class="col-sm-6"> 
            {{Form::number('price','',['class'=>'no-spin'])}}
        </div>
    </div>
    @endsection