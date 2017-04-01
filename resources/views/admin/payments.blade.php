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
            <i class="fa fa-cogs"></i>Payments Table</div>
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
                <th width=""> Name </th>
                <th> Amount </th>
                <th class="numeric"> Status </th>
                <th class="numeric"> Transaction id </th>
                <th class="numeric"> token </th>
                <th class="numeric"> Mobile Invoice no. </th>
                <th class="numeric"> Cancel reason </th>
                <th class="numeric">Datetime</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach(\App\Payment::all() as $payment)
            <tr>
                <td> {{\App\User::find($payment->user_id)->name}} </td>
                <td> {{$payment->amount}} </td>
                <td> {{$payment->tx_status}} </td>
                <td> {{$payment->transaction_id}} </td>
                <td> {{$payment->token}} </td>
                <td> {{$payment->mobile_invoice_no}} </td>
                <td> {{$payment->cancel_reason}} </td>
                <td>{{$payment->created_at}}</td>
                <td>
                    <button class="btn btn-success confirm-token" data-token="{{$payment->token}}">Confirm token</button>
                </td>
            </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- END SAMPLE TABLE PORTLET-->
    </div>
            <div class="col-md-1"></div>

        </div>
    </div>

@endsection