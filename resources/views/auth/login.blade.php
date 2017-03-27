
<!DOCTYPE html>
<html>
<head>
    <title>Shopaholicks Register /Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet" type="text/css" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <style>
        /*--reset--*/
        html,body,div,span,applet,object,iframe,h1,h2,h3,h4,h5,h6,p,blockquote,pre,a,abbr,acronym,address,big,cite,code,del,dfn,em,img,ins,kbd,q,s,samp,small,strike,strong,sub,sup,tt,var,b,u,i,dl,dt,dd,ol,nav ul,nav li,fieldset,form,label,legend,table,caption,tbody,tfoot,thead,tr,th,td,article,aside,canvas,details,embed,figure,figcaption,footer,header,hgroup,menu,nav,output,ruby,section,summary,time,mark,audio,video{margin:0;padding:0;border:0;font-size:100%;font:inherit;vertical-align:baseline;}
        article, aside, details, figcaption, figure,footer, header, hgroup, menu, nav, section {display: block;}
        ol,ul{list-style:none;margin:0px;padding:0px;}
        blockquote,q{quotes:none;}
        blockquote:before,blockquote:after,q:before,q:after{content:'';content:none;}
        table{border-collapse:collapse;border-spacing:0;}
        /*--start editing from here--*/
        a{text-decoration:none;}
        .txt-rt{text-align:right;}/* text align right */
        .txt-lt{text-align:left;}/* text align left */
        .txt-center{text-align:center;}/* text align center */
        .float-rt{float:right;}/* float right */
        .float-lt{float:left;}/* float left */
        .clear{clear:both;}/* clear float */
        .pos-relative{position:relative;}/* Position Relative */
        .pos-absolute{position:absolute;}/* Position Absolute */
        .vertical-base{	vertical-align:baseline;}/* vertical align baseline */
        .vertical-top{	vertical-align:top;}/* vertical align top */
        nav.vertical ul li{	display:block;}/* vertical menu */
        nav.horizontal ul li{	display: inline-block;}/* horizontal menu */
        img{max-width:100%;}
        /*--end reset--*/
        body {
            font-family: 'Open Sans', sans-serif;
            background-attachment: fixed;
            background-color: #fa8072;
        }
        h1 {
            font-size: 3em;
            text-align: center;
            color: #fff;
            font-weight: bolder;
            letter-spacing: 4px;
        }
        /*-- main --*/
        .main {
            padding: 3em 0 0;
        }
        .main-agileinfo{
            width: 40%;
            margin: 7em auto;
            background-color: rgba(0, 0, 0, 0.13);
            position: relative;
            -moz-transition: all 0.5s;
            -o-transition: all 0.5s;
            -webkit-transition: all 0.5s;
            transition: all 0.5s;
        }
        .w3table-topimg {
            margin-top: -4em;
        }
        .w3table-topimg img {
            width: 100%;
        }
        .w3table-cell form {
            padding: 1.5em;
        }
        .main-agileinfo input[type="radio"] {
            margin: 0;
            width: 12px;
            display: inline-block;
            vertical-align: middle;
        }
        .main-agileinfo .radio {
            display: inline-block;
            margin-bottom: 1em;
            float: left;
            width: 22%;
        }
        .main-agileinfo .radio:nth-child(2) {
            width: 34%;
        }
        .main-agileinfo label {
            font-size: .75em;
            color: #999;
            margin-right: .8em;
        }
        .main-agileinfo h5.w3ls-ltext {
            font-size: .8em;
            color: #999;
            font-weight: 600;
            margin-bottom: 0.5em;
        }
        .sign-up p {
            font-size: .7em;
            color: #999;
            margin-bottom: 1em;
        }
        /*-- forms --*/
        .w3table {
            display:table;
            width: 100%;
            height: 100%;
        }
        .w3table-cell {
            display: table-cell;
            vertical-align: middle;
            -moz-transition: all 0.5s;
            -o-transition: all 0.5s;
            -webkit-transition: all 0.5s;
            transition: all 0.5s;
        }
        .main-agileinfo .wthree-box {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }
        .main-agileinfo .wthree-box:before, .main-agileinfo .wthree-box:after {
            content: " ";
            position: absolute;
            left: 153px;
            top: 42px;
            background-color: rgba(189, 95, 84, 0.39);
            -webkit-transform: rotateX(52deg) rotateY(15deg) rotateZ(-38deg);
            -moz-transform: rotateX(52deg) rotateY(15deg) rotateZ(-38deg);
            -ms-transform: rotateX(52deg) rotateY(15deg) rotateZ(-38deg);
            -o-transform: rotateX(52deg) rotateY(15deg) rotateZ(-38deg);
            transform: rotateX(52deg) rotateY(15deg) rotateZ(-38deg);
            width: 300px;
            height: 265px;
            -moz-transition: all 0.5s;
            -o-transition: all 0.5s;
            -webkit-transition: all 0.5s;
            transition: all 0.5s;
        }
        .main-agileinfo .wthree-box:after {
            background-color: rgba(250, 128, 114, 0.48);
            top: 22px;
            left: 155px;
            width: 324px;
            height: 220px;
        }
        .main-agileinfo .agileui-forms {
            position: relative;
        }
        .main-agileinfo .btn {
            cursor: pointer;
            text-align: center;
            margin: 0 auto;
            width: 100%;
            color: #fff;
            background-color: #00BCD4;
            opacity: 1;
            -moz-transition: all 0.5s;
            -o-transition: all 0.5s;
            -webkit-transition: all 0.5s;
            transition: all 0.5s;
            border: none;
            text-transform: uppercase;
            font-size: 0.9em;
        }
        .main-agileinfo .btn:hover {
            opacity: 0.7;
        }
        .main-agileinfo .btn, .main-agileinfo input, .main-agileinfo textarea  {
            padding: 8px 12px;
        }
        .main-agileinfo .info-w3lsitem .btn {
            width: 35%;
        }
        .main-agileinfo input,.main-agileinfo textarea {
            margin: 0 auto 15px;
            display: block;
            width: 89%;
            -moz-transition: all 0.3s;
            -o-transition: all 0.3s;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
            color: #999;
            font-size: 0.8em;
            left: 1px;
            outline: none;
            font-family: 'Open Sans', sans-serif;
        }
        .main-agileinfo textarea {
            min-height: 3em;
        }
        .main-agileinfo .agileui-forms .container-info {
            text-align: left;
            font-size: 0;
        }
        .main-agileinfo .agileui-forms .container-info .info-w3lsitem {
            text-align: center;
            font-size: 16px;
            width: 300px;
            height: 320px;
            display: inline-block;
            vertical-align: top;
            color: #fff;
            opacity: 1;
            -moz-transition: all 0.3s;
            -o-transition: all 0.3s;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
        }
        .main-agileinfo .agileui-forms .container-info .info-w3lsitem p {
            font-size: 20px;
            margin: 20px;
        }
        .agileui-forms .container-info .info-w3lsitem .btn {
            background-color: transparent;
            border: 1px solid #fff;
        }
        .agileui-forms .container-info .info-w3lsitem .w3table-cell {
            padding-right: 35px;
        }
        .agileui-forms .container-info .info-w3lsitem:nth-child(2) .w3table-cell {
            padding-left: 35px;
            padding-right: 0;
        }
        .container-form {
            overflow: hidden;
            position: absolute;
            left: 40px;
            top: -30px;
            width: 305px;
            height: 380px;
            background-color: #fff;
            -webkit-box-shadow: 0 0 15px 0 rgba(0, 0, 0, 0.2);
            -moz-box-shadow: 0 0 15px 0 rgba(0, 0, 0, 0.2);
            -o-box-shadow: 0 0 15px 0 rgba(0, 0, 0, 0.2);
            -ms-box-shadow: 0 0 15px 0 rgba(0, 0, 0, 0.2);
            box-shadow: 0 0 15px 0 rgba(0, 0, 0, 0.2);
            -moz-transition: all 0.5s;
            -o-transition: all 0.5s;
            -webkit-transition: all 0.5s;
            transition: all 0.5s;
        }
        .form-item {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            opacity: 1;
            -moz-transition: all 0.5s;
            -o-transition: all 0.5s;
            -webkit-transition: all 0.5s;
            transition: all 0.5s;
        }
        .form-item.sign-up {
            position: absolute;
            left: -100%;
            opacity: 0;
        }
        .log-in .wthree-box:before {
            position: absolute;
            left: 180px;
            top: 62px;
            height: 265px;
        }
        .log-in .wthree-box:after {
            top: 22px;
            left: 192px;
            width: 324px;
            height: 220px;
        }
        .log-in .container-form {
            left: 280px;
        }
        .log-in .container-form .form-item.sign-up {
            left: 0;
            opacity: 1;
        }
        .log-in .container-form .form-item.log-in {
            left: -100%;
            opacity: 0;
        }
        /*-- //forms --*/
        /*-- //main --*/
        /*-- copyright --*/
        .copyw3-agile {
            margin: 2em 0;
            text-align: center;
        }
        .copyw3-agile p {
            font-size: 0.9em;
            color: #fff;
            line-height: 1.8em;
            letter-spacing: 1px;
            font-weight: 400;
            padding:0 1em;
        }
        .copyw3-agile p a{
            color: #fff;
            -webkit-transition: 0.5s all;
            -moz-transition: 0.5s all;
            transition: 0.5s all;
        }
        .copyw3-agile p a:hover{
            color: #000;
        }
        /*-- //copyright --*/
        /*-- responsive-design --*/
        @media(max-width:1440px){
            .main-agileinfo {
                width: 44%;
            }
        }
        @media(max-width:1366px){
            .main-agileinfo {
                width: 47%;
            }
        }
        @media(max-width:1280px){
            .main-agileinfo {
                width: 50%;
            }
        }
        @media(max-width:1080px){
            .main-agileinfo {
                width: 60%;
                margin: 6em auto;
            }
        }
        @media(max-width:991px){
            .main-agileinfo {
                width: 65%;
            }
        }
        @media(max-width:800px){
            h1 {
                font-size: 2.6em;
            }
            .main-agileinfo {
                width: 80%;
                margin: 5em auto;
            }
            .w3table-topimg {
                margin-top: -2em;
            }
        }
        @media(max-width:768px){
            .main-agileinfo {
                width: 83%;
            }
        }
        @media(max-width:736px){
            .main-agileinfo {
                width: 85%;
            }
            .main {
                padding: 2em 0 0;
            }
            h1 {
                font-size: 2.2em;
                letter-spacing: 3px;
            }
            .log-in .container-form {
                left: 266px;
            }
        }
        @media(max-width:667px){
            .container-form {
                left: 30px;
            }
            .main-agileinfo {
                width: 93%;
            }
        }
        @media(max-width:640px){
            .main-agileinfo .agileui-forms .container-info .info-w3lsitem {
                width: 285px;
            }
            .main-agileinfo .agileui-forms .container-info .info-w3lsitem p {
                font-size: 17px;
                margin: 15px;
            }
            .container-form {
                left: 22px;
                width: 280px;
            }
            .log-in .container-form {
                left: 270px;
            }
            .w3table-cell form {
                padding: 1em;
            }
            .main-agileinfo label {
                font-size: .7em;
            }
            .main-agileinfo input, .main-agileinfo textarea {
                width: 88%;
            }
            .w3table-topimg {
                margin-top: -1.9em;
            }
        }
        @media(max-width:600px){
            .main-agileinfo .agileui-forms .container-info .info-w3lsitem {
                width: 265px;
            }
            .log-in .container-form {
                left: 232px;
            }
            .main-agileinfo .wthree-box:before, .main-agileinfo .wthree-box:after {
                left: 102px;
            }
            .main-agileinfo .wthree-box:before, .main-agileinfo .wthree-box:after {
                top: 32px;
            }
            .log-in .wthree-box:before {
                top: 32px;
            }
            .log-in .wthree-box:after {
                top: 8px;
            }
        }
        @media(max-width:568px){
            .main-agileinfo .agileui-forms .container-info .info-w3lsitem {
                width: 253px;
            }
            .log-in .container-form {
                left: 213px;
            }
        }
        @media(max-width:480px){
            .main-agileinfo {
                width: 85%;
                margin: 2em auto 4em;
            }
            .log-in .container-form {
                left: 26px;
            }
            .main-agileinfo .agileui-forms .container-info .info-w3lsitem {
                width: 50%;
                height: 460px
            }
            .agileui-forms .container-info .info-w3lsitem .w3table-cell {
                padding-right: 0;
                vertical-align: top;
            }
            .agileui-forms .container-info .info-w3lsitem:nth-child(2) .w3table-cell {
                padding-left: 0;
            }
            .main-agileinfo .info-w3lsitem .btn {
                width: 44%;
                font-size: .8em;
            }
            .main-agileinfo .agileui-forms .container-info .info-w3lsitem p {
                font-size: 15px;
                margin: 20px 0 15px;
            }
            .main-agileinfo .info-w3lsitem .btn {
                width: 40%;
                font-size: .7em;
            }
            .log-in .container-form ,.container-form{
                left: 35px;
                top: 109px;
                width: 318px;
            }
            .copyw3-agile p {
                font-size: 0.8em;
            }
        }
        @media(max-width:414px){
            .log-in .container-form, .container-form {
                left: 20px;
                width: 295px;
            }
            h1 {
                font-size: 1.8em;
                letter-spacing: 2px;
            }
        }
        @media(max-width:384px){
            .main-agileinfo {
                width: 92%;
            }
        }
        @media(max-width:375px){
            .main-agileinfo .agileui-forms .container-info .info-w3lsitem p {
                font-size: 14px;
            }
        }
        @media(max-width:320px){
            .main {
                padding: 1em 0 0;
            }
            h1 {
                font-size: 1.6em;
                letter-spacing: 1px;
            }
            .main-agileinfo {
                margin: 1em auto 4em;
            }
            .main-agileinfo .agileui-forms .container-info .info-w3lsitem p {
                font-size: 13px;
                margin: 15px 0 10px;
            }
            .log-in .container-form, .container-form {
                left: 12px;
                width: 255px;
                top: 95px;
            }
            .w3table-topimg {
                margin-top: -3em;
            }
            .main-agileinfo label {
                margin-right: .4em;
            }
            .main-agileinfo textarea {
                min-height: 4em;
            }
            .copyw3-agile p {
                letter-spacing: 0px;
            }
            .main-agileinfo {
                margin: 1em auto 3em;
            }
        }
        /*-- //responsive-design --*/

    </style>
    <!-- web font -->
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'><!--web font-->
    <!-- //web font -->
