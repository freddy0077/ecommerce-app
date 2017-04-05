<ul style=" height: 200px; overflow-y: scroll;">
    @foreach($feeds as $feed)
        <li>
            <div class="col1">
                <div class="cont">
                    <div class="cont-col1">
                        <div class="label label-success">
                            <i class="fa fa-bell-o"></i>
                        </div>
                    </div>
                    <div class="cont-col2">
                        {{--<div class="desc"> {{$activity['actor'].' '.$activity['verb'].' '.$activity['object']}}--}}
                        {{--<span class="label label-danger label-sm">--}}
                        {{--<a href="{{url('/follow-feed',$activity['foreign_id'])}}">--}}
                        {{--Take action--}}
                        {{--</a>--}}
                        {{--<a href="{{url('/follow-user',$activity['id'])}}"><i class="fa fa-share"></i></a>--}}
                        {{--</span>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        <div class="desc"> {{$feed->action}}
                            <span class="label label-danger label-sm">
                                                                                                {{--<a href="{{url('/follow-feed',$activity['foreign_id'])}}">--}}
                                Take action
                                {{--</a>--}}
                                {{--<a href="{{url('/follow-user',$activity['id'])}}"><i class="fa fa-share"></i></a>--}}
                                {{--<a href="{{url('/follow-user',$activity['id'])}}"><i class="fa fa-share"></i></a>--}}
                                                                                                </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col2">
                <div class="date"> {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$feed->created_at)->diffForHumans()}} </div>

            </div>
        </li>
    @endforeach
</ul>
