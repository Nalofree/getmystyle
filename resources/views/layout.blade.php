<?php
/**
 * Created by PhpStorm.
 * User: nalof
 * Date: 20.03.2018
 * Time: 4:27
 */
?>
        <!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{title_case('getmystyle')}}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: relative;
                right: 10px;
                top: 18px;
            }

            .content {
                /*text-align: center;*/
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="position-ref full-height">
            {{--            @if (Route::has('login'))--}}
            <div class="top-right links">
                @if (Auth::check())
                    {{--<a href="{{ url('/home') }}">Home</a>--}}
                    <a href="{{ url('/home') }}">Личный кабинет</a>
                @else
                    <a href="{{ url('/login') }}">Войти</a>
                    <a href="{{ url('/register') }}">Зарегестрироваться</a>
                @endif
            </div>
            {{--@endif--}}

            <div class="content container">
                @yield('content')
            </div>
        </div>
    </body>
</html>

