<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
    <title>Shopin A Ecommerce Category Flat Bootstrap Responsive Website Template | Home :: w3layouts</title>
    <link href="{{asset('frontend/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
    <!-- Custom Theme files -->
    <!--theme-style-->
    <link href="{{asset('frontend/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
    <!--//theme-style-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Shopin Responsive web template, Bootstrap Web Templates, Flat Web Templates, AndroId Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <style>
        .login_modal_footer{margin-top:5px;}
        .login_modal_header .modal-title {text-align: center;font-family:'Philosopher',sans-serif; }
        .form-group{position: relative;}
        .form-group .login-field-icon {
            font-size: 20px;
            position: absolute;
            right: 15px;
            top: 3px;
            transition: all 0.25s ease 0s;
            padding-top: 2%;
        }
        /*.login-modal{*/
        /*width:100%;*/
        /*padding-bottom:20px;*/
        /*}*/
        .login_modal_header, .login_modal_footer {background: #0089bb !important;color:#fff;}
        .modal-register-btn{margin: 4% 33% 2% 33% ;width:100%;}
        .login-modal input{height:40px; box-shadow: none; border:1px solid #ddd;}
        .modal-body-left{float:left; width:50%; padding-right:4%; border-right:4px solid #ddd;}
        .modal-body-right{float:right; width:47%;}
        .login-link{padding:0 20%;}
        .modal-social-icons{padding:0 10%;}
        .facebook, .twitter, .google, .linkedin {width:100%;height:40px; padding-top:2%; margin-top:2%;}
        .modal-icons{margin-left: -10px; margin-right: 20px;}
        .google, .google:hover{background-color:#dd4b39;border:2px solid #dd4b39;color:#fff;}
        .twitter, .twitter:hover{ background-color: #00aced; border:2px solid #00aced;color: #fff;}
        .facebook, .facebook:hover{background-color: #3b5999; border:2px solid #3b5999;color:#fff;}
        .linkedin, .linkedin:hover{background-color: #007bb6; border: 2px solid #007bb6; color:#fff;}
        #social-icons-conatainer{position: relative;}
        #center-line{position: absolute;  right: 270.7px;top: 80px;background:#ddd;  border: 4px solid #DDDDDD;border-radius: 20px;}
        .modal-login-btn{width:100%;height:40px; margin-bottom:10px;}
        /*#modal-launcher{margin: 30% 0 0 30%; }*/
        .btn-success:hover, .btn-success:focus, .btn-success.focus, .btn-success:active, .btn-success.active, .open>.dropdown-toggle.btn-success {
            color: #fff;
            background-color: #0089bb;
            border-color: #0089bb;
        }
        .btn-success {
            color: #fff;
            background-color: #0089bb;
            border-color: #0089bb;
        }


        .btn-extra-small{
            /*padding:7.2px 1.6px;*/
            font-size:14px;
            /*line-height:1.5;*/
            border-radius:4px;
        }

    </style>
    <!--theme-style-->
    <link href="{{asset('frontend/css/style4.css')}}" rel="stylesheet" type="text/css" media="all" />
    <!--//theme-style-->
    <script src="{{asset('frontend/js/jquery.min.js')}}"></script>
    <!--- start-rate---->
    <script src="{{asset('frontend/js/jstarbox.js')}}"></script>
    <link rel="stylesheet" href="{{asset('frontend/css/jstarbox.css')}}" type="text/css" media="screen" charset="utf-8" />
    <script type="text/javascript">
        jQuery(function() {
            jQuery('.starbox').each(function() {
                var starbox = jQuery(this);
                starbox.starbox({
                    average: starbox.attr('data-start-value'),
                    changeable: starbox.hasClass('unchangeable') ? false : starbox.hasClass('clickonce') ? 'once' : true,
                    ghosting: starbox.hasClass('ghosting'),
                    autoUpdateAverage: starbox.hasClass('autoupdate'),
                    buttons: starbox.hasClass('smooth') ? false : starbox.attr('data-button-count') || 5,
                    stars: starbox.attr('data-star-count') || 5
                }).bind('starbox-value-changed', function(event, value) {
                    if(starbox.hasClass('random')) {
                        var val = Math.random();
                        starbox.next().text(' '+val);
                        return val;
                    }
                })
            });
        });
    </script>
    <!---//End-rate---->

</head>
<body>
<!--header-->
<div class="header">
    <div class="container">
        <div class="head">
            <div class=" logo">
                <a href="index.html"><img src="{{asset('frontend/images/logo.png')}}" alt=""></a>
            </div>
        </div>
    </div>
    <div class="header-top">
        <div class="container">
            <div class="col-sm-5 col-md-offset-2  header-login">
                <ul >
                    <li><a href="login.html">Login</a></li>
                    <li><a href="register.html">Register</a></li>
                    <li><a href="checkout.html">Checkout</a></li>
                </ul>
            </div>

            <div class="col-sm-5 header-social">
                <ul >
                    <li><a href="#"><i></i></a></li>
                    <li><a href="#"><i class="ic1"></i></a></li>
                    <li><a href="#"><i class="ic2"></i></a></li>
                    <li><a href="#"><i class="ic3"></i></a></li>
                    <li><a href="#"><i class="ic4"></i></a></li>
                </ul>

            </div>
            <div class="clearfix"> </div>
        </div>
    </div>

    <div class="container">

        <div class="head-top">

            <div class="col-sm-8 col-md-offset-2 h_menu4">
                @include('market.partials.template_2_menu')
            </div>
            <div class="col-sm-2 search-right">
                <ul class="heart">
                    <li>
                        <a href="wishlist.html" >
                            <span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
                        </a></li>
                    <li><a class="play-icon popup-with-zoom-anim" href="#small-dialog"><i class="glyphicon glyphicon-search"> </i></a></li>
                </ul>
                <div class="cart box_1">
                    <a href="checkout.html">
                        <h3> <div class="total">
                                <span class="simpleCart_total"></span></div>
                            <img src="{{asset('frontend/images/cart.png')}}" alt=""/></h3>
                    </a>
                    <p><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p>

                </div>
                <div class="clearfix"> </div>

                <!----->

                <!---pop-up-box---->
                <link href="{{asset('frontend/css/popuo-box.css')}}" rel="stylesheet" type="text/css" media="all"/>
                <script src="{{asset('frontend/js/jquery.magnific-popup.js')}}" type="text/javascript"></script>
                <!---//pop-up-box---->
                <div id="small-dialog" class="mfp-hide">
                    <div class="search-top">
                        <div class="login-search">
                            <input type="submit" value="">
                            <input type="text" value="Search.." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search..';}">
                        </div>
                        <p>Shopin</p>
                    </div>
                </div>
                <script>
                    $(document).ready(function() {
                        $('.popup-with-zoom-anim').magnificPopup({
                            type: 'inline',
                            fixedContentPos: false,
                            fixedBgPos: true,
                            overflowY: 'auto',
                            closeBtnInside: true,
                            preloader: false,
                            midClick: true,
                            removalDelay: 300,
                            mainClass: 'my-mfp-zoom-in'
                        });

                    });
                </script>
                <!----->
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!--banner-->
<div class="banner">
    <div class="container">
        <section class="rw-wrapper">
            <h1 class="rw-sentence">
                <span>Fashion &amp; Beauty</span>
                <div class="rw-words rw-words-1">
                    <span>Beautiful Designs</span>
                    <span>Sed ut perspiciatis</span>
                    <span> Totam rem aperiam</span>
                    <span>Nemo enim ipsam</span>
                    <span>Temporibus autem</span>
                    <span>intelligent systems</span>
                </div>
                <div class="rw-words rw-words-2">
                    <span>We denounce with right</span>
                    <span>But in certain circum</span>
                    <span>Sed ut perspiciatis unde</span>
                    <span>There are many variation</span>
                    <span>The generated Lorem Ipsum</span>
                    <span>Excepteur sint occaecat</span>
                </div>
            </h1>
        </section>
    </div>
</div>
<!--content-->
<div class="content">
    <div class="container">

        @yield('content')


        <!--//products-->
        <!--brand-->
        {{--<div class="brand">--}}
        {{--<div class="col-md-3 brand-grid">--}}
        {{--<img src="{{asset('frontend/images/ic.png')}}" class="img-responsive" alt="">--}}
        {{--</div>--}}
        {{--<div class="col-md-3 brand-grid">--}}
        {{--<img src="{{asset('frontend/images/ic1.png')}}" class="img-responsive" alt="">--}}
        {{--</div>--}}
        {{--<div class="col-md-3 brand-grid">--}}
        {{--<img src="{{asset('frontend/images/ic2.png')}}" class="img-responsive" alt="">--}}
        {{--</div>--}}
        {{--<div class="col-md-3 brand-grid">--}}
        {{--<img src="{{asset('frontend/images/ic3.png')}}" class="img-responsive" alt="">--}}
        {{--</div>--}}
        {{--<div class="clearfix"></div>--}}
        {{--</div>--}}
        <!--//brand-->
    </div>

</div>
<!--//content-->
<!--//footer-->
<br>
<br>
<br>

<div class="footer">
    <div class="footer-middle">
        <div class="container">
            <div class="col-md-3 footer-middle-in">
                <a href="index.html"><img src="images/log.png" alt=""></a>
                <p>Suspendisse sed accumsan risus. Curabitur rhoncus, elit vel tincidunt elementum, nunc urna tristique nisi, in interdum libero magna tristique ante. adipiscing varius. Vestibulum dolor lorem.</p>
            </div>

            <div class="col-md-3 footer-middle-in">
                <h6>Information</h6>
                <ul cla ss=" in">
                    <li><a href="404.html">About</a></li>
                    <li><a href="contact.html">Contact Us</a></li>
                    <li><a href="#">Returns</a></li>
                    <li><a href="contact.html">Site Map</a></li>
                </ul>
                <ul class="in in1">
                    <li><a href="#">Order History</a></li>
                    <li><a href="wishlist.html">Wish List</a></li>
                    <li><a href="login.html">Login</a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="col-md-3 footer-middle-in">
                <h6>Tags</h6>
                <ul class="tag-in">
                    <li><a href="#">Lorem</a></li>
                    <li><a href="#">Sed</a></li>
                    <li><a href="#">Ipsum</a></li>
                    <li><a href="#">Contrary</a></li>
                    <li><a href="#">Chunk</a></li>
                    <li><a href="#">Amet</a></li>
                    <li><a href="#">Omnis</a></li>
                </ul>
            </div>
            <div class="col-md-3 footer-middle-in">
                <h6>Newsletter</h6>
                <span>Sign up for News Letter</span>
                <form>
                    <input type="text" value="Enter your E-mail" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='Enter your E-mail';}">
                    <input type="submit" value="Subscribe">
                </form>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <ul class="footer-bottom-top">
                <li><a href="#"><img src="{{asset('frontend/images/f1.png')}}" class="img-responsive" alt=""></a></li>
                <li><a href="#"><img src="{{asset('frontend/images/f2.png')}}" class="img-responsive" alt=""></a></li>
                <li><a href="#"><img src="{{asset('frontend/images/f3.png')}}" class="img-responsive" alt=""></a></li>
            </ul>
            <p class="footer-class">&copy; 2016 Shopin. All Rights Reserved | Design by  <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!--//footer-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{asset('frontend/js/simpleCart.min.js')}}"> </script>
<!-- slide -->
<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
<!--light-box-files -->
<script src="{{asset('frontend/js/jquery.chocolat.js')}}"></script>
<link rel="stylesheet" href="{{asset('frontend/css/chocolat.css')}}" type="text/css" media="screen" charset="utf-8">
<!--light-box-files -->
<script type="text/javascript" charset="utf-8">
    $(function() {
        $('a.picture').Chocolat();
    });

    $(document).ready(function() {

        $('.like').on('click',function(event){
            event.preventDefault();
            var product_id = $(this).data('id')

            @if(Auth::check())

            $.post("{{secure_url('/like-it')}}/"+product_id,function(data){
                $('.counts-'+product_id).text(data.likes)
            });

            @elseif(Auth::guest())
            $('#login-modal').modal();
            @endif


        });

        function fancy(product_id) {
            @if(Auth::check())

             $.post("{{secure_url('/fancy-it')}}/"+product_id,function(data){
                $('.fancy').click(function(){
                    $(this).addClass('fa fa-spinner fa-spin')

                })

            });

            @elseif(Auth::guest())
            $('#login-modal').modal();
            @endif

        }

        function like(product_id) {
            @if(Auth::check())

             $.post("{{secure_url('/like-it')}}/"+product_id,function(data){

            });

            @elseif(Auth::guest())
            $('#login-modal').modal();
            @endif

        }

        $('#new-registration-button').on('click', function () {
//            alert('hello');
            var registerForm = '<div id="register-form">' +
                    '<form method="post" id="user_register_form">' +
                    '<div class="form-group">' +

                    '<input type="text" placeholder="Enter your name" name="name" required class="form-control login-field">' +
                    '<i class="fa fa-user login-field-icon"></i>' +
                    '</div>' +

                    '<div class="form-group">' +
                    '<input type="text" id="phone_number" placeholder="Enter your phone number" required class="form-control login-field">' +
                    '<i class="fa fa-phone login-field-icon"></i>' +
                    '</div>' +

                    '<div class="form-group">' +
                    '<input type="email" id="email" placeholder="Enter your email" name="email" class="form-control login-field">' +
                    '<i class="fa fa-envelope login-field-icon"></i>' +
                    '</div>' +

                    '<div class="form-group">' +
                    '<input type="password" id="login-pass" placeholder="Password" name="password" required class="form-control login-field">' +
                    '<i class="fa fa-lock login-field-icon"></i>' +
                    '</div>' +

                    '<div class="form-group">' +
                    '<input type="password" id="login-pass" placeholder="Password" name="password_confirmation" class="form-control login-field">' +
                    '<i class="fa fa-lock login-field-icon"></i>' +
                    '<span class="help-block"> </span>' +
                    '</div>' +

                    '<div class="form-group">' +
                    '  <label  style="word-wrap:break-word">' +
                    '<input id="create-store-checkbox" type="checkbox" name="store" style=" vertical-align:middle;"/>create store ' +
                    '</label>' +
                    '</div>' +

//                    '<a href="#" class="btn btn-success modal-login-btn" id="register_user">Register</a>'+
                    '<button type="submit" class="btn btn-success modal-login-btn" id="register_user">Register</button>' +

                    '</form>';
//                    '<a href="#" class="login-link text-center">Lost your password?</a></form></div>';

            $('#login-form').html(registerForm);
            $("#login-button").hide();
            $("#login-button").show();

            $("#new-registration-button").hide();

            register();

        })

        $('#login-button').on('click', function () {
//            alert('hello');
            var loginForm = '<div id="login-form">' +
                    '<form id="user_login_form" method="post">' +
                    '<div class="form-group">' +
                    '<input type="email" placeholder="Enter your name" name="email" class="form-control login-field">' +
                    '<i class="fa fa-user login-field-icon"></i>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<input type="password" id="login-pass" placeholder="Password" name="password" class="form-control login-field">' +
                    '<i class="fa fa-lock login-field-icon"></i>' +
                    '</div>' +
                    '<button class="btn btn-success modal-login-btn" id="login_user">Login</button>' +
                    '<a href="#" class="login-link text-center">Lost your password?</a>' +
                    '</form>' +
                    '</div>';

            $('#register-form').html(loginForm);
            $("#new-registration-button").hide();
            $("#new-registration-button").show();
            $("#login-button").hide();

            $('#user_login_form').on('submit', function (e) {
                e.preventDefault();
                $.post("{{url('login')}}", $('#user_login_form').serialize(), function () {

                }).success(function (data) {
                    location.reload();

                }).fail(function (data) {
                    for (var field in data.responseJSON) {
                        var el = $(':input[name="' + field + '"]');
                        el.parent('.form-group').addClass('has-error');
                        el.next('.help-block').text(data.responseJSON[field][0]);
                    }
                })

            })

            login();
        });

        register();
        login();

        function register() {
            $('#user_register_form').submit(function (e) {
                e.preventDefault();

                $.ajax({
                    url: "{{secure_url('/register')}}",
                    type: "POST",
                    data: $('#user_register_form').serialize(),
                    dataType: 'json',
                    beforeSend: function () {
//
                    },
                    complete: function (data) {

                        if (data.status == 301) {
                            location.href = data.message;
                        }
                    },
                    success: function (data) {

                        location.href = data.message;

//                        if($('#create-store-checkbox').is(':checked')){
//                           location.href = '/store/add-store';
//                        }
                    },
                    error: function (data) {
                        for (var field in data.responseJSON) {
                            var el = $(':input[name="' + field + '"]');
                            el.parent('.form-group').addClass('has-error');
                            el.next('.help-block').text(data.responseJSON[field][0]);
                        }

                    }
                });

            })
        }

        function login() {
            $('#user_login_form').on('submit', function (e) {
                e.preventDefault();
                $.post("{{secure_url('login')}}", $('#user_login_form').serialize(), function () {

                }).success(function (data) {

                    location.reload();

                }).fail(function (data) {
                    for (var field in data.responseJSON) {
                        var el = $(':input[name="' + field + '"]');
                        el.parent('.form-group').addClass('has-error');
                        el.next('.help-block').text(data.responseJSON[field][0]);
                    }
                })

            })
        }

    });

</script>

@yield('scripts')



<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header login_modal_header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title" id="myModalLabel">Login to Your Account</h5>
            </div>
            <div class="modal-body login-modal">
                <p>Shopaholicks Login</p>
                <br/>
                <div class="clearfix"></div>
                <div id='social-icons-conatainer'>

                    <div class='modal-body-left'>
                        <div id="login-form">
                            <form method="post" id="user_login_form">
                                <div class="form-group">
                                    <input type="text" id="email" placeholder="Enter your name" name="email" class="form-control login-field">
                                    <i class="fa fa-user login-field-icon"></i>
                                    <span class="help-block"></span>
                                </div>

                                <div class="form-group">
                                    <input type="password" id="login-pass" placeholder="Password" name="password" class="form-control login-field">
                                    <i class="fa fa-lock login-field-icon"></i>
                                    <span class="help-block"></span>
                                </div>

                                <button class="btn btn-success modal-login-btn">Login</button>
                                <a href="#" class="login-link text-center">Lost your password?</a>
                            </form>

                        </div>

                    </div>

                    <div class='modal-body-right'>
                        <div class="modal-social-icons">
                            <a href='{{url('redirect/facebook')}}' class="btn btn-default facebook"> <i class="fa fa-facebook modal-icons"></i> Sign In with Facebook </a>
                            <a href='{{url('redirect/twitter')}}' class="btn btn-default twitter"> <i class="fa fa-twitter modal-icons"></i> Sign In with Twitter </a>
                            <a href='{{url('redirect/google')}}' class="btn btn-default google"> <i class="fa fa-google-plus modal-icons"></i> Sign In with Google </a>
                            {{--<a href='#' class="btn btn-default linkedin"> <i class="fa fa-linkedin modal-icons"></i> Sign In with Linkedin </a>--}}
                        </div>
                    </div>
                    <div id='center-line'> OR </div>
                </div>
                <div class="clearfix"></div>

                <div class="form-group modal-register-btn">
                    <button class="btn btn-default" id="new-registration-button"> New User ? Please Register</button>
                    <button class="btn btn-default" id="login-button" style="display: none"> Login to your account</button>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="modal-footer login_modal_footer">
            </div>
        </div>
    </div>
</div>


</body>
</html>