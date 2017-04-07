@extends('store.layouts.admin_layout')

@section('scripts')
    <script>


        function loadScripts(){
            $('.remove-column').on('click',function(){
                alert('hello');
            })

        }


        $('.add-columns').on('click', function () {

            var columns = $('#product_number').val();

            if(columns == ''){
                swal("Error!", 'you need to provide a value !', "error")


            }else if( columns > 50){

                swal({
                            title: "Sorry",
                            text: "You have exceeded your products threshold",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "Upgrade Now!",
                            closeOnConfirm: false
                        },
                        function(){

                            swal("Great!", "You have decided to upgrade. redirecting...", "success");

                            setTimeout(function(){
                                location.href="marketplace-signup"
                            },2000)


                        });

            }else {
//                alert(columns);
                $( "#product-form" ).load( "/store/quick-add-product-partial/"+columns);
            }


        });
//        $(document).off('click').on('click', '#product-form',function() {
            $("#product-form").on('submit', (function (e) {
                e.preventDefault();
                $.ajax({
                    url: $(this).attr('action'), // Url to which the request is send
                    type: "POST",             // Type of request to be send, called as method
                    data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                    contentType: false,       // The content type used when sending data to the server.
                    cache: false,             // To unable request pages to be cached
                    processData: false,        // To send DOMDocument or non processed data file it is set to false
                }).fail(function(data){
                    for (var field in data.responseJSON) {
//                        alert('hello failed');
                        var el = $(':input[name="' + field + '"]');
                        el.parent('.form-group').addClass('has-error');
                        el.next('.help-block').text(data.responseJSON[field][0]);
                        el.next('.validation_error').text(data.responseJSON[field][0]);
                        swal("Error!", data.responseJSON[field][0], "error")

                    }
                }).success(function(data){
//                    alert(data.message);
                    swal("Good job!", data.message, "success")
                    location.href="/store/all-products";

                });
            }));
//        });

        $('#category').on('change',function(){
            var category_value = $(this).val();
            $( "#sub_category" ).load( "/store/sub-categories-partial/"+category_value );
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
                        <h1>Add Product
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
                            <span>Quick Add product</span>
                        </li>
                    </ul>
                    <!-- END PAGE BREADCRUMBS -->

                    <!-- BEGIN PAGE CONTENT INNER -->
                    <div class="page-content-inner">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- BEGIN PORTLET-->
                                <div class="portlet light form-fit">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-social-dribbble font-green"></i>
                                            <span class="caption-subject font-green bold uppercase">Quick Add New Products</span>
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

                                    <div class="row">

                                        <div class="form-group" id="columns">
                                            {{--<label class="control-label col-md-3"><button class="btn btn-success text-center" id="add-columns">Add Columns</button></label>--}}
                                           <div class="col-md-2 col-sm-2"></div>


                                            <div class="col-md-4 col-sm-4 ">
                                                <br>
                                                    {{--<label class="control-label col-md-6">Number of Products </label>--}}
                                                    <input type="number" class="form-control" name="product_number" id="product_number" placeholder="Number of Products">
                                                    {{--<div class="help-block"> </div>--}}
                                            </div>
                                            <br>

                                            <div class="hidden-xs hidden-sm">
                                                <div class="col-md-2 col-sm-4">
                                                    <label class="control-label">
                                                        <button class="btn btn-success text-center add-columns" id="add-columns">
                                                            Add Columns</button>
                                                    </label>

                                                </div>

                                            </div>
                                            <div class="hidden-lg hidden-md" style="margin-left: 100px;">
                                                <div class="col-md-2 col-sm-4">
                                                    <label class="control-label">
                                                        <button class="btn btn-success text-center add-columns" id="add-columns">
                                                            Add Columns</button>
                                                    </label>

                                                </div>

                                            </div>
                                            <div class="col-md-4"></div>

                                        </div>

                                    </div>

                                    <form action="{{url('/store/quick-add-products')}}"  method="post" enctype="multipart/form-data"  id="product-form">


                                    </form>

                                    <br>
                                    <br>
                                    <br>

                                    {{--<div id="column-form">--}}

                                    {{--</div>--}}
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