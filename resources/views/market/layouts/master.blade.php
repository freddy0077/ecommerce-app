
<!DOCTYPE html>
<html lang="en" class="wide wow-animation smoothscroll scrollTo boxed">

@include('market.partials.head')

<style>
    #flipkart-navbar {
        /*background-color: #2874f0;*/
        background-color: rgba(22,178,138,1);
        /*background-color: rgba(60,179,113,0.6);*/
        color: #FFFFFF !important;
    }

    .row1{
        padding-top: 10px;
    }

    .row2 {
        padding-bottom: 20px;
    }

    .flipkart-navbar-input {
        padding: 11px 16px;
        border-radius: 2px 0 0 2px;
        border: 0 none;
        outline: 0 none;
        font-size: 15px;
    }

    .flipkart-navbar-button {
        background-color: #ffe11b;
        border: 1px solid #ffe11b;
        border-radius: 0 2px 2px 0;
        color: #565656;
        padding: 10px 0;
        height: 43px;
        cursor: pointer;
    }

    .cart-button {
        background-color: #2469d9;
        box-shadow: 0 2px 4px 0 rgba(0, 0, 0, .23), inset 1px 1px 0 0 hsla(0, 0%, 100%, .2);
        padding: 10px 0;
        text-align: center;
        height: 41px;
        border-radius: 2px;
        font-weight: 500;
        width: 120px;
        display: inline-block;
        color: #FFFFFF;
        text-decoration: none;
        color: inherit;
        border: none;
        outline: none;
    }

    .cart-button:hover{
        text-decoration: none;
        color: #fff;
        cursor: pointer;
    }

    .cart-svg {
        display: inline-block;
        width: 16px;
        height: 16px;
        vertical-align: middle;
        margin-right: 8px;
    }

    .item-number {
        border-radius: 3px;
        background-color: rgba(0, 0, 0, .1);
        height: 20px;
        padding: 3px 6px;
        font-weight: 500;
        display: inline-block;
        color: #fff;
        line-height: 12px;
        margin-left: 10px;
    }

    .upper-links {
        display: inline-block;
        padding: 0 11px;
        line-height: 23px;
        font-family: 'Roboto', sans-serif;
        letter-spacing: 0;
        color: inherit;
        border: none;
        outline: none;
        font-size: 12px;
    }

    .dropdown {
        position: relative;
        display: inline-block;
        margin-bottom: 0px;
    }

    .dropdown:hover {
        background-color: #fff;
    }

    .dropdown:hover .links {
        color: #000;
    }

    .dropdown:hover .dropdown-menu {
        display: block;
    }

    .dropdown .dropdown-menu {
        position: absolute;
        top: 100%;
        display: none;
        background-color: #fff;
        color: #333;
        left: 0px;
        border: 0;
        border-radius: 0;
        box-shadow: 0 4px 8px -3px #555454;
        margin: 0;
        padding: 0px;
    }

    .links {
        color: #fff;
        text-decoration: none;
    }

    .links:hover {
        color: #fff;
        text-decoration: none;
    }

    .profile-links {
        font-size: 12px;
        font-family: 'Roboto', sans-serif;
        border-bottom: 1px solid #e9e9e9;
        box-sizing: border-box;
        display: block;
        padding: 0 11px;
        line-height: 23px;
    }

    .profile-li{
        padding-top: 2px;
    }

    .largenav {
        display: none;
        color: #fff !important;
    }

    .smallnav{
        display: block;
    }

    .smallsearch{
        margin-left: 15px;
        margin-top: 15px;
    }

    .menu{
        cursor: pointer;
    }



    @media screen and (min-width: 768px) {
        .largenav {
            display: block;
        }
        .smallnav{
            display: none;
        }
        .smallsearch{
            margin: 0px;
        }
    }

    /*Sidenav*/
    .sidenav {
        height: 100%;
        width: 0;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: #fff;
        overflow-x: hidden;
        transition: 0.5s;
        box-shadow: 0 4px 8px -3px #555454;
        padding-top: 0px;
    }

    .sidenav a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 25px;
        color: #818181;
        display: block;
        transition: 0.3s
    }

    .sidenav .closebtn {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 36px;
        margin-left: 50px;
        color: #fff;
    }

    @media screen and (max-height: 450px) {
        .sidenav a {font-size: 18px;}
    }

    .sidenav-heading{
        font-size: 36px;
        color: #fff;
    }


    .cart-button {
        background-color: rgb(2,94,117);
        box-shadow: 0 2px 4px 0 rgba(0, 0, 0, .23), inset 1px 1px 0 0 hsla(0, 0%, 100%, .2);
        padding: 5px 0;
        text-align: center;
        height: 41px;
        border-radius: 2px;
        font-weight: 500;
        width: 80px;
        display: inline-block;
        color: #FFFFFF;
        text-decoration: none;
        color: inherit;
        border: none;
        outline: none;
    }


