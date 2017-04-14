@extends('store.layouts.admin_layout')

@section('scripts')
    <style>
        body {
            font-family: 'Roboto', Arial, Helvetica, Sans-serif, Verdana;
            background: #dee1e3;
        }
    </style>
        <script>
            $('#timeline-form').on('submit',function(e){
                e.preventDefault();
                $.ajax({
                    url:"{{url('/add-to-timeline')}}",
                    type:"POST",
                    data: $(this).serialize(),
                    dataType: 'json',
                    beforeSend:function() {
                        $('#post-btn').text('posting...').attr('disabled',true)
                    },
                    complete:function( data ) {
//                        $('#post-btn').text('posting...')
//                        $('#post-btn').text('posting...').attr('disabled',true)
                        $('#post-btn').text('post to timeline').attr('disabled',false);
                        $('#message').val('')
                        messageCount();
                    }
//                    success:function(){
//                        $('#post-btn').text('post to timeline').attr('disabled',false);
//
//                    }
                })
            })

            $('.add-comment').on('click',function(){
                var id = $(this).data('id');
//                alert(id)
                var commentArea = $('#comment-area-'+id);
                commentArea.css('display','')

                $('#feed-reaction-form-'+id).on('submit',function (e){
                    e.preventDefault();
                    $.ajax({
                        url:$(this).attr('action'),
                        type:"POST",
                        data: $(this).serialize(),
                        dataType: 'json',
                        beforeSend:function() {
                            $('#comment-btn-'+id).text('commenting...').attr('disabled',true)
                        },
                        complete:function( ) {
                            $('#comment-btn'+id).val('comment').attr('disabled',false);
//                            $('#message').val('')
//                        messageCount();
                            commentArea.hide()
                        },
                    success:function(){
                        $('#comment-btn'+id).val('comment').attr('disabled',false);
                    }
                    })
                })
            });


            function messageCount(){
                var currentString = $("#message").val()
                $('#count').html(currentString.length)
            }
            $('#message').on('keyup',messageCount);

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
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <div class="portlet light portlet-fit ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        {{--<i class="icon-microphone font-green"></i>--}}
                                        <span class="fa fa-commenting bold font-green uppercase"> All Feeds</span>
                                        {{--<span class="caption-helper">default option...</span>--}}
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a href="#tab_1_1" data-toggle="tab" aria-expanded="true"> All Feeds </a>
                                        </li>
                                        <li class="">
                                            <a href="#tab_1_2" data-toggle="tab" aria-expanded="false"> Following </a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Followers
                                                <i class="fa fa-angle-down"></i>
                                            </a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li>
                                                    <a href="#tab_1_3" tabindex="-1" data-toggle="tab"> Followers </a>
                                                </li>

                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane fade active in" id="tab_1_1">
                                            <div class="portlet-body">
                                                <div class="timeline">
                                                    <!-- TIMELINE ITEM -->
                                                    <div class="timeline-item">
                                                        <div class="timeline-badge">
                                                            {{--                                                <img class="timeline-badge-userpic" src="{{asset('backend/assets/pages/media/users/avatar80_1.jpg')}}"> </div>--}}
                                                            @if(Auth::user()->has_store)
                                                                <?php
                                                                $store = \App\Store::whereUserId(\Illuminate\Support\Facades\Auth::id())->first()
                                                                ?>
                                                                <img class="timeline-badge-userpic" src='{{asset("images/stores/$store->image")}}'>

                                                            @else
                                                                <img class="timeline-badge-userpic" src="{{url('frontend_2/image/shopaholicks_logos_03.png')}}">

                                                            @endif

                                                        </div>
                                                        <div class="timeline-body">
                                                            <div class="timeline-body-arrow"> </div>

                                                            <div class="timeline-body-content">

                                                                <form action="{{url('/add-to-timeline')}}" id="timeline-form">
                                                                    <textarea class="form-control" name="message" id="message" maxlength="140" required style="position: relative; top: -20px;" placeholder="What do you want your followers to know ?"></textarea>
                                                                    <span class="pull-left" id="count"></span>
                                                                    <button id="post-btn" class="btn btn-success pull-right">post to timeline</button>
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
                                                                    @if($feed->other != '')
                                                                        <?php $store = \App\Store::whereImage($feed->other)->first(); ?>
                                                                        {{--                                                <img class="timeline-badge-userpic" src="{{asset('backend/assets/pages/media/users/avatar80_1.jpg')}}"> </div>--}}
                                                                        <a target="_blank" href='{{"/stores/$store->slug/$store->user_id"}}'>
                                                                            <img class="timeline-badge-userpic" src="{{url("/images/stores/$feed->other")}}">
                                                                        </a>
                                                                    @else
                                                                        <img class="timeline-badge-userpic" src="{{url("/images/stores/$feed->other")}}">
                                                                    @endif
                                                                </div>
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
                                                                        <small> {{"   " ." $feed->action"}}</small>

                                                                    <br>
                                                            </span>
                                                                        <br>
                                                                        @if(\App\FeedReaction::whereUserId(Auth::id())->whereFeedId($feed->id)->first() && \App\FeedReaction::whereUserId(Auth::id())->whereFeedId($feed->id)->first()->like == true)
                                                                            <button class="btn "><i style="color: green;" class="fa fa-thumbs-up text-center"></i></button>
                                                                        @else
                                                                            <button class="btn"><i class="fa fa-thumbs-up text-center"></i></button>
                                                                        @endif
                                                                        <button class="add-comment btn" data-id="{{$feed->id}}"><i class="fa fa-comment"></i></button>
                                                                        <br><br>
                                                                        @include('partials.comment_form_partial')
                                                                        {{--<button><i class="icon-user-following"></i></button>--}}
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
                                        <div class="tab-pane fade" id="tab_1_2">
                                            <div class="portlet light portlet-fit ">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        {{--<i class="icon-microphone font-green"></i>--}}
                                                        <span class="caption-subject bold font-green uppercase"> Following</span>
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
                                                    @if(count($following)== 0 )
                                                        <h4>You are not following any shop at the moment!</h4>
                                                    @else
                                                        @foreach($following as $follow)
                                                            <div class="timeline">
                                                                <!-- TIMELINE ITEM -->
                                                                <div class="timeline">
                                                                    <!-- TIMELINE ITEM -->
                                                                    <div class="timeline-item">
                                                                        <div class="timeline-badge"><img class="timeline-badge-userpic" src="https://placehold.it/100x100"> </div>
                                                                        <div class="timeline-body">
                                                                            <div class="timeline-body-arrow"> </div>
                                                                            <div class="timeline-body-head">
                                                                                <div class="timeline-body-head-caption">
                                                                                    <a href="javascript:;" class="timeline-body-title font-blue-madison">{{$follow->name}}</a>
                                                            <span class="timeline-body-time font-grey-cascade">

                                                                <small> {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$follow->created_at)->diffForHumans()}}</small>

                                                            </span>
                                                                                </div>
                                                                                <div class="timeline-body-head-actions">
                                                                                    {{--<div class="btn-group">--}}
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
                                                                                    {{--</div>--}}
                                                                                </div>
                                                                            </div>
                                                                            <div class="timeline-body-content">
                                                            <span class="font-grey-cascade">
                                                               {{"You started following $follow->name ". \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$follow->created_at)->diffForHumans()}}
                                                            </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- END TIMELINE ITEM -->
                                                                </div>
                                                                <!-- END TIMELINE ITEM -->
                                                            </div>
                                                        @endforeach
                                                        <button class="" style="float:right; position: relative; bottom: 20px;">load more..</button>

                                                    @endif

                                                </div>
                                            </div>

                                        </div>
                                        <div class="tab-pane fade" id="tab_1_3">
                                            <div class="portlet-body">
                                                @if(count($followers)== 0 )
                                                    <h4>No Followers at the moment ...</h4>
                                                @else
                                                    @foreach($followers as $follower)
                                                        <div class="timeline">
                                                            <!-- TIMELINE ITEM -->
                                                            <div class="timeline">
                                                                <!-- TIMELINE ITEM -->
                                                                <div class="timeline-item">
                                                                    <div class="timeline-badge"><img class="timeline-badge-userpic" src="https://placehold.it/100x100"> </div>
                                                                    <div class="timeline-body">
                                                                        <div class="timeline-body-arrow"> </div>
                                                                        <div class="timeline-body-head">
                                                                            <div class="timeline-body-head-caption">
                                                                                <a href="javascript:;" class="timeline-body-title font-blue-madison">{{$follower->name}}</a>
                                                            <span class="timeline-body-time font-grey-cascade">

                                                                <small> {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$follower->followed_at)->diffForHumans()}}</small>

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
                                                               {{"$follower->name followed you ". \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$follower->followed_at)->diffForHumans()}}
                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- END TIMELINE ITEM -->
                                                            </div>
                                                            <!-- END TIMELINE ITEM -->
                                                        </div>
                                                    @endforeach
                                                    <button class="" style="float:right; position: relative; bottom: 20px;">load more..</button>
                                                @endif

                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab_1_4">
                                            <p> Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party
                                                locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby sweater. Lomo wolf viral, mustache readymade
                                                thundercats keffiyeh craft beer marfa ethical. Wolf salvia freegan, sartorial keffiyeh echo park vegan. </p>
                                        </div>
                                    </div>
                                    <div class="clearfix margin-bottom-20"> </div>

                                </div>

                            </div>
                        </div>
                        </div>
                    </div>
                    </div>

                    </div>
                </div>
                <!-- END PAGE CONTENT INNER -->
            </div>
        {{--</div>--}}
        <!-- END PAGE CONTENT BODY -->
        <!-- END CONTENT BODY -->
    {{--</div>--}}
    <!-- END CONTENT -->
{{--</div>--}}
<!-- END CONTAINER -->

@endsection