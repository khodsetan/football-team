<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
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
                text-align: left;
            }

            .title {
                font-size: 20px;
            }

            .links > p {
                color: #636b6f;
                padding: 0 25px;
                font-size: 16px;
                font-weight: 600;
                text-decoration: none;
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
                <a href="{{ route('register') }}">Register</a>
                @endauth
            </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Hello Dear Hiring manager
                    <br>
                    I appreciate for your consideration
                </div>

                <div class="links">
                    <p>The JWT is used for authentication so plaese
                    login and provide the given token in requests.
                    </p>
                    <p>APIs Content-Type: application/json</p>
                    <p> API endpoint to login : /api/login with Post
                        <br>
                        Params: email (admin@gmail.com), password (123456)
                    </p>
                    <p> API endpoint to add a team : /api/team  Post
                        <br>
                        Params: name, token
                    </p>
                    <p> API endpoint to add a player : /api/player  Post
                        <br>
                        Params: team_id, first_name, last_name, token
                    </p>
                    <p> API endpoint to update a player : /api/player  Put
                        <br>
                        Params: player_id, first_name, last_name, token
                    </p>
                    <p>  API endpoint to get a team and its players
                        : /api/team  Get
                        <br>
                        Param: token
                    </p>
                </div>
            </div>
        </div>
    </body>
</html>
