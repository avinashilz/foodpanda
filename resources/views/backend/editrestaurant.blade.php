@extends('backend.layouts.app')
@section('content')


{{ Form::model($restaurant, ['route' => ['admin.restaurants.update',$restaurant->id],'files'=>true])}} 


{{ csrf_field() }}
{{ method_field('PUT') }}

<div class="row"> 
    <a href="{{ route('admin.restaurants.index')}}">
        <i class="fa fa-hand-o-left" aria-hidden="true"></i>
    </a> 
</div>

<div class="row"> <div class="col-sm-6">
        {{ Form::label('name','Restaurant Name') }}
    </div>
    <div class="col-sm-6"> 
        {{Form::text('name',$restaurant->name,['class'=>'textfield'])}}
    </div>
</div>
<div class="row"> <div class="col-sm-6">
        {{ Form::label('address', 'Address') }}
    </div>
    <div class="col-sm-6"> 
        {{ Form::textarea('address',$restaurant->address,['class'=>'textfield','rows'=>'3']) }}
    </div>
</div>
<div class="row"> <div class="col-sm-6">
        {{ Form::label('contact_person', 'Contact Person') }}
    </div>
    <div class="col-sm-6"> 
        {{Form::text('contact_person',$restaurant->contact_person,['class'=>'textfield'])}}
    </div>
</div>
<div class="row"> <div class="col-sm-6">
        {{ Form::label('phone', 'Contact Number') }}
    </div>
    <div class="col-sm-6"> 
        {{Form::number('phone',$restaurant->phone,['class'=>'no-spin'])}}
    </div>
</div>

<div class="row"> <div class="col-sm-6">
        {{ Form::label('delivery_radius', 'Delivery Radius') }}
    </div>
    <div class="col-sm-6"> 
        {{Form::number('delivery_radius',$restaurant->delivery_radius,['class'=>'no-spin'])}}
    </div>
</div>
{{Form::hidden('latitude','30.698422',['class'=>'textfield'])}}
{{Form::hidden('longitude','76.691051',['class'=>'textfield'])}}
<div class="row"> <div class="col-sm-6">
        {{ Form::label('image', 'Upload Image') }}
    </div>
    <div class=        "col-sm-6"> 
        <img src="/uploads/{{$restaurant->image}}" height="150px" width="250px" /> 
        {{ Form::file('image') }} </div>

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
<div class="row"> <div class="col-sm-6"> </div>
    <div class="col-sm-6"> 
        
        {{Form::submit('Update',['class' => 'btn btn-info right'])}}


    </div>
   
    {{Form::close()}}
    @endsection