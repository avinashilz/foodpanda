@extends('backend.layouts.app')
@section('content')
@foreach (
$categories as $category
)

{{$category->categories}}
@endforeach
{{ Form::open(['route' => 'admin.additem', 'files' => true]) }}
{{ csrf_field() }}

<div class="row"> <div class="col-sm-6">
        {{ Form::label('select','Select Category') }}
    </div>
    <div class="col-sm-6"> 
        <!--        {{Form::select('size', ['snacks' => 'Snacks', 'maincourse' => 'Main Course','breads'=>'Bread','deserts'=>'Deserts'], null, ['placeholder' => 'Choose an Item...'])}}-->
        <!--{{Form::select('categories', [$category->categories], null, ['placeholder' => 'Choose an Item...'])}}-->
        <select class="form-control" name="categories">
            @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category}}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="row"> <div class="col-sm-6">
        {{ Form::label('name','Item Name') }}
    </div>
    <div class="col-sm-6"> 
        {{Form::text('name','',['class'=>'textfield'])}}
    </div>
</div>

<div class="row"> <div class="col-sm-6">
        {{ Form::label('price','Item Price') }}
    </div>
    <div class="col-sm-6"> 
        {{Form::number('price','',['class'=>'textfield'])}}
    </div>
</div>

@endsection