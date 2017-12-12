@extends('frontend.layouts.app')

@section('content')

<div class="vendors-heading-container">
    <div class="container">
        <div class="vendors-heading">
            <h1>
                Order  from 79 restaurants
            </h1>

            <h2>delivering to your door</h2>
        </div>
    </div>

    <div class="location-header">
        <div class="container">

            <span class="location-address-container">
                <i class="icon icon-location"></i>

                Sector 71
            </span>


            <a href="/" class="btn btn-primary btn-sm btn-alt change-location-link js-change-location-link">Change location</a>

        </div>
    </div>
</div>
<div class="container-overlay container-overal-rlp"></div>
</div>

@foreach ($restaurants as $restro)
<img src="/uploads/{{$restro->image}}" height="150px" width="288px" /> <br> 
<h3> <a href="{{route('frontend.restaurantShow', $restro->id)}}">
        {{$restro->name}}</b>
    </a>  </h3>
<h4>{{$restro->contact_person}}</h4>
<h4>{{$restro->phone}}</h4>
<h4>{{$restro->address}}</h4>

@endforeach

@foreach($categoriesInSidebar as$cat)
{{$cat->id}}
{{$cat->categories}}
@endforeach

@endsection
