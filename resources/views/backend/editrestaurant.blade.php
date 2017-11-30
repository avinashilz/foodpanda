@extends('backend.layouts.app')
@section('content')




{{Form::model($restaurant, ['route' => ['admin.restaurants.edit', $restaurant]])}}
{{ csrf_field() }}

<div class="row"> 
    <a href="{{ route('admin.restaurants.index')}}">
        {{Form::button('Back',['class' => 'btn btn-warning'])}}
    </a> 
</div>



{{Form::close}}
@endsection