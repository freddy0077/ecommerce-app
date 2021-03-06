@extends('store.layouts.admin_layout')

@section('scripts')
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
                }
            });
        }));

        $('#category').on('change',function(){
            var category_value = $(this).val();
//            $.load('/sub-categories-partial/'+);
//            $.get("/store/sub-categories-partial/"+category_value ,function(data){
//                $('#sub_category').html(data)
//            })
            $( "#sub_category" ).load( "/store/sub-categories-partial/"+category_value );

        })

        $('.delete').on('click',function(){
            var name = $(this).data('name');
            var product_id = $(this).data('id');
            swal({
                        title: "Are you sure?",
                        text: "You will not be able to recover "+name +"! ",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes, delete it!",
                        closeOnConfirm: false
                    },
                    function(){

                        $.post('{{url('/store/delete-product')}}/'+product_id,function(){

                        })

                        swal("Deleted!", "Your "+ name+ " file has been deleted.", "success");
                    });
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
                        <h1>All Orders
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
                            <a href="{{url('')}}">Store</a>
                            <i class="fa fa-circle"></i>
                        </li>
                        <li>
                            <span>All Orders</span>
                        </li>
                    </ul>
                    <!-- END PAGE BREADCRUMBS -->
                    <!-- BEGIN PAGE CONTENT INNER -->
                    <div class="page-content-inner">
                        <div class="row">
                            <div class="col-md-12">

                                @if(!count($orders))
                                    <div class="alert alert-block alert-info fade in">
                                        <button type="button" class="close" data-dismiss="alert"></button>
                                        <h3 class="alert-heading">NO ORDERS YET!</h3>
                                        <p> You currently have no orders !
                                        </p>
                                        {{--<p>--}}
                                            {{--<a class="btn purple" href="{{url('store/add-product')}}"> Add New Product </a>--}}
                                            {{--<a class="btn dark" href="{{url('store/quick-add-products')}}"> Add More Products </a>--}}
                                        {{--</p>--}}
                                    </div>

                                    @else
                                    {{--<div class="col-md-12">--}}
                                        <!-- BEGIN BORDERED TABLE PORTLET-->
                                        <div class="portlet light portlet-fit ">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-settings font-red"></i>
                                                    <span class="caption-subject font-red sbold uppercase">ALL ORDERS</span>
                                                </div>
                                                {{--<div class="actions">--}}
                                                {{--<div class="btn-group btn-group-devided" data-toggle="buttons">--}}
                                                {{--<label class="btn grey-salsa btn-sm active">--}}
                                                {{--<input type="radio" name="options" class="toggle" id="option1">Actions</label>--}}
                                                {{--<label class="btn grey-salsa btn-sm">--}}
                                                {{--<input type="radio" name="options" class="toggle" id="option2">Settings</label>--}}
                                                {{--</div>--}}
                                                {{--</div>--}}
                                            </div>
                                            <div class="portlet-body">
                                                <div class="table-scrollable table-scrollable-borderless">
                                                    <table class="table table-hover table-light">
                                                        <thead>
                                                        <tr class="uppercase">
                                                            <th> # </th>
                                                            <th> Name </th>
                                                            <th> Amount </th>
                                                            <th> Date </th>
                                                            <th> Action </th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php $i = $orders->firstItem() ?>
                                                        @foreach($orders as $order)

                                                            <tr>
                                                                <td>{{$i++}}</td>
                                                                <td>{{$order->name}}</td>
                                                                <td>GHS {{$order->amount }}</td>
                                                                <td>{{$order->created_at}}</td>
                                                                <td><a href="{{url('/store/order-items',$order->id)}}" class="btn btn-success">View</a></td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center">{{$orders}}</div>

                                        <!-- END BORDERED TABLE PORTLET-->
                                    </div>

                                @endif
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

    {{--</div>--}}


@endsection