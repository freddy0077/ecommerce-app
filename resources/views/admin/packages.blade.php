@extends('admin.layouts.master')

@section('scripts')

    <style>
        .portlet{
            margin-bottom: 200px;
        }
    </style>

    <script>

        $('.add-package').on('click',function(){
            alert($(this).data('id'))
            $('#package-modal').modal();
        })

        $('#add-new-package').on('click',function(){
            $('#package-modal').modal();
        })

        $('#add-new-package-form').on('submit',function(e){
            e.preventDefault();
            $.post('/admin/add-new-package',$(this).serialize(),function(){

            }).success(function(){
                swal('Success','Successfully added a new package ','success')
                location.reload();
            })
        })

    </script>

    @endsection


    @section('content')

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
                                <span>All Orders</span>
                            </li>
                        </ul>
                        <!-- END PAGE BREADCRUMBS -->
                        <!-- BEGIN PAGE CONTENT INNER -->
                        <div class="page-content-inner">
                            <div class="row">
                                <div class="col-md-12">

                                    @if(!count($packages))
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
                                                    <span class="caption-subject font-red sbold uppercase">ALL PACKAGES</span>
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
                                                        <th> Charge </th>
                                                        <th class="numeric"> Description </th>
                                                        <th class="numeric"> Number of Products</th>
                                                        <th class="numeric"> Duration </th>
                                                        <th class="numeric"> Payment link </th>
                                                        <th class="numeric"> type </th>
                                                        <th>Action</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                        $i = $packages->firstItem();
                                                        ?>
                                                        @foreach($packages as $package)
                                                        <tr>
                                                        <td>{{$i++}}</td>
                                                        <td> {{$package->name}} </td>
                                                        <td> {{$package->charge}} </td>
                                                        <td> {{$package->description}} </td>
                                                        <td> {{$package->number_of_products}} </td>
                                                        <td>{{$package->duration}}</td>
                                                        <td>{{$package->payment_link}}</td>
                                                        <td>{{$package->type}}</td>
                                                        <td>
                                                        <button class="btn btn-success btn-xs add-package" data-id="{{$package->id}}"><i class="fa fa-plus"></i></button> |
                                                        <button class="btn btn-danger btn-xs edit-package" data-id="{{$package->id}}"><i class="fa fa-pencil-square"></i></button> |
{{--                                                        <button class="btn btn-success confirm-token" data-token="{{$user->id}}">Confirm token</button>--}}

                                                        </td>
                                                        </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center">{{$packages}}</div>

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


    <div class="modal fade" tabindex="-1" role="dialog" id="package-modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Add New Package</h4>
                </div>
                <form action="{{url('admin/add-new-package')}}" id="add-new-package-form">

                <div class="modal-body">
                        {{--<p>One fine body&hellip;</p>--}}
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="name" placeholder="Name of package" required>
                            </div>
                            <div class="col-sm-6">
                                <input type="number" step="0.1" class="form-control" name="charge" placeholder="Charge" required>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="description" placeholder="Description of package" required>
                            </div>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" name="number_of_products" placeholder="Number of products" required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="duration" placeholder="Duration of package" required>
                            </div>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" name="payment_link" placeholder="Payment link">
                                <span class="help-block"><small>optional field</small></span>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-sm-10">
                                {{--<input type="text" class="form-control" name="type" placeholder="type of package">--}}
                                <select class="form-control" name="type" required>
                                    <option>Type of package</option>
                                    <option value="upgrade_package">Upgrade Package</option>
                                    <option value="marketplace_upgrade">MarketPlace Package</option>
                                </select>
                            </div>

                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


@endsection

{{--<tr>--}}
    {{--<th>No.</th>--}}
    {{--<th width=""> Name </th>--}}
    {{--<th> Charge </th>--}}
    {{--<th class="numeric"> Description </th>--}}
    {{--<th class="numeric"> Number of Products</th>--}}
    {{--<th class="numeric"> Duration </th>--}}
    {{--<th class="numeric"> Payment link </th>--}}
    {{--<th class="numeric"> type </th>--}}
    {{--<th>Action</th>--}}
{{--</tr>--}}

        <!--                            --><?php //$i = \App\User::all()->first(); ?>
    {{--@foreach($packages as $package)--}}
        {{--<tr>--}}
            {{--<td>{{$i++}}</td>--}}
            {{--<td> {{$package->name}} </td>--}}
            {{--<td> {{$package->charge}} </td>--}}
            {{--<td> {{$package->description}} </td>--}}
            {{--<td> {{$package->number_of_products}} </td>--}}
            {{--<td>{{$package->duration}}</td>--}}
            {{--<td>{{$package->payment_link}}</td>--}}
            {{--<td>{{$package->type}}</td>--}}
            {{--<td>--}}
                {{--<button class="btn btn-success btn-xs add-package" data-id="{{$package->id}}"><i class="fa fa-plus"></i></button> |--}}
                {{--<button class="btn btn-danger btn-xs edit-package" data-id="{{$package->id}}"><i class="fa fa-pencil-square"></i></button> |--}}
                {{--<button class="btn btn-success confirm-token" data-token="{{$user->id}}">Confirm token</button>--}}

            {{--</td>--}}
        {{--</tr>--}}
    {{--@endforeach--}}