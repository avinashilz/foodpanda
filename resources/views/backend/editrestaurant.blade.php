@extends('backend.layouts.app')
@section('content')

<div class="row"> 
    <a href="{{ route('admin.restaurants.index')}}">
        {{Form::button('Back',['class' => 'btn btn-warning'])}}
    </a> 
</div>

<div class="row"> 
    <a href="{{ route('admin.restaurants.index')}}">
        {{Form::button('Back',['class' => 'btn btn-warning'])}}
    </a> 
</div>
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
        {{ Form::textarea('address','',['class'=>'textfield','rows'=>'3']) }}
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
{{Form::hidden('latitude','30.698422',['class'=>'textfield'])}}
{{Form::hidden('longitude','76.691051',['class'=>'textfield'])}}
<div class="row"> <div class="col-sm-6">
        {{ Form::label('image', 'Upload Image') }}
    </div>
    <div class="col-sm-6"> {{ Form::file('image') }} </div>

</div>
<div class="row"> <div class="col-sm-6">
        {{ Form::label('restaurant_feature', 'Restaurant Feature') }}
    </div>
    <div class="col-sm-6"> 

        {{Form::radio('radio', '1')}}
        {{ Form::label('yes', 'Yes',["class"=>'bool']) }}

        {{Form::radio('radio', '0')}}
        {{ Form::label('no', 'No',["class"=>'bool']) }}
    </div>
</div>
<div class="row"> <div class="col-sm-6"> 
      
            {{Form::submit('update',['class' => 'btn btn-success'])}}
       
   
</div>
@endsection