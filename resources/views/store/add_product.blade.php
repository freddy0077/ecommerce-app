@extends('store.layouts.admin_layout')

@section('scripts')
    <link href="{{asset('backend/assets/global/plugins/jcrop/css/jquery.Jcrop.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('backend/assets/pages/css/image-crop.min.css')}}" rel="stylesheet" type="text/css" />

    <script src="{{asset('backend/assets/global/plugins/jcrop/js/jquery.color.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/assets/global/plugins/jcrop/js/jquery.Jcrop.min.js')}}" type="text/javascript"></script>
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{asset('backend/assets/pages/scripts/form-image-crop.min.js')}}" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <script>

//        $("#blockui_sample_2_3").click(function(){App.startPageLoading({message:"Please wait..."}),window.setTimeout(function(){App.stopPageLoading()},2e3)});



                $("#product-form").on('submit',(function(e) {
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
                        swal("Error!",data.responseJSON[field][0] , "error");

                    }
                }).success(function(data) {
                    if(data.status == 403){
                        swal({
                                    title: "Sorry",
                                    text:  "You have reached your products threshold !",
                                    type: "error",
                                    showCancelButton: true,
                                    confirmButtonColor: "#DD6B55",
                                    confirmButtonText: "Upgrade Now !",
                                    closeOnConfirm: false
                                },
                                function(){

                                    swal("Great!", " redirecting to packages...", "success");

                                    setTimeout(function(){
                                        location.href="/store/packages";
                                    },2000)
                                });
//                        swal("Sorry!", 'you have reached your products threshold !', "error");
                    }else{
                        swal("Good job!", 'you have added a product !', "success");
                        location.href="/store/all-products"

                    }
                });
            }));

        $('#category').on('change',function(){
            var category_value = $(this).val();
            $( "#sub_category" ).load( "/store/sub-categories-partial/"+category_value );
        });

            var products_limit = '{{$products_limit}}';

//            alert(products_limit);

//
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
                            <span>add product</span>
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
                                        <div class="alert alert-block alert-info fade in">
                                            <button type="button" class="close" data-dismiss="alert"></button>
                                            {{--<h4 class="alert-heading">NO PRODUCTS YET!</h4>--}}
                                            <p>   PRODUCTS LEFT TO UPLOAD : {{$products_limit}}</p>

                                        </div>
                                        <div class="caption">
                                            <i class="icon-social-dribbble font-green"></i>
                                            <span class="caption-subject font-green bold uppercase">New Product</span>


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
                                        <form action="{{url('store/add-product')}}"  method="post" enctype="multipart/form-data"  id="product-form" class="form-horizontal form-bordered">
                                            <div class="form-body">
                                                <div class="form-group">
                                                </div>

                                                {{--<p>--}}
                                                    {{--<a href="javascript:;" class="btn btn-outline sbold red" id="blockui_sample_2_3"> Block Page Without Background Overlay </a>--}}
                                                {{--</p>--}}
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Product name </label>
                                                    <div class="col-md-4">
                                                        {{--<div class="input-group">--}}
                                                            <input type="text" class="form-control" name="name" id="name">

                                                                {{--<span class="input-group-btn">--}}
                                                                    {{--<a href="javascript:;" class="btn green" id="username1_checker">--}}
                                                                        {{--<i class="fa fa-check"></i> Check </a>--}}
                                                                {{--</span>--}}
                                                        {{--</div>--}}
                                                        <div class="help-block"> </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Description</label>
                                                    <div class="col-md-4">
                                                        <div class="input-icon right">
                                                            <i class="icon-exclamation-sign"></i>
                                                            <textarea class="form-control" class="form-control" name="description">

                                                            </textarea>

                                                        </div>
                                                        <div class="help-block"> </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Price</label>
                                                    <div class="col-md-4">
                                                        <input type="number" class="form-control" name="price">
                                                        <span class="help-block">  </span>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Image</label>
                                                    <div class="col-md-4">
                                                        <input type="file" class="form-control" name="image" id="image">
                                                        <span class="help-block">  </span>
                                                    </div>
                                                </div>

                                                <div class="form-group last password-strength">
                                                    <label class="control-label col-md-3">Category</label>
                                                    <div class="col-md-4">
                                                      <select class="form-control" name="category" id="category">
                                                          <option></option>
                                                          @foreach($categories as $category)
                                                          <option value="{{$category->id}}" data-id="{{$category->id}}">{{$category->name}}</option>
                                                          @endforeach
                                                      </select>
                                                        <span class="help-block">  </span>
                                                    </div>
                                                </div>

                                                <div class="form-group " id="sub_category">

                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Publish</label>
                                                    <div class="col-md-4">
                                                        <input type="checkbox" class="form-control" name="published">
                                                        <span> Check to publish the product </span>
                                                    </div>
                                                </div>

                                                <div class="form-group last">
                                                    <label class="control-label col-md-3">Feature</label>
                                                    <div class="col-md-4">
                                                        <input type="checkbox" class="form-control" name="feature">
                                                        <span> Check to feature this product on your shop </span>
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

    </div>


@endsection