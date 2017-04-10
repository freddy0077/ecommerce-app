@extends('market.layouts.index_3_layout')

@section('scripts')

    <script xmlns="http://www.w3.org/1999/html">
        {{--var nextPageUrl  = {!! $nextpageurl?"\"$nextpageurl\";":"null;" !!}--}}

            {{--alert('{{(int)$shops->currentpage()+1}}')--}}

            {{--var page = '{{(int)$second_set->currentpage()}}';--}}

        {{--var url = '{{url("/category/$category_id")}}/'+'?page=';--}}


        {{--$('#load-more').on('click',function() {--}}
            {{--page++--}}

            {{--$.ajax({--}}
                {{--url: url + page,--}}
                {{--dataType: "html",--}}
                {{--success: function (data) {--}}
                    {{--$('#load').append(data);--}}
                {{--}--}}
            {{--});--}}
        {{--})--}}

    </script>

    @endsection

    @section('content')

        <div class="container">
            <h1 class="h1 text-center">ALL SHOPS</h1>
            <hr>


            <div class="row">
                @foreach($shops as $shop)

                <div class="col-xs-18 col-sm-6 col-md-3">
                    <div class="thumbnail" style="height:300px; overflow: hidden">
                        <?php $image= $shop->image == null ? "https://placehold.it/300x200":asset('images/stores/'.$shop->image) ?>
                        <img src='{{$image}}' class="img-rounded">
                        <div class="caption">
                            <h4 class="text-center"><strong>{{$shop->name}}</strong></h4>
                            <p>
                                {{--{{$shop->about}}--}}
                            </p>
                            {{--<a href="#" class="btn btn-default btn-xs pull-right" role="button">--}}
                                {{--<i class="glyphicon glyphicon-edit"></i></a> <a href="#" class="btn btn-info btn-xs" role="button">Button</a> --}}
                            {{--<a href="#" class="btn btn-default btn-xs" role="button">Button</a>--}}
                            <div style=" position: absolute;left: 20px;top: 260px;">
                            @if(\Illuminate\Support\Facades\Auth::check() && \App\WatchedShop::whereUserId(\Illuminate\Support\Facades\Auth::user()->id)->whereStoreId($shop->id)->first())
                                <button class=" addToCart addToCart--notext" type="button"  onclick="watch.add('{{$shop->id}}', '{{$shop->id}}','{{$shop->user_id}}');">
                                    <i style="color:green" class="icon-user-following watch-toggle-{{$shop->user_id}}"></i> <span class="button-group__text"></span>
                                </button>
                            @else
                                <button class="addToCart addToCart--notext" type="button"  onclick="watch.add('{{$shop->id}}', '{{$shop->id}}','{{$shop->user_id}}');">
                                    {{--<i class="fa fa-eye watch-toggle-{{$shop->user_id}}"></i> <span class="button-group__text"></span>--}}
                                    <i class="icon-user-follow watch-toggle-{{$shop->user_id}}"></i> <span class="button-group__text"></span>
                                </button>

                            @endif
                            </div>
                            <?php $users = \App\WatchedShop::whereStoreId($shop->id)->count() > 1 ? "users follow this shop" :"user follows this shop"  ?>

                            @if(\Illuminate\Support\Facades\Auth::check() &&\App\WatchedShop::whereStoreId($shop->id)->whereUserId(\Illuminate\Support\Facades\Auth::id())->first())

                                <p style="position: absolute; top:265px; left: 60px;">You and {{\App\WatchedShop::whereStoreId($shop->id)->count()}} other(s) follow this shop</p>
                            @else
                            <p style="position: absolute; top:265px; left: 100px;">{{\App\WatchedShop::whereStoreId($shop->id)->count() .' '.$users}} </p>
                             @endif

                        </div>
                    </div>
                </div>
                @endforeach

            </div><!--/row-->
        </div><!--/container -->

@endsection