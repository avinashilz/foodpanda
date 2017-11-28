@extends('backend.layouts.app')

@section('page-header')
    <h1>
        {{ app_name() }}
        <small>{{ trans('strings.backend.dashboard.title') }}</small>
    </h1>
@endsection

@section('content')
    <div class="row"> <div class="col-sm-6"> 
        <a href="{{ route('admin.addresuarant')}}">
            <button class="btn btn-primary">Add Resturant</button>
        </a> 
    </div>
</div>
@endsection