</style>

<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "70%";
        // document.getElementById("flipkart-navbar").style.width = "50%";
        document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.body.style.backgroundColor = "rgba(0,0,0,0)";
    }
</script>

<body>

<div class="page text-center">

    @include('market.partials.header')

    @yield('content')

    @include('market.partials.footer')


</div>

<script src="{{secure_asset('js/core.min.js')}}"></script>
<script src="{{secure_asset('js/script.js')}}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script data-cfasync="false" type="text/javascript">

</script>

<script>
    $(document).ready(function(){

        $('#new-registration-button').on('click',function(){
//            alert('hello');
            var registerForm = '<div id="register-form">' +
                    '<form method="post" id="user_register_form">'+
                    '<div class="form-group">'+

                    '<input type="text" placeholder="Enter your name" name="name" required class="form-control login-field">'+
                    '<i class="fa fa-user login-field-icon"></i>'+
                    '</div>'+

                    '<div class="form-group">'+
                    '<input type="text" id="phone_number" placeholder="Enter your phone number" required class="form-control login-field">'+
                    '<i class="fa fa-phone login-field-icon"></i>'+
                    '</div>'+

                    '<div class="form-group">'+
                    '<input type="email" id="email" placeholder="Enter your email" name="email" class="form-control login-field">'+
                    '<i class="fa fa-envelope login-field-icon"></i>'+
                    '</div>'+

                    '<div class="form-group">'+
                    '<input type="password" id="login-pass" placeholder="Password" name="password" required class="form-control login-field">'+
                    '<i class="fa fa-lock login-field-icon"></i>'+
                    '</div>'+

                    '<div class="form-group">'+
                    '<input type="password" id="login-pass" placeholder="Password" name="password_confirmation" class="form-control login-field">'+
                    '<i class="fa fa-lock login-field-icon"></i>'+
                     '<span class="help-block"> </span>'+
                    '</div>'+

                    '<div class="form-group">'+
                    '  <label  style="word-wrap:break-word">'+
                    '<input id="create-store-checkbox" type="checkbox" name="store" style=" vertical-align:middle;"/>create store '+
                    '</label>'+
                    '</div>'+

//                    '<a href="#" class="btn btn-success modal-login-btn" id="register_user">Register</a>'+
                    '<button type="submit" class="btn btn-success modal-login-btn" id="register_user">Register</button>'+

                    '</form>';
//                    '<a href="#" class="login-link text-center">Lost your password?</a></form></div>';

            $('#login-form').html(registerForm);
            $("#login-button").hide();
            $("#login-button").show();

            $("#new-registration-button").hide();

            register();

        })

        $('#login-button').on('click',function(){
//            alert('hello');
            var loginForm = '<div id="login-form">' +
                    '<form id="user_login_form" method="post">'+
                    '<div class="form-group">'+
                    '<input type="email" placeholder="Enter your name" name="email" class="form-control login-field">'+
                    '<i class="fa fa-user login-field-icon"></i>'+
                    '</div>'+
                    '<div class="form-group">'+
                    '<input type="password" id="login-pass" placeholder="Password" name="password" class="form-control login-field">'+
                    '<i class="fa fa-lock login-field-icon"></i>'+
                    '</div>' +
                    '<button class="btn btn-success modal-login-btn" id="login_user">Login</button>'+
                    '<a href="#" class="login-link text-center">Lost your password?</a>' +
                    '</form>' +
                    '</div>';

            $('#register-form').html(loginForm);
            $("#new-registration-button").hide();
            $("#new-registration-button").show();
            $("#login-button").hide();

            $('#user_login_form').on('submit',function(e){
                e.preventDefault();
                $.post("{{url('login')}}",$('#user_login_form').serialize(),function(){

                }).success(function(data){
                    location.reload();

                }).fail(function(data){
                    for (var field in data.responseJSON) {
                        var el = $(':input[name="' + field + '"]');
                        el.parent('.form-group').addClass('has-error');
                        el.next('.help-block').text(data.responseJSON[field][0]);
                    }
                })

                {{--$.ajax({--}}
                {{--url:"{{url('/login')}}",--}}
                {{--type:"POST",--}}
                {{--data: $(this).serialize(),--}}
                {{--dataType: 'json',--}}
                {{--beforeSend:function( ) {--}}
                {{--//--}}
                {{--},--}}
                {{--complete:function( data ) {--}}

                {{--},--}}
                {{--success:function(data) {--}}
                {{--location.reload();--}}

                {{--},--}}
                {{--error:function( data ) {--}}
                {{--for (var field in data.responseJSON) {--}}
                {{--var el = $(':input[name="' + field + '"]');--}}
                {{--el.parent('.form-group').addClass('has-error');--}}
                {{--el.next('.help-block').text(data.responseJSON[field][0]);--}}
                {{--}--}}

                {{--}--}}
                {{--});--}}

            })

            login();
        });

        register();
        login();


        function register(){
            $('#user_register_form').submit(function(e){
                e.preventDefault();

                $.ajax({
                    url:"{{url('/register')}}",
                    type:"POST",
                    data: $('#user_register_form').serialize(),
                    dataType: 'json',
                    beforeSend:function( ) {
//
                    },
                    complete:function( data ) {
                        setTimeout(function(){},5000);

                        if(data.status == 301){
                            location.href = data.message;
                        }
                    },
                    success:function( data ) {

                        // Display a success toast, with a title
                        toastr.success('Have fun storming the castle!', 'Miracle Max Says')

                        location.href = data.message;

//                        if($('#create-store-checkbox').is(':checked')){
//                           location.href = '/store/add-store';
//                        }
                    },
                    error:function( data ) {
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
                $.post("{{url('login')}}", $('#user_login_form').serialize(), function () {

                }).success(function (data) {
                    // Display a success toast, with a title
                    toastr.success('Have fun storming the castle!', 'Miracle Max Says')
                    setTimeout(function(){
                        location.reload();

                    },5000);

                }).fail(function (data) {
                    for (var field in data.responseJSON) {
                        var el = $(':input[name="' + field + '"]');
                        el.parent('.form-group').addClass('has-error');
                        el.next('.help-block').text(data.responseJSON[field][0]);
                    }
                })

                {{--$.ajax({--}}
                {{--url:"{{url('/login')}}",--}}
                {{--type:"POST",--}}
                {{--data: $(this).serialize(),--}}
                {{--dataType: 'json',--}}
                {{--beforeSend:function( ) {--}}
                {{--//--}}
                {{--},--}}
                {{--complete:function( data ) {--}}

                {{--},--}}
                {{--success:function(data) {--}}
                {{--location.reload();--}}

                {{--},--}}
                {{--error:function( data ) {--}}
                {{--for (var field in data.responseJSON) {--}}
                {{--var el = $(':input[name="' + field + '"]');--}}
                {{--el.parent('.form-group').addClass('has-error');--}}
                {{--el.next('.help-block').text(data.responseJSON[field][0]);--}}
                {{--}--}}

                {{--}--}}
                {{--});--}}

            })
        }



    })
</script>
{{--<noscript><a href="https://www.olark.com/site/7830-582-10-3714/contact" title="Contact us" target="_blank">Questions? Feedback?</a> powered by<a href="https://www.olark.com?welcome" title="Olark live chat software">Olark live chat software</a></noscript>--}}

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
{{--<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-P9FT69"height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript><script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-P9FT69');</script><!-- End Google Tag Manager -->--}}
</html>