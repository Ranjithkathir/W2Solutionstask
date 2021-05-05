<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>W2Solutions</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="shortcut icon" type="image/x-icon" href="{{ url('public/assets/images/favicon.ico') }}">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #000;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
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
                color: #fff;
            }

            .links > a {
                color: #5bd2ff;
                padding: 0 25px;
                font-size: 13px;
                font-weight: bold;
                /* letter-spacing: .1rem; */
                text-decoration: none;
                text-transform: uppercase;
            }

            .links > h4, h5{
                color: #fefefe;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        <?php /*@if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif */ ?>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    W2Solutions
                </div>

                <div class="links">
                    <h4>Here is the task for CRUD Users, Roles, Roles and Permission setup  & Multiauth menus loading as follows....Please consider as a readme .....</h4>
                    <br/>
                    <h5>1) Please Run the migrate seeding command as <strong>"php artisan migrate --seed"</strong></h5> 
                    <h5>2) And use the email "admin@admin.com" and "test123" as credential for admin login...</h5>
                    <h5>3) As well as for hr role use "user@user.com" and "test123"</h5>
                </div>
            </div>
        </div>
    </body>
</html>
