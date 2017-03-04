@extends('layouts.general_layout')

@section('scripts')
    <style>

        body, html {

            /*background:#000;*/
            min-height:80% !important;
            padding:0 !important;
            margin:0 !important;


        }
        </style>


@endsection

@section('content')

    <div class="container" style="padding-top: 60px;">
        <h3 class="page-header">{{Auth::user()->name."'s"}} Profile</h3>
        <div class="row">
            <!-- left column -->
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="text-center">
                    <img src="https://fb-s-b-a.akamaihd.net/h-ak-xfa1/v/t1.0-1/c9.0.160.160/p160x160/420257_10151474103567424_1224916620_n.jpg?oh=0932a7be9adb74fd949d0211d9128ad7&oe=58BA7A17&__gda__=1488564886_feb0fc02d6307304a3d43aecff5a804a"
                         class="avatar img-circle img-thumbnail" alt="avatar">
                    <h6>Upload a photo...</h6>
                    <input type="file" class="text-center center-block well well-sm">
                </div>
            </div>
            <!-- edit form column -->
            <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
                {{--<div class="alert alert-info alert-dismissable">--}}
                    {{--<a class="panel-close close" data-dismiss="alert">×</a>--}}
                    {{--<i class="fa fa-coffee"></i>--}}
                    {{--This is an <strong>.alert</strong>. Use this to show important messages to the user.--}}
                {{--</div>--}}
                {{--<h3>Personal info</h3>--}}
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Name:</label>
                        <div class="col-lg-8">
                            <input class="form-control" value="{{Auth::user()->name}}" type="text">
                        </div>
                    </div>
                    {{--<div class="form-group">--}}
                        {{--<label class="col-lg-3 control-label">Last name:</label>--}}
                        {{--<div class="col-lg-8">--}}
                            {{--<input class="form-control" value="Silva" type="text">--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Shop:</label>
                        <div class="col-lg-8">
                            <input class="form-control" value="" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Products in shop:</label>
                        <div class="col-lg-8">
                            <input class="form-control" value="" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Email:</label>
                        <div class="col-lg-8">
                            <input class="form-control" value="{{Auth::user()->email}}}}" type="text">
                        </div>
                    </div>
                    {{--<div class="form-group">--}}
                        {{--<label class="col-lg-3 control-label">Time Zone:</label>--}}
                        {{--<div class="col-lg-8">--}}
                            {{--<div class="ui-select">--}}
                                {{--<select id="user_time_zone" class="form-control">--}}
                                    {{--<option value="Hawaii">(GMT-10:00) Hawaii</option>--}}
                                    {{--<option value="Alaska">(GMT-09:00) Alaska</option>--}}
                                    {{--<option value="Pacific Time (US & Canada)">(GMT-08:00) Pacific Time (US & Canada)</option>--}}
                                    {{--<option value="Arizona">(GMT-07:00) Arizona</option>--}}
                                    {{--<option value="Mountain Time (US & Canada)">(GMT-07:00) Mountain Time (US & Canada)</option>--}}
                                    {{--<option value="Central Time (US & Canada)" selected="selected">(GMT-06:00) Central Time (US & Canada)</option>--}}
                                    {{--<option value="Eastern Time (US & Canada)">(GMT-05:00) Eastern Time (US & Canada)</option>--}}
                                    {{--<option value="Indiana (East)">(GMT-05:00) Indiana (East)</option>--}}
                                {{--</select>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="form-group">--}}
                        {{--<label class="col-md-3 control-label">Username:</label>--}}
                        {{--<div class="col-md-8">--}}
                            {{--<input class="form-control" value="janeuser" type="text">--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-8">
                            <input class="btn btn-primary" value="Save Changes" type="button">
                            <span></span>
                            <input class="btn btn-default" value="Cancel" type="reset">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection