@extends('backend.layouts.app')
@section('content') 

{{ Form::open(['route' => 'admin.addresuarant', 'files' => true]) }} 
{{ csrf_field() }}


<div class="row"> <div class="col-sm-6">
       {{ Form::label('name','Resturant Name') }}
    </div>
    <div class="col-sm-6"> 
        {{Form::text('name')}}
    </div>
</div>

<div class="row"> <div class="col-sm-6">
       {{ Form::label('longitude', 'Longitude') }}
    </div>
    <div class="col-sm-6"> 
        {{Form::text('longitude')}}
    </div>
</div>

<div class="row"> <div class="col-sm-6">
       {{ Form::label('latitude', 'Latitude') }}
    </div>
    <div class="col-sm-6"> 
        {{Form::text('latitude')}}
    </div>
</div>

<div class="row"> <div class="col-sm-6">
       {{ Form::label('address', 'Address') }}
    </div>
    <div class="col-sm-6"> 
        {{ Form::textarea('address') }}
    </div>
</div>

<div class="row"> <div class="col-sm-6">
       {{ Form::label('number', 'Contact Number') }}
    </div>
    <div class="col-sm-6"> 
        {{Form::number('number')}}
    </div>
</div>

<div class="row"> <div class="col-sm-6">
       {{ Form::label('person', 'Contact Person') }}
    </div>
    <div class="col-sm-6"> 
        {{Form::text('person')}}
    </div>
</div>

<div class="row"> <div class="col-sm-6">
       {{ Form::label('radius', 'Delivery Radius') }}
    </div>
    <div class="col-sm-6"> 
        {{Form::text('radius')}}
    </div>
</div>

<div class="row"> <div class="col-sm-6"> 
        <a href="{{ route('admin.dashboard')}}">
            {{Form::submit('Add',['class' => 'btn'])}}
        </a> 
    </div>
</div>

@endsection