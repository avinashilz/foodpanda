@extends('backend.layouts.app')
@section('content') 

{{ Form::open(['route' => 'admin.addrestaurant', 'files' => true]) }} 
{{ csrf_field() }}


<div class="row"> <div class="col-sm-6">
       {{ Form::label('name','Restaurant Name') }}
    </div>
    <div class="col-sm-6"> 
        {{Form::text('name','',['class'=>'textfield'])}}
    </div>
</div>

<div class="row"> <div class="col-sm-6">
       {{ Form::label('address', 'Address') }}
    </div>
    <div class="col-sm-6"> 
        {{ Form::textarea('address','',['rows'=>'3']) }}
    </div>
</div>

<div class="row"> <div class="col-sm-6">
       {{ Form::label('contact_person', 'Contact Person') }}
    </div>
    <div class="col-sm-6"> 
        {{Form::text('contact_person','',['class'=>'textfield'])}}
    </div>
</div>

<div class="row"> <div class="col-sm-6">
       {{ Form::label('phone', 'Contact Number') }}
    </div>
    <div class="col-sm-6"> 
        {{Form::number('phone','',['class'=>'textfield'])}}
    </div>
</div>

<div class="row"> <div class="col-sm-6">
       {{ Form::label('delivery_radius', 'Delivery Radius') }}
    </div>
    <div class="col-sm-6"> 
        {{Form::number('delivery_radius','',['class'=>'textfield'])}}
    </div>
</div>

<div class="row"> <div class="col-sm-6">
       {{ Form::label('latitude', 'Latitude') }}
    </div>
    <div class="col-sm-6"> 
        {{Form::number('latitude','',['class'=>'textfield'])}}
    </div>
</div>

<div class="row"> <div class="col-sm-6">
       {{ Form::label('longitude', 'Longitude') }}
    </div>
    <div class="col-sm-6"> 
        {{Form::number('longitude','',['class'=>'textfield'])}}
    </div>
</div>

<div class="row"> <div class="col-sm-6"> 
        <a href="{{ route('admin.dashboard')}}">
            {{Form::submit('Add',['class' => 'btn btn-success'])}}
        </a> 
    </div>
</div>

@endsection