</head>
<body>
<!-- main -->
<div class="main agileits-w3layouts">
    {{--<h1>SHOPAHOLICKS</h1>--}}
    <div class="main-agileinfo">
        <div class="wthree-box"></div>
        <div class="agileui-forms">
            <div class="container-info">
                <div class="info-w3lsitem">
                    <div class="w3table">
                        <div class="w3table-cell">
                            <p> Have an account? </p>
                            <div class="btn"> Log in </div>
                        </div>
                    </div>
                </div>
                <div class="info-w3lsitem">
                    <div class="w3table">
                        <div class="w3table-cell">
                            {{--<p> Send us a message</p>--}}
                            <div class="btn">SIGN UP</div>
                        </div>
                    </div>
                </div>
                <div class="clear"> </div>
            </div>
            <div class="container-form">
                <div class="form-item log-in"><!-- login form-->
                    <div class="w3table agileinfo">
                        <div class="w3table-cell">
                            <div class="w3table-topimg">
                                <img src="{{url('frontend_2/image/logo.png')}}">
                            </div>
                            <form action="{{url('/login')}}" method="post" id="login-form">
                                <input type="text" name="email" placeholder="Email" required=""/>
                                <input type="Password" name="password" placeholder="Password" required=""/>
                                <input type="submit" class="btn" value="Log in">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="form-item sign-up"><!-- sign-up form-->
                    <div class="w3table w3-agileits">
                        <div class="w3table-cell">
                            <form action="{{url('/register')}}" method="post" id="register-form">
                                {{--<p>Create an account on Shopaholicks.</p>--}}
                                <input type="text" name="name" placeholder="Full Name" required/>
                                {{--<i class="help-block">one</i>--}}
                                <input type="email" name="email" placeholder="Email" required=""/>
                                <input type="text" name="phone_number" placeholder="Phone Number" required=""/>
                                <input type="password" name="password" placeholder="Password" required=""/>
                                <div class="form-group">Set up a store <input type="checkbox" name="store" id="store" style="margin-top:-17px;"></div>
                                <div class="form-group"><input type="text" name="store_name" id="store_name" placeholder="Your Store name"></div>
                                <input type="submit" class="btn" value="Submit">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //main -->
