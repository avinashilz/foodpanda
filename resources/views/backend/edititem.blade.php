@extends('backend.layouts.app')

@section('page-header')

@endsection
@section('content')

<div class="row"> 
    <a href="{{ route('admin.restaurants.index')}}">
        <i class="fa fa-hand-o-left" aria-hidden="true"></i>
    </a> 
</div>

{{ Form::model($item, ['route' => ['admin.updateitem',$item->id],'files'=>true])}} 


{{ csrf_field() }}
{{ method_field('PUT') }}



<div class="row"> <div class="col-sm-6">
        {{ Form::label('name','Item Name') }}
    </div>
    <div class="col-sm-6"> 
        {{Form::text('name',$item->name,['class'=>'textfield'])}}
    </div>
</div>
<div class="row"> <div class="col-sm-6">
        {{ Form::label('price','Item Price (in ₹:)') }}
    </div>
    <div class="col-sm-6"> 
        {{Form::number('price',$item->price,['class'=>'no-spin'])}}
    </div>
</div>
<div class="row"> <div class="col-sm-6"> </div>
    <div class="col-sm-6"> 

        {{Form::submit('Update',['class' => 'btn btn-info right'])}}


    </div>
</div>
{{Form::close()}}

@endsection