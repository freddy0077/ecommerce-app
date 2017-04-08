@extends('store.layouts.admin_layout')

@section('scripts')

    <script>
        $('.pay-package').hide();

            $('#packages').on('change',function(){
                var package_id = $('#packages').val();
                $('#package_id').val(package_id);
                var charge = 50;

                $.get("{{url('/store/marketplace-packages')}}/"+package_id,function(data){

//                    var charge =   $('.charge');
                    charge = (data.charge);
                    $('.pay-package').show()
                })

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


                $('#pay-package').on('click',function(){
//                   alert(package);
                 $('#signup-package-modal').modal();

                })




                {{--$('#pay-package').on('click',function(){--}}
{{--//                   alert(package);--}}
                    {{--$.get("{{url('/store/marketplace-packages')}}/"+package,function(data){--}}
                        {{--$('#pay-package-modal').modal()--}}
                        {{--$('.intrinsic-container iframe').attr('src',data.payment_link);--}}
                        {{--$('.intrinsic-container iframe').contentWindow.location.reload(true);--}}

                        {{--$(function(){--}}
                            {{--$('.intrinsic-container iframe').ready(function(){--}}
                                {{--alert('loaded')--}}
                                {{--//your code (will be called once iframe is done loading)--}}
                            {{--});--}}
                        {{--});--}}

                    {{--})--}}

                {{--})--}}

            })



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
                    alert('hello failed');
                    var el = $(':input[name="' + field + '"]');
                    el.parent('.form-group').addClass('has-error');
                    el.next('.help-block').text(data.responseJSON[field][0]);
                    el.next('.validation_error').text(data.responseJSON[field][0]);
                }
            }).success(function(data){
//                    alert(data.message);
                swal("Good job!", data.message, "success")

                location.href="/store/all-products";

            });
        }));

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
                        <h1>Market Place SignUp
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
                            <span>Market Place Signup</span>
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
                                            <span class="caption-subject font-green bold uppercase">
                                                Advertise Products on Market Place
                                                <br>
                                                <br>
                                            </span>
                                            <i>You have not subscribed to any of our packages yet !</i>

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
                                            <div class="col-md-2"></div>

                                            <div class="col-md-7">
                                                <br>
                                                {{--<label class="control-label col-md-6">Number of Products </label>--}}
                                                <select class="form-control" name="packages" id="packages">
                                                    <option></option>
                                                    @foreach($packages as $package)
                                                    <option value="{{$package->id}}">{{$package->description}}</option>
                                                    @endforeach
                                                </select>

                                                <br>
                                                <h4 class="pay-package" style="text-align: center">You will be charged <i class="text-info charge" id="charge">50</i> GHS for the package chosen </h4>
                                            </div>
                                            <br>
                                            <div class="col-md-2">
                                                <label class="control-label">
                                                    <button class="btn btn-success text-center pay-package" id="pay-package">
                                                        Pay <span class="charge"></span></button>
                                                </label>

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
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="pay-package-modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                    {{--<div class="modal-header">--}}
                        {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>--}}
                        {{--<h4 class="modal-title">Add New Category</h4>--}}
                    {{--</div>--}}
                    <div class="modal-body">
                        <div id="payment-view">
                            <div class="intrinsic-container">
                                <iframe src="" allowfullscreen width="500" height="500"></iframe>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

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
