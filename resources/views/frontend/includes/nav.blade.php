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
                </div>

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
        </div>
    </div>
</nav>-->
<div class="homepage-area-selection-container lazy-loaded" style="background-image: url(&quot;//asia-public.foodpanda.com/assets/production/in/layout/themes/capricciosa_foodpanda/images/en/homepage-splash.jpg?v=1459438060&quot;);">
    <header class="">

        <div class="container">
            <div class="header-mobile-item left">
                <i class="icon icon-more mobile-menu__menu-toggle"></i>
            </div>


            <a href="" class="active header-logo">        
                <img alt="Logo" src="//asia-public.foodpanda.com/assets/production/in/layout/themes/capricciosa_foodpanda/images/en/logo.png?v=1459438060"> </a>

            <div class="header-links">
                <ul class="nav navbar-nav navbar-right">


                    @if (! $logged_in_user)
                    <li class="nochange">{{ link_to_route('frontend.auth.login', trans('navs.frontend.login'), [], ['class' => active_class(Active::checkRoute('frontend.auth.login')) ]) }}</li>

                    @if (config('access.users.registration'))
                    <li class=""nochange>{{ link_to_route('frontend.auth.register', trans('navs.frontend.register'), [], ['class' => active_class(Active::checkRoute('frontend.auth.register')) ]) }}</li>
                     <a href="{{ route('frontend.showSelectedItem') }}">
                     <i style="font-size: 20px; margin-top: 12px;" id="cart" class="fa  fa-cart-arrow-down" aria-hidden="true"></i>
                    </a>
                    @endif
                    @else
                    <li>{{ link_to_route('frontend.auth.logout', trans('navs.general.logout')) }}</li>
                    <a href="{{ route('frontend.showSelectedItem') }}">
                     <i style="font-size: 20px; margin-top: 12px;" id="cart" class="fa  fa-cart-arrow-down" aria-hidden="true"></i>
                    </a>
                    <!--                <ul class="header-links__list">
                      <li class="dropdown header-links__customer-account">
                          <a href="/customer/account" data-toggle="dropdown">
                              <i class="fa fa-user-o" aria-hidden="true"> </i>
                              <span class="label1">My Account</span>
                              <i class="fa fa-angle-down" aria-hidden="true"></i>
                          </a>
  
                          <ul class="dropdown-menu" role="menu">
                              @permission('view-backend')
                              <li>{{ link_to_route('admin.dashboard', trans('navs.frontend.user.administration')) }}</li>
                              @endauth
                              <li>{{ link_to_route('frontend.user.account', trans('navs.frontend.user.account'), [], ['class' => active_class(Active::checkRoute('frontend.user.account')) ]) }}</li>
                              <li>{{ link_to_route('frontend.auth.logout', trans('navs.general.logout')) }}</li>
                          </ul>
                      </li>
                  </ul>-->
                    @endif
                </ul>
            </div>
        </div>
    </header>
