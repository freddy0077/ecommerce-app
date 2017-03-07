<script>
    @if($nextpageurl)
        nextPageUrl = "{{$nextpageurl}}";
    $('#load-more').show();
    @else
        nextPageUrl = null;
    $('#load-more').hide();
    @endif
</script>
<?php $newPageUrl = $nextpageurl;  ?>
<div class="row">
    @foreach($products as $product)
        <div class="col-md-3 col-sm-4">
            <div class="owl-item">
                <div class="post post-variant-1 post-variant-1-short box post-variant-1-equal-height">
                    <div>
                        <div class="post-media-wrap">
                            <a href="#">
                                {{--<img src='{{secure_asset("images/$product->image")}}' width="370" height="231" alt="" class="img-responsive post-image"/>--}}
                                <img src='{{secure_asset("images/another_shoes.jpg")}}' width="370" height="231" alt="" class="img-responsive post-image"/>
                            </a>
                            <ul class="post-categories list-inline-0">
                                <li><a href="#"><span class="label label-primary">{{$product->category_name}}</span></a></li>
                            </ul>
                        </div>
                        <div class="post-content-wrap" style="padding-bottom: 10px;">
                            <div class="row">
                                <div class="col-sm-6" style="margin-top:-15px; margin-left: -14px;"> GHS {{$product->price}}</div>
                                <div class="col-sm-6" style="margin-top:-15px;">
                                    <a href="#">
                                        <i class="fa fa-thumbs-up like" data-id ="{{$product->id}}" aria-hidden="true"></i>
                                    </a>
                                    {{--<a href="">&#x263a;</a>--}}
                                    <span class="counts-{{$product->id}}">({{$product->like_counts}})</span>
                                    <a href="#"><img  src="{{secure_asset('images/fancy1.png')}}"  onclick="fancy('{{$product->id}}')" class="img-responsive" style="width:20px" height="20px" /></a>
                                </div>


                                <h6>
                                    <a class="text-center" href="#"> {{$product->name}}</a>
                                    <?php  ?>
                                    {{--<button  onclick="fancy('{{$product->id}}')"> <i class="fancy" ></i>fancy it</button>--}}
                                </h6>
                                <div><a href=""><i class="fa fa-eye"></i></a> Listed in
                                    <a href='{{secure_url("/stores/$product->store_slug/$product->user_id")}}'>{{$product->store_name}}</a>
                                </div>
                                {{--<div class="col-sm-6"> price: {{$product->price}}</div>--}}
                                {{--<div class="col-sm-6"><a href=""><i class="fa fa-thumbs-up" aria-hidden="true"></i></a><a href="">&#x263a;</a>({{$product->like_counts}})</div>--}}
                            </div>

                            {{--<div class="small text-gray-dark post-meta-author">--}}
                            {{--<a href=""> <i class="fa fa-eye" aria-hidden="true"></i></a>--}}
                            {{--Listed <span class="text-primary"> in <a href="#"></a></span>--}}
                            {{--</div>--}}
                        </div>

                    </div>
                </div>
            </div>

            <br>

        </div>
    @endforeach
</div>