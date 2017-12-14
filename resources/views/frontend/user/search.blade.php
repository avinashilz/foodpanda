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
<div class="breadcrumbs">
    <div class="container">
        <a href="{{route('frontend.index')}}"> Home </a> > Restaurants
    </div>
</div>
<div class="row">

    <div class="col-sm-2" style="
         margin-left: 50px;
         ">

        <div class="row aside">
            <aside class="clearfix">
                <div id="sticky-wrapper" class="sticky-wrapper">
                    <div class="js-sticky-element js-vendor-detail-menu-categories" data-sticky-bottom-margin="40" style="">

                        <ul class="categories__list ">
                            @foreach($categoriesInSidebar as$cat)
                            <li class='categories__list__item'> <a href='#'>
                                    {{$cat->categories}}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </aside>
        </div>
    </div>

    <div id="restrosection" class='col-sm-8'>
        @foreach ($restaurants as $restro)
        <article class="vendor">
            <a class="vendor__inner" href="{{route('frontend.restaurantShow', $restro->id)}}">
                <div class="vendor__image">
                    <img src="{{ route('frontend.user.getentry', $restro->fileentry['filename'])}}" height="80px" width="80px" /> <br> 
                </div>
                <div class="vendor__details">
                    <div class="vendor__title">
                        <span class="vendor__name">
                            {{$restro->name}}
                        </span>

                        <div class="clear"></div>
                    </div>
                    <ul class="vendor__cuisines">
                        <?php $count = 1; ?>
                        @foreach($restro->items as $item)
                        <li> {{$item->category->categories}} </li>
                        @if($count==3)
                        @break;
                        @endif
                        <?php $count++; ?>
                        @endforeach
                    </ul>

                    <div class="vendor__details__footer">
                        <div class="vendor__affordability" data-tooltip-element=".price-tooltip-s5ya">
                            <span class="vendor__affordability__value">₹₹₹</span>

                        </div>

                        <div class="vendor__ratings_recommendation__container">
                            <div class="vendor__ratings">


                                <div class="rating  ">


                                    <div class="rateit" data-rateit-value="2.5" data-rateit-ispreset="true" data-rateit-readonly="true"></div>
                                    <span class="review">
                                        (<span>172</span>)
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="vendor__info">
                    delivers in <b> 60 mins </b>
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                </div>
            </a>
        </article>
        @endforeach
    </div>
</div>
@foreach($categoriesInSidebar as$cat)
{{$cat->id}}
{{$cat->categories}}
@endforeach
@endsection
