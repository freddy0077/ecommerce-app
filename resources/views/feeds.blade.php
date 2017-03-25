@extends('store.layouts.admin_layout')

@section('scripts')
    <link href="{{asset('backend/assets/pages/css/profile-2.min.css')}}" rel="stylesheet" type="text/css" />


    <script>
        Pusher.logToConsole = true;

        var pusher = new Pusher('b0fb81b15a4dfff2c4f4', {
            cluster: 'eu',
            encrypted: true
        });

        var channel = pusher.subscribe('chat-room.1');
        channel.bind('App\\Events\\ChatMessageReceived', function(data) {
//            alert(data.chatMessage.message);
            setTimeout(function(){
                alert('event reached');
                $.get('/feeds',function(data){
                    $('#feeds').html(data)
                }).fail(function(){
                    alert('error')
                })
            },5000);

            if(window.Notification && Notification.permission !== "denied") {
                alert(data.chatMessage.message);
                Notification.requestPermission(function(status) {  // status is "granted", if accepted by user
                    var n = new Notification('Shopaholicks', {
                        body: data.chatMessage,
                        icon: '{{url('frontend_2/image/logo.png')}}' // optional
                    });
                });
            }
        });


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
                        <h1>User Profile and Feeds
                            {{--<small>user profile sample</small>--}}
                        </h1>
                    </div>
                    <!-- END PAGE TITLE -->
                    <!-- BEGIN PAGE TOOLBAR -->
                    <div class="page-toolbar">
                        <!-- BEGIN THEME PANEL -->
                        <div class="btn-group btn-theme-panel">
                            <a href="javascript:;" class="btn dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-settings"></i>
                            </a>
                            {{--<div class="dropdown-menu theme-panel pull-right dropdown-custom hold-on-click">--}}
                                {{--<div class="row">--}}
                                    {{--<div class="col-md-6 col-sm-6 col-xs-12">--}}
                                        {{--<h3>THEME COLORS</h3>--}}
                                        {{--<div class="row">--}}
                                            {{--<div class="col-md-6 col-sm-6 col-xs-12">--}}
                                                {{--<ul class="theme-colors">--}}
                                                    {{--<li class="theme-color theme-color-default" data-theme="default">--}}
                                                        {{--<span class="theme-color-view"></span>--}}
                                                        {{--<span class="theme-color-name">Default</span>--}}
                                                    {{--</li>--}}
                                                    {{--<li class="theme-color theme-color-blue-hoki" data-theme="blue-hoki">--}}
                                                        {{--<span class="theme-color-view"></span>--}}
                                                        {{--<span class="theme-color-name">Blue Hoki</span>--}}
                                                    {{--</li>--}}
                                                    {{--<li class="theme-color theme-color-blue-steel" data-theme="blue-steel">--}}
                                                        {{--<span class="theme-color-view"></span>--}}
                                                        {{--<span class="theme-color-name">Blue Steel</span>--}}
                                                    {{--</li>--}}
                                                    {{--<li class="theme-color theme-color-yellow-orange" data-theme="yellow-orange">--}}
                                                        {{--<span class="theme-color-view"></span>--}}
                                                        {{--<span class="theme-color-name">Orange</span>--}}
                                                    {{--</li>--}}
                                                    {{--<li class="theme-color theme-color-yellow-crusta" data-theme="yellow-crusta">--}}
                                                        {{--<span class="theme-color-view"></span>--}}
                                                        {{--<span class="theme-color-name">Yellow Crusta</span>--}}
                                                    {{--</li>--}}
                                                {{--</ul>--}}
                                            {{--</div>--}}
                                            {{--<div class="col-md-6 col-sm-6 col-xs-12">--}}
                                                {{--<ul class="theme-colors">--}}
                                                    {{--<li class="theme-color theme-color-green-haze" data-theme="green-haze">--}}
                                                        {{--<span class="theme-color-view"></span>--}}
                                                        {{--<span class="theme-color-name">Green Haze</span>--}}
                                                    {{--</li>--}}
                                                    {{--<li class="theme-color theme-color-red-sunglo" data-theme="red-sunglo">--}}
                                                        {{--<span class="theme-color-view"></span>--}}
                                                        {{--<span class="theme-color-name">Red Sunglo</span>--}}
                                                    {{--</li>--}}
                                                    {{--<li class="theme-color theme-color-red-intense" data-theme="red-intense">--}}
                                                        {{--<span class="theme-color-view"></span>--}}
                                                        {{--<span class="theme-color-name">Red Intense</span>--}}
                                                    {{--</li>--}}
                                                    {{--<li class="theme-color theme-color-purple-plum" data-theme="purple-plum">--}}
                                                        {{--<span class="theme-color-view"></span>--}}
                                                        {{--<span class="theme-color-name">Purple Plum</span>--}}
                                                    {{--</li>--}}
                                                    {{--<li class="theme-color theme-color-purple-studio" data-theme="purple-studio">--}}
                                                        {{--<span class="theme-color-view"></span>--}}
                                                        {{--<span class="theme-color-name">Purple Studio</span>--}}
                                                    {{--</li>--}}
                                                {{--</ul>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-6 col-sm-6 col-xs-12 seperator">--}}
                                        {{--<h3>LAYOUT</h3>--}}
                                        {{--<ul class="theme-settings">--}}
                                            {{--<li> Theme Style--}}
                                                {{--<select class="theme-setting theme-setting-style form-control input-sm input-small input-inline tooltips" data-original-title="Change theme style" data-container="body" data-placement="left">--}}
                                                    {{--<option value="boxed" selected="selected">Square corners</option>--}}
                                                    {{--<option value="rounded">Rounded corners</option>--}}
                                                {{--</select>--}}
                                            {{--</li>--}}
                                            {{--<li> Layout--}}
                                                {{--<select class="theme-setting theme-setting-layout form-control input-sm input-small input-inline tooltips" data-original-title="Change layout type" data-container="body" data-placement="left">--}}
                                                    {{--<option value="boxed" selected="selected">Boxed</option>--}}
                                                    {{--<option value="fluid">Fluid</option>--}}
                                                {{--</select>--}}
                                            {{--</li>--}}
                                            {{--<li> Top Menu Style--}}
                                                {{--<select class="theme-setting theme-setting-top-menu-style form-control input-sm input-small input-inline tooltips" data-original-title="Change top menu dropdowns style" data-container="body"--}}
                                                        {{--data-placement="left">--}}
                                                    {{--<option value="dark" selected="selected">Dark</option>--}}
                                                    {{--<option value="light">Light</option>--}}
                                                {{--</select>--}}
                                            {{--</li>--}}
                                            {{--<li> Top Menu Mode--}}
                                                {{--<select class="theme-setting theme-setting-top-menu-mode form-control input-sm input-small input-inline tooltips" data-original-title="Enable fixed(sticky) top menu" data-container="body" data-placement="left">--}}
                                                    {{--<option value="fixed">Fixed</option>--}}
                                                    {{--<option value="not-fixed" selected="selected">Not Fixed</option>--}}
                                                {{--</select>--}}
                                            {{--</li>--}}
                                            {{--<li> Mega Menu Style--}}
                                                {{--<select class="theme-setting theme-setting-mega-menu-style form-control input-sm input-small input-inline tooltips" data-original-title="Change mega menu dropdowns style" data-container="body"--}}
                                                        {{--data-placement="left">--}}
                                                    {{--<option value="dark" selected="selected">Dark</option>--}}
                                                    {{--<option value="light">Light</option>--}}
                                                {{--</select>--}}
                                            {{--</li>--}}
                                            {{--<li> Mega Menu Mode--}}
                                                {{--<select class="theme-setting theme-setting-mega-menu-mode form-control input-sm input-small input-inline tooltips" data-original-title="Enable fixed(sticky) mega menu" data-container="body"--}}
                                                        {{--data-placement="left">--}}
                                                    {{--<option value="fixed" selected="selected">Fixed</option>--}}
                                                    {{--<option value="not-fixed">Not Fixed</option>--}}
                                                {{--</select>--}}
                                            {{--</li>--}}
                                        {{--</ul>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        </div>
                        <!-- END THEME PANEL -->
                    </div>
                    <!-- END PAGE TOOLBAR -->
                </div>
            </div>
            <!-- END PAGE HEAD-->
            <!-- BEGIN PAGE CONTENT BODY -->
            <div class="page-content">
                <div class="container">
                    <!-- BEGIN PAGE BREADCRUMBS -->
                    <ul class="page-breadcrumb breadcrumb">
                        <li>
                            <a href="index-2.html">Home</a>
                            <i class="fa fa-circle"></i>
                        </li>
                        <li>
                            <a href="#">Pages</a>
                            <i class="fa fa-circle"></i>
                        </li>
                        <li>
                            <span>User</span>
                        </li>
                    </ul>
                    <!-- END PAGE BREADCRUMBS -->
                    <!-- BEGIN PAGE CONTENT INNER -->
                    <div class="page-content-inner">
                        <div class="profile">
                            <div class="tabbable-line tabbable-full-width">
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tab_1_1" data-toggle="tab"> Overview </a>
                                    </li>
                                    <li>
                                        <a href="#tab_1_3" data-toggle="tab"> Account </a>
                                    </li>
                                    {{--<li>--}}
                                        {{--<a href="#tab_1_6" data-toggle="tab"> Help </a>--}}
                                    {{--</li>--}}
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1_1">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <ul class="list-unstyled profile-nav">
                                                    <li>
                                                        <img src="https://placehold.it/300x300" class="img-responsive img-rounded pic-bordered" alt="" />
                                                        <a href="#tab_1-1" class="profile-edit"> edit </a>
                                                    </li>

                                                </ul>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="row">
                                                    <div class="col-md-8 profile-info">
                                                        <h1 class="font-green sbold uppercase">{{$user->name}}</h1>
                                                        {{--<p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt laoreet dolore magna aliquam tincidunt erat volutpat laoreet dolore magna aliquam tincidunt erat--}}
                                                            {{--volutpat. </p>--}}
                                                        {{--<p>--}}
                                                            {{--<a href="javascript:;"> www.mywebsite.com </a>--}}
                                                        </p>
                                                        <ul class="list-inline">
                                                            <li>
                                                                <i class="fa fa-phone"></i> {{$user->phone_number}} </li>
                                                            <li>
                                                                <i class="fa fa-mail"></i> {{$user->email}} </li>
                                                            {{--<li>--}}
                                                                {{--<i class="fa fa-briefcase"></i> Design </li>--}}
                                                            {{--<li>--}}
                                                                {{--<i class="fa fa-star"></i> Top Seller </li>--}}
                                                            {{--<li>--}}
                                                                {{--<i class="fa fa-heart"></i> BASE Jumping </li>--}}
                                                        </ul>
                                                    </div>
                                                    <!--end col-md-8-->
                                                    <div class="col-md-4">
                                                        {{--<div class="portlet sale-summary">--}}
                                                            {{--<div class="portlet-title">--}}
                                                                {{--<div class="caption font-red sbold"> Sales Summary </div>--}}
                                                                {{--<div class="tools">--}}
                                                                    {{--<a class="reload" href="javascript:;"> </a>--}}
                                                                {{--</div>--}}
                                                            {{--</div>--}}
                                                            {{--<div class="portlet-body">--}}
                                                                {{--<ul class="list-unstyled">--}}
                                                                    {{--<li>--}}
                                                                            {{--<span class="sale-info"> TODAY SOLD--}}
                                                                                {{--<i class="fa fa-img-up"></i>--}}
                                                                            {{--</span>--}}
                                                                        {{--<span class="sale-num"> 23 </span>--}}
                                                                    {{--</li>--}}
                                                                    {{--<li>--}}
                                                                            {{--<span class="sale-info"> WEEKLY SALES--}}
                                                                                {{--<i class="fa fa-img-down"></i>--}}
                                                                            {{--</span>--}}
                                                                        {{--<span class="sale-num"> 87 </span>--}}
                                                                    {{--</li>--}}
                                                                    {{--<li>--}}
                                                                        {{--<span class="sale-info"> TOTAL SOLD </span>--}}
                                                                        {{--<span class="sale-num"> 2377 </span>--}}
                                                                    {{--</li>--}}
                                                                {{--</ul>--}}
                                                            {{--</div>--}}
                                                        {{--</div>--}}
                                                    </div>
                                                    <!--end col-md-4-->
                                                </div>
                                                <!--end row-->
                                                <div class="tabbable-line tabbable-custom-profile">
                                                    <ul class="nav nav-tabs">
                                                        <li class="active">
                                                            <a href="#tab_1_11" data-toggle="tab"> Feeds </a>
                                                        </li>
                                                        <li>
                                                            <a href="#tab_1_22" data-toggle="tab">Latest Customers  </a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="tab_1_11">
                                                            <div class="portlet-body">
                                                                <ul class="feeds" id="feeds">

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
                                                                                            <span class="label label-danger label-sm">
                                                                                                {{--<a href="{{url('/follow-feed',$activity['foreign_id'])}}">--}}
                                                                                                    Take action
                                                                                                {{--</a>--}}
                                                                                                     <a href="{{url('/follow-user',$activity['id'])}}"><i class="fa fa-share"></i></a>
                                                                                                </span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col2">
                                                                                {{--<div class="date"> {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$activity->created_at)->diffForHumans()}} </div>--}}

                                                                            </div>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <!--tab-pane-->
                                                        <div class="tab-pane" id="tab_1_22">
                                                            <div class="tab-pane active" id="tab_1_1_1">
                                                                <div class="scroller" data-height="290px" data-always-visible="1" data-rail-visible1="1">



<!--                                                                    --><?php //var_dump (\GetStream\StreamLaravel\Facades\FeedManager::getUserFeed(Auth::user()->id))  ?>

                                                                    {{--<ul class="feeds" id="feeds">--}}

                                                                        {{--@foreach($activities as $activity)--}}
                                                                        {{--<li>--}}
                                                                            {{--<div class="col1">--}}
                                                                                {{--<div class="cont">--}}
                                                                                    {{--<div class="cont-col1">--}}
                                                                                        {{--<div class="label label-success">--}}
                                                                                            {{--<i class="fa fa-bell-o"></i>--}}
                                                                                        {{--</div>--}}
                                                                                    {{--</div>--}}
                                                                                    {{--<div class="cont-col2">--}}
                                                                                        {{--<div class="desc"> {{$activity['actor'].' '.$activity['verb'].' '.$activity['object']}}--}}
                                                                                                {{--<span class="label label-danger label-sm"> Take action--}}
                                                                                                    {{--<i class="fa fa-share"></i>--}}
                                                                                                {{--</span>--}}
                                                                                        {{--</div>--}}
                                                                                    {{--</div>--}}
                                                                                {{--</div>--}}
                                                                            {{--</div>--}}
                                                                            {{--<div class="col2">--}}
{{--                                                                                <div class="date"> {{ \Carbon\Carbon::createFromDate($activity->created_at)->diffForHumans()}} </div>--}}
                                                                                {{--<div class="date"> {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$activity->created_at)->diffForHumans()}} </div>--}}
                                                                            {{--</div>--}}
                                                                        {{--</li>--}}
                                                                        {{--@endforeach--}}
                                                                    {{--</ul>--}}

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--tab-pane-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--tab_1_2-->
                                    <div class="tab-pane" id="tab_1_3">
                                        <div class="row profile-account">
                                            <div class="col-md-3">
                                                <ul class="ver-inline-menu tabbable margin-bottom-10">
                                                    <li class="active">
                                                        <a data-toggle="tab" href="#tab_1-1">
                                                            <i class="fa fa-cog"></i> Personal info </a>
                                                        <span class="after"> </span>
                                                    </li>
                                                    <li>
                                                        <a data-toggle="tab" href="#tab_2-2">
                                                            <i class="fa fa-picture-o"></i> Change Avatar </a>
                                                    </li>
                                                    <li>
                                                        <a data-toggle="tab" href="#tab_3-3">
                                                            <i class="fa fa-lock"></i> Change Password </a>
                                                    </li>
                                                    {{--<li>--}}
                                                        {{--<a data-toggle="tab" href="#tab_4-4">--}}
                                                            {{--<i class="fa fa-eye"></i> Privacy Settings </a>--}}
                                                    {{--</li>--}}
                                                </ul>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="tab-content">
                                                    <div id="tab_1-1" class="tab-pane active">
                                                        <form role="form" action="#">
                                                            <div class="form-group">
                                                                <label class="control-label">Name</label>
                                                                <input type="text" placeholder="John" class="form-control" value="{{$user->name}}" /> </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Email</label>
                                                                <input type="text" placeholder="Doe" class="form-control" value="{{$user->email}}" /> </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Mobile Number</label>
                                                                <input type="text" placeholder="Your phone number" class="form-control" value="{{$user->phone_number}}"/> </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Gender</label>
                                                                <input type="text" placeholder="gender" class="form-control" value="{{$user->gender}}" />
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="control-label">Registered</label>
                                                                <input type="text" class="form-control" value="{{$user->created_at}}" readonly  />
                                                            </div>
                                                            <div class="margiv-top-10">
                                                                <a href="javascript:;" class="btn green"> Save Changes </a>
                                                                <a href="javascript:;" class="btn default"> Cancel </a>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div id="tab_2-2" class="tab-pane">
                                                        <p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                                            eiusmod. </p>
                                                        <form action="#" role="form">
                                                            <div class="form-group">
                                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                                        <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
                                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                                    <div>
                                                                            <span class="btn default btn-file">
                                                                                <span class="fileinput-new"> Select image </span>
                                                                                <span class="fileinput-exists"> Change </span>
                                                                                <input type="file" name="..."> </span>
                                                                        <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                                    </div>
                                                                </div>
                                                                <div class="clearfix margin-top-10">
                                                                    <span class="label label-danger"> NOTE! </span>
                                                                    <span> Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only </span>
                                                                </div>
                                                            </div>
                                                            <div class="margin-top-10">
                                                                <a href="javascript:;" class="btn green"> Submit </a>
                                                                <a href="javascript:;" class="btn default"> Cancel </a>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div id="tab_3-3" class="tab-pane">
                                                        <form action="#">
                                                            <div class="form-group">
                                                                <label class="control-label">Current Password</label>
                                                                <input type="password" class="form-control" /> </div>
                                                            <div class="form-group">
                                                                <label class="control-label">New Password</label>
                                                                <input type="password" class="form-control" /> </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Re-type New Password</label>
                                                                <input type="password" class="form-control" /> </div>
                                                            <div class="margin-top-10">
                                                                <a href="javascript:;" class="btn green"> Change Password </a>
                                                                <a href="javascript:;" class="btn default"> Cancel </a>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div id="tab_4-4" class="tab-pane">
                                                        <form action="#">
                                                            <table class="table table-bordered table-striped">
                                                                <tr>
                                                                    <td> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus.. </td>
                                                                    <td>
                                                                        <label class="uniform-inline">
                                                                            <input type="radio" name="optionsRadios1" value="option1" /> Yes </label>
                                                                        <label class="uniform-inline">
                                                                            <input type="radio" name="optionsRadios1" value="option2" checked/> No </label>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> Enim eiusmod high life accusamus terry richardson ad squid wolf moon </td>
                                                                    <td>
                                                                        <label class="uniform-inline">
                                                                            <input type="checkbox" value="" /> Yes </label>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> Enim eiusmod high life accusamus terry richardson ad squid wolf moon </td>
                                                                    <td>
                                                                        <label class="uniform-inline">
                                                                            <input type="checkbox" value="" /> Yes </label>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> Enim eiusmod high life accusamus terry richardson ad squid wolf moon </td>
                                                                    <td>
                                                                        <label class="uniform-inline">
                                                                            <input type="checkbox" value="" /> Yes </label>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                            <!--end profile-settings-->
                                                            <div class="margin-top-10">
                                                                <a href="javascript:;" class="btn green"> Save Changes </a>
                                                                <a href="javascript:;" class="btn default"> Cancel </a>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end col-md-9-->
                                        </div>
                                    </div>
                                    <!--end tab-pane-->
                                    {{--<div class="tab-pane" id="tab_1_6">--}}
                                        {{--<div class="row">--}}
                                            {{--<div class="col-md-2">--}}
                                                {{--<ul class="ver-inline-menu tabbable margin-bottom-10">--}}
                                                    {{--<li class="active">--}}
                                                        {{--<a data-toggle="tab" href="#tab_1">--}}
                                                            {{--<i class="fa fa-briefcase"></i> General Questions </a>--}}
                                                        {{--<span class="after"> </span>--}}
                                                    {{--</li>--}}
                                                    {{--<li>--}}
                                                        {{--<a data-toggle="tab" href="#tab_2">--}}
                                                            {{--<i class="fa fa-group"></i> Membership </a>--}}
                                                    {{--</li>--}}
                                                    {{--<li>--}}
                                                        {{--<a data-toggle="tab" href="#tab_3">--}}
                                                            {{--<i class="fa fa-leaf"></i> Terms Of Service </a>--}}
                                                    {{--</li>--}}
                                                    {{--<li>--}}
                                                        {{--<a data-toggle="tab" href="#tab_1">--}}
                                                            {{--<i class="fa fa-info-circle"></i> License Terms </a>--}}
                                                    {{--</li>--}}
                                                    {{--<li>--}}
                                                        {{--<a data-toggle="tab" href="#tab_2">--}}
                                                            {{--<i class="fa fa-tint"></i> Payment Rules </a>--}}
                                                    {{--</li>--}}
                                                    {{--<li>--}}
                                                        {{--<a data-toggle="tab" href="#tab_3">--}}
                                                            {{--<i class="fa fa-plus"></i> Other Questions </a>--}}
                                                    {{--</li>--}}
                                                {{--</ul>--}}
                                            {{--</div>--}}
                                            {{--<div class="col-md-10">--}}
                                                {{--<div class="tab-content">--}}
                                                    {{--<div id="tab_1" class="tab-pane active">--}}
                                                        {{--<div id="accordion1" class="panel-group">--}}
                                                            {{--<div class="panel panel-default">--}}
                                                                {{--<div class="panel-heading">--}}
                                                                    {{--<h4 class="panel-title">--}}
                                                                        {{--<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_1"> 1. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry ? </a>--}}
                                                                    {{--</h4>--}}
                                                                {{--</div>--}}
                                                                {{--<div id="accordion1_1" class="panel-collapse collapse in">--}}
                                                                    {{--<div class="panel-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa--}}
                                                                        {{--nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft--}}
                                                                        {{--beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt--}}
                                                                        {{--you probably haven't heard of them accusamus labore sustainable VHS. </div>--}}
                                                                {{--</div>--}}
                                                            {{--</div>--}}
                                                            {{--<div class="panel panel-default">--}}
                                                                {{--<div class="panel-heading">--}}
                                                                    {{--<h4 class="panel-title">--}}
                                                                        {{--<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_2"> 2. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry ? </a>--}}
                                                                    {{--</h4>--}}
                                                                {{--</div>--}}
                                                                {{--<div id="accordion1_2" class="panel-collapse collapse">--}}
                                                                    {{--<div class="panel-body"> Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Anim pariatur cliche--}}
                                                                        {{--reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum--}}
                                                                        {{--eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes--}}
                                                                        {{--anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably--}}
                                                                        {{--haven't heard of them accusamus labore sustainable VHS. </div>--}}
                                                                {{--</div>--}}
                                                            {{--</div>--}}
                                                            {{--<div class="panel panel-success">--}}
                                                                {{--<div class="panel-heading">--}}
                                                                    {{--<h4 class="panel-title">--}}
                                                                        {{--<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_3"> 3. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor ? </a>--}}
                                                                    {{--</h4>--}}
                                                                {{--</div>--}}
                                                                {{--<div id="accordion1_3" class="panel-collapse collapse">--}}
                                                                    {{--<div class="panel-body"> Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Anim pariatur cliche--}}
                                                                        {{--reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum--}}
                                                                        {{--eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes--}}
                                                                        {{--anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably--}}
                                                                        {{--haven't heard of them accusamus labore sustainable VHS. </div>--}}
                                                                {{--</div>--}}
                                                            {{--</div>--}}
                                                            {{--<div class="panel panel-warning">--}}
                                                                {{--<div class="panel-heading">--}}
                                                                    {{--<h4 class="panel-title">--}}
                                                                        {{--<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_4"> 4. Wolf moon officia aute, non cupidatat skateboard dolor brunch ? </a>--}}
                                                                    {{--</h4>--}}
                                                                {{--</div>--}}
                                                                {{--<div id="accordion1_4" class="panel-collapse collapse">--}}
                                                                    {{--<div class="panel-body"> 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin--}}
                                                                        {{--coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings--}}
                                                                        {{--occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </div>--}}
                                                                {{--</div>--}}
                                                            {{--</div>--}}
                                                            {{--<div class="panel panel-danger">--}}
                                                                {{--<div class="panel-heading">--}}
                                                                    {{--<h4 class="panel-title">--}}
                                                                        {{--<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_5"> 5. Leggings occaecat craft beer farm-to-table, raw denim aesthetic ? </a>--}}
                                                                    {{--</h4>--}}
                                                                {{--</div>--}}
                                                                {{--<div id="accordion1_5" class="panel-collapse collapse">--}}
                                                                    {{--<div class="panel-body"> 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin--}}
                                                                        {{--coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings--}}
                                                                        {{--occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. Food truck quinoa nesciunt laborum eiusmod.--}}
                                                                        {{--Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et </div>--}}
                                                                {{--</div>--}}
                                                            {{--</div>--}}
                                                            {{--<div class="panel panel-default">--}}
                                                                {{--<div class="panel-heading">--}}
                                                                    {{--<h4 class="panel-title">--}}
                                                                        {{--<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_6"> 6. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth ? </a>--}}
                                                                    {{--</h4>--}}
                                                                {{--</div>--}}
                                                                {{--<div id="accordion1_6" class="panel-collapse collapse">--}}
                                                                    {{--<div class="panel-body"> 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin--}}
                                                                        {{--coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings--}}
                                                                        {{--occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. Food truck quinoa nesciunt laborum eiusmod.--}}
                                                                        {{--Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et </div>--}}
                                                                {{--</div>--}}
                                                            {{--</div>--}}
                                                            {{--<div class="panel panel-default">--}}
                                                                {{--<div class="panel-heading">--}}
                                                                    {{--<h4 class="panel-title">--}}
                                                                        {{--<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_7"> 7. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft ? </a>--}}
                                                                    {{--</h4>--}}
                                                                {{--</div>--}}
                                                                {{--<div id="accordion1_7" class="panel-collapse collapse">--}}
                                                                    {{--<div class="panel-body"> 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin--}}
                                                                        {{--coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings--}}
                                                                        {{--occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. Food truck quinoa nesciunt laborum eiusmod.--}}
                                                                        {{--Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et </div>--}}
                                                                {{--</div>--}}
                                                            {{--</div>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                    {{--<div id="tab_2" class="tab-pane">--}}
                                                        {{--<div id="accordion2" class="panel-group">--}}
                                                            {{--<div class="panel panel-warning">--}}
                                                                {{--<div class="panel-heading">--}}
                                                                    {{--<h4 class="panel-title">--}}
                                                                        {{--<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#accordion2_1"> 1. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry ? </a>--}}
                                                                    {{--</h4>--}}
                                                                {{--</div>--}}
                                                                {{--<div id="accordion2_1" class="panel-collapse collapse in">--}}
                                                                    {{--<div class="panel-body">--}}
                                                                        {{--<p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa--}}
                                                                            {{--nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica,--}}
                                                                            {{--craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth--}}
                                                                            {{--nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </p>--}}
                                                                        {{--<p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa--}}
                                                                            {{--nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica,--}}
                                                                            {{--craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth--}}
                                                                            {{--nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </p>--}}
                                                                    {{--</div>--}}
                                                                {{--</div>--}}
                                                            {{--</div>--}}
                                                            {{--<div class="panel panel-danger">--}}
                                                                {{--<div class="panel-heading">--}}
                                                                    {{--<h4 class="panel-title">--}}
                                                                        {{--<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#accordion2_2"> 2. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry ? </a>--}}
                                                                    {{--</h4>--}}
                                                                {{--</div>--}}
                                                                {{--<div id="accordion2_2" class="panel-collapse collapse">--}}
                                                                    {{--<div class="panel-body"> Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Anim pariatur cliche--}}
                                                                        {{--reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum--}}
                                                                        {{--eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes--}}
                                                                        {{--anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably--}}
                                                                        {{--haven't heard of them accusamus labore sustainable VHS. </div>--}}
                                                                {{--</div>--}}
                                                            {{--</div>--}}
                                                            {{--<div class="panel panel-success">--}}
                                                                {{--<div class="panel-heading">--}}
                                                                    {{--<h4 class="panel-title">--}}
                                                                        {{--<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#accordion2_3"> 3. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor ? </a>--}}
                                                                    {{--</h4>--}}
                                                                {{--</div>--}}
                                                                {{--<div id="accordion2_3" class="panel-collapse collapse">--}}
                                                                    {{--<div class="panel-body"> Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Anim pariatur cliche--}}
                                                                        {{--reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum--}}
                                                                        {{--eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes--}}
                                                                        {{--anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably--}}
                                                                        {{--haven't heard of them accusamus labore sustainable VHS. </div>--}}
                                                                {{--</div>--}}
                                                            {{--</div>--}}
                                                            {{--<div class="panel panel-default">--}}
                                                                {{--<div class="panel-heading">--}}
                                                                    {{--<h4 class="panel-title">--}}
                                                                        {{--<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#accordion2_4"> 4. Wolf moon officia aute, non cupidatat skateboard dolor brunch ? </a>--}}
                                                                    {{--</h4>--}}
                                                                {{--</div>--}}
                                                                {{--<div id="accordion2_4" class="panel-collapse collapse">--}}
                                                                    {{--<div class="panel-body"> 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin--}}
                                                                        {{--coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings--}}
                                                                        {{--occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </div>--}}
                                                                {{--</div>--}}
                                                            {{--</div>--}}
                                                            {{--<div class="panel panel-default">--}}
                                                                {{--<div class="panel-heading">--}}
                                                                    {{--<h4 class="panel-title">--}}
                                                                        {{--<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#accordion2_5"> 5. Leggings occaecat craft beer farm-to-table, raw denim aesthetic ? </a>--}}
                                                                    {{--</h4>--}}
                                                                {{--</div>--}}
                                                                {{--<div id="accordion2_5" class="panel-collapse collapse">--}}
                                                                    {{--<div class="panel-body"> 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin--}}
                                                                        {{--coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings--}}
                                                                        {{--occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. Food truck quinoa nesciunt laborum eiusmod.--}}
                                                                        {{--Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et </div>--}}
                                                                {{--</div>--}}
                                                            {{--</div>--}}
                                                            {{--<div class="panel panel-default">--}}
                                                                {{--<div class="panel-heading">--}}
                                                                    {{--<h4 class="panel-title">--}}
                                                                        {{--<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#accordion2_6"> 6. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth ? </a>--}}
                                                                    {{--</h4>--}}
                                                                {{--</div>--}}
                                                                {{--<div id="accordion2_6" class="panel-collapse collapse">--}}
                                                                    {{--<div class="panel-body"> 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin--}}
                                                                        {{--coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings--}}
                                                                        {{--occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. Food truck quinoa nesciunt laborum eiusmod.--}}
                                                                        {{--Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et </div>--}}
                                                                {{--</div>--}}
                                                            {{--</div>--}}
                                                            {{--<div class="panel panel-default">--}}
                                                                {{--<div class="panel-heading">--}}
                                                                    {{--<h4 class="panel-title">--}}
                                                                        {{--<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#accordion2_7"> 7. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft ? </a>--}}
                                                                    {{--</h4>--}}
                                                                {{--</div>--}}
                                                                {{--<div id="accordion2_7" class="panel-collapse collapse">--}}
                                                                    {{--<div class="panel-body"> 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin--}}
                                                                        {{--coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings--}}
                                                                        {{--occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. Food truck quinoa nesciunt laborum eiusmod.--}}
                                                                        {{--Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et </div>--}}
                                                                {{--</div>--}}
                                                            {{--</div>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                    {{--<div id="tab_3" class="tab-pane">--}}
                                                        {{--<div id="accordion3" class="panel-group">--}}
                                                            {{--<div class="panel panel-danger">--}}
                                                                {{--<div class="panel-heading">--}}
                                                                    {{--<h4 class="panel-title">--}}
                                                                        {{--<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#accordion3_1"> 1. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry ? </a>--}}
                                                                    {{--</h4>--}}
                                                                {{--</div>--}}
                                                                {{--<div id="accordion3_1" class="panel-collapse collapse in">--}}
                                                                    {{--<div class="panel-body">--}}
                                                                        {{--<p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa--}}
                                                                            {{--nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. </p>--}}
                                                                        {{--<p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa--}}
                                                                            {{--nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. </p>--}}
                                                                        {{--<p> Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh--}}
                                                                            {{--helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic--}}
                                                                            {{--synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </p>--}}
                                                                    {{--</div>--}}
                                                                {{--</div>--}}
                                                            {{--</div>--}}
                                                            {{--<div class="panel panel-success">--}}
                                                                {{--<div class="panel-heading">--}}
                                                                    {{--<h4 class="panel-title">--}}
                                                                        {{--<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#accordion3_2"> 2. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry ? </a>--}}
                                                                    {{--</h4>--}}
                                                                {{--</div>--}}
                                                                {{--<div id="accordion3_2" class="panel-collapse collapse">--}}
                                                                    {{--<div class="panel-body"> Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Anim pariatur cliche--}}
                                                                        {{--reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum--}}
                                                                        {{--eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes--}}
                                                                        {{--anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably--}}
                                                                        {{--haven't heard of them accusamus labore sustainable VHS. </div>--}}
                                                                {{--</div>--}}
                                                            {{--</div>--}}
                                                            {{--<div class="panel panel-default">--}}
                                                                {{--<div class="panel-heading">--}}
                                                                    {{--<h4 class="panel-title">--}}
                                                                        {{--<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#accordion3_3"> 3. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor ? </a>--}}
                                                                    {{--</h4>--}}
                                                                {{--</div>--}}
                                                                {{--<div id="accordion3_3" class="panel-collapse collapse">--}}
                                                                    {{--<div class="panel-body"> Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Anim pariatur cliche--}}
                                                                        {{--reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum--}}
                                                                        {{--eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes--}}
                                                                        {{--anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably--}}
                                                                        {{--haven't heard of them accusamus labore sustainable VHS. </div>--}}
                                                                {{--</div>--}}
                                                            {{--</div>--}}
                                                            {{--<div class="panel panel-default">--}}
                                                                {{--<div class="panel-heading">--}}
                                                                    {{--<h4 class="panel-title">--}}
                                                                        {{--<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#accordion3_4"> 4. Wolf moon officia aute, non cupidatat skateboard dolor brunch ? </a>--}}
                                                                    {{--</h4>--}}
                                                                {{--</div>--}}
                                                                {{--<div id="accordion3_4" class="panel-collapse collapse">--}}
                                                                    {{--<div class="panel-body"> 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin--}}
                                                                        {{--coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings--}}
                                                                        {{--occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </div>--}}
                                                                {{--</div>--}}
                                                            {{--</div>--}}
                                                            {{--<div class="panel panel-default">--}}
                                                                {{--<div class="panel-heading">--}}
                                                                    {{--<h4 class="panel-title">--}}
                                                                        {{--<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#accordion3_5"> 5. Leggings occaecat craft beer farm-to-table, raw denim aesthetic ? </a>--}}
                                                                    {{--</h4>--}}
                                                                {{--</div>--}}
                                                                {{--<div id="accordion3_5" class="panel-collapse collapse">--}}
                                                                    {{--<div class="panel-body"> 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin--}}
                                                                        {{--coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings--}}
                                                                        {{--occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. Food truck quinoa nesciunt laborum eiusmod.--}}
                                                                        {{--Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et </div>--}}
                                                                {{--</div>--}}
                                                            {{--</div>--}}
                                                            {{--<div class="panel panel-default">--}}
                                                                {{--<div class="panel-heading">--}}
                                                                    {{--<h4 class="panel-title">--}}
                                                                        {{--<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#accordion3_6"> 6. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth ? </a>--}}
                                                                    {{--</h4>--}}
                                                                {{--</div>--}}
                                                                {{--<div id="accordion3_6" class="panel-collapse collapse">--}}
                                                                    {{--<div class="panel-body"> 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin--}}
                                                                        {{--coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings--}}
                                                                        {{--occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. Food truck quinoa nesciunt laborum eiusmod.--}}
                                                                        {{--Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et </div>--}}
                                                                {{--</div>--}}
                                                            {{--</div>--}}
                                                            {{--<div class="panel panel-default">--}}
                                                                {{--<div class="panel-heading">--}}
                                                                    {{--<h4 class="panel-title">--}}
                                                                        {{--<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#accordion3_7"> 7. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft ? </a>--}}
                                                                    {{--</h4>--}}
                                                                {{--</div>--}}
                                                                {{--<div id="accordion3_7" class="panel-collapse collapse">--}}
                                                                    {{--<div class="panel-body"> 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin--}}
                                                                        {{--coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings--}}
                                                                        {{--occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. Food truck quinoa nesciunt laborum eiusmod.--}}
                                                                        {{--Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et </div>--}}
                                                                {{--</div>--}}
                                                            {{--</div>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    <!--end tab-pane-->
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