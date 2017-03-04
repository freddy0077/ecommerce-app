@extends('market.layouts.master')

@section('scripts')
    <script>
        //style top list items
        $('#top-list-items a').css('margin-right','20px')
    </script>


@endsection

@section('content')

    <main class="page-content offset-top-30">
        <div id="fb-root"></div>

        <h4 class="text-center">TOP ADVERTISEMENTS</h4>
        <div data-items="1" data-xs-items="2" data-md-items="3" data-lg-items="4" data-loop="true" data-nav="true" data-mouse-drag="false" data-margin="45px" data-stage-padding="18px" class="owl-carousel owl-carousel-flex owl-carousel-navigation-variant-1 offset-top-30">
            <div class="owl-item">
                <div class="post post-variant-1 post-variant-1-short box post-variant-1-equal-height">
                    <div>
                        <div class="post-media-wrap"><a href="post-default.html"><img src="images/carousel-07.jpg" width="370" height="231" alt="" class="img-responsive post-image"/></a>
                            <ul class="post-categories list-inline-0">
                                <li><a href="#"><span class="label label-primary">Clothing</span></a></li>
                            </ul>
                        </div>
                        <div class="post-content-wrap">

                            <div class="row">
                                <div class="col-sm-6"> price: 5.00</div>
                                <div class="col-sm-6">
                                    {{--<a href=""><i class="fa fa-share-alt-square" aria-hidden="true"></i> </a>--}}
                                    <a href=""><i class="fa fa-thumbs-up" aria-hidden="true"></i></a>
                                    <a href="">&#x263a;</a>
                                    (50)
                                </div>
                            </div>

                            <br>

                            <div class="row">

                                <div class="col-sm-12">
                                    <span class='st_sharethis' displayText=''></span>
                                    <span class='st_facebook' displayText=''></span>
                                    <span class='st_twitter' displayText=''></span>
                                    <span class='st_linkedin' displayText=''></span>
                                    <span class='st_pinterest' displayText=''></span>
                                    <span class='st_email' displayText=''></span>
                                </div>

                            </div>

                            <h6><a href="post-default.html">Product 1</a> <button class="btn btn-success btn-sm">buy</button></h6>

                            <div class="small text-gray-dark post-meta-author">
                                <a href=""> <i class="fa fa-eye" aria-hidden="true"></i></a>
                                Listed <span class="text-primary"> in <a href="#">Agnes Larteley</a></span></div>


                        </div>
                        <div class="post-content-bottom">
                            <ul class="post-meta list-inline list-inline-md">
                                {{--<li><a href="categories-list.html" class="post-meta-date small">Dec 13, 2016</a></li>--}}
                                {{--<li><a href="post-default.html#comments" class="post-meta-comment small">12</a></li>--}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-item">
                <div class="post post-variant-1 post-variant-1-short box post-variant-1-equal-height">
                    <div>
                        <div class="post-media-wrap"><a href="post-default.html"><img src="images/carousel-07.jpg" width="370" height="231" alt="" class="img-responsive post-image"/></a>
                            <ul class="post-categories list-inline-0">
                                <li><a href="#"><span class="label label-primary">Clothing</span></a></li>
                            </ul>
                        </div>
                        <div class="post-content-wrap">

                            <div class="row">
                                <div class="col-sm-6"> price: 5.00</div>
                                <div class="col-sm-6">
                                    {{--<a href=""><i class="fa fa-share-alt-square" aria-hidden="true"></i> </a>--}}
                                    <a href=""><i class="fa fa-thumbs-up" aria-hidden="true"></i></a>
                                    <a href="">&#x263a;</a>
                                    (50)
                                </div>
                            </div>

                            <br>

                            <div class="row">

                                <div class="col-sm-12">
                                    <span class='st_sharethis' displayText=''></span>
                                    <span class='st_facebook' displayText=''></span>
                                    <span class='st_twitter' displayText=''></span>
                                    <span class='st_linkedin' displayText=''></span>
                                    <span class='st_pinterest' displayText=''></span>
                                    <span class='st_email' displayText=''></span>
                                </div>

                            </div>

                            <h6><a href="post-default.html">Product 1</a> <button class="btn btn-success btn-sm">buy</button></h6>

                            <div class="small text-gray-dark post-meta-author">
                                <a href=""><i class="fa fa-eye" aria-hidden="true"></i></a>
                                Listed <span class="text-primary"> in <a href="#">Agnes Larteley</a></span></div>


                        </div>
                        <div class="post-content-bottom">
                            <ul class="post-meta list-inline list-inline-md">
                                {{--<li><a href="categories-list.html" class="post-meta-date small">Dec 13, 2016</a></li>--}}
                                {{--<li><a href="post-default.html#comments" class="post-meta-comment small">12</a></li>--}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-item">
                <div class="post post-variant-1 post-variant-1-short box post-variant-1-equal-height">
                    <div>
                        <div class="post-media-wrap"><a href="post-default.html"><img src="images/carousel-07.jpg" width="370" height="231" alt="" class="img-responsive post-image"/></a>
                            <ul class="post-categories list-inline-0">
                                <li><a href="#"><span class="label label-primary">Clothing</span></a></li>
                            </ul>
                        </div>
                        <div class="post-content-wrap">

                            <div class="row">
                                <div class="col-sm-6"> price: 5.00</div>
                                <div class="col-sm-6">
                                    {{--<a href=""><i class="fa fa-share-alt-square" aria-hidden="true"></i> </a>--}}
                                    <a href=""><i class="fa fa-thumbs-up" aria-hidden="true"></i></a>
                                    <a href="">&#x263a;</a>
                                    (50)
                                </div>
                            </div>

                            <br>

                            <div class="row">

                                <div class="col-sm-12">
                                    <span class='st_sharethis' displayText=''></span>
                                    <span class='st_facebook' displayText=''></span>
                                    <span class='st_twitter' displayText=''></span>
                                    <span class='st_linkedin' displayText=''></span>
                                    <span class='st_pinterest' displayText=''></span>
                                    <span class='st_email' displayText=''></span>
                                </div>

                            </div>

                            <h6><a href="post-default.html">Product 1</a> <button class="btn btn-success btn-sm">buy</button></h6>

                            <div class="small text-gray-dark post-meta-author">
                                <a href=""><i class="fa fa-eye" aria-hidden="true"></i></a>
                                Listed <span class="text-primary"> in <a href="#">Agnes Larteley</a></span></div>


                        </div>
                        <div class="post-content-bottom">
                            <ul class="post-meta list-inline list-inline-md">
                                {{--<li><a href="categories-list.html" class="post-meta-date small">Dec 13, 2016</a></li>--}}
                                {{--<li><a href="post-default.html#comments" class="post-meta-comment small">12</a></li>--}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-item">
                <div class="post post-variant-1 post-variant-1-short box post-variant-1-equal-height">
                    <div>
                        <div class="post-media-wrap"><a href="post-default.html"><img src="images/carousel-07.jpg" width="370" height="231" alt="" class="img-responsive post-image"/></a>
                            <ul class="post-categories list-inline-0">
                                <li><a href="#"><span class="label label-primary">Clothing</span></a></li>
                            </ul>
                        </div>
                        <div class="post-content-wrap">

                            <div class="row">
                                <div class="col-sm-6"> price: 5.00</div>
                                <div class="col-sm-6">
                                    {{--<a href=""><i class="fa fa-share-alt-square" aria-hidden="true"></i> </a>--}}
                                    <a href=""><i class="fa fa-thumbs-up" aria-hidden="true"></i></a>
                                    <a href="">&#x263a;</a>
                                    (50)
                                </div>
                            </div>

                            <br>

                            <div class="row">

                                <div class="col-sm-12">
                                    <span class='st_sharethis' displayText=''></span>
                                    <span class='st_facebook' displayText=''></span>
                                    <span class='st_twitter' displayText=''></span>
                                    <span class='st_linkedin' displayText=''></span>
                                    <span class='st_pinterest' displayText=''></span>
                                    <span class='st_email' displayText=''></span>
                                </div>

                            </div>

                            <h6><a href="post-default.html">Product 1</a> <button class="btn btn-success btn-sm">buy</button></h6>

                            <div class="small text-gray-dark post-meta-author">
                                <a href=""><i class="fa fa-eye" aria-hidden="true"></i></a>
                                Listed <span class="text-primary"> in <a href="#">Agnes Larteley</a></span></div>


                        </div>
                        <div class="post-content-bottom">
                            <ul class="post-meta list-inline list-inline-md">
                                {{--<li><a href="categories-list.html" class="post-meta-date small">Dec 13, 2016</a></li>--}}
                                {{--<li><a href="post-default.html#comments" class="post-meta-comment small">12</a></li>--}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-item">
                <div class="post post-variant-1 post-variant-1-short box post-variant-1-equal-height">
                    <div>
                        <div class="post-media-wrap"><a href="post-default.html"><img src="images/carousel-07.jpg" width="370" height="231" alt="" class="img-responsive post-image"/></a>
                            <ul class="post-categories list-inline-0">
                                <li><a href="#"><span class="label label-primary">Clothing</span></a></li>
                            </ul>
                        </div>
                        <div class="post-content-wrap">

                            <div class="row">
                                <div class="col-sm-6"> price: 5.00</div>
                                <div class="col-sm-6">
                                    {{--<a href=""><i class="fa fa-share-alt-square" aria-hidden="true"></i> </a>--}}
                                    <a href=""><i class="fa fa-thumbs-up" aria-hidden="true"></i></a>
                                    <a href="">&#x263a;</a>
                                    (50)
                                </div>
                            </div>

                            <br>

                            <div class="row">

                                <div class="col-sm-12">
                                    <span class='st_sharethis' displayText=''></span>
                                    <span class='st_facebook' displayText=''></span>
                                    <span class='st_twitter' displayText=''></span>
                                    <span class='st_linkedin' displayText=''></span>
                                    <span class='st_pinterest' displayText=''></span>
                                    <span class='st_email' displayText=''></span>
                                </div>

                            </div>

                            <h6><a href="post-default.html">Product 1</a> <button class="btn btn-success btn-sm">buy</button></h6>

                            <div class="small text-gray-dark post-meta-author">
                                <a href=""><i class="fa fa-eye" aria-hidden="true"></i></a>
                                Listed <span class="text-primary"> in <a href="#">Agnes Larteley</a></span></div>


                        </div>
                        <div class="post-content-bottom">
                            <ul class="post-meta list-inline list-inline-md">
                                {{--<li><a href="categories-list.html" class="post-meta-date small">Dec 13, 2016</a></li>--}}
                                {{--<li><a href="post-default.html#comments" class="post-meta-comment small">12</a></li>--}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <h4 class="text-center">PRODUCTS BY POPULARITY</h4>

        <div data-items="1" data-xs-items="2" data-md-items="3" data-lg-items="4" data-loop="true" data-nav="true" data-mouse-drag="false" data-margin="45px" data-stage-padding="18px" class="owl-carousel owl-carousel-flex owl-carousel-navigation-variant-1 offset-top-30">
            <div class="owl-item">
                <div class="post post-variant-1 post-variant-1-short box post-variant-1-equal-height">
                    <div>
                        <div class="post-media-wrap"><a href="post-default.html"><img src="images/carousel-07.jpg" width="370" height="231" alt="" class="img-responsive post-image"/></a>
                            <ul class="post-categories list-inline-0">
                                <li><a href="#"><span class="label label-primary">Clothing</span></a></li>
                            </ul>
                        </div>
                        <div class="post-content-wrap">

                            <div class="row">
                                <div class="col-sm-6"> price: 5.00</div>
                                <div class="col-sm-6">
                                    {{--<a href=""><i class="fa fa-share-alt-square" aria-hidden="true"></i> </a>--}}
                                    <a href=""><i class="fa fa-thumbs-up" aria-hidden="true"></i></a>
                                    <a href="">&#x263a;</a>
                                    (50)
                                </div>
                            </div>

                            <br>

                            <div class="row">

                                <div class="col-sm-12">
                                    <span class='st_sharethis' displayText=''></span>
                                    <span class='st_facebook' displayText=''></span>
                                    <span class='st_twitter' displayText=''></span>
                                    <span class='st_linkedin' displayText=''></span>
                                    <span class='st_pinterest' displayText=''></span>
                                    <span class='st_email' displayText=''></span>
                                </div>

                            </div>

                            <h6><a href="post-default.html">Product 1</a> <button class="btn btn-success btn-sm">buy</button></h6>

                            <div class="small text-gray-dark post-meta-author">
                                <a href=""><i class="fa fa-eye" aria-hidden="true"></i></a>
                                Listed <span class="text-primary"> in <a href="#">Agnes Larteley</a></span></div>


                        </div>
                        <div class="post-content-bottom">
                            <ul class="post-meta list-inline list-inline-md">
                                {{--<li><a href="categories-list.html" class="post-meta-date small">Dec 13, 2016</a></li>--}}
                                {{--<li><a href="post-default.html#comments" class="post-meta-comment small">12</a></li>--}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-item">
                <div class="post post-variant-1 post-variant-1-short box post-variant-1-equal-height">
                    <div>
                        <div class="post-media-wrap"><a href="post-default.html"><img src="images/carousel-07.jpg" width="370" height="231" alt="" class="img-responsive post-image"/></a>
                            <ul class="post-categories list-inline-0">
                                <li><a href="#"><span class="label label-primary">Clothing</span></a></li>
                            </ul>
                        </div>
                        <div class="post-content-wrap">

                            <div class="row">
                                <div class="col-sm-6"> price: 5.00</div>
                                <div class="col-sm-6">
                                    {{--<a href=""><i class="fa fa-share-alt-square" aria-hidden="true"></i> </a>--}}
                                    <a href=""><i class="fa fa-thumbs-up" aria-hidden="true"></i></a>
                                    <a href="">&#x263a;</a>
                                    (50)
                                </div>
                            </div>

                            <br>

                            <div class="row">

                                <div class="col-sm-12">
                                    <span class='st_sharethis' displayText=''></span>
                                    <span class='st_facebook' displayText=''></span>
                                    <span class='st_twitter' displayText=''></span>
                                    <span class='st_linkedin' displayText=''></span>
                                    <span class='st_pinterest' displayText=''></span>
                                    <span class='st_email' displayText=''></span>
                                </div>

                            </div>

                            <h6><a href="post-default.html">Product 1</a> <button class="btn btn-success btn-sm">buy</button></h6>

                            <div class="small text-gray-dark post-meta-author">
                                <a href=""><i class="fa fa-eye" aria-hidden="true"></i></a>
                                Listed <span class="text-primary"> in <a href="#">Agnes Larteley</a></span></div>


                        </div>
                        <div class="post-content-bottom">
                            <ul class="post-meta list-inline list-inline-md">
                                {{--<li><a href="categories-list.html" class="post-meta-date small">Dec 13, 2016</a></li>--}}
                                {{--<li><a href="post-default.html#comments" class="post-meta-comment small">12</a></li>--}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-item">
                <div class="post post-variant-1 post-variant-1-short box post-variant-1-equal-height">
                    <div>
                        <div class="post-media-wrap"><a href="post-default.html"><img src="images/carousel-07.jpg" width="370" height="231" alt="" class="img-responsive post-image"/></a>
                            <ul class="post-categories list-inline-0">
                                <li><a href="#"><span class="label label-primary">Clothing</span></a></li>
                            </ul>
                        </div>
                        <div class="post-content-wrap">

                            <div class="row">
                                <div class="col-sm-6"> price: 5.00</div>
                                <div class="col-sm-6">
                                    {{--<a href=""><i class="fa fa-share-alt-square" aria-hidden="true"></i> </a>--}}
                                    <a href=""><i class="fa fa-thumbs-up" aria-hidden="true"></i></a>
                                    <a href="">&#x263a;</a>
                                    (50)
                                </div>
                            </div>

                            <br>

                            <div class="row">

                                <div class="col-sm-12">
                                    <span class='st_sharethis' displayText=''></span>
                                    <span class='st_facebook' displayText=''></span>
                                    <span class='st_twitter' displayText=''></span>
                                    <span class='st_linkedin' displayText=''></span>
                                    <span class='st_pinterest' displayText=''></span>
                                    <span class='st_email' displayText=''></span>
                                </div>

                            </div>

                            <h6><a href="post-default.html">Product 1</a> <button class="btn btn-success btn-sm">buy</button></h6>

                            <div class="small text-gray-dark post-meta-author">
                                <a href=""><i class="fa fa-eye" aria-hidden="true"></i></a>
                                Listed <span class="text-primary"> in <a href="#">Agnes Larteley</a></span></div>


                        </div>
                        <div class="post-content-bottom">
                            <ul class="post-meta list-inline list-inline-md">
                                {{--<li><a href="categories-list.html" class="post-meta-date small">Dec 13, 2016</a></li>--}}
                                {{--<li><a href="post-default.html#comments" class="post-meta-comment small">12</a></li>--}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-item">
                <div class="post post-variant-1 post-variant-1-short box post-variant-1-equal-height">
                    <div>
                        <div class="post-media-wrap"><a href="post-default.html"><img src="images/carousel-07.jpg" width="370" height="231" alt="" class="img-responsive post-image"/></a>
                            <ul class="post-categories list-inline-0">
                                <li><a href="#"><span class="label label-primary">Clothing</span></a></li>
                            </ul>
                        </div>
                        <div class="post-content-wrap">

                            <div class="row">
                                <div class="col-sm-6"> price: 5.00</div>
                                <div class="col-sm-6">
                                    {{--<a href=""><i class="fa fa-share-alt-square" aria-hidden="true"></i> </a>--}}
                                    <a href=""><i class="fa fa-thumbs-up" aria-hidden="true"></i></a>
                                    <a href="">&#x263a;</a>
                                    (50)
                                </div>
                            </div>

                            <br>

                            <div class="row">

                                <div class="col-sm-12">
                                    <span class='st_sharethis' displayText=''></span>
                                    <span class='st_facebook' displayText=''></span>
                                    <span class='st_twitter' displayText=''></span>
                                    <span class='st_linkedin' displayText=''></span>
                                    <span class='st_pinterest' displayText=''></span>
                                    <span class='st_email' displayText=''></span>
                                </div>

                            </div>

                            <h6><a href="post-default.html">Product 1</a> <button class="btn btn-success btn-sm">buy</button></h6>

                            <div class="small text-gray-dark post-meta-author">
                                <a href=""><i class="fa fa-eye" aria-hidden="true"></i></a>
                                Listed <span class="text-primary"> in <a href="#">Agnes Larteley</a></span></div>


                        </div>
                        <div class="post-content-bottom">
                            <ul class="post-meta list-inline list-inline-md">
                                {{--<li><a href="categories-list.html" class="post-meta-date small">Dec 13, 2016</a></li>--}}
                                {{--<li><a href="post-default.html#comments" class="post-meta-comment small">12</a></li>--}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-item">
                <div class="post post-variant-1 post-variant-1-short box post-variant-1-equal-height">
                    <div>
                        <div class="post-media-wrap"><a href="post-default.html"><img src="images/carousel-07.jpg" width="370" height="231" alt="" class="img-responsive post-image"/></a>
                            <ul class="post-categories list-inline-0">
                                <li><a href="#"><span class="label label-primary">Clothing</span></a></li>
                            </ul>
                        </div>
                        <div class="post-content-wrap">

                            <div class="row">
                                <div class="col-sm-6"> price: 5.00</div>
                                <div class="col-sm-6">
                                    {{--<a href=""><i class="fa fa-share-alt-square" aria-hidden="true"></i> </a>--}}
                                    <a href=""><i class="fa fa-thumbs-up" aria-hidden="true"></i></a>
                                    <a href="">&#x263a;</a>
                                    (50)
                                </div>
                            </div>

                            <br>

                            <div class="row">

                                <div class="col-sm-12">
                                    <span class='st_sharethis' displayText=''></span>
                                    <span class='st_facebook' displayText=''></span>
                                    <span class='st_twitter' displayText=''></span>
                                    <span class='st_linkedin' displayText=''></span>
                                    <span class='st_pinterest' displayText=''></span>
                                    <span class='st_email' displayText=''></span>
                                </div>

                            </div>

                            <h6><a href="post-default.html">Product 1</a> <button class="btn btn-success btn-sm">buy</button></h6>

                            <div class="small text-gray-dark post-meta-author">
                                <a href=""><i class="fa fa-eye" aria-hidden="true"></i></a>
                                Listed <span class="text-primary"> in <a href="#">Agnes Larteley</a></span></div>


                        </div>
                        <div class="post-content-bottom">
                            <ul class="post-meta list-inline list-inline-md">
                                {{--<li><a href="categories-list.html" class="post-meta-date small">Dec 13, 2016</a></li>--}}
                                {{--<li><a href="post-default.html#comments" class="post-meta-comment small">12</a></li>--}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div data-items="1" data-xs-items="2" data-md-items="3" data-lg-items="4" data-loop="true" data-nav="true" data-mouse-drag="false" data-margin="45px" data-stage-padding="18px" class="owl-carousel owl-carousel-flex owl-carousel-navigation-variant-1 offset-top-30">
            <div class="owl-item">
                <div class="post post-variant-1 post-variant-1-short box post-variant-1-equal-height">
                    <div>
                        <div class="post-media-wrap"><a href="post-default.html"><img src="images/carousel-07.jpg" width="370" height="231" alt="" class="img-responsive post-image"/></a>
                            <ul class="post-categories list-inline-0">
                                <li><a href="#"><span class="label label-primary">Clothing</span></a></li>
                            </ul>
                        </div>
                        <div class="post-content-wrap">

                            <div class="row">
                                <div class="col-sm-6"> price: 5.00</div>
                                <div class="col-sm-6">
                                    {{--<a href=""><i class="fa fa-share-alt-square" aria-hidden="true"></i> </a>--}}
                                    <a href=""><i class="fa fa-thumbs-up" aria-hidden="true"></i></a>
                                    <a href="">&#x263a;</a>
                                    (50)
                                </div>
                            </div>

                            <br>

                            <div class="row">

                                <div class="col-sm-12">
                                    <span class='st_sharethis' displayText=''></span>
                                    <span class='st_facebook' displayText=''></span>
                                    <span class='st_twitter' displayText=''></span>
                                    <span class='st_linkedin' displayText=''></span>
                                    <span class='st_pinterest' displayText=''></span>
                                    <span class='st_email' displayText=''></span>
                                </div>

                            </div>

                            <h6><a href="post-default.html">Product 1</a> <button class="btn btn-success btn-sm">buy</button></h6>

                            <div class="small text-gray-dark post-meta-author">
                                <a href=""><i class="fa fa-eye" aria-hidden="true"></i></a>
                                Listed <span class="text-primary"> in <a href="#">Agnes Larteley</a></span></div>


                        </div>
                        <div class="post-content-bottom">
                            <ul class="post-meta list-inline list-inline-md">
                                {{--<li><a href="categories-list.html" class="post-meta-date small">Dec 13, 2016</a></li>--}}
                                {{--<li><a href="post-default.html#comments" class="post-meta-comment small">12</a></li>--}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-item">
                <div class="post post-variant-1 post-variant-1-short box post-variant-1-equal-height">
                    <div>
                        <div class="post-media-wrap"><a href="post-default.html"><img src="images/carousel-07.jpg" width="370" height="231" alt="" class="img-responsive post-image"/></a>
                            <ul class="post-categories list-inline-0">
                                <li><a href="#"><span class="label label-primary">Clothing</span></a></li>
                            </ul>
                        </div>
                        <div class="post-content-wrap">

                            <div class="row">
                                <div class="col-sm-6"> price: 5.00</div>
                                <div class="col-sm-6">
                                    {{--<a href=""><i class="fa fa-share-alt-square" aria-hidden="true"></i> </a>--}}
                                    <a href=""><i class="fa fa-thumbs-up" aria-hidden="true"></i></a>
                                    <a href="">&#x263a;</a>
                                    (50)
                                </div>
                            </div>

                            <br>

                            <div class="row">

                                <div class="col-sm-12">
                                    <span class='st_sharethis' displayText=''></span>
                                    <span class='st_facebook' displayText=''></span>
                                    <span class='st_twitter' displayText=''></span>
                                    <span class='st_linkedin' displayText=''></span>
                                    <span class='st_pinterest' displayText=''></span>
                                    <span class='st_email' displayText=''></span>
                                </div>

                            </div>

                            <h6><a href="post-default.html">Product 1</a> <button class="btn btn-success btn-sm">buy</button></h6>

                            <div class="small text-gray-dark post-meta-author">
                                <a href=""><i class="fa fa-eye" aria-hidden="true"></i></a>
                                Listed <span class="text-primary"> in <a href="#">Agnes Larteley</a></span></div>


                        </div>
                        <div class="post-content-bottom">
                            <ul class="post-meta list-inline list-inline-md">
                                {{--<li><a href="categories-list.html" class="post-meta-date small">Dec 13, 2016</a></li>--}}
                                {{--<li><a href="post-default.html#comments" class="post-meta-comment small">12</a></li>--}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-item">
                <div class="post post-variant-1 post-variant-1-short box post-variant-1-equal-height">
                    <div>
                        <div class="post-media-wrap"><a href="post-default.html"><img src="images/carousel-07.jpg" width="370" height="231" alt="" class="img-responsive post-image"/></a>
                            <ul class="post-categories list-inline-0">
                                <li><a href="#"><span class="label label-primary">Clothing</span></a></li>
                            </ul>
                        </div>
                        <div class="post-content-wrap">

                            <div class="row">
                                <div class="col-sm-6"> price: 5.00</div>
                                <div class="col-sm-6">
                                    {{--<a href=""><i class="fa fa-share-alt-square" aria-hidden="true"></i> </a>--}}
                                    <a href=""><i class="fa fa-thumbs-up" aria-hidden="true"></i></a>
                                    <a href="">&#x263a;</a>
                                    (50)
                                </div>
                            </div>

                            <br>

                            <div class="row">

                                <div class="col-sm-12">
                                    <span class='st_sharethis' displayText=''></span>
                                    <span class='st_facebook' displayText=''></span>
                                    <span class='st_twitter' displayText=''></span>
                                    <span class='st_linkedin' displayText=''></span>
                                    <span class='st_pinterest' displayText=''></span>
                                    <span class='st_email' displayText=''></span>
                                </div>

                            </div>

                            <h6><a href="post-default.html">Product 1</a> <button class="btn btn-success btn-sm">buy</button></h6>

                            <div class="small text-gray-dark post-meta-author">
                                <a href=""><i class="fa fa-eye" aria-hidden="true"></i></a>
                                Listed <span class="text-primary"> in <a href="#">Agnes Larteley</a></span></div>


                        </div>
                        <div class="post-content-bottom">
                            <ul class="post-meta list-inline list-inline-md">
                                {{--<li><a href="categories-list.html" class="post-meta-date small">Dec 13, 2016</a></li>--}}
                                {{--<li><a href="post-default.html#comments" class="post-meta-comment small">12</a></li>--}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-item">
                <div class="post post-variant-1 post-variant-1-short box post-variant-1-equal-height">
                    <div>
                        <div class="post-media-wrap"><a href="post-default.html"><img src="images/carousel-07.jpg" width="370" height="231" alt="" class="img-responsive post-image"/></a>
                            <ul class="post-categories list-inline-0">
                                <li><a href="#"><span class="label label-primary">Clothing</span></a></li>
                            </ul>
                        </div>
                        <div class="post-content-wrap">

                            <div class="row">
                                <div class="col-sm-6"> price: 5.00</div>
                                <div class="col-sm-6">
                                    {{--<a href=""><i class="fa fa-share-alt-square" aria-hidden="true"></i> </a>--}}
                                    <a href=""><i class="fa fa-thumbs-up" aria-hidden="true"></i></a>
                                    <a href="">&#x263a;</a>
                                    (50)
                                </div>
                            </div>

                            <br>

                            <div class="row">

                                <div class="col-sm-12">
                                    <span class='st_sharethis' displayText=''></span>
                                    <span class='st_facebook' displayText=''></span>
                                    <span class='st_twitter' displayText=''></span>
                                    <span class='st_linkedin' displayText=''></span>
                                    <span class='st_pinterest' displayText=''></span>
                                    <span class='st_email' displayText=''></span>
                                </div>

                            </div>

                            <h6><a href="post-default.html">Product 1</a> <button class="btn btn-success btn-sm">buy</button></h6>

                            <div class="small text-gray-dark post-meta-author">
                                <a href=""><i class="fa fa-eye" aria-hidden="true"></i></a>
                                Listed <span class="text-primary"> in <a href="#">Agnes Larteley</a></span></div>


                        </div>
                        <div class="post-content-bottom">
                            <ul class="post-meta list-inline list-inline-md">
                                {{--<li><a href="categories-list.html" class="post-meta-date small">Dec 13, 2016</a></li>--}}
                                {{--<li><a href="post-default.html#comments" class="post-meta-comment small">12</a></li>--}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-item">
                <div class="post post-variant-1 post-variant-1-short box post-variant-1-equal-height">
                    <div>
                        <div class="post-media-wrap"><a href="post-default.html"><img src="images/carousel-07.jpg" width="370" height="231" alt="" class="img-responsive post-image"/></a>
                            <ul class="post-categories list-inline-0">
                                <li><a href="#"><span class="label label-primary">Clothing</span></a></li>
                            </ul>
                        </div>
                        <div class="post-content-wrap">

                            <div class="row">
                                <div class="col-sm-6"> price: 5.00</div>
                                <div class="col-sm-6">
                                    {{--<a href=""><i class="fa fa-share-alt-square" aria-hidden="true"></i> </a>--}}
                                    <a href=""><i class="fa fa-thumbs-up" aria-hidden="true"></i></a>
                                    <a href="">&#x263a;</a>
                                    (50)
                                </div>
                            </div>

                            <br>

                            <div class="row">

                                <div class="col-sm-12">
                                    <span class='st_sharethis' displayText=''></span>
                                    <span class='st_facebook' displayText=''></span>
                                    <span class='st_twitter' displayText=''></span>
                                    <span class='st_linkedin' displayText=''></span>
                                    <span class='st_pinterest' displayText=''></span>
                                    <span class='st_email' displayText=''></span>
                                </div>

                            </div>

                            <h6><a href="post-default.html">Product 1</a> <button class="btn btn-success btn-sm">buy</button></h6>

                            <div class="small text-gray-dark post-meta-author">
                                <a href=""><i class="fa fa-eye" aria-hidden="true"></i></a>
                                Listed <span class="text-primary"> in <a href="#">Agnes Larteley</a></span></div>


                        </div>
                        <div class="post-content-bottom">
                            <ul class="post-meta list-inline list-inline-md">
                                {{--<li><a href="categories-list.html" class="post-meta-date small">Dec 13, 2016</a></li>--}}
                                {{--<li><a href="post-default.html#comments" class="post-meta-comment small">12</a></li>--}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div data-items="1" data-xs-items="2" data-md-items="3" data-lg-items="4" data-loop="true" data-nav="true" data-mouse-drag="false" data-margin="45px" data-stage-padding="18px" class="owl-carousel owl-carousel-flex owl-carousel-navigation-variant-1 offset-top-30">
            <div class="owl-item">
                <div class="post post-variant-1 post-variant-1-short box post-variant-1-equal-height">
                    <div>
                        <div class="post-media-wrap"><a href="post-default.html"><img src="images/carousel-07.jpg" width="370" height="231" alt="" class="img-responsive post-image"/></a>
                            <ul class="post-categories list-inline-0">
                                <li><a href="#"><span class="label label-primary">Clothing</span></a></li>
                            </ul>
                        </div>
                        <div class="post-content-wrap">

                            <div class="row">
                                <div class="col-sm-6"> price: 5.00</div>
                                <div class="col-sm-6">
                                    {{--<a href=""><i class="fa fa-share-alt-square" aria-hidden="true"></i> </a>--}}
                                    <a href=""><i class="fa fa-thumbs-up" aria-hidden="true"></i></a>
                                    <a href="">&#x263a;</a>
                                    (50)
                                </div>
                            </div>

                            <br>

                            <div class="row">

                                <div class="col-sm-12">
                                    <span class='st_sharethis' displayText=''></span>
                                    <span class='st_facebook' displayText=''></span>
                                    <span class='st_twitter' displayText=''></span>
                                    <span class='st_linkedin' displayText=''></span>
                                    <span class='st_pinterest' displayText=''></span>
                                    <span class='st_email' displayText=''></span>
                                </div>

                            </div>

                            <h6><a href="post-default.html">Product 1</a> <button class="btn btn-success btn-sm">buy</button></h6>

                            <div class="small text-gray-dark post-meta-author">
                                <a href=""><i class="fa fa-eye" aria-hidden="true"></i></a>
                                Listed <span class="text-primary"> in <a href="#">Agnes Larteley</a></span></div>


                        </div>
                        <div class="post-content-bottom">
                            <ul class="post-meta list-inline list-inline-md">
                                {{--<li><a href="categories-list.html" class="post-meta-date small">Dec 13, 2016</a></li>--}}
                                {{--<li><a href="post-default.html#comments" class="post-meta-comment small">12</a></li>--}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-item">
                <div class="post post-variant-1 post-variant-1-short box post-variant-1-equal-height">
                    <div>
                        <div class="post-media-wrap"><a href="post-default.html"><img src="images/carousel-07.jpg" width="370" height="231" alt="" class="img-responsive post-image"/></a>
                            <ul class="post-categories list-inline-0">
                                <li><a href="#"><span class="label label-primary">Clothing</span></a></li>
                            </ul>
                        </div>
                        <div class="post-content-wrap">

                            <div class="row">
                                <div class="col-sm-6"> price: 5.00</div>
                                <div class="col-sm-6">
                                    {{--<a href=""><i class="fa fa-share-alt-square" aria-hidden="true"></i> </a>--}}
                                    <a href=""><i class="fa fa-thumbs-up" aria-hidden="true"></i></a>
                                    <a href="">&#x263a;</a>
                                    (50)
                                </div>
                            </div>

                            <br>

                            <div class="row">

                                <div class="col-sm-12">
                                    <span class='st_sharethis' displayText=''></span>
                                    <span class='st_facebook' displayText=''></span>
                                    <span class='st_twitter' displayText=''></span>
                                    <span class='st_linkedin' displayText=''></span>
                                    <span class='st_pinterest' displayText=''></span>
                                    <span class='st_email' displayText=''></span>
                                </div>

                            </div>

                            <h6><a href="post-default.html">Product 1</a> <button class="btn btn-success btn-sm">buy</button></h6>

                            <div class="small text-gray-dark post-meta-author">
                                <a href=""><i class="fa fa-eye" aria-hidden="true"></i></a>
                                Listed <span class="text-primary"> in <a href="#">Agnes Larteley</a></span></div>


                        </div>
                        <div class="post-content-bottom">
                            <ul class="post-meta list-inline list-inline-md">
                                {{--<li><a href="categories-list.html" class="post-meta-date small">Dec 13, 2016</a></li>--}}
                                {{--<li><a href="post-default.html#comments" class="post-meta-comment small">12</a></li>--}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-item">
                <div class="post post-variant-1 post-variant-1-short box post-variant-1-equal-height">
                    <div>
                        <div class="post-media-wrap"><a href="post-default.html"><img src="images/carousel-07.jpg" width="370" height="231" alt="" class="img-responsive post-image"/></a>
                            <ul class="post-categories list-inline-0">
                                <li><a href="#"><span class="label label-primary">Clothing</span></a></li>
                            </ul>
                        </div>
                        <div class="post-content-wrap">

                            <div class="row">
                                <div class="col-sm-6"> price: 5.00</div>
                                <div class="col-sm-6">
                                    {{--<a href=""><i class="fa fa-share-alt-square" aria-hidden="true"></i> </a>--}}
                                    <a href=""><i class="fa fa-thumbs-up" aria-hidden="true"></i></a>
                                    <a href="">&#x263a;</a>
                                    (50)
                                </div>
                            </div>

                            <br>

                            <div class="row">

                                <div class="col-sm-12">
                                    <span class='st_sharethis' displayText=''></span>
                                    <span class='st_facebook' displayText=''></span>
                                    <span class='st_twitter' displayText=''></span>
                                    <span class='st_linkedin' displayText=''></span>
                                    <span class='st_pinterest' displayText=''></span>
                                    <span class='st_email' displayText=''></span>
                                </div>

                            </div>

                            <h6><a href="post-default.html">Product 1</a> <button class="btn btn-success btn-sm">buy</button></h6>

                            <div class="small text-gray-dark post-meta-author">
                                <a href=""><i class="fa fa-eye" aria-hidden="true"></i></a>
                                Listed <span class="text-primary"> in <a href="#">Agnes Larteley</a></span></div>


                        </div>
                        <div class="post-content-bottom">
                            <ul class="post-meta list-inline list-inline-md">
                                {{--<li><a href="categories-list.html" class="post-meta-date small">Dec 13, 2016</a></li>--}}
                                {{--<li><a href="post-default.html#comments" class="post-meta-comment small">12</a></li>--}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-item">
                <div class="post post-variant-1 post-variant-1-short box post-variant-1-equal-height">
                    <div>
                        <div class="post-media-wrap"><a href="post-default.html"><img src="images/carousel-07.jpg" width="370" height="231" alt="" class="img-responsive post-image"/></a>
                            <ul class="post-categories list-inline-0">
                                <li><a href="#"><span class="label label-primary">Clothing</span></a></li>
                            </ul>
                        </div>
                        <div class="post-content-wrap">

                            <div class="row">
                                <div class="col-sm-6"> price: 5.00</div>
                                <div class="col-sm-6">
                                    {{--<a href=""><i class="fa fa-share-alt-square" aria-hidden="true"></i> </a>--}}
                                    <a href=""><i class="fa fa-thumbs-up" aria-hidden="true"></i></a>
                                    <a href="">&#x263a;</a>
                                    (50)
                                </div>
                            </div>

                            <br>

                            <div class="row">

                                <div class="col-sm-12">
                                    <span class='st_sharethis' displayText=''></span>
                                    <span class='st_facebook' displayText=''></span>
                                    <span class='st_twitter' displayText=''></span>
                                    <span class='st_linkedin' displayText=''></span>
                                    <span class='st_pinterest' displayText=''></span>
                                    <span class='st_email' displayText=''></span>
                                </div>

                            </div>

                            <h6><a href="post-default.html">Product 1</a> <button class="btn btn-success btn-sm">buy</button></h6>

                            <div class="small text-gray-dark post-meta-author">
                                <a href=""><i class="fa fa-eye" aria-hidden="true"></i></a>
                                Listed <span class="text-primary"> in <a href="#">Agnes Larteley</a></span></div>


                        </div>
                        <div class="post-content-bottom">
                            <ul class="post-meta list-inline list-inline-md">
                                {{--<li><a href="categories-list.html" class="post-meta-date small">Dec 13, 2016</a></li>--}}
                                {{--<li><a href="post-default.html#comments" class="post-meta-comment small">12</a></li>--}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-item">
                <div class="post post-variant-1 post-variant-1-short box post-variant-1-equal-height">
                    <div>
                        <div class="post-media-wrap"><a href="post-default.html"><img src="images/carousel-07.jpg" width="370" height="231" alt="" class="img-responsive post-image"/></a>
                            <ul class="post-categories list-inline-0">
                                <li><a href="#"><span class="label label-primary">Clothing</span></a></li>
                            </ul>
                        </div>
                        <div class="post-content-wrap">

                            <div class="row">
                                <div class="col-sm-6"> price: 5.00</div>
                                <div class="col-sm-6">
                                    {{--<a href=""><i class="fa fa-share-alt-square" aria-hidden="true"></i> </a>--}}
                                    <a href=""><i class="fa fa-thumbs-up" aria-hidden="true"></i></a>
                                    <a href="">&#x263a;</a>
                                    (50)
                                </div>
                            </div>

                            <br>

                            <div class="row">

                                <div class="col-sm-12">
                                    <span class='st_sharethis' displayText=''></span>
                                    <span class='st_facebook' displayText=''></span>
                                    <span class='st_twitter' displayText=''></span>
                                    <span class='st_linkedin' displayText=''></span>
                                    <span class='st_pinterest' displayText=''></span>
                                    <span class='st_email' displayText=''></span>
                                </div>

                            </div>

                            <h6><a href="">Product 1</a> <button class="btn btn-success btn-sm">buy</button></h6>

                            <div class="small text-gray-dark post-meta-author">
                                <a href=""><i class="fa fa-eye" aria-hidden="true"></i></a>
                                Listed <span class="text-primary"> in <a href="#">Agnes Larteley</a></span></div>


                        </div>
                        <div class="post-content-bottom">
                            <ul class="post-meta list-inline list-inline-md">
                                {{--<li><a href="categories-list.html" class="post-meta-date small">Dec 13, 2016</a></li>--}}
                                {{--<li><a href="post-default.html#comments" class="post-meta-comment small">12</a></li>--}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </main>

@endsection