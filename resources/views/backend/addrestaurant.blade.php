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
        {{ Form::textarea('address','',['rows'=>'5']) }}
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
       {{ Form::label('number', 'Contact Number') }}
    </div>
    <div class="col-sm-6"> 
        {{Form::number('number')}}
    </div>
</div>



<div class="row"> <div class="col-sm-6"> 
        <a href="{{ route('admin.dashboard')}}">
            {{Form::submit('Add',['class' => 'btn'])}}
        </a> 
    </div>
</div>

@endsection