@extends('frontend.layouts.app')
@section('content')
<div class="vendors-heading-container">
    <div class="container">
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
            <button id="clear">x</button>
          
            <a href="#"> <button>PROCEED TO CHECKOUT</button></a>
        </div>
    </div>
</div>

@endsection