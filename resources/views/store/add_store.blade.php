@extends('market.layouts.without_slider_layout')

@section('scripts')
    <style>
        body{
            min-height:80%;
        }
    </style>
    <script>
        //style top list items
        $('#top-list-items a').css('margin-right','20px')

        $(document).ready(function () {
            $('#name').on('change',function(){
                var str = $(this).val();
                str = str.replace(/\s+/g, '-').toLowerCase();
                $('#domain').val(str+'.shopaholicks.dev')
            })
            $('#add_store_form').submit(function(e){
                e.preventDefault();

                $.ajax({
                    url:"{{url('store/add-store')}}",
                    type:"POST",
                    data: $('#add_store_form').serialize(),
                    dataType: 'json',
                    beforeSend:function( ) {
//
                    },
                    complete:function( data ) {

                    },
                    success:function( data ) {
                        location.href="/store/"+data.slug;
                        alert('successful');

                    },
                    error:function( data ) {
                        for (var field in data.responseJSON) {
                            var el = $(':input[name="' + field + '"]');
                            el.parent('.form-group').addClass('has-error');
                            el.next('.help-block').text(data.responseJSON[field][0]);
                            el.next('.validation_error').text(data.responseJSON[field][0]);
                        }

                    }
                });

            })

        })

    </script>

    <style type="text/css">
        /*side -menu*/

        .nav-pills>li.active>a, .nav-pills>li.active>a:hover, .nav-pills>li.active>a:focus {
            color: #fff;
            /*background-color: #428bca;*/
            background-color: #298ffc;
        }

        .margintop40 {
            margin-top:40px;
        }

        .nav-pills>li>a {
            border-radius: 0px;
        }

        a {
            color: #000;
            text-decoration: none;
        }

        a:hover {
            color: #000;
            text-decoration: none;
        }


        .nav-stacked>li+li {
            margin-top: 0px;
            margin-left: 0;
            border-bottom:1px solid #dadada;
            border-left:1px solid #dadada;
            border-right:1px solid #dadada;
        }

        .active2 {
            border-right:4px solid #428bca;
        }
    </style>

@endsection

@section('content')

    <?php

    if(Auth::check() && Auth::user()->has_store){
        $user = Auth::user();
        $store = \App\Store::whereUserId($user->id)->first();
    }


    ?>

    <h1 class="h3">ADD SHOP</h1>

    <div class="row">
        <div class="container">

        <div class="col-md-3">
            <ul class="nav nav-pills nav-stacked margintop40" style="padding-top: 25px;">
                <li class="active"><a href="#"><span class="glyphicon glyphicon-chevron-right"></span> Home</a></li>
                <li><a href="#"><span class="fa fa-plus"></span> Add Shop Collections </a></li>
                <li><a href="#" class="active2"><span class="fa fa-plus"></span> Add sub collections</a></li>
                <li><a href="#"><span class="fa fa-plus"></span> Add Products</a></li>
                <li><a href="#"><span class="fa fa-plus"></span> Option 4</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span> Option 5</a></li>
            </ul>
        </div>

    <div class="col-md-9">

        <div class="panel panel-primary" style="margin:20px;">
            <div class="panel-heading">
                <h3 class="panel-title">ADD YOUR NEW STORE</h3>
            </div>
            <div class="panel-body">
                <form id="add_store_form" novalidate>
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group col-md-6 col-sm-6">
                            <label for="name">Name*	</label>
                            <input type="text" class="form-control input-sm" id="name" name="name" value="{{isset($store->name)?$store->name:""}}" placeholder="your store name" required>
                            <small class="help-block"></small>
                            {{--<span class="validation_error">hello</span>--}}

                        </div>
                        <div class="form-group col-md-6 col-sm-6">
                            <label for="email">Email*</label>
                            <input type="email" class="form-control input-sm" id="email" name="email" value="{{isset($store->email)?$store->email:""}}" required>
                            <small class="help-block"></small>
                            {{--<span class="validation_error">hello</span>--}}

                        </div>

                        <div class="form-group col-md-6 col-sm-6">
                            <label for="mobile">Phone Number*</label>
                            <input type="text" class="form-control input-sm" id="phone_number" name="phone_number" placeholder="" value="{{isset($store->phone_number)?$store->phone_number:""}}" required>
                            <small class="help-block"></small>
                            {{--<span class="validation_error">hello</span>--}}
                        </div>

                        <div class="form-group col-md-6 col-sm-6">
                            <label for="city">Domain*</label>
                            <input type="text" class="form-control input-sm" name="domain" id="domain" placeholder="" value="{{isset($store->domain)?$store->domain:""}}" readonly required>
                            <small class="help-block"></small>

                        </div>

                        <div class="form-group col-md-6 col-sm-6">
                            <label for="address">Address*</label>
                            <textarea class="form-control input-sm" id="address" name="address" rows="3" value="{{isset($store->address)?$store->address:""}}" required></textarea>
                            <span class="help-block"></span>

                        </div>


                        <div class="form-group col-md-6 col-sm-6">
                            <label for="state">City*</label>
                            <input type="text" class="form-control input-sm" name="city" id="city" placeholder="your city"  value="{{isset($store->city)?$store->city:""}}" required>
                            <span class="help-block"></span>

                        </div>

                    </div>


                    <br>
                    <br>

                    <div class="text-center">
                        <button class="btn btn-success">SUBMIT DETAILS</button>
                    </div>

                </form>
            </div>
        </div>

        </div>
   </div>
    </div>


@endsection