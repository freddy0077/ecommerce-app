
@extends('market.layouts.index_3_layout')

@section('scripts')

@endsection

@section('content')

    <div class="main-container container">
        <br>
        {{--<ul class="breadcrumb">--}}
            {{--<li><a href="#"><i class="fa fa-home"></i></a></li>--}}
            {{--<li><a href="#">Account</a></li>--}}
            {{--<li><a href="#">My Wish List</a></li>--}}
        {{--</ul>--}}

        <div class="row">
            <!--Middle Part Start-->
            <div id="content" class="col-sm-12">
                <h2 class="title">My Fancies</h2>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <td class="text-center">Image</td>
                            <td class="text-left">Product Name</td>
                            {{--<td class="text-right">Stock</td>--}}
                            <td class="text-right">Unit Price</td>
                            <td class="text-center">Shop</td>
                            <td class="text-right">Action</td>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($fancies as $fancy)
                        <tr>
                            <td class="text-center">
                                <a  href="#"><img width="70px" src='{{"images/products/$fancy->image"}}' alt="{{$fancy->name}}" title="{{$fancy->name}}">
                                </a>
                            </td>
                            <td class="text-left"><a href="">{{$fancy->name}}</a>
                            </td>
                            {{--<td class="text-left">product 20</td>--}}

                            <td class="text-right">
                                <div class="price">GHS {{$fancy->price}}  </div>
                            </td>

                            <td class="text-right">
                                <div>{{$fancy->store_name}}  </div>
                            </td>
                            <td class="text-right">
                                <button class="btn btn-primary"
                                        title="" data-toggle="tooltip"
                                        onclick="cart.add('{{$fancy->id}}','{{$fancy->name}}',1,'{{$fancy->price}}','{{$user_id}}')"
                                        type="button" data-original-title="Add to Cart"><i class="fa fa-shopping-cart"></i>
                                </button>
                                <a class="btn btn-danger" title="" data-toggle="tooltip"
                                   href=""data-original-title="Remove"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>

                            @endforeach
                        </tbody>
                    </table>
                    {!! $fancies !!}
                </div>
            </div>

            <!--Middle Part End-->

        </div>
    </div>


@endsection