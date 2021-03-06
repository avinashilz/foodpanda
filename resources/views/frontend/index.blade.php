@extends('frontend.layouts.app')
@section('content')
<div class="container">

    <div class="homepage-tagline">
        <div class="homepage-headline">
            <h1>Order delicious food online!</h1>
            <h2>Order food online from the best restaurants near you</h2>
        </div>
    </div> 
    <div class="js-location-search location-search location-search-main-page  location_city_area  ">
        <div class="location-search-inner">
            <form action="{{route('frontend.restaurantsearchbygeolocation')}}" method="GET">

                {{ csrf_field() }}
                <div class="city">
                    <div class="dropdown-typeahead-wrapper" id="wrapper-element-1">
                        {{Form::select('size', ['restaurant' => 'Restaurant', 'city' => 'City'], null, ['placeholder' => 'Search By....'])}}
                        <span class="twitter-typeahead" style="position: relative; display: inline-block; direction: ltr;">
                        </span></span>
                        <i class="icon-caret icon-down-arrow"></i>
                    </div>
                </div>
                <div class="area">
                    <label for="area" class="required">Enter your area</label>
                   
                    <input disabled type="text" data-url="{{route('frontend.restaurantSearch')}}" id="areaSearch" name="restaurantName" required="required" class="form-control" placeholder="Enter an area" style="position: relative; vertical-align: top; background-color: #fff;z-index: 2">

                    <span class="tt-dropdown-menu" style="position: absolute; top: 100%; left: 0px;right: auto;">

                        <ul id="searchResults" data-url="{{route('frontend.restaurantShow')}}">
                        </ul>
                    </span>
                </div>
                <div class="loc">
                    <input id="default" data-url="{{route('frontend.restaurantsearchbygeolocation')}}" name="latlong" class="placepicker form-control" data-latitude-input="#latitude" data-longitude-input="#longitude"/>

                    <input id="latitude" name="latitude" type="hidden" value="">
                    <input id="longitude" name="longitude" type="hidden" value="">
                </div>
                <div class="find-food">
                    {{ Form::submit('Show restaurants',['class' => 'btn btn-primary btn-block'])}}
                    {{ Form::close() }}
                </div>

            </form>
        </div>
    </div>