<!-- copyright -->
<div class="copyw3-agile">
    <p> © {{date('Y')}} Shopaholicks  . All rights reserved .</p>
</div>
<!-- //copyright -->
<!-- js -->
{{--<script  src=" js/jquery-1.12.3.min.js"></script>--}}
<script type="text/javascript" src="{{asset('frontend_2/js/jquery-2.2.4.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.min.js" type="text/javascript"></script>


<script>
    $(".info-w3lsitem .btn").click(function() {
        $(".main-agileinfo").toggleClass("log-in");
    });
    $(".container-form .btn").click(function() {
        $(".main-agileinfo").addClass("active");
    });

    $('#store_name').hide();

    $('#register-form').on('submit',function(e){
        e.preventDefault();
        $.post('/register',$(this).serialize(),function(data){
        }).success(function(data){
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
                swal("Error!",data.responseJSON[field][0] , "error");
            }
        })
    })

    $('#login-form').on('submit',function(e){
        e.preventDefault();
        $.post('/login',$(this).serialize(),function(data){

        }).fail(function(data){
            for (var field in data.responseJSON) {
                var el = $(':input[name="' + field + '"]');
                el.parent('.form-group').addClass('has-error');
                el.next('.help-block').text(data.responseJSON[field][0]);
                el.next('.validation_error').text(data.responseJSON[field][0]);
                swal("Error!",data.responseJSON[field][0] , "error");
            }
        }).success(function(data){
            location.href="/home";
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
<!-- //js -->
</body>
</html>