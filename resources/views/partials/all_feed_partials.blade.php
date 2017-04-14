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