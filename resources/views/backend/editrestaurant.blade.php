@extends('backend.layouts.app')
@section('content')

<div class="row"> 
    <a href="{{ route('admin.restaurants.index')}}">
        {{Form::button('Back',['class' => 'btn btn-warning'])}}
    </a> 
</div>

@endsection