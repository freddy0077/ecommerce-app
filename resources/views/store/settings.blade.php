@extends('store.layouts.admin_layout')

@section('scripts')
    <link href="{{asset('backend/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}" rel="stylesheet" type="text/css" />

    <script src="{{asset('backend/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}" type="text/javascript"></script>

    <script>



//        $(document).ready(function(){
            $('#name').on('change',function(){
                var str = $(this).val();
                str = str.replace(/\s+/g, '-').toLowerCase();
                $('#domain').val(str+'.shopaholicks.com/shop')
            });


//        })


        $('#customize-shop').on('click',function(e){
            e.preventDefault();
            $.post($(this).attr('action'),$(this).serialize(),function(){

            });
        });


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
                    swal("Error!", data.responseJSON[field][0], "error");

                }
            }).success(function(){
                swal({
                            title: "Great",
                            text: "You have successfully updated your shop settings!",
                            type: "success",
                            showCancelButton: true,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "Add products now !",
                            closeOnConfirm: false
                        },
                        function(){

                            swal("Great!", " redirecting you to add products page", "success");

                            setTimeout(function(){
                                location.href="/store/add-product";
                            },2000)
                        });

            });
        }));


        $('#upload').hide();
        $('#upload-banner').hide();

        $('#change-image').on('click',function(){
            $('#upload').show();
        })

        $('#change-banner').on('click',function(){
            $('#upload-banner').show();
        })


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
                        @if(!$store->enabled)
                        <div class="note note-warning">
                            <h4 class="block">Important! {{$store->name}}  is still not enabled ! </h4>
                            <p><a href="#enable"> Click here to enable it.</a></p>
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-md-12">
                                <!-- BEGIN PORTLET-->
                                <div class="portlet light form-fit ">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-social-dribbble font-green"></i>
                                            <span class="caption-subject font-green bold uppercase">Store Settings</span>
                                        </div>
                                        {{--<div class="actions">--}}
                                            {{--<a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">--}}
                                                {{--<i class="icon-cloud-upload"></i>--}}
                                            {{--</a>--}}
                                            {{--<a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">--}}
                                                {{--<i class="icon-wrench"></i>--}}
                                            {{--</a>--}}
                                            {{--<a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">--}}
                                                {{--<i class="icon-trash"></i>--}}
                                            {{--</a>--}}
                                        {{--</div>--}}
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
                                                    <label class="control-label col-md-3">Domain</label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="domain" id="domain" readonly value="{{isset($store->domain) ? $store->domain : ''}}">
                                                        <span class="help-block">  </span>
                                                    </div>
                                                </div>

                                                <div class="form-group last">
                                                    <label class="control-label col-md-3"></label>
                                                    <div class="col-md-4">
                                                        <a class="btn dark btn-outline" href="#form_modal3" data-toggle="modal"> Customize shop
                                                            <i class="fa fa-share"></i>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div id="form_modal3" class="modal fade" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                                <h4 class="modal-title">Customize Shop </h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                {{--<form action="#" class="form-horizontal">--}}
                                                                    <div class="form-group last">
                                                                        <label class="control-label col-md-3">Colour</label>
                                                                        <div class="col-md-3">
                                                                            <input type="text" class="colorpicker-default form-control" name="colour" value="{{$store->colour}}" /> </div>
                                                                    </div>
                                                                    {{--<div class="form-group">--}}
                                                                        {{--<label class="control-label col-md-3">RGBA</label>--}}
                                                                        {{--<div class="col-md-3">--}}
                                                                            {{--<input type="text" class="colorpicker-rgba form-control" value="rgb(0,194,255,0.78)" data-color-format="rgba" /> </div>--}}
                                                                    {{--</div>--}}
                                                                    {{--<div class="form-group last">--}}
                                                                        {{--<label class="control-label col-md-3">As Component</label>--}}
                                                                        {{--<div class="col-md-3">--}}
                                                                            {{--<div class="input-group color colorpicker-default" data-color="#3865a8" data-color-format="rgba">--}}
                                                                                {{--<input type="text" class="form-control" value="#3865a8" readonly>--}}
                                                                            {{--<span class="input-group-btn">--}}
                                                                                {{--<button class="btn default" type="button">--}}
                                                                                    {{--<i style="background-color: #3865a8;"></i>&nbsp;</button>--}}
                                                                            {{--</span>--}}
                                                                            {{--</div>--}}
                                                                            {{--<!-- /input-group -->--}}
                                                                        {{--</div>--}}
                                                                    {{--</div>--}}
                                                                {{--</form>--}}
                                                            </div>
                                                            <div class="modal-footer">
                                                                {{--<button class="btn dark btn-outline" data-dismiss="modal" aria-hidden="true">Close</button>--}}
                                                                <button class="btn green btn-primary" type="button" data-dismiss="modal">Save changes</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>



                                                {{--<div class="form-group">--}}
                                                    {{--<label class="control-label col-md-3">Image </label>--}}
                                                    {{--<div class="col-md-4">--}}
                                                        {{--<div class="input-group">--}}
                                                        {{--<input type="file" class="form-control" name="image" id="image">--}}
                                                        {{--<div class="help-block"> </div>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}


                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Logo</label>
                                                    <div class="col-md-4">
{{--                                                        <img src="/images/stores/{{$store->image}}"  class="img-thumbnail"><br><br>--}}
                                                        <img src='{{\Illuminate\Support\Facades\Storage::url("images/$store->image")}}'  class="img-thumbnail"><br><br>
                                                        <span><button type="button" id="change-image" class="btn btn-default">change</button></span><br>
                                                        <span><small><i>Recommended size: 200 x 50</i></small></span>
                                                    </div>
                                                </div>

                                                <div class="form-group" id="upload">
                                                    <label class="control-label col-md-3">Image Upload</label>
                                                    <div class="col-md-9">
                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                                            <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"> </div>
                                                            <div>
                                                                    <span class="btn red btn-outline btn-file">
                                                                        <span class="fileinput-new"> Select image </span>
                                                                        <span class="fileinput-exists"> Change </span>

                                                                        <input type="file" name="image" id="image"> </span>

                                                                <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                                {{--<a href="javascript:;" class="btn green fileinput-exists" id="crop-image"> Edit </a>--}}
                                                                <span class="help-block">  </span>

                                                            </div>
                                                        </div>
                                                        <div class="clearfix margin-top-10">
                                                            {{--<span class="label label-success">NOTE!</span> Image preview only works in IE10+, FF3.6+, Safari6.0+, Chrome6.0+ and Opera11.1+. In older browsers the filename is shown instead. </div>--}}
                                                        </div>
                                                    </div>


                                                    <div class="modal fade" tabindex="-1" role="dialog" id="crop-image-modal">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                    <h4 class="modal-title">Modal title</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    {{--</div>--}}

                                                                    <div class="container">
                                                                        <div class="row">
                                                                            <div class="col-sm-7">
                                                                                <!-- This is the image we're attaching Jcrop to -->
                                                                                <img  id="demo8" alt="Jcrop Example" class="img-responsive"/>
                                                                            </div>
                                                                            {{--<img width="500" id="demo8" alt="Jcrop Example" /> </div>--}}
                                                                            <div class="col-sm-5">
                                                                                <input type="hidden" id="crop_x" name="x" />
                                                                                <input type="hidden" id="crop_y" name="y" />
                                                                                <input type="hidden" id="crop_w" name="w" />
                                                                                <input type="hidden" id="crop_h" name="h" />
                                                                            </div>
                                                                        </div>

                                                                    </div>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                    {{--<button type="button" class="btn btn-primary">Save changes</button>--}}
                                                                </div>
                                                            </div><!-- /.modal-content -->
                                                        </div><!-- /.modal-dialog -->
                                                    </div><!-- /.modal -->


                                                </div>


                                                <!-- banner -->

                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Banner </label>
                                                    <div class="col-md-4">
                                                        <img src='{{\Illuminate\Support\Facades\Storage::url("images/$store->store_banner")}}'  class="img-thumbnail"><br><br>
{{--                                                        <img src="/images/stores/{{$store->store_banner}}"  class="img-thumbnail"><br><br>--}}
                                                        <span><button type="button" id="change-banner" class="btn btn-default">change banner</button></span><br>
                                                        <span><small><i>Recommended size: 870 x 260</i></small></span>
                                                    </div>
                                                </div>

                                                <div class="form-group" id="upload-banner">
                                                    <label class="control-label col-md-3">Banner image Upload</label>
                                                    <div class="col-md-9">
                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                                            <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"> </div>
                                                            <div>
                                                                    <span class="btn red btn-outline btn-file">
                                                                        <span class="fileinput-new"> Select image </span>
                                                                        <span class="fileinput-exists"> Change </span>

                                                                        <input type="file" name="banner-image" id="image"> </span>

                                                                <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                                {{--<a href="javascript:;" class="btn green fileinput-exists" id="crop-image"> Edit </a>--}}
                                                                <span class="help-block">  </span>

                                                            </div>
                                                        </div>
                                                        <div class="clearfix margin-top-10">
                                                            {{--<span class="label label-success">NOTE!</span> Image preview only works in IE10+, FF3.6+, Safari6.0+, Chrome6.0+ and Opera11.1+. In older browsers the filename is shown instead. </div>--}}
                                                        </div>
                                                    </div>


                                                    <div class="modal fade" tabindex="-1" role="dialog" id="crop-image-modal">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                    <h4 class="modal-title">Modal title</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    {{--</div>--}}

                                                                    <div class="container">
                                                                        <div class="row">
                                                                            <div class="col-sm-7">
                                                                                <!-- This is the image we're attaching Jcrop to -->
                                                                                <img  id="demo8" alt="Jcrop Example" class="img-responsive"/>
                                                                            </div>
                                                                            {{--<img width="500" id="demo8" alt="Jcrop Example" /> </div>--}}
                                                                            <div class="col-sm-5">
                                                                                <input type="hidden" id="crop_x" name="x" />
                                                                                <input type="hidden" id="crop_y" name="y" />
                                                                                <input type="hidden" id="crop_w" name="w" />
                                                                                <input type="hidden" id="crop_h" name="h" />
                                                                            </div>
                                                                        </div>

                                                                    </div>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                    {{--<button type="button" class="btn btn-primary">Save changes</button>--}}
                                                                </div>
                                                            </div><!-- /.modal-content -->
                                                        </div><!-- /.modal-dialog -->
                                                    </div><!-- /.modal -->


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

                                                <div class="form-group" id="enable">
                                                    <label class="control-label col-md-3">Enable</label>
                                                    <div class="col-md-4">
                                                        <input type="checkbox" class="form-control" name="enabled" {{$store->enabled ? "checked" : ""}}>
                                                        <span> Check to enable the shop </span>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Package</label>
                                                    <div class="col-md-4">
                                                        @if($store->package_name)
                                                            <p>You are currently on our  <i class="text-info">{{$store->package_name}} Plan</i></p>

                                                        @else
                                                            <p>You are currently on our  <i class="text-info">Free Plan</i></p>

                                                        @endif
                                                            <a href="{{url('/store/packages')}}" target="_blank" class="btn btn-success">Change Package</a>

                                                    </div>
                                                </div>

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