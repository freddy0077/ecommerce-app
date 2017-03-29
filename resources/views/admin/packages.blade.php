@extends('admin.layouts.master')

@section('scripts')

    <script>

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
                            <i class="fa fa-cogs"></i>Users Table</div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"> </a>
                            {{--<a href="#portlet-config" data-toggle="modal" class="config"> </a>--}}
                            <a href="javascript:;" class="reload"> </a>
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
                                    <td> {{$user->charge}} </td>
                                    <td> {{$user->description}} </td>
                                    <td> {{$user->number_of_products}} </td>
                                    <td>{{$user->duration}}</td>
                                    <td>{{$user->payment_link}}</td>
                                    <td>{{$user->type}}</td>
                                    <td>
                                        <button class="btn btn-danger btn-xs" data-id="{{$user->id}}"><i class="fa fa-plus"></i></button> |
                                        <button class="btn btn-danger btn-xs" data-id="{{$user->id}}"><i class="fa fa-pencil-square"></i></button> |
                                        {{--<button class="btn btn-success confirm-token" data-token="{{$user->id}}">Confirm token</button>--}}

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!! $users !!}
                    </div>
                </div>
                <!-- END SAMPLE TABLE PORTLET-->
            </div>
            <div class="col-md-1"></div>

        </div>
    </div>

@endsection