<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 90vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #fff;
                padding: 8px 10px;
                border-radius: 5px;
                font-size: 10px;
                text-align: center;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
                background-color: #636b6f;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>

    <body>
        <div class="flex-center position-ref full-height">
            <div class="top-right links">
                @if(\Hyn\Tenancy\Facades\TenancyFacade::hostname())
                        <a href="{{ route('login') }}">Login</a>
                @else
                        <a href="{{ url('/register') }}">Contact</a>
                @endif
            </div>
            
            <div class="content">
                <div class="title m-b-md">
                    @if(\Hyn\Tenancy\Facades\TenancyFacade::hostname())
                        {{ \Hyn\Tenancy\Facades\TenancyFacade::hostname()->logo }}
                    @else
                        {{ config('app.name', 'Townhouse') }}
                        <p class="flex-center" style="font-size:0.2em;">Your destination for workflow automation</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- FOOTER -->
        <footer class="container-fluid flex-center" style="background-color: grey;">
            <div class="row">
                <p style="color:white; font-size: 0.8em;">&copy; 2016-2019 {{config('app.name', 'Townhouse')}}. &middot; <a href="#" style="text-decoration: none;">Privacy</a> &middot; <a href="#"  style="text-decoration: none;">Terms</a></p>
            </div>
        </footer>                


    </body>
</html>