@extends('store.layouts.admin_layout')

@section('scripts')
    <style>
        * {
            margin: 0;
            padding: 0;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        a {
            color: #03658c;
            text-decoration: none;
        }

        ul {
            list-style-type: none;
        }

        /*body {*/
        /*font-family: 'Roboto', Arial, Helvetica, Sans-serif, Verdana;*/
        /*background: #dee1e3;*/
        /*}*/

        /** ====================
         * Lista de Comentarios
         =======================*/
        .comments-container {
            margin: 60px auto 15px;
            width: 768px;
        }

        .comments-container h1 {
            font-size: 36px;
            color: #283035;
            font-weight: 400;
        }

        .comments-container h1 a {
            font-size: 18px;
            font-weight: 700;
        }

        .comments-list {
            margin-top: 30px;
            position: relative;
        }

        /**
         * Lineas / Detalles
         -----------------------*/
        .comments-list:before {
            content: '';
            width: 2px;
            height: 100%;
            background: #c7cacb;
            position: absolute;
            left: 32px;
            top: 0;
        }

        .comments-list:after {
            content: '';
            position: absolute;
            background: #c7cacb;
            bottom: 0;
            left: 27px;
            width: 7px;
            height: 7px;
            border: 3px solid #dee1e3;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            border-radius: 50%;
        }

        .reply-list:before, .reply-list:after {display: none;}
        .reply-list li:before {
            content: '';
            width: 60px;
            height: 2px;
            background: #c7cacb;
            position: absolute;
            top: 25px;
            left: -55px;
        }


        .comments-list li {
            margin-bottom: 15px;
            display: block;
            position: relative;
        }

        .comments-list li:after {
            content: '';
            display: block;
            clear: both;
            height: 0;
            width: 0;
        }

        .reply-list {
            padding-left: 88px;
            clear: both;
            margin-top: 15px;
        }
        /**
         * Avatar
         ---------------------------*/
        .comments-list .comment-avatar {
            width: 65px;
            height: 65px;
            position: relative;
            z-index: 99;
            float: left;
            border: 3px solid #FFF;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
            -webkit-box-shadow: 0 1px 2px rgba(0,0,0,0.2);
            -moz-box-shadow: 0 1px 2px rgba(0,0,0,0.2);
            box-shadow: 0 1px 2px rgba(0,0,0,0.2);
            overflow: hidden;
        }

        .comments-list .comment-avatar img {
            width: 100%;
            height: 100%;
        }

        .reply-list .comment-avatar {
            width: 50px;
            height: 50px;
        }

        .comment-main-level:after {
            content: '';
            width: 0;
            height: 0;
            display: block;
            clear: both;
        }
        /**
         * Caja del Comentario
         ---------------------------*/
        .comments-list .comment-box {
            width: 680px;
            float: right;
            position: relative;
            -webkit-box-shadow: 0 1px 1px rgba(0,0,0,0.15);
            -moz-box-shadow: 0 1px 1px rgba(0,0,0,0.15);
            box-shadow: 0 1px 1px rgba(0,0,0,0.15);
        }

        .comments-list .comment-box:before, .comments-list .comment-box:after {
            content: '';
            height: 0;
            width: 0;
            position: absolute;
            display: block;
            border-width: 10px 12px 10px 0;
            border-style: solid;
            border-color: transparent #FCFCFC;
            top: 8px;
            left: -11px;
        }

        .comments-list .comment-box:before {
            border-width: 11px 13px 11px 0;
            border-color: transparent rgba(0,0,0,0.05);
            left: -12px;
        }

        .reply-list .comment-box {
            width: 610px;
        }
        .comment-box .comment-head {
            background: #FCFCFC;
            padding: 10px 12px;
            border-bottom: 1px solid #E5E5E5;
            overflow: hidden;
            -webkit-border-radius: 4px 4px 0 0;
            -moz-border-radius: 4px 4px 0 0;
            border-radius: 4px 4px 0 0;
        }

        .comment-box .comment-head i {
            float: right;
            margin-left: 14px;
            position: relative;
            top: 2px;
            color: #A6A6A6;
            cursor: pointer;
            -webkit-transition: color 0.3s ease;
            -o-transition: color 0.3s ease;
            transition: color 0.3s ease;
        }

        .comment-box .comment-head i:hover {
            color: #03658c;
        }

        .comment-box .comment-name {
            color: #283035;
            font-size: 14px;
            font-weight: 700;
            float: left;
            margin-right: 10px;
        }

        .comment-box .comment-name a {
            color: #283035;
        }

        .comment-box .comment-head span {
            float: left;
            color: #999;
            font-size: 13px;
            position: relative;
            top: 1px;
        }

        .comment-box .comment-content {
            background: #FFF;
            padding: 12px;
            font-size: 15px;
            color: #595959;
            -webkit-border-radius: 0 0 4px 4px;
            -moz-border-radius: 0 0 4px 4px;
            border-radius: 0 0 4px 4px;
        }

        .comment-box .comment-name.by-author, .comment-box .comment-name.by-author a {color: #03658c;}
        .comment-box .comment-name.by-author:after {
            content: 'author';
            background: #03658c;
            color: #FFF;
            font-size: 12px;
            padding: 3px 5px;
            font-weight: 700;
            margin-left: 10px;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
        }

        /** =====================
         * Responsive
         ========================*/
        @media only screen and (max-width: 766px) {
            .comments-container {
                width: 480px;
            }

            .comments-list .comment-box {
                width: 390px;
            }

            .reply-list .comment-box {
                width: 320px;
            }
        }
    </style>
        <script>
            loadScripts()
            function loadScripts(){

                $('#timeline-form').off('submit').on('submit',function(e){
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

                $('.like').off('click').on('click',function(){
                    var id = $(this).data('like');

                    $('#like-feed-'+id).off('click').on('click',function(){

                        $.post('{{url("/like-feed-reaction")}}/'+id,function(data){
                            switch(data.status){
                                case 201:
                                    alert('unliked');
                                    break;
                            }

                        })
                    });
                })

                $('.add-comment').off('click').on('click',function(){
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
            }


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
                        loadScripts();
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
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="timeline-body-content">
                                                                        <li>
                                                                            <div class="comment-main-level">
                                                                                <!-- Avatar -->
                                                                                {{--<div class="comment-avatar"><img src="https://placehold.it/80x80" alt=""></div>--}}
                                                                                <!-- Contenedor del Comentario -->
                                                                                <div class="comment-box">
                                                                                    <div class="comment-head">
                                                                                        {{--<h6 class="comment-name by-author"><a href="http://creaticode.com/blog">{{$feed->name}}</a></h6>--}}
                                                                                        <h6 class="comment-name by-author">{{$feed->name}}</h6>
                                                                                        <span>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$feed->created_at)->diffForHumans()}}</span>
                                                                                        {{--<i class="fa fa-reply"></i>--}}
                                                                                        {{--<i class="fa fa-thumbs"></i>--}}
                                                                                    </div>
                                                                                    <div class="comment-content">
                                                                                        {{$feed->action}}
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </li>

                                                                        <?php $like_counts = \App\FeedReaction::whereFeedId($feed->id)->whereLike(true)->count();  ?>

                                                                    @if(\App\FeedReaction::whereUserId(Auth::id())->whereFeedId($feed->id)->first() && \App\FeedReaction::whereUserId(Auth::id())->whereFeedId($feed->id)->first()->like == true)
                                                                            <button class="btn like" data-like="{{$feed->id}}" id="like-feed-{{$feed->id}}"><i style="color: green;" class="fa fa-thumbs-up text-center like" id="like-feed-{{$feed->id}}">{{$like_counts}}</i></button>
                                                                        @else
                                                                            <button class="btn like" data-like="{{$feed->id}}" id="like-feed-{{$feed->id}}"><i class="fa fa-thumbs-up text-center like" id="like-feed-{{$feed->id}}">{{$like_counts}}</i></button>
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