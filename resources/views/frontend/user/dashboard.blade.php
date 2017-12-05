@extends('frontend.layouts.app')

@section('content')
<div class="row">

    <div class="col-xs-12">

        <div class="panel panel-default">
            <div class="panel-heading">Zomato Local</div>

            <div class="panel-body">

                <div class="row">

                    <div class="col-md-4 col-md-push-8">

                        <ul class="medi                                a-list">
                            <li class="media">
                                <div class="media-left">
                                    <img class="media-object profile-picture" src="{{ $logged_in_user->picture }}" alt="Profile picture">
                                </div><!--media-left-->

                                <div class="media-body">
                                    <h4 class="media-heading">
                                        {{ $logged_in_user->name }}<br/>
                                        <small>
                                            {{ $logged_in_user->email }}<br/>
                                            {{ trans('strings.frontend.general.joined') }} {{ $logged_in_user->created_at->format('F jS, Y') }}
                                        </small>
                                    </h4>

                                    {{ link_to_route('frontend.user.account', trans('navs.frontend.user.account'), [], ['class' => 'btn btn-info btn-xs']) }}

                                    @permission('view-backend')
                                    {{ link_to_route('admin.dashboard', trans('navs.frontend.user.administration'), [], ['class' => 'btn btn-danger btn-xs']) }}
                                    @endauth
                                </div><!--media-body-->
                            </li><!--media-->
                        </ul><!--media-list-->

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4>Favourite Reasturants</h4>
                            </div><!--panel-heading-->

                            <div class="panel-body">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non qui facilis deleniti expedita fuga ipsum numquam aperiam itaque cum maxime.
                            </div><!--panel-body-->
                        </div><!--panel-->

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4>Favourite Item</h4>
                            </div><!--panel-heading-->

                            <div class="panel-body">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non qui facilis deleniti expedita fuga ipsum numquam aperiam itaque cum maxime.
                            </div><!--panel-body-->
                        </div><!--panel-->
                    </div><!--col-md-4-->

                    <div class="col-md-8 col-md-pull-4">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="panel panel-default">
                                    <form action="{{route('frontend.user.search')}}" method="POST">

                                        {{ csrf_field() }}
                                        <div class="panel-heading">
                                            <label for="restaurantName">Please Enter Restaurant's Name</label>
                                            <input type="text" class="form-control" id="title" name="restaurantName">
                                        </div><!--panel-heading-->

                                        <div class="panel-body">
                                            <button type="submit" class="btn btn-primary">Search</button>
                                        </div><!--panel-body-->
                                    </form>
                                </div><!--panel-->
                            </div><!--col-xs-12-->
                        </div><!--row-->

                        <div class="row">
                            @foreach($restaurant as $restro)
                            <div class="col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4>Featured Restaurant</h4>
                                    </div><!--panel-heading-->

                                    <div class="panel-body">

                                        <img src="/uploads/{{$restro->image}}" height="150px" width="288px" /> <br> 
                                        <h3> <a href="{{route('frontend.user.show', $restro->id)}}">
                                                {{$restro->name}}</b>
                                            </a></h3>
                                        <h4>{{$restro->contact_person}}</h4>
                                        <h4>{{$restro->phone}}</h4>
                                        <h4>{{$restro->address}}</h4>

                                    </div><!--panel-body-->
                                </div><!--panel-->
                            </div><!--col-md-6-->
                            @endforeach
                        </div><!--row-->

                    </div><!--col-md-8-->

                </div><!--row-->

            </div><!--panel body-->

        </div><!-- panel -->

    </div><!-- col-md-10 -->

</div><!-- row -->
@endsection
