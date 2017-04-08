@extends('store.layouts.admin_layout')

@section('scripts')

    <link href="{{asset('backend/assets/global/plugins/jcrop/css/jquery.Jcrop.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('backend/assets/pages/css/image-crop.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('backend/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}" rel="stylesheet" type="text/css" />


    <script src="{{asset('backend/assets/global/plugins/jcrop/js/jquery.color.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/assets/global/plugins/jcrop/js/jquery.Jcrop.min.js')}}" type="text/javascript"></script>
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{asset('backend/assets/pages/scripts/form-image-crop.min.js')}}" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{asset('backend/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <script>


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
            }).success(function() {
                swal("Good job!", 'you have successfully updated product !', "success");
            })
        }));

        $('#category').on('change',function(){
            var category_value = $(this).val();

            $( "#sub_category" ).load( "/store/sub-categories-partial/"+category_value );
        });

        $('#upload').hide();

        $('#change-image').on('click',function(){
            $('#upload').show();
        })



        var sale_price = $('#sale_price')

//        if($('#sale:checked').val() == 'on') {
//            sale_price.show();
//        }

        sale_price.hide();

        $('#sale').on('click',function(){
//       alert($('#store:checked').val())
            var sale = $('#sale');
            if($('#sale:checked').val() == 'on'){
                sale_price.show();
                sale_price.attr('required',true);

            }else {
                sale_price.hide();
                sale_price.removeAttr('required');
            }
        })

        sale_price.on('change',function(){
            if(sale_price.val() >= $('#price').val()){
                $('.sale_price_error').text('sale price can not be equal or more than original')
                $('#submit').attr('disabled',true)
            }else{
                $('.sale_price_error').text('')
                $('#submit').removeAttr('disabled')

            }
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
                        <h1>Edit Product
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
                            <a href="{{url('store/all-products')}}">Products</a>
                            <i class="fa fa-circle"></i>
                        </li>
                        <li>
                            <span>edit product</span>
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
                                            <span class="caption-subject font-green bold uppercase">Edit Product</span>
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
                                        <form action="{{url('/store/update-product',$product->id)}}"  method="post" enctype="multipart/form-data"  id="product-form" class="form-horizontal form-bordered">
                                            <div class="form-body">
                                                <div class="form-group">
                                                </div>

                                                <input type="hidden" class="form-control" name="sub_category" id="name" value="{{$product->sub_category_id}}">

                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Product name </label>
                                                    <div class="col-md-4">
                                                        {{--<div class="input-group">--}}
                                                        <input type="text" class="form-control" name="name" id="name" value="{{$product->name}}">

                                                        <div class="help-block"> </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Description</label>
                                                    <div class="col-md-4">
                                                        <div class="input-icon right">
                                                            <i class="icon-exclamation-sign"></i>
                                                            <textarea class="form-control" class="form-control" name="description">{{$product->description}}
                                                            </textarea>

                                                        </div>
                                                        <div class="help-block text-danger"> </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Price</label>
                                                    <div class="col-md-4">
                                                        <input type="number" class="form-control" name="price" id="price" value="{{$product->price}}">
                                                        <span class="help-block text-danger">  </span>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Sale</label>
                                                    <div class="col-md-2">
                                                        <input type="checkbox" class="form-control" name="sale" id="sale" {!! $product->sale == true ? 'checked':'' !!}>
                                                        <span class="help-block">  </span>
                                                        <br>
                                                        <?php  ?>
                                                        <input type="number" class="form-control" name="sale_price"id="sale_price" value="{{$product->sale_price}}" >
                                                        <span class="help-block sale_price_error text-danger">  </span>

                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Image</label>
                                                    <div class="col-md-4">
                                                      <img src="/images/products/{{$product->image}}"  class="img-thumbnail"><br><br>
                                                        <span><button type="button" id="change-image" class="btn btn-default">change</button></span>
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

                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Gallery</label>
                                                    <div class="col-md-3">

                                                        <input type="file" name="gallery[]" class="form-control" />
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="file" name="gallery[]" class="form-control" />

                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="file" name="gallery[]" class="form-control" />

                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Gallery</label>

                                                @foreach(\App\ProductGallery::whereProductId($product->id)->orderBy('created_at','desc')->take(3)->get() as $gallery)
                                                        <div class="col-md-3">
                                                            <img src="/images/products/{{$gallery->image}}"  class="img-thumbnail"><br><br>
                                                            {{--<span><button type="button" id="change-image" class="btn btn-default">change</button></span>--}}
                                                        </div>
                                                    @endforeach
                                                </div>

                                                <input type="hidden" name="image" value="{{$product->image}}">
                                            </div>


                                                <div class="form-group">
                                                <label class="control-label col-md-3">Publish</label>
                                                <div class="col-md-4">
                                                    <input type="checkbox" class="form-control" name="published" {{$product->published == true ?"checked" :""}}>
                                                    <span> Check to publish this product </span>
                                                </div>
                                            </div>


                                            <div class="form-group last">
                                                <label class="control-label col-md-3">Feature</label>
                                                <div class="col-md-4">
                                                    <input type="checkbox" class="form-control" name="feature" {{$product->feature == true ?"checked" :""}}>
                                                    <span> Check to feature this product in your shop </span>
                                                </div>

                                            </div>
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <button href="javascript:;" class="btn dark" id="submit">
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