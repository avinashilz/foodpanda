@extends('backend.layouts.app')

@section('page-header')
<h1>
    {{ app_name() }}
    <small>{{ trans('strings.backend.dashboard.title') }}</small>
</h1>
@endsection
@section('content')
<div class="row"> 
    <div class="col-sm-6"> 
        <a href="{{ route('admin.addrestaurantform')}}">
            {{Form::submit('Restaurant',['class' => 'btn'])}}
        </a>
        <a href="{{ route('admin.additemform')}}">
            {{Form::submit('Item',['class' => 'btn'])}}
        </a>
    </div>
</div>
<div class="row">
    <div class="col-sm-6"> 
         
    </div>
    <div class="col-sm-6">
         <a href="{{ route('admin.editrestaurantform')}}">
            {{Form::button('Edit',['class' => 'btn'])}}
        </a>
        <a href="{{ route('admin.dashboard')}}">
            {{Form::button('Delete',['class' => 'btn'])}}
        </a>
    </div>

</div>
@endsection
