<!--<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#frontend-navbar-collapse">
                <span class="sr-only">{{ trans('labels.general.toggle_navigation') }}</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            {{ link_to_route('frontend.index', app_name(), [], ['class' => 'navbar-brand']) }}
        </div>navbar-header

        <div class="collapse navbar-collapse" id="frontend-navbar-collapse">
            <ul class="nav navbar-nav">
                <li>{{ link_to_route('frontend.macros', trans('navs.frontend.macros'), [], ['class' => active_class(Active::checkRoute('frontend.macros')) ]) }}</li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if (config('locale.status') && count(config('locale.languages')) > 1)
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ trans('menus.language-picker.language') }}
                        <span class="caret"></span>
                    </a>

                    @include('includes.partials.lang')
                </li>
                @endif

                @if ($logged_in_user)
                <li>{{ link_to_route('frontend.user.dashboard', trans('navs.frontend.dashboard'), [], ['class' => active_class(Active::checkRoute('frontend.user.dashboard')) ]) }}</li>
                @endif

                @if (! $logged_in_user)
                <li>{{ link_to_route('frontend.auth.login', trans('navs.frontend.login'), [], ['class' => active_class(Active::checkRoute('frontend.auth.login')) ]) }}</li>

                @if (config('access.users.registration'))
                <li>{{ link_to_route('frontend.auth.register', trans('navs.frontend.register'), [], ['class' => active_class(Active::checkRoute('frontend.auth.register')) ]) }}</li>
                @endif
                @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ $logged_in_user->name }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        @permission('view-backend')
                        <li>{{ link_to_route('admin.dashboard', trans('navs.frontend.user.administration')) }}</li>
                        @endauth
                        <li>{{ link_to_route('frontend.user.account', trans('navs.frontend.user.account'), [], ['class' => active_class(Active::checkRoute('frontend.user.account')) ]) }}</li>
                        <li>{{ link_to_route('frontend.auth.logout', trans('navs.general.logout')) }}</li>
                    </ul>
                </li>
                @endif

                <li>{{ link_to_route('frontend.contact', trans('navs.frontend.contact'), [], ['class' => active_class(Active::checkRoute('frontend.contact')) ]) }}</li>
            </ul>
        </div>navbar-collapse
    </div>container
</nav>-->
<div class="homepage-area-selection-container lazy-loaded" style="background-image: url(&quot;//asia-public.foodpanda.com/assets/production/in/layout/themes/capricciosa_foodpanda/images/en/homepage-splash.jpg?v=1459438060&quot;);">
    <header class="">

        <div class="container">
            <div class="header-mobile-item left">
                <i class="icon icon-more mobile-menu__menu-toggle"></i>
            </div>


            <a href="http://zomotolocal.com/home" class="active header-logo">        <img alt="Logo" src="//asia-public.foodpanda.com/assets/production/in/layout/themes/capricciosa_foodpanda/images/en/logo.png?v=1459438060"> </a>

            <div class="header-links">
                <ul class="header-links__list">

                    <li class="header-links__customer-account">
                        <a href="/customer/account" data-toggle="dropdown">
                            <i class="fa fa-user-o" aria-hidden="true"> </i>
                            <span class="label1">My Account</span>
                            <i class="fa fa-angle-down" aria-hidden="true"></i>
                        </a>
                        <ul class="dropdown-menu" role="menu">

                            <li>
                                <a href="http://zomotolocal.com/account">
                                    My Account
                                </a>
                            </li>
                            <li>
                                <a href="/logout">
                                    Log out
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <div class="container">

        <div class="homepage-tagline">
            <div class="homepage-headline">
                <h1>Order delicious food online!</h1>
                <h2>Order food online from the best restaurants near you</h2>
            </div>
        </div>




        <div class="js-location-search location-search location-search-main-page  location_city_area  ">
            <div class="location-search-inner">
                <form name="" method="get" action="/location-suggestions" role="form" class="form-vertical" novalidate="novalidate" autocomplete="off">

                    <div class="area">
                        <label for="area" class="required">Enter your area</label>
                        <span class="twitter-typeahead" style="position: relative; display: inline-block; direction: ltr;"><input type="text" data-prefill="location.areaName" class="form-control tt-hint" readonly="" autocomplete="off" spellcheck="false" tabindex="-1" style="position: absolute; top: 0px; left: 0px; border-color: transparent; box-shadow: none; opacity: 1; background: none 0% 0% / auto repeat scroll padding-box border-box rgb(255, 255, 255);"><input type="text" id="area" name="area" required="required" data-prefill="location.areaName" class="form-control tt-input" placeholder="Enter an area" autocomplete="off" spellcheck="false" dir="auto" style="position: relative; vertical-align: top; background-color: transparent;"><pre aria-hidden="true" style="position: absolute; visibility: hidden; white-space: pre; font-family: &quot;Open Sans&quot;, sans-serif; font-size: 18px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 300; word-spacing: 0px; letter-spacing: 0px; text-indent: 0px; text-rendering: auto; text-transform: none;"></pre><span class="tt-dropdown-menu" style="position: absolute; top: 100%; left: 0px; z-index: 100; display: none; right: auto;"><div class="tt-dataset-area"></div></span></span>
                        <span id="area-not-selected-error" class="help-inline">

                        </span>
                    </div>





                    <div class="find-food">
                        <button type="submit" id="button" name="button" class="btn btn-primary btn-block">Show restaurants</button>

                        <img id="find-restaurant-spinner" src="/bundles/foodpandashopsite/images/loader.gif">
                    </div>

                    <input type="hidden" id="area_id" name="area_id" data-prefill="location.areaId"><input type="hidden" id="pickup" name="pickup"><input type="hidden" id="sort" name="sort"><input type="hidden" id="tracking_id" name="tracking_id" data-prefill="location.tracking_id"></form>
            </div>
        </div>
    </div>
</div>