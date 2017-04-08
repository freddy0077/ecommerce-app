<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
    <title>Register / Login</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link href="{{asset('css/popup-box.css')}}" rel="stylesheet" type="text/css" media="all" />
    <!--Web-fonts-->
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300italic,300,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <link href="//fonts.googleapis.com/css?family=Lora:400,700" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet" type="text/css" />

    <!--//Web-fonts-->
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="shopaholicks,online shops" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- //Meta tag Keywords -->
</head>
<body>
<h1>Join or Login to Shopaholicks</h1>
<div class="w3layouts">
    <!-- Sign in -->
    <div class="signin-agile">
        <h2>Login</h2>
        <label class="bar-w3-agile"></label>
        <form action="{{url('/login')}}" method="post">
            {!! csrf_field() !!}
            <p>email</p>
            <input type="email" name="email" class="name" placeholder="" required="" value="{{old('email')}}" />
            <p>Password</p>
            <input type="password" name="password" class="password" placeholder="" required="" value="{{old('password')}}" />
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li><small style="font-size: 12px; color: red" class="text-danger">{{ $error }}</small></li>
                        {{--<small style="font-size: 12px;" class="text-danger">{{ $error }}</small>--}}
                    @endforeach
                    </ul>
                </div>
            @endif
            <br>
            <br>
            <ul>
                <li>
                    <input type="checkbox" id="brand1" value="">
                    <label for="brand1"><span></span>Keep me signed in</label>
                </li>
            </ul>
            <a href="#">Forgot Password?</a><br>
            <div class="clear"></div>
            <input type="submit" value="Login">
        </form>
    </div>
    <!-- //Sign in -->
    <!-- Sign up -->
    <div class="signup-agileinfo">
        <h3>Sign Up</h3>
        <label class="bar-w3-agile"></label>
        <p>With Shopaholicks you are able create your own and start selling right away !</p>
        <h6>By creating an account, you agree to our <a href="{{url('/terms-of-use')}}">Terms.</a></h6>
        <!-- Pop up -->
        <div class="more">
            <a class="book popup-with-zoom-anim button-isi zoomIn animated" data-wow-delay=".5s" href="#small-dialog">Sign Up</a>
        </div>
        <!-- //Pop up -->
    </div>
    <!-- //Sign up -->
    <div class="clear"></div>
</div>
<div class="footer-w3l">
    <p class="agileinfo"> &copy; {{date('Y')}} {{config('app.name')}} . All Rights Reserved
        {{--| Design by <a href="http://w3layouts.com">W3layouts</a>--}}
    </p>
</div>
<!-- Pop up -->
<div class="pop-up">
    <div id="small-dialog" class="mfp-hide book-form">
        <h3>Sign Up Form </h3>
        <form action="{{url('/register-new-user')}}" method="post" id="register-form">
            <p>Name</p>
            <input type="text" name="name" placeholder="" required=""/>
            <p>Email</p>
            <input type="email" name="email" class="email" placeholder="" required=""/>
            <p>Phone Number</p>
            <input type="text" name="phone_number" class="password" placeholder="" required=""/>
            <p>Password</p>
            <input type="password" name="password" class="password" placeholder="" required=""/>
            <p>Open a shop</p>
            <input type="checkbox" name="store" id="store">
            {{--<p>Store Name</p>--}}
            <input type="text" name="store_name" id="store_name" placeholder="Your Store name">
            <input type="submit" value="Sign Up">
        </form>
    </div>
</div>
<!-- // Pop up -->
<script type="text/javascript" src="{{asset('js/jquery-2.1.4.min.js')}}"></script>
<script src="{{asset('js/jquery.magnific-popup.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="{{asset('js/modernizr.custom.53451.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.min.js" type="text/javascript"></script>

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
    $('#store_name').hide();

    $('#register-form').on('submit',function(e){
        e.preventDefault();
        $.post($(this).attr('action'),$(this).serialize(),function(data){
        }).success(function(data){
            location.reload();
            if (data.status == 301) {
                swal({
                            title: "Great",
                            text: "You have successfully created a store account !",
                            type: "success",
                            showCancelButton: true,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "Log in",
                            closeOnConfirm: false
                        },
                        function(){

                            swal("Great!", " redirecting to the login page", "success");

                            setTimeout(function(){
                                location.reload();
                            },2000)
                        });
            }
        }).fail(function(data){
            for (var field in data.responseJSON) {
                var el = $(':input[name="' + field + '"]');
                el.parent('.form-group').addClass('has-error');
                el.next('.help-block').text(data.responseJSON[field][0]);
                el.next('.validation_error').text(data.responseJSON[field][0]);
                swal("Error!", data.responseJSON[field][0], "error");

            }
        })
    })


    $('#store').on('click',function(){
//       alert($('#store:checked').val())
        var store_name = $('#store_name');
        if($('#store:checked').val() == 'on'){
            store_name.show();
            store_name.attr('required',true);
        }else {
            store_name.hide();
            store_name.removeAttr('required');
        }
    })


</script>
</body>
</html>