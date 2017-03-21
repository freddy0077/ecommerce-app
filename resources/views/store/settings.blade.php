@extends('store.layouts.admin_layout')

@section('scripts')
    <script>

//        $(document).ready(function(){
            $('#name').on('change',function(){
                var str = $(this).val();
                str = str.replace(/\s+/g, '-').toLowerCase();
                $('#domain').val(str+'.shopaholicks.com')
            })
//        })


        $("#settings-form").on('submit',(function(e) {
            e.preventDefault();

            $.ajax({
                url: $(this).attr('action'), // Url to which the request is send
                type: "POST",             // Type of request to be send, called as method
                data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData:false,        // To send DOMDocument or non processed data file it is set to false
            }).fail(function(data){
                for (var field in data.responseJSON) {
                    var el = $(':input[name="' + field + '"]');
                    el.parent('.form-group').addClass('has-error');
                    el.next('.help-block').text(data.responseJSON[field][0]);
                    el.next('.validation_error').text(data.responseJSON[field][0]);
                }
            }).success(function(){
                swal("Good job!", 'you have successfully saved settings reloading page ... !', "success");
                setTimeout(function(){
                    location.reload();
                },2000)

            });
        }));

    </script>
@endsection

@section('content')

    <div class="page-container">
        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            <!-- BEGIN CONTENT BODY -->
            <!-- BEGIN PAGE HEAD-->
            <div class="page-head">
                <div class="container">
                    <!-- BEGIN PAGE TITLE -->
                    <div class="page-title">
                        <h1>Store Settings
                            {{--<small>select2, selectboxit & multi select examples</small>--}}
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
                            <a href="/">Home</a>
                            <i class="fa fa-circle"></i>
                        </li>
                        <li>
                            <a href="#">Store</a>
                            <i class="fa fa-circle"></i>
                        </li>
                        <li>
                            <span>Store Settings</span>
                        </li>
                    </ul>
                    <!-- END PAGE BREADCRUMBS -->
                    <!-- BEGIN PAGE CONTENT INNER -->
                    <div class="page-content-inner">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- BEGIN PORTLET-->
                                <div class="portlet light form-fit ">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-social-dribbble font-green"></i>
                                            <span class="caption-subject font-green bold uppercase">Store Settings</span>
                                        </div>
                                        <div class="actions">
                                            <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                                <i class="icon-cloud-upload"></i>
                                            </a>
                                            <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                                <i class="icon-wrench"></i>
                                            </a>
                                            <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                                <i class="icon-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="portlet-body form">
                                        <!-- BEGIN FORM-->
                                        <form action="{{url('store/store-settings')}}"  method="post" enctype="multipart/form-data"  id="settings-form" class="form-horizontal form-bordered">
                                            <div class="form-body">

                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Shop Name </label>
                                                    <div class="col-md-4">
                                                        {{--<div class="input-group">--}}
                                                        <input type="text" class="form-control" name="name" id="name" value='{{isset($store->name) ? $store->name : ""}}'>
                                                        <div class="help-block"> </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Image </label>
                                                    <div class="col-md-4">
                                                        {{--<div class="input-group">--}}
                                                        <input type="file" class="form-control" name="image" id="image">
                                                        <div class="help-block"> </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Phone Number </label>
                                                    <div class="col-md-4">
                                                        {{--<div class="input-group">--}}
                                                        <input type="text" class="form-control" name="phone_number" id="phone_number" value='{{isset($store->phone_number)?$store->phone_number :""}}'>
                                                        <div class="help-block"> </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Email </label>
                                                    <div class="col-md-4">
                                                        {{--<div class="input-group">--}}
                                                        <input type="text" class="form-control" name="email" id="email" value="{{isset($store->email)? $store->email :''}}">
                                                        <div class="help-block"> </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Address </label>
                                                    <div class="col-md-4">
                                                        {{--<div class="input-group">--}}
                                                        <input type="text" class="form-control" name="address" id="address" value="{{isset($store->address) ? $store->address : ''}}">
                                                        <div class="help-block"> </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3">About</label>
                                                    <div class="col-md-4">
                                                        <div class="input-icon right">
                                                            <i class="icon-exclamation-sign"></i>
                                                            <textarea class="form-control" class="form-control" name="about">{{isset($store->about) ? $store->about :''}}</textarea>
                                                        </div>
                                                        <div class="help-block"> </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3">City</label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="city" id="city" value="{{isset($store->city)?$store->city:''}}">
                                                        <span class="help-block">  </span>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Domain</label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="domain" id="domain" readonly value="{{isset($store->domain) ? $store->domain : ''}}">
                                                        <span class="help-block">  </span>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Business type</label>
                                                    <div class="col-md-4">
                                                      <select class="form-control" name="business_type">
                                                          <option>{{isset($store->business_type) ? $store->business_type : ""}}</option>
                                                          <option>Sole Proprietor</option>
                                                          <option>Corporation</option>
                                                          <option>Non Profit</option>
                                                          <option>Partnership</option>
                                                          <option>LLC</option>
                                                      </select>
                                                        <span class="help-block">  </span>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Enable</label>
                                                    <div class="col-md-4">
                                                        <input type="checkbox" class="form-control" name="enable">
                                                        <span> Check to enable the store </span>
                                                    </div>
                                                </div>


                                                {{--<div class="form-group">--}}
                                                    {{--<label class="control-label col-md-3">Image</label>--}}
                                                    {{--<div class="col-md-4">--}}
                                                        {{--<input type="file" class="form-control" name="image" id="image">--}}
                                                        {{--<span class="help-block">  </span>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            </div>

                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <button href="javascript:;" class="btn dark">
                                                            <i class="fa fa-check"></i> Submit</button>
                                                        <a href="javascript:;" class="btn btn-outline grey-salsa">Cancel</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- END FORM-->
                                    </div>
                                </div>
                                <!-- END PORTLET-->
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
        <!-- BEGIN QUICK SIDEBAR -->
        <a href="javascript:;" class="page-quick-sidebar-toggler">
            <i class="icon-login"></i>
        </a>
        <div class="page-quick-sidebar-wrapper" data-close-on-body-click="false">
            <div class="page-quick-sidebar">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="javascript:;" data-target="#quick_sidebar_tab_1" data-toggle="tab"> Users
                            <span class="badge badge-danger">2</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" data-target="#quick_sidebar_tab_2" data-toggle="tab"> Alerts
                            <span class="badge badge-success">7</span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> More
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li>
                                <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                    <i class="icon-bell"></i> Alerts </a>
                            </li>
                            <li>
                                <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                    <i class="icon-info"></i> Notifications </a>
                            </li>
                            <li>
                                <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                    <i class="icon-speech"></i> Activities </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                    <i class="icon-settings"></i> Settings </a>
                            </li>
                        </ul>
                    </li>
                </ul>

            </div>
        </div>
        <!-- END QUICK SIDEBAR -->
    </div>


@endsection