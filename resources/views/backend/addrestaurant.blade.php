@extends('backend.layouts.app')
@section('content')
<div class="row"> 
    <a href="{{ route('admin.restaurants.index')}}">
        <i class="fa fa-hand-o-left" aria-hidden="true"></i>
    </a> 
</div>
{{ Form::open(['route' => 'admin.restaurants.store', 'files' => true]) }} 
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
        {{Form::number('phone','',['class'=>'no-spin'])}}
    </div>
</div>

<div class="row"> <div class="col-sm-6">
        {{ Form::label('delivery_radius', 'Delivery Radius') }}
    </div>
    <div class="col-sm-6"> 
        {{Form::number('delivery_radius','',['class'=>'no-spin'])}}
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

        {{Form::radio('radio', '0',true)}}
        {{ Form::label('no', 'No',["class"=>'bool']) }}
    </div>
</div>
<div class="row"> <div class="col-sm-6"> 
        <a href="{{ route('admin.restaurants.index')}}">
            {{Form::submit('Add',['class' => 'btn btn-success'])}}
        </a> 
    </div>
</div>

@endsection