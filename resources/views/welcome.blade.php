<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

       <!-- Fonts -->
       <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

       <link rel="manifest" href="manifest.json">


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
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
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
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>

        {{-- <script src="{{asset('js/firebase.js')}}"></script> --}}


        <!-- The core Firebase JS SDK is always required and must be listed first -->
        <script src="https://www.gstatic.com/firebasejs/7.9.2/firebase-app.js"></script>

        <script src="https://www.gstatic.com/firebasejs/7.9.1/firebase-messaging.js"></script>
        
        <script>
            // Your web app's Firebase configuration
const firebaseConfig = {
    apiKey: "AIzaSyBwzH3ORW0DB6wWaJ6y0YILgoE8qukOOco",
    authDomain: "vertigo-2020.firebaseapp.com",
    databaseURL: "https://vertigo-2020.firebaseio.com",
    projectId: "vertigo-2020",
    storageBucket: "vertigo-2020.appspot.com",
    messagingSenderId: "15333066764",
    appId: "1:15333066764:web:335016e9c10981f2980629",
    measurementId: "G-V22MJ22RQP"
  };

  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);

 // Retrieve Firebase Messaging object.
 const messaging = firebase.messaging();
        messaging
            .requestPermission()
            .then(function () {

                console.log("Notification permission granted.");
                return messaging.getToken()

            }).then(function(token){

                console.log(token)
            }).

            catch(function (err) {

                console.log("Unable to get permission to notify." , err);
            });

messaging.onMessage((payload) => {

    console.log(payload);
})
        </script>
    </body>
</html>
