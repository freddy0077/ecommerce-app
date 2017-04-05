@extends('store.layouts.admin_layout')

@section('scripts')
    <link href="{{asset('backend/assets/pages/css/pricing.min.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{asset('backend/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}" rel="stylesheet" type="text/css" />

    <script src="{{asset('backend/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}" type="text/javascript"></script>

    <script>
        $('.sign-up').on('click',function(){
//            alert($(this).data('charge'));
            var charge = $(this).data('charge');
            var package_id = $(this).data('package');
            $('#package_id').val(package_id);

            $('#signup-package-modal').modal();

            $('#add-new-package-form').on('submit',function(e){
                e.preventDefault();

                $.post('/direct-pay/'+charge,$(this).serialize(),function(data){
                    var token = data.token;

                    $('#signup-package-modal').hide();

                    swal({
                                title: "Mobile Money Payment Request",
                                text: data.description +'. click OK after approving it',
                                type: "info",
                                showCancelButton: true,
                                closeOnConfirm: false,
                                showLoaderOnConfirm: true,
                            },
                            function(){
                                setTimeout(function(){
                                    $.post('/admin/confirm-token/'+token,function(confirmData){
                                        if(confirmData.tx_status != undefined && confirmData.tx_status == 'complete'){
                                            location.href="/store/store-settings";
                                        }
                                        swal(confirmData.description);
                                    })
                                }, 5000);
                            });
//                alert(data.description)
                })


            });
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
                        <h1>Packages
                            {{--<small>pricing table samples</small>--}}
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
                            <a href="{{url('/store/store-settings')}}">Home</a>
                            <i class="fa fa-circle"></i>
                        </li>
                        <li>
                            <a href="#">Packages</a>
                            <i class="fa fa-circle"></i>
                        </li>
                        {{--<li>--}}
                            {{--<span>General</span>--}}
                        {{--</li>--}}
                    </ul>
                    <!-- END PAGE BREADCRUMBS -->
                    <!-- BEGIN PAGE CONTENT INNER -->
                    <div class="page-content-inner">
                        <div class="portlet light portlet-fit ">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="icon-share font-green"></i>
                                    <span class="caption-subject font-green bold uppercase">Pricing</span>
                                </div>
                                {{--<div class="actions">--}}
                                    {{--<a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">--}}
                                        {{--<i class="icon-cloud-upload"></i>--}}
                                    {{--</a>--}}
                                    {{--<a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">--}}
                                        {{--<i class="icon-wrench"></i>--}}
                                    {{--</a>--}}
                                    {{--<a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;"> </a>--}}
                                    {{--<a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">--}}
                                        {{--<i class="icon-trash"></i>--}}
                                    {{--</a>--}}
                                {{--</div>--}}
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
                                                    @if(\App\Package::getUserPackage($user->id) == $package->id)
                                                       <button type="button" class="btn grey-salsa btn-outline sbold uppercase price-button">Subscribed</button>
                                                        @else
                                                        <button type="button" class="btn grey-salsa btn-outline sbold uppercase price-button sign-up" data-package="{{$package->id}}" data-charge="{{$package->charge}}">PAY FOR PACKAGE</button>
                                                        @endif
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

    <div class="modal fade" tabindex="-1" role="dialog" id="signup-package-modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Subscribe to this Package</h4>
                </div>
                <form action="{{url('admin/add-new-package')}}" id="add-new-package-form">

                    <input type="hidden" class="form-control" name="package_id" id="package_id">

                    <div class="modal-body">
                        {{--<p>One fine body&hellip;</p>--}}
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="name" placeholder="Name" required>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="phone_number" placeholder="Phone number" required>
                            </div>

                            <br>
                            <br>

                            <div class="col-sm-2"></div>
                            <div class="col-sm-6">
                                {{--<input type="text" class="form-control" name="mobile_money" placeholder="Mobile Money" required>--}}
                                <select class="form-control" name="mobile_money">
                                    <option>Choose MTN or AIRTEL</option>
                                    <option value="MTN">MTN</option>
                                    <option value="AIRTEL">AIRTEL</option>
                                </select>
                            </div>
                            <div class="col-sm-2"></div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Pay with Mobile Money</button>
                    </div>
                </form>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

@endsection