@extends('backend.layouts.app')
@section('content') 

{{ Form::open(['route' => 'admin.addresuarant', 'files' => true]) }} 
{{ csrf_field() }}


<div class="row"> <div class="col-sm-6">
        <label for="name">Resturant Name </label> 
    </div>
    <div class="col-sm-6"> 
        <input type="text" class="form-control" id="name" name="name">
    </div>
</div>

<div class="row"> <div class="col-sm-6">
        <label for="name">Longitude </label> 
    </div>
    <div class="col-sm-6"> <input type="text" class="form-control" id="longitude" name="longitude">
    </div>
</div>

<div class="row"> <div class="col-sm-6">
        <label for="name">Latitude </label>
    </div>
    <div class="col-sm-6"><input type="text" class="form-control" id="latitude" name="latitude">
    </div>
</div>

<div class="row"> <div class="col-sm-6">
        <label for="name">Address </label>  </div>
    <div class="col-sm-6">   <input type="text" class="form-control" id="address" name="address">
    </div>
</div>

<div class="row"> <div class="col-sm-6">
        <label for="name">Contact Number </label>  </div>
    <div class="col-sm-6">   <input type="number" class="form-control" id="number" name="number">
    </div>
</div>

<div class="row"> <div class="col-sm-6">
        <label for="name">Contact Person </label> </div>
    <div class="col-sm-6">     <input type="text" class="form-control" id="contact" name="contact">
    </div>
</div>

<div class="row"> <div class="col-sm-6">  
        <label for="name">Delivery Radius </label>  </div>
    <div class="col-sm-6">   <input type="text" class="form-control" id="contact" name="contact">
    </div>  
</div>

<div class="row"> <div class="col-sm-6"> 
        <a href="{{ route('admin.dashboard')}}">
            <button class="btn btn-primary">Add</button>
        </a> 
    </div>
</div>

@endsection