
<header class="">
    <div class="container">
        <div class="header-mobile-item left">
            <i class="icon icon-more mobile-menu__menu-toggle"></i>
        </div>

        <a href="/" class="header-logo ">
            <img alt="Logo" src="//asia-public.foodpanda.com/assets/production/in/layout/themes/capricciosa_foodpanda/images/en/logo.png?v=1459438060">
        </a>
        <ul id="header">
            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="{{ access()->user()->picture }}" class="user-image" alt="User Avatar"/>
                    <span class="hidden-xs">{{ access()->user()->full_name }}</span>
                </a>

                <ul class="dropdown-menu">
                    <li class="user-header">
                        <img src="{{ access()->user()->picture }}" class="img-circle" alt="User Avatar" />
                        <p>
                            {{ access()->user()->full_name }} - {{ implode(", ", access()->user()->roles->pluck('name')->toArray()) }}
                            <small>{{ trans('strings.backend.general.member_since') }} {{ access()->user()->created_at->format("m/d/Y") }}</small>
                        </p>
                    </li>

                    <li class="user-body">
                        <div class="col-xs-4 text-center">
                            {{ link_to('#', 'Link') }}
                        </div>
                        <div class="col-xs-4 text-center">
                            {{ link_to('#', 'Link') }}
                        </div>
                        <div class="col-xs-4 text-center">
                            {{ link_to('#', 'Link') }}
                        </div>
                    </li>

                    <li class="user-footer">
                        <div class="pull-left">
                            <a href="{!! route('frontend.index') !!}" class="btn btn-default btn-flat">
                                <i class="fa fa-home"></i>
                                {{ trans('navs.general.home') }}
                            </a>
                        </div>
                        <div class="pull-right">
                            <a href="{!! route('frontend.auth.logout') !!}" class="btn btn-danger btn-flat">
                                <i class="fa fa-sign-out"></i>
                                {{ trans('navs.general.logout') }}
                            </a>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</header>
