@extends('store.layouts.admin_layout')

@section('scripts')
    <link href="{{asset('backend/assets/pages/css/pricing.min.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{asset('backend/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}" rel="stylesheet" type="text/css" />

    <script src="{{asset('backend/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}" type="text/javascript"></script>

    <script>
        $('.sign-up').on('click',function(){
            alert($(this).data('charge'));
            var name  = '{{\Illuminate\Support\Facades\Auth::user()->name}}';
            var phone_number = '{{\Illuminate\Support\Facades\Auth::user()->phone_number}}';
            var email = '{{\Illuminate\Support\Facades\Auth::user()->email}}';
            var charge = $(this).data('charge');

            $.post('/direct-pay/'+name+'/'+phone_number+'/'+email+'/'+charge,function(data){
                alert(data.description)

            })
        })


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
                swal("Good job!", 'you have successfully saved settings reloading page ... !', "success");
                setTimeout(function(){
                    location.reload();
                },2000)

            });
        }));


        $('#upload').hide();

        $('#change-image').on('click',function(){
            $('#upload').show();
        })


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
                        <h1>Pricing Tables
                            <small>pricing table samples</small>
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
                            <a href="index-2.html">Home</a>
                            <i class="fa fa-circle"></i>
                        </li>
                        <li>
                            <a href="#">Pages</a>
                            <i class="fa fa-circle"></i>
                        </li>
                        <li>
                            <span>General</span>
                        </li>
                    </ul>
                    <!-- END PAGE BREADCRUMBS -->
                    <!-- BEGIN PAGE CONTENT INNER -->
                    <div class="page-content-inner">
                        <div class="portlet light portlet-fit ">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="icon-share font-green"></i>
                                    <span class="caption-subject font-green bold uppercase">Pricing 1</span>
                                </div>
                                <div class="actions">
                                    <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                        <i class="icon-cloud-upload"></i>
                                    </a>
                                    <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                        <i class="icon-wrench"></i>
                                    </a>
                                    <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;"> </a>
                                    <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                        <i class="icon-trash"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="pricing-content-1">
                                    <div class="row">
                                        @foreach($packages as $package)
                                        <div class="col-md-3">
                                            <div class="price-column-container border-active">
                                                <div class="price-table-head bg-blue">
                                                    <h2 class="no-margin">{{$package->name}}</h2>
                                                </div>
                                                <div class="arrow-down border-top-blue"></div>
                                                <div class="price-table-pricing">
                                                    <h3>
                                                        <span class="price-sign"> &#162; </span>{{$package->charge}}</h3>
                                                    <p>per month</p>
                                                </div>
                                                <div class="price-table-content">
                                                    <div class="row mobile-padding">
                                                        <div class="col-xs-3 text-right mobile-padding">
                                                            <i class="fa fa-product"></i>
                                                        </div>
                                                        <div class="col-xs-9 text-left mobile-padding">{{$package->number_of_products}} Products</div>
                                                    </div>
                                                </div>
                                                <div class="arrow-down arrow-grey"></div>
                                                <div class="price-table-footer">
                                                    <button type="button" class="btn grey-salsa btn-outline sbold uppercase price-button sign-up" data-charge="{{$package->charge}}">Sign Up</button>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
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