</div>
<div class="container-overlay"></div>
</div>
<div class="featured">
    <div class="container">
        <div class="home-popular-restaurants large">
            <div class="home-popular-restaurants__title">
                Popular This Month In India
            </div>
            <ul class="home-popular-restaurants__list">
                <li class="home-popular-restaurants__list__month">
                    <a href="">


                        <img alt="Ammi's Biryani" width="80" height="80" src="http://www.ammis.in/images/ammislogo1.png" data-src="//asia-public.foodpanda.com/dynamic/production/in/images/vendors/u0wl_sqp.jpg?v=20171128100431" class="lazy-loaded">
                    </a>
                </li>
                <li class="home-popular-restaurants__list__month">
                    <a href="">


                        <img alt="Yo China!" width="80" height="80" src="https://content2.jdmagicbox.com/comp/guwahati/z2/9999px361.x361.140421120053.y9z2/catalogue/yo-china-restaurant-g-s-road-guwahati-caterers-p5p9i4b.jpg" data-src="//asia-public.foodpanda.com/dynamic/production/in/images/vendors/s7kd_sqp.jpg?v=20171115110439" class="lazy-loaded">
                    </a>
                </li>
                <li class="home-popular-restaurants__list__month">
                    <a href="/restaurant/u6jl/meat-and-eat-chandapura">


                        <img alt="Papa John's" width="80" height="80" src="https://cdn.studentbeans.com/offer_service/companies/logos/000/000/046/compressed/PapaJohns_logo_200x200_e.svg.gz?1471426358" data-src="//asia-public.foodpanda.com/dynamic/production/in/images/vendors/u6jl_sqp.jpg?v=20171107184253" class="lazy-loaded">
                    </a>
                </li>
                <li class="home-popular-restaurants__list__month">
                    <a href="">


                        <img alt="Pizza Hut" width="80" height="80" src="https://blog.ricebowl.my/data/blog/12742773_10153875398044654_1166621019371555414_n.png" data-src="//asia-public.foodpanda.com/dynamic/production/in/images/vendors/s2av_sqp.jpg?v=20171201160644" class="lazy-loaded">
                    </a>
                </li>
                <li class="home-popular-restaurants__list__month">
                    <a href="">


                        <img alt="RollMaal" width="80" height="80" src="https://d1bj9m7vro2dcz.cloudfront.net/mp_11600_2017-08-04-23-06-51-000886.png" data-src="//asia-public.foodpanda.com/dynamic/production/in/images/vendors/m5so_sqp.jpg?v=20171002145409" class="lazy-loaded">
                    </a>
                </li>
                <li class="home-popular-restaurants__list__month">
                    <a href="/restaurant/r3dh/hyderabadi-biryani-hub-marathalli">


                        <img alt="BR" width="80" height="80" src="http://is2.mzstatic.com/image/thumb/Purple118/v4/42/fc/07/42fc07cd-a072-d9cc-e9e5-53e203032167/source/1200x630bb.jpg" data-src="//asia-public.foodpanda.com/dynamic/production/in/images/vendors/r3dh_sqp.jpg?v=20171201160123" class="lazy-loaded">
                    </a>
                </li>
                <li class="home-popular-restaurants__list__month">
                    <a href="/restaurant/r7ow/rangla-punjab-fpds">


                        <img alt="Box8" width="80" height="80" src="https://assets.box8.co.in/logo/box8-logo.png" data-src="//asia-public.foodpanda.com/dynamic/production/in/images/vendors/r7ow_sqp.jpg?v=20171127124829" class="lazy-loaded">
                    </a>
                </li>
                <li class="home-popular-restaurants__list__month">
                    <a href="/restaurant/s5gg/celebration-multicuisine-family-resatuarant">


                        <img alt="subway" width="80" height="80" src="http://www.orchardsquare.co.uk/wp-content/uploads/2015/02/subway-logo.jpg" data-src="//asia-public.foodpanda.com/dynamic/production/in/images/vendors/s5gg_sqp.jpg?v=20170908125114" class="lazy-loaded">
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="container">
        <div class="home-popular-restaurants large">
            <div class="home-popular-restaurants__title">
                India's Most Trusted Restaurants
            </div>
            <ul class="home-popular-restaurants__list">
                <li class="home-popular-restaurants__list__item">
                    <a href="/restaurant/u0wl/chandni-chowk-2-china">


                        <img alt="Chandni Chowk 2 China" width="80" height="80" src="//asia-public.foodpanda.com/dynamic/production/in/images/vendors/u0wl_sqp.jpg?v=20171128100431" data-src="//asia-public.foodpanda.com/dynamic/production/in/images/vendors/u0wl_sqp.jpg?v=20171128100431" class="lazy-loaded">
                    </a>
                </li>
                <li class="home-popular-restaurants__list__item">
                    <a href="/restaurant/s7kd/food-factory">


                        <img alt="Food Factory" width="80" height="80" src="//asia-public.foodpanda.com/dynamic/production/in/images/vendors/s7kd_sqp.jpg?v=20171115110439" data-src="//asia-public.foodpanda.com/dynamic/production/in/images/vendors/s7kd_sqp.jpg?v=20171115110439" class="lazy-loaded">
                    </a>
                </li>
                <li class="home-popular-restaurants__list__item">
                    <a href="/restaurant/u6jl/meat-and-eat-chandapura">


                        <img alt="Meat And Eat (Chandapura)" width="80" height="80" src="//asia-public.foodpanda.com/dynamic/production/in/images/vendors/u6jl_sqp.jpg?v=20171107184253" data-src="//asia-public.foodpanda.com/dynamic/production/in/images/vendors/u6jl_sqp.jpg?v=20171107184253" class="lazy-loaded">
                    </a>
                </li>
                <li class="home-popular-restaurants__list__item">
                    <a href="/restaurant/s2av/hyderabadi-biryani-hub">


                        <img alt="Hyderabadi Biryani Hub" width="80" height="80" src="//asia-public.foodpanda.com/dynamic/production/in/images/vendors/s2av_sqp.jpg?v=20171201160644" data-src="//asia-public.foodpanda.com/dynamic/production/in/images/vendors/s2av_sqp.jpg?v=20171201160644" class="lazy-loaded">
                    </a>
                </li>
                <li class="home-popular-restaurants__list__item">
                    <a href="/restaurant/m5so/kuddu-di-rasoi">


                        <img alt="Kuddu Di Rasoi" width="80" height="80" src="//asia-public.foodpanda.com/dynamic/production/in/images/vendors/m5so_sqp.jpg?v=20171002145409" data-src="//asia-public.foodpanda.com/dynamic/production/in/images/vendors/m5so_sqp.jpg?v=20171002145409" class="lazy-loaded">
                    </a>
                </li>
                <li class="home-popular-restaurants__list__item">
                    <a href="/restaurant/r3dh/hyderabadi-biryani-hub-marathalli">


                        <img alt="Hyderabadi Biryani Hub (Marathalli)" width="80" height="80" src="//asia-public.foodpanda.com/dynamic/production/in/images/vendors/r3dh_sqp.jpg?v=20171201160123" data-src="//asia-public.foodpanda.com/dynamic/production/in/images/vendors/r3dh_sqp.jpg?v=20171201160123" class="lazy-loaded">
                    </a>
                </li>
                <li class="home-popular-restaurants__list__item">
                    <a href="/restaurant/r7ow/rangla-punjab-fpds">


                        <img alt="Rangla Punjab" width="80" height="80" src="//asia-public.foodpanda.com/dynamic/production/in/images/vendors/r7ow_sqp.jpg?v=20171127124829" data-src="//asia-public.foodpanda.com/dynamic/production/in/images/vendors/r7ow_sqp.jpg?v=20171127124829" class="lazy-loaded">
                    </a>
                </li>
                <li class="home-popular-restaurants__list__item">
                    <a href="/restaurant/s5gg/celebration-multicuisine-family-resatuarant">


                        <img alt="Celebration Multicuisine Family Resatuarant" width="80" height="80" src="//asia-public.foodpanda.com/dynamic/production/in/images/vendors/s5gg_sqp.jpg?v=20170908125114" data-src="//asia-public.foodpanda.com/dynamic/production/in/images/vendors/s5gg_sqp.jpg?v=20170908125114" class="lazy-loaded">
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

@endsection