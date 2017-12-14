@extends('frontend.layouts.app')
@section('content')
<div class="vendors-heading-container">
    <div class="container">
        <!--        <div class="vendors-heading">
                    <h1>
                        Order  from 79 restaurants
                    </h1>
                    <h2>delivering to your door</h2>
                    <h2>  {{$restaurantdetail->name}} 
                        <img src="{{ route('frontend.user.getentry', $restaurantdetail->fileentry['filename'])}}" />
                    </h2>
                </div>-->
        <div class="vendor-heading">
            <div class="vendor-image">
                <img src="{{ route('frontend.user.getentry', $restaurantdetail->fileentry['filename'])}}" width="80px" height="80px" />
            </div>

            <div class="vendor-heading-details-box-container">
                <div class="vendor-heading-details-box">
                    <div class="vendor__title">
                        <h1 itemprop="name"> {{$restaurantdetail->name}} </h1>
                    </div>

                    <ul class="vendor__cuisines">
                        <?php $count = 1; ?>
                        @foreach($categories as $category)
                        <li itemprop="servesCuisine">{{$category->categories}}</li>
                        @if($count==4)
                        @break;
                        @endif
                        <?php $count++; ?>
                        @endforeach
                    </ul>

                    <div class="vendor__ratings-container">

                        <div class="vendor__ratings">


                            <div class="rating  ">


                                <div class="rateit" data-rateit-value="2.5" data-rateit-ispreset="true" data-rateit-readonly="true"></div>
                                <span class="review">
                                    (<span>172</span>)
                                </span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
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

<div class=" restro-menu-list col-sm-12">

    <div class="col-sm-1"></div>
    <div class="restro-menu col-sm-8">
        <div class="restro-menu-links col-sm-12">
            <div class="restro-menu-link col-sm-1"><a href="#">Menu</a></div>
            <div class="review -link col-sm-1"><a href="#">Reviews</a></div>
            <div class="info-link col-sm-1"><a href="#">Info</a></div>
        </div>
        <div class="col-sm-12">

            <div class="menu-food-category-list col-sm-4">
                @foreach($categories as $category)
                <a href="#anchor"  class="refer"> {{$category->categories}} </a><br>    
                @endforeach
            </div>
            <div class=" restroList col-sm-8">
                @foreach($categories as $category)
                <h2 id="anchor">{{$category->categories}}</h2>


                @foreach($category->items as $item)
                <div class="item-detail col-sm-12">
                    <h5 class="item-name">   {{$item['name']}}</h5>
                    <h5 class="item-price">Rs.{{$item['price']}} 
                        <a href="{{route('frontend.additem',$item->id)}}" class="additem">
                            {{Form::button(' <i class="fa fa-plus" aria-hidden="true"></i>',array('type' => 'submit', 'class' => ''))}}

                        </a> </h5>
                </div>
                @endforeach
                @endforeach
            </div>

        </div>
    </div>
    <div class="my-order col-sm-3">

        <div class="order-title">
            <h2> 
                Your Order
            </h2>
        </div>
        <div class="basket">

            <p> add to cart</p>

            <a href="#"> <button>PROCEED TO CHECKOUT</button></a>
        </div>
    </div>
</div>

<!--new page-->
<!--<div class="row">

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
                                                <div class="menu__category__title">  </div>
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

</div>-->

<!--old page-->

<!--<div>

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

</div>-->

@endsection