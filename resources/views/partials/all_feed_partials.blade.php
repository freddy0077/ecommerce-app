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
                        <a href="javascript:;" class="timeline-body-title font-blue-madison pull-right" style="position: absolute; left:73%;">
                            <small> {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$feed->created_at)->diffForHumans()}}</small>
                        </a>
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