@extends('market.layouts.index_3_layout')

@section('scripts')

    <style>
        /***
Bootstrap Line Tabs by @keenthemes
A component of Metronic Theme - #1 Selling Bootstrap 3 Admin Theme in Themeforest: http://j.mp/metronictheme
Licensed under MIT
***/

        .content {
            padding-top: 30px;
        }

        /* Heading */
        .heading {
            z-index: 1;
            position: relative;
            text-align: center;
            margin-bottom: 100px;
        }

        .heading:after {
            left: 50%;
            height: 3px;
            width: 50px;
            content: " ";
            bottom: -35px;
            margin-left: -25px;
            position: absolute;
            background: #444;
        }

        .heading h2 {
            font-size: 40px;
            font-weight: 500;
            margin: 0 0 20px;
            color: #444;
        }

        .heading p {
            font-size: 16px;
            font-weight: 300;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            color: #8693a7;
        }

        /* Team Members */
        .team-members {
            width: 100%;
            cursor: pointer;
            overflow: hidden;
            position: relative;
            margin-bottom: 35px;
        }

        .team-members .team-avatar {
            position: relative;
        }

        .team-members .team-avatar:after {
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            content: " ";
            position: absolute;
            /*background: rgba(129, 129, 129, 0.1);*/
            transition-duration: 300ms;
            transition-property: all;
            transition-timing-function: cubic-bezier(0.7, 1, 0.7, 1);
        }

        .team-members .team-avatar img {
            display: block;
            margin: 0 auto;
            text-align: center;
        }

        .team-members .team-desc {
            left: auto;
            bottom: 0;
            width: 100%;
            /*padding: 0 20px;*/
            position: absolute;
            opacity: 0;
            color: #fff;
            -webkit-transform: translate3d(0, 10%, 0);
            transform: translate3d(0, 10%, 0);
            -webkit-transition: opacity 0.3s;
            -moz-transition: opacity 0.3s;
            -ms-transition: opacity 0.3s;
            -o-transition: opacity 0.3s;
            transition: opacity 0.3s;
        }

        .team-members .team-desc h4 {
            font-size: 22px;
            font-weight: 600;
            margin: 0 0 10px;
            color: #fff;
        }

        .team-members .team-desc span {
            display: block;
            font-size: 13px;
            font-weight: 600;
            text-transform: uppercase;
            color: #fff;
        }

        .team-members:hover .team-avatar:after {
            background: rgba(47, 60, 72, 0.5);
            transition-duration: 300ms;
            transition-property: all;
            transition-timing-function: cubic-bezier(0.7, 1, 0.7, 1);
        }

        .team-members:hover .team-desc {
            -webkit-transform: translate3d(0, -5%, 0);
            transform: translate3d(0, -5%, 0);
            -webkit-transform: translate3d(0, -10%, 0);
            transform: translate3d(0, -10%, 0);
        }

        .team-members:hover .team-desc {
            opacity: 1;
            -webkit-transition: all 0.4s;
            -moz-transition: all 0.4s;
            -ms-transition: all 0.4s;
            -o-transition: all 0.4s;
            transition: all 0.4s;
        }
        .team-members {
            /*width: 400px;*/
            width: auto;
        }

        .team-avatar {
            display: block;
            width: 100%;
            height: auto;
            height: 180px;
            position: relative;
            overflow: hidden;
            padding: 10.37% 0 0 0; /* 34.37% = 100 / (w / h) = 100 / (640 / 220) */
        }

        .team-avatar img {
            display: block;
            max-width: 100%;
            max-height: 100%;
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
        }

    </style>

@endsection

@section('content')

    <div class="container content">
        <div class="heading">
            <h2>Our <strong>Great Team</strong></h2>
            {{--<p>To try the most advanced business</p>--}}
        </div><!-- //end heading -->

        <div class="row">
            <div class="col-sm-3">
                <div class="team-members">
                    <div class="team-avatar">
                        <img class="img-responsive img-rounded" src='{{"images/kojo.jpg"}}'  alt="">
                    </div>
                    <div class="team-desc">
                        <h4 class="text-center">Kojo</h4>
                        {{--<span>Marketing</span>--}}
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="team-members">
                    <div class="team-avatar">
                        <img class="img-responsive img-rounded" src='{{"images/naa.jpg"}}' alt="">
                    </div>
                    <div class="team-desc">
                        <h4 class="text-center">Nessie</h4>
                        {{--<span>Founder</span>--}}
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="team-members">
                    <div class="team-avatar">
                        <img class="img-responsive img-rounded" src='{{asset("images/Ricky.jpg")}}' alt="">
                    </div>
                    <div class="team-desc">
                        <h4 class="text-center">Ricky</h4>
                        {{--<span>Director</span>--}}
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="team-members">
                    <div class="team-avatar">
                        <img class="img-responsive img-rounded" src='{{asset("images/abigail.jpg")}}' alt="">
                    </div>
                    <div class="team-desc">
                        <h4 class="text-center">Abigail</h4>
                        {{--<span>Director</span>--}}
                    </div>
                </div>
            </div>
        </div><!-- //end row -->
    </div>

@endsection