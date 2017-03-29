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
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="index-2.html">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="#">UI Features</a>
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
                                <th> Phone Number </th>
                                <th class="numeric"> Email </th>
                                <th class="numeric"> Has store</th>
                                <th class="numeric"> Datetime </th>

                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
<!--                            --><?php //$i = \App\User::all()->first(); ?>
                            @foreach($users as $user)
                                <tr>
                                    {{--<td>{{$i++}}</td>--}}
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
                        {!! $users !!}
                    </div>
                </div>
                <!-- END SAMPLE TABLE PORTLET-->
            </div>
            <div class="col-md-1"></div>

        </div>
    </div>

@endsection