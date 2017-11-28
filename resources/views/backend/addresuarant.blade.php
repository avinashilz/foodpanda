@extends('backend.layouts.app')
@section('content') 

{{ Form::open(['route' => 'admin.dashboard', 'files' => true]) }} 
{{ csrf_field() }}


<div class="form-group">
    <label for="name">Resturant Name</label>
    <input type="text" class="form-control" id="name" name="name">
</div>

<div class="form-group">
    <label for="name">Longitude </label>
    <input type="text" class="form-control" id="longitude" name="longitude">
</div>

<div class="form-group">
    <label for="name">Latitude </label>
    <input type="text" class="form-control" id="latitude" name="latitude">
</div>

<div class="form-group">
    <label for="name">Address </label>
    <input type="text" class="form-control" id="address" name="address">
</div>

<div class="form-group">
    <label for="name">Contact Person </label>
    <input type="text" class="form-control" id="contact" name="contact">
</div>

<div class="form-group">
    <label for="name">Delivery Radius </label>
    <input type="text" class="form-control" id="contact" name="contact">
</div>

<div class="form-group"> 
    <a href="{{ route('admin.dashboard')}}">
        <button class="btn btn-primary">Add</button>
    </a> 
</div>


@endsection