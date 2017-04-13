@extends('store.layouts.admin_layout')

@section('scripts')
        <script>
            Pusher.logToConsole = true;

            {{--@if(\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->id == $user->id)--}}
            var pusher = new Pusher('d7c6fc127150c78d0f33', {
                cluster: 'eu',
                encrypted: true
            });

            var channel = pusher.subscribe('chat-room.1');
            channel.bind('App\\Events\\ChatMessageReceived', function(data) {
//            alert(data.chatMessage.message);
//                setTimeout(function () {
//                    alert('all feeds event reached');
                    $.get('/all-feeds', function (data) {
                        $('#feeds').html(data)
                    }).fail(function () {
//                        alert('error')
                    })
//                }, 1000);
            })

            $('#timeline-form').on('submit',function(e){
                e.preventDefault();
                $.post('/add-to-timeline',$('#timeline-form').serialize(),function(){

                })
            })
        </script>

@endsection

@section('content')
        <!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <!-- BEGIN PAGE HEAD-->
        <div class="page-head">
            <div class="container">
                <!-- BEGIN PAGE TITLE -->
                <div class="page-title">
                    <h1>Timeline
                        <small></small>
                    </h1>
                </div>
                <!-- END PAGE TITLE -->

            </div>
        </div>
        <!-- END PAGE HEAD-->
        <!-- BEGIN PAGE CONTENT BODY -->
        <div class="page-content">
            <div class="container">
                <!-- BEGIN PAGE BREADCRUMBS -->
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <a href="{{url('/')}}">Home</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <a href="{{url('/all-feeds')}}">All Feeds</a>
                        {{--<i class="fa fa-circle"></i>--}}
                    </li>
                    {{--<li>--}}
                        {{--<span>Timeline</span>--}}
                    {{--</li>--}}
                </ul>
                <!-- END PAGE BREADCRUMBS -->
                <!-- BEGIN PAGE CONTENT INNER -->
                <div class="page-content-inner">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="portlet light portlet-fit ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        {{--<i class="icon-microphone font-green"></i>--}}
                                        <span class="fa fa-commenting bold font-green uppercase"> All Feeds</span>
                                        {{--<span class="caption-helper">default option...</span>--}}
                                    </div>
                                    {{--<div class="actions">--}}
                                        {{--<div class="btn-group btn-group-devided" data-toggle="buttons">--}}
                                            {{--<label class="btn red btn-outline btn-circle btn-sm active">--}}
                                                {{--<input type="radio" name="options" class="toggle" id="option1">Settings</label>--}}
                                            {{--<label class="btn  red btn-outline btn-circle btn-sm">--}}
                                                {{--<input type="radio" name="options" class="toggle" id="option2">Tools</label>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                </div>
                                <div class="portlet-body">
                                    <div class="timeline">
                                        <!-- TIMELINE ITEM -->
                                        <div class="timeline-item">
                                            <div class="timeline-badge">
                                                {{--                                                <img class="timeline-badge-userpic" src="{{asset('backend/assets/pages/media/users/avatar80_1.jpg')}}"> </div>--}}
                                                <img class="timeline-badge-userpic" src="{{url('frontend_2/image/shopaholicks_logos_03.png')}}"> </div>
                                            <div class="timeline-body">
                                                <div class="timeline-body-arrow"> </div>
                                                {{--<div class="timeline-body-head">--}}
                                                    {{--<div class="timeline-body-head-caption">--}}
                                                        {{--<a href="javascript:;" class="timeline-body-title font-blue-madison pull-right" style="position: absolute; left:73%;">--}}
                                                            {{--<small> </small>--}}
                                                        {{--</a>--}}
                                                        {{--<span class="timeline-body-time font-grey-cascade">--}}
{{--                                                            {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$feed->created_at)->diffForHumans()}}--}}
                                                        {{--</span>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                                <div class="timeline-body-content">

                                                    <form action="{{url('/add-to-timeline')}}" id="timeline-form">
                                                    <textarea class="form-control" name="message" required style="position: relative; top: -20px;" placeholder="What do you want your followers to know ?"></textarea>
                                                    <span class="pull-left">hel</span>
                                                    <button class="btn btn-success pull-right">post to timeline</button>
                                                    </form>
                                                            <span class="font-grey-cascade">

                                                            </span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END TIMELINE ITEM -->
                                    </div>

                                    <div class="feeds" id="feeds">
                                    @foreach($feeds as $feed)
                                    <div class="timeline">
                                        <!-- TIMELINE ITEM -->
                                        <div class="timeline-item">
                                            <div class="timeline-badge">
{{--                                                <img class="timeline-badge-userpic" src="{{asset('backend/assets/pages/media/users/avatar80_1.jpg')}}"> </div>--}}
                                                <img class="timeline-badge-userpic" src="{{url('frontend_2/image/shopaholicks_logos_03.png')}}"> </div>
                                            <div class="timeline-body">
                                                <div class="timeline-body-arrow"> </div>
                                                <div class="timeline-body-head">
                                                    <div class="timeline-body-head-caption">
                                                        <i class="timeline-body-title pull-right font-grey-cascade" style="position: absolute; left:73%;">
                                                           <small> {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$feed->created_at)->diffForHumans()}}</small>
                                                        </i>
                                                        <span class="timeline-body-time font-grey-cascade">
{{--                                                            {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$feed->created_at)->diffForHumans()}}--}}
                                                        </span>
                                                    </div>
                                                    <div class="timeline-body-head-actions">
                                                        <div class="btn-group">
                                                            {{--<button class="btn btn-circle green btn-sm dropdown-toggle" type="button" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> Actions--}}
                                                                {{--<i class="fa fa-angle-down"></i>--}}
                                                            {{--</button>--}}
                                                            {{--<ul class="dropdown-menu pull-right" role="menu">--}}
                                                                {{--<li>--}}
                                                                    {{--<a href="javascript:;">Action </a>--}}
                                                                {{--</li>--}}
                                                                {{--<li>--}}
                                                                    {{--<a href="javascript:;">Another action </a>--}}
                                                                {{--</li>--}}
                                                                {{--<li>--}}
                                                                    {{--<a href="javascript:;">Something else here </a>--}}
                                                                {{--</li>--}}
                                                                {{--<li class="divider"> </li>--}}
                                                                {{--<li>--}}
                                                                    {{--<a href="javascript:;">Separated link </a>--}}
                                                                {{--</li>--}}
                                                            {{--</ul>--}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="timeline-body-content">
                                                            <span class="font-grey-cascade">
                                                               {{$feed->action}}
                                                            </span>
                                                    <br>
                                                   <button><i class="fa fa-thumbs-up text-center"></i></button>
                                                    <button><i class="fa fa-heart"></i></button>
                                                    <button><i class="icon-user-following"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END TIMELINE ITEM -->
                                    </div>
                                    @endforeach
                                    </div>
                                        <button class="" style="float:right; position: relative; bottom: 20px;">load more..</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="portlet light portlet-fit ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        {{--<i class="icon-microphone font-green"></i>--}}
                                        <span class="caption-subject bold font-green uppercase"> Following</span>
                                        {{--<span class="caption-helper">default option...</span>--}}
                                    </div>
                                    <div class="actions">
                                        {{--<div class="btn-group btn-group-devided" data-toggle="buttons">--}}
                                            {{--<label class="btn red btn-outline btn-circle btn-sm active">--}}
                                                {{--<input type="radio" name="options" class="toggle" id="option1">Settings</label>--}}
                                            {{--<label class="btn  red btn-outline btn-circle btn-sm">--}}
                                                {{--<input type="radio" name="options" class="toggle" id="option2">Tools</label>--}}
                                        {{--</div>--}}
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="timeline">
                                        <!-- TIMELINE ITEM -->
                                        <div class="timeline-item">
                                            {{--<div class="timeline-badge"><img class="timeline-badge-userpic" src="{{asset('backend/assets/pages/media/users/avatar80_1.jpg')}}"> </div>--}}
                                            <div class="timeline-body">
                                                <div class="timeline-body-arrow"> </div>
                                                <div class="timeline-body-head">
                                                    <div class="timeline-body-head-caption">
                                                        <a href="javascript:;" class="timeline-body-title font-blue-madison">Andres Iniesta</a>
                                                        <span class="timeline-body-time font-grey-cascade">Replied at 7:45 PM</span>
                                                    </div>
                                                    <div class="timeline-body-head-actions">
                                                        <div class="btn-group">
                                                            <button class="btn btn-circle green btn-sm dropdown-toggle" type="button" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> Actions
                                                                <i class="fa fa-angle-down"></i>
                                                            </button>
                                                            <ul class="dropdown-menu pull-right" role="menu">
                                                                <li>
                                                                    <a href="javascript:;">Action </a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:;">Another action </a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:;">Something else here </a>
                                                                </li>
                                                                <li class="divider"> </li>
                                                                <li>
                                                                    <a href="javascript:;">Separated link </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="timeline-body-content">
                                                            <span class="font-grey-cascade">
                                                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                                                            </span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END TIMELINE ITEM -->
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="portlet light portlet-fit ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        {{--<i class="icon-microphone font-green"></i>--}}
                                        <span class="caption-subject bold font-green uppercase"> Followers</span>
                                        {{--<span class="caption-helper">default option...</span>--}}
                                    </div>
                                    {{--<div class="actions">--}}
                                        {{--<div class="btn-group btn-group-devided" data-toggle="buttons">--}}
                                            {{--<label class="btn red btn-outline btn-circle btn-sm active">--}}
                                                {{--<input type="radio" name="options" class="toggle" id="option1">Settings</label>--}}
                                            {{--<label class="btn  red btn-outline btn-circle btn-sm">--}}
                                                {{--<input type="radio" name="options" class="toggle" id="option2">Tools</label>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                </div>
                                <div class="portlet-body">
                                    @foreach($followers as $follower)
                                    <div class="timeline">
                                        <!-- TIMELINE ITEM -->
                                        <div class="timeline">
                                            <!-- TIMELINE ITEM -->
                                            <div class="timeline-item">
                                                <div class="timeline-badge">
                                                    <img class="timeline-badge-userpic" src="{{asset('backend/assets/pages/media/users/avatar80_1.jpg')}}"> </div>
                                                <div class="timeline-body">
                                                    <div class="timeline-body-arrow"> </div>
                                                    <div class="timeline-body-head">
                                                        <div class="timeline-body-head-caption">
                                                            <a href="javascript:;" class="timeline-body-title font-blue-madison">Andres Iniesta</a>
                                                            <span class="timeline-body-time font-grey-cascade">Replied at 7:45 PM</span>
                                                        </div>
                                                        <div class="timeline-body-head-actions">
                                                            <div class="btn-group">
                                                                <button class="btn btn-circle green btn-sm dropdown-toggle" type="button" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> Actions
                                                                    <i class="fa fa-angle-down"></i>
                                                                </button>
                                                                <ul class="dropdown-menu pull-right" role="menu">
                                                                    <li>
                                                                        <a href="javascript:;">Action </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="javascript:;">Another action </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="javascript:;">Something else here </a>
                                                                    </li>
                                                                    <li class="divider"> </li>
                                                                    <li>
                                                                        <a href="javascript:;">Separated link </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="timeline-body-content">
                                                            <span class="font-grey-cascade">
                                                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                                                            </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END TIMELINE ITEM -->
                                        </div>
                                        <!-- END TIMELINE ITEM -->
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- END PAGE CONTENT INNER -->
            </div>
        </div>
        <!-- END PAGE CONTENT BODY -->
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
</div>
<!-- END CONTAINER -->

@endsection