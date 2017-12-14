<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', app_name())</title>

        <!-- Meta -->
        <meta name="description" content="@yield('meta_description', 'Laravel 5 Boilerplate')">
        <meta name="author" content="@yield('meta_author', 'Anthony Rappa')">
        @yield('meta')

        <!-- Styles -->
        @yield('before-styles')

        <!-- Check if the language is set to RTL, so apply the RTL layouts -->
        <!-- Otherwise apply the normal LTR layouts -->
        @langRTL
        {{ Html::style(getRtlCss(mix('css/frontend.css'))) }}
        @else
        {{ Html::style('http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css')}}



        {{html::style('css/fontawesome.min.css')}}
        {{Html::style('css/rateit.css')}}
        {{ Html::style('css/frontend.css') }}
        {{Html::style('css/frontpage.css')}}

        {{Html::script('https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js')}}
        {{Html::script('https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js')}}
        {{Html::script('https://maps.googleapis.com/maps/api/js?sensor=true&language=en&libraries=places&key=AIzaSyB8XfIcDmOOohpUF9QlJL8nrJIrFgT35C4')}}

        @endif

        @yield('after-styles')

        <!-- Scripts -->
        <script>
            window.Laravel = <?php
echo json_encode([
    'csrfToken' => csrf_token(),
]);
?>
        </script>
    </head>
    <body id="app-layout">
        <div id="app">
            @include('includes.partials.logged-in-as')
            @include('frontend.includes.nav')

            <!--container-->
            @include('includes.partials.messages')
            @yield('content')
            <!-- /container -->
        </div><!--#app-->

        <!-- Scripts -->
        @yield('before-scripts')
        {!! Html::script(mix('js/frontend.js')) !!}
        {!! Html::script('js/jquery.placepicker.js') !!}
        {!!Html::script('js/jquery.rateit.min.js') !!}
        {!! Html::script('js/frontendCustom.js') !!}
         {!! Html::script(('js/floatit.js')) !!}
        {!! Html::script('js/handleCounter.js') !!}
        @yield('after-scripts')

        @include('includes.partials.ga')
    </body>
</html>