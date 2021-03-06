@extends('backend.layouts.app')
@section('content')

<div class="row"> 
    <a href="{{ route('admin.restaurants.index')}}">
       <i class="fa fa-hand-o-left" aria-hidden="true"></i>
    </a> 
</div>
{{ Form::open(['route' => 'admin.additem', 'files' => true]) }}
{{ csrf_field() }}
<div class="row"> 
    @if(isset($restaurantselected['name'])) 

    <div class="col-sm-6">

        {{ Form::label('select','Restaurant Name') }}
    </div>
    <div class="col-sm-6">
        {{Form::hidden('restaurant',$restaurantselected->id)}}
        {{Form::label('name',$restaurantselected->name,['class'=>'fixedlabel'])}}
    </div>

    @else 
    <div class="col-sm-6"> 
        {{ Form::label('select','Select Restaurant') }}
    </div>
    <div class="col-sm-6"> 
        {{Form::select('restaurant',$restaurant, null, ['placeholder' => 'Choose Restaurant...'])}}
    </div>
    @endif
</div>

<div class="row">
    <div class="col-sm-6">
        {{ Form::label('select','Select Category') }}
    </div>
    <div class="col-sm-6"> 
        {{Form::select('categories', $categories, null, ['placeholder' => 'Choose an Item...'])}}
    </div>
</div>
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
<div class="row"> <div class="col-sm-6"> 
        <a href="{{ route('admin.restaurants.index')}}">
            {{Form::submit('Add',['class' => 'btn btn-success'])}}
        </a> 
    </div>
</div>

@endsection