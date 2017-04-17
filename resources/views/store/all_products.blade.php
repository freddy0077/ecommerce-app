@extends('store.layouts.admin_layout')

@section('scripts')
    <script src="{{asset('backend/assets/global/plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.js')}}" type="text/javascript"></script>

    <style>
        th{
            text-decoration: underline;
        }
    </style>

    <script>

        $('.published').editable({
            mode: 'inline',
            name: 'published',
            url : '/store/product-update-published',
            source: [
                {value: 1, text: 'Yes'},
                {value: 0, text: 'No'}
            ]
        });

        $('.price').editable({
            mode: 'inline',
            name: 'price',
            url : '/store/product-update-published',
            validate: function(value) {
                if($.trim(value) == '') return 'This field is required';
            },
        });

        $('.name').editable({
            mode: 'inline',
            name: 'name',
            url : '/store/product-update-published',
            validate: function(value) {
                if($.trim(value) == '') return 'This field is required';
            },
        });

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

                        }).success(function(data){
                            swal("Deleted!", "Your "+ name+ " product has been deleted.", "success");
                            location.reload();
                        })

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
                        <h1>All Products
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
                            <span>All products</span>
                        </li>
                    </ul>
                    <!-- END PAGE BREADCRUMBS -->
                    <!-- BEGIN PAGE CONTENT INNER -->
                    <div class="page-content-inner">
                        <div class="row">
                            <div class="col-md-12">

                                @if(!count($products))
                                    <div class="alert alert-block alert-info fade in">
                                        <button type="button" class="close" data-dismiss="alert"></button>
                                        <h4 class="alert-heading">NO PRODUCTS YET!</h4>
                                        <p> You have currently not stored any product yet !
                                        </p>
                                        <p>
                                            <a class="btn purple" href="{{url('store/add-product')}}"> Add New Product </a>
                                            <a class="btn dark" href="{{url('store/quick-add-products')}}"> Add More Products </a>
                                        </p>
                                    </div>

                                  @else

                                    {{--<div class="col-md-12">--}}
                                        <!-- BEGIN BORDERED TABLE PORTLET-->
                                        <div class="portlet light portlet-fit ">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-settings font-red"></i>
                                                    <span class="caption-subject font-red sbold uppercase">ALL PRODUCTS</span>
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
                                                            <th>Image</th>
                                                            <th><a href="{{url(\App\Product::queryByOrder('name'))}}"> Name</a> </th>
                                                            <th><a href="{{url(\App\Product::queryByOrder('price'))}}"> Price </a></th>
                                                            {{--<th> Description </th>--}}
                                                            <th> <a href="{{url(\App\Product::queryByOrder('published'))}}">Published </a></th>
                                                            <th> <a href="{{url(\App\Product::queryByOrder('date'))}}">Date </a></th>
                                                            <th> Action </th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>

<!--                                                        --><?php $i = $products->firstItem() ?>
                                                        @foreach($products as $product)

                                                            <tr {{$product->published==false ? "class=bg-warning":""}}>
                                                                <td>
                                                                    {{$i++}}
                                                                </td>
                                                                <td>
{{--                                                                    <img src='{{\Illuminate\Support\Facades\Storage::url("images/$store->store_banner")}}'  class="img-thumbnail"><br><br>--}}

                                                                    <img src='{{\Illuminate\Support\Facades\Storage::url("products/$product->image")}}' class="img-rounded" width="80" height="80">
                                                                </td>

                                                                <td>
                                                                    <a href="javascript:;" class="name" id="price" data-type="text" data-pk="{{$product->id}}" data-value="" >
                                                                        {{$product->name}}
                                                                    </a>
                                                                </td>

                                                                {{--<td>{{$product->name}}</td>--}}

                                                                <td>
                                                                    <a href="javascript:;" class="price" id="price" data-type="text" data-pk="{{$product->id}}" data-value="" >
                                                                        {{$product->price}}
                                                                    </a>
                                                                </td>

                                                                {{--<td>{{$product->price}}</td>--}}
                                                                {{--<td>{{$product->description}}</td>--}}

                                                                <td>
                                                                    <a href="javascript:;" class="published" id="published" data-type="select" data-pk="{{$product->id}}" data-value="" data-original-title="Select State">
                                                                        {{$product->published == true ? "Yes" : "No"}}
                                                                    </a>
                                                                </td>

                                                                <td>{{$product->created_at}}</td>

                                                                {{--<td>{{$product->published == true ? "Yes" : "No"}}</td>--}}
                                                                <td>
                                                                    <a href="{{url('/store/edit-product',$product->id)}}" class="btn btn-success">edit</a>
                                                                    <button class="btn btn-danger delete" data-id="{{$product->id}}" data-name="{{$product->name}}">delete</button>

                                                                </td>
                                                            </tr>

                                                        @endforeach

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center">{{$products}}</div>

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
        <!-- BEGIN QUICK SIDEBAR -->
        <a href="javascript:;" class="page-quick-sidebar-toggler">
            <i class="icon-login"></i>
        </a>
        <!-- END QUICK SIDEBAR -->
    {{--</div>--}}


@endsection