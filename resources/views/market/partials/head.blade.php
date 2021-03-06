
<head>

    <title>{{config('app.name')}}</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta charset="utf-8">
    <script type="text/javascript">
        //<![CDATA[
        try{if (!window.CloudFlare) {var CloudFlare=[{verbose:0,p:0,byc:0,owlid:"cf",bag2:1,mirage2:0,oracle:0,paths:{cloudflare:"/cdn-cgi/nexp/dok3v=1613a3a185/"},atok:"42eaf262548cdbe4ab6eaa2b56036109",petok:"6cc7239c1dd2b1bf266bfb48dd963992ccddcb90-1485600668-1800",zone:"template-help.com",rocket:"0",apps:{"abetterbrowser":{"ie":"7"}}}];!function(a,b){a=document.createElement("script"),b=document.getElementsByTagName("script")[0],a.async=!0,a.src="//ajax.cloudflare.com/cdn-cgi/nexp/dok3v=f2befc48d1/cloudflare.min.js",b.parentNode.insertBefore(a,b)}()}}catch(e){};
        //]]>
    </script>
    <link rel="icon" href="{{secure_asset("images/favicon.ico")}}" type="image/x-icon">

    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Montserrat:400,700">

    <link rel="stylesheet" href="{{secure_asset('css/style.css')}}">

    {{--<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">--}}

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

    {{--fonts for modal--}}
    <link href='http://fonts.googleapis.com/css?family=Bree+Serif' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Philosopher' rel='stylesheet' type='text/css'>

    <!--[if lt IE 10]>
    <!--<div style="background: #212121; padding: 10px 0; box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3); clear: both; text-align:center; position: relative; z-index:1;">-->
        {{--<a href="https://windows.microsoft.com/en-US/internet-explorer/"><img src="images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>--}}
    {{--<script src="js/html5shiv.min.js"></script>--}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>

    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>--}}


    <style>

        body{

            min-height: 80%;

        }


        @media only screen and (max-width: 1000px) {
            #flipkart-navbar > div > div.row.row2 > div.cart.col-sm-1 > li > a > h6 > i
            {
                display: none;
            }
        }

        @media only screen and (max-width: 770px) and (min-width: 480px) {

            .price-tag{
                margin-bottom: 10px;
            }
        }
        @media only screen and (max-width: 640px) {

            .typeahead{
                display: none;
            }
        }
    </style>



    <style type="text/css">
        /*.bs-example {*/
            /*font-family: sans-serif;*/
            /*position: relative;*/
            /*margin: 100px;*/
        /*}*/
        .typeahead,.tt-query, .tt-hint {
            border: 2px solid #CCCCCC;
            border-radius: 8px;
            font-size: 22px; /* Set input font size */
            /*height: 30px;*/
            line-height: 30px;
            outline: medium none;
            /*padding: 8px 12px;*/
            width: calc(120vh - 152px);
            /*height: 70px;*/
            /*color: black;*/

        }
        .typeahead {
            background-color: #FFFFFF;
            /*color: black;*/
        }
        .typeahead:focus {
            border: 2px solid #0097CF;
        }
        .tt-query {
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
        }
        .tt-hint {
            color: #999999;
        }
        .tt-menu {
            background-color: #FFFFFF;
            border: 1px solid rgba(0, 0, 0, 0.2);
            border-radius: 8px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            margin-top: 12px;
            padding: 8px 0;
            width: 422px;
        }
        .tt-suggestion {
            font-size: 22px;  /* Set suggestion dropdown font size */
            padding: 3px 20px;
            color: black;

        }
        .tt-suggestion:hover {
            cursor: pointer;
            background-color: #0097CF;
            color: #FFFFFF;
        }
        .tt-suggestion p {
            margin: 0;
        }
    </style>

    <![endif]-->

    {{--<!-- Go to www.addthis.com/dashboard to customize your tools --> <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-58a2f45d30a04120"></script>--}}

    {{--<script type="text/javascript">var switchTo5x=true;</script>--}}
    {{--<script type="text/javascript" id="st_insights_js" src="http://w.sharethis.com/button/buttons.js?publisher=893d1416-99a9-4b63-ba1a-8b928d043b2a"></script>--}}
    {{--<script type="text/javascript">stLight.options({publisher: "893d1416-99a9-4b63-ba1a-8b928d043b2a", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>--}}
</head>
