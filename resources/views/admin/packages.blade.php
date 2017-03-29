@extends('admin.layouts.master')

@section('scripts')

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
            })
        })

    </script>

    @endsection


    @section('content')
            <!-- BEGIN PAGE BREADCRUMBS -->
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="#">Dashboard</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="#">Packages</a>
            <i class="fa fa-circle"></i>
        </li>
        {{--<li>--}}
        {{--<span>Tiles</span>--}}
        {{--</li>--}}
    </ul>
    <!-- END PAGE BREADCRUMBS -->


    <div class="page-content-inner">

        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                {{--<div class="note note-success">--}}
                {{--<p> Please try to re-size your browser window in order to see the tables in responsive mode. </p>--}}
                {{--</div>--}}
                <br>
                <br>

                <!-- BEGIN SAMPLE TABLE PORTLET-->
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-cogs"></i>Packages Table</div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"> </a>
                            {{--<a href="#portlet-config" data-toggle="modal" class="config"> </a>--}}
                            <a href="javascript:;" class="reload"> </a>

                            <button class="btn btn-success" id="add-new-package"> Add New Package</button>
                            {{--<a href="javascript:;" class="remove"> </a>--}}
                        </div>
                    </div>
                    <div class="portlet-body flip-scroll">
                        <table class="table table-bordered table-striped table-condensed flip-content">
                            <thead class="flip-content">
                            <tr>
                                {{--<th>No.</th>--}}
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
                            <!--                            --><?php //$i = \App\User::all()->first(); ?>
                            @foreach($packages as $package)
                                <tr>
                                    {{--<td>{{$i++}}</td>--}}
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
                                        {{--<button class="btn btn-success confirm-token" data-token="{{$user->id}}">Confirm token</button>--}}

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!! $packages !!}
                    </div>
                </div>
                <!-- END SAMPLE TABLE PORTLET-->
            </div>
            <div class="col-md-1"></div>

        </div>
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
                                <input type="number" class="form-control" name="charge" placeholder="Charge" required>
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