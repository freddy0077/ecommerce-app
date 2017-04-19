@extends('admin.layouts.master')

@section('scripts')

    <script>
        $('.confirm-token').on('click',function(){
//            alert($(this).data('token'));
            var token = $(this).data('token');
            $.post('/admin/confirm-token/'+token,function(data){
                switch(data.tx_status){
                    case"cancelled":
                        swal("Error!", data.cancel_reason, "error");
                        setTimeout(function(){
                            location.reload();
                        },3000)
                        break;
                    case"complete":
                        swal("Success!", data.description, "success");
                        setTimeout(function(){
                            location.reload();
                        },3000)
                        break;
                }
//                alert(data.cancel_reason)
            })
        })
    </script>

    @endsection


    @section('content')
            <!-- BEGIN PAGE BREADCRUMBS -->

    <div class="page-container">
        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            <!-- BEGIN PAGE CONTENT BODY -->
            <div class="page-content">
                <div class="container">
                    <!-- BEGIN PAGE BREADCRUMBS -->
                    <ul class="page-breadcrumb breadcrumb">
                        {{--<li>--}}
                        {{--<a href="/">Home</a>--}}
                        {{--<i class="fa fa-circle"></i>--}}
                        {{--</li>--}}
                        <li>
                            <a href="{{url('/admin/dashboard')}}">Dashboard</a>
                            <i class="fa fa-circle"></i>
                        </li>
                        <li>
                            <span>All Users</span>
                        </li>
                    </ul>
                    <!-- END PAGE BREADCRUMBS -->
                    <!-- BEGIN PAGE CONTENT INNER -->
                    <div class="page-content-inner">
                        <div class="row">
                            <div class="col-md-12">

                                @if(!count($users))
                                    <div class="alert alert-block alert-info fade in">
                                        <button type="button" class="close" data-dismiss="alert"></button>
                                        <h3 class="alert-heading">NO USERS YET!</h3>
                                        <p> You currently have no users !
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
                                                <table class="table table-hover table-light table-bordered">
                                                    <thead>

                                                    <tr>
                                                    <th>No.</th>
                                                    <th width=""> Name </th>
                                                    <th> Phone Number </th>
                                                    <th class="numeric"> Email </th>
                                                    <th class="numeric"> Has store</th>
                                                    <th class="numeric"> Datetime </th>

                                                    <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $i = $users->firstItem() ?>
                                                    @foreach($users as $user)
                                                    <tr>
                                                    <td>{{$i++}}</td>
                                                    <td> {{$user->name}} </td>
                                                    <td> {{$user->phone_number}} </td>
                                                    <td> {{$user->email}} </td>
                                                    <td> {{$user->has_store ? "Yes" : "No" }} </td>
                                                    <td>{{$user->created_at}}</td>
                                                    <td>
                                                    <button class="btn btn-danger btn-xs" data-id="{{$user->id}}"><i class="fa fa-remove"></i></button> |
                                                    <button class="btn btn-danger btn-xs" data-id="{{$user->id}}"><i class="fa fa-remove"></i></button> |
                                                    {{--<button class="btn btn-success confirm-token" data-token="{{$user->id}}">Confirm token</button>--}}
                                                    </td>
                                                    </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">{{$users}}</div>

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

@endsection