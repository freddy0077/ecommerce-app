<ul class="feeds">
    @foreach($activities as $activity)
        <li>
            <div class="col1">
                <div class="cont">
                    <div class="cont-col1">
                        <div class="label label-success">
                            <i class="fa fa-bell-o"></i>
                        </div>
                    </div>
                    <div class="cont-col2">
                        <div class="desc"> {{$activity['actor'].' '.$activity['verb'].' '.$activity['object']}}
                            <span class="label label-danger label-sm"> Take action
                                <i class="fa fa-share"></i>
                                                                                                </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col2">
                <div class="date"> Just now </div>
            </div>
        </li>
    @endforeach
</ul>