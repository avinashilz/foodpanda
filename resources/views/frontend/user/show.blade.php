@extends('frontend.layouts.app')
@section('content')
<div class="vendors-heading-container">
    <div class="container">
        <div class="vendors-heading">
            <h1>
                Order  from 79 restaurants
            </h1>
            <h2>delivering to your door</h2>
            <h2>  {{$restaurantdetail->name}} 
                <img src="{{ route('frontend.user.getentry', $restaurantdetail->fileentry['filename'])}}" />
            </h2>
        </div>
    </div>

    <div class="location-header">
        <div class="container">

            <span class="location-address-container">
                <i class="icon icon-location"></i>

                {{$restaurantdetail->name}} can deliver to you at Sector 71
            </span>


            <a href="/" class="btn btn-primary btn-sm btn-alt change-location-link js-change-location-link">Change location</a>

        </div>
    </div>
</div>
<div class="container-overlay container-overal-rlp"></div>
</div>
<a href="#" onclick="history.go(-1)">
    <i class="fa fa-hand-o-left" aria-hidden="true"></i> </a>
<div class="breadcrumbs">
    <div class="container">
        <a href="{{route('frontend.index')}}"> Home </a> > Restaurants >  {{$restaurantdetail->name}} 
    </div>
</div>

<div class="row">

    <div class="vendor-body-container">

        <div  class="col-sm-2" style="margin-left: 50px;">

            <div class="row aside">

                <aside class="clearfix">
                    <div id="sticky-wrapper" class="sticky-wrapper">
                        <div  class="js-sticky-element vendor-menu__categories js-vendor-detail-menu-categories" data-sticky-bottom-margin="40" style="">
                            <ul class="categories__list ">
                                @foreach($categories as $category)
                                <li class='categories__list__item'> <a href='#'>
                                        {{$category->categories}}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
        <div class="col-sm-8 vendor-menu__menus"> 
            @foreach($categories as $category)
            <section class="menu">
                {{$category->categories}}
                <article class="menu__category">
                    @foreach($category->items as $item)
                    <form action="{{route('frontend.additem', $item->id)}}" method="GET">

                        {{ csrf_field() }}
                        <!--                        <div class="menu__category__title">  </div>-->
                        <article class="menu-item">
                            <div class="menu-item__title">{{$item->name}} </div>
                            <div class="menu-item__variation__price ">{{$item->price}}  </div>
                            {{Form::number('qty','1',['min'=>1,'max'=>50])}}
                            <a href="{{route('frontend.additem',$item->id)}}">
                                {{Form::button(' <i id="cart" class="fa  fa-cart-arrow-down" aria-hidden="true"></i>', array('type' => 'submit', 'class' => ''))}}

                            </a>
                        </article>
                        {{ Form::close() }}
                        @endforeach
                </article>
            </section>
            @endforeach
        </div>  
        <div class="col-sm-2 cart-container">
            <div class="order">
                <div> <h2> Your Order </h2> </div>


                <div class="row">

                    <div class="col-sm-2"> <h4>  </h4></div> 
                    <div class="col-sm-1"><h4>.00  </h4> </div>
                    <div class="col-sm-1">
                        {{ Form::open([
                           
                        ]) }}
                        {{ csrf_field() }}
                        {{ Form::submit('X')}}
                        {{ Form::close() }}
                    </div>
                </div>



                <div class="row">
                    <div class="col-sm-2"><h4> Subtotal:</h4> </div>
                    <div class="col-sm-2"><h4>.00</h4></div>

                </div>
                <div class="row" id="delivery">
                    <div class="col-sm-2"><h4> Delivery Fee:</h4> </div>
                    <div class="col-sm-2"><h4> FREE</h4></div>
                </div>
                <div class="row">
                    <div class="col-sm-2"> <h5> Total will be rounded off </h5> </div>
                </div>
                <div class="row">
                    <div class="col-sm-2"> <h3> Total</h3></div> 
                    <div class="col-sm-2"> <h2> Rs. .00 </h2></div> 
                </div>

                <div class="row">
                    <div class="col-sm-4">

                        <a class="btn btn-primary" style="width:100%;" href="{{ route('frontend.user.checkout')}}"
                           onclick="return confirm('Your Order Has Been Placed. Thank You!');"> Proceed To Checkout </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>







<div>

    @foreach($categories as $category)

    <div class="col-sm-6">

        <h2> <b> Category:{{$category->categories}} </b> </h2> <br>
        <div class="row">
            <div class="col-sm-5"><h3> Item Name</h3></div>  
            <div class="col-sm-2"><h3>Price</h3> </div>
            <div class="col-sm-1"><h3>Qty</h3> </div>
        </div>
        @foreach($category->items as $item)

        <div class="row">
            <form action="{{route('frontend.additem', $item->id)}}" method="GET">

                {{ csrf_field() }}

                <div class="col-sm-5"> <h4>{{$item->name}}</h4></div> 
                <div class="col-sm-2"><h4> {{$item->price}} </h4> </div>
                <div class="col-sm-1">{{Form::number('qty','1',['min'=>1,'max'=>50])}} </div>
                <div class="col-sm-2" style="text-align:  center;">

                    <a href="{{route('frontend.additem',$item->id)}}">
                        {{Form::button(' <i id="cart" class="fa  fa-cart-arrow-down" aria-hidden="true"></i>', array('type' => 'submit', 'class' => ''))}}

                    </a>
                    {{ Form::close() }}
                </div>


        </div>
        @endforeach


    </div>

    @endforeach

</div>

@endsection