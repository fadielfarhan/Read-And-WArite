<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="{{ asset('js/app.js') }}" defer></script>
        <link rel="stylesheet" href="{{('css/main.css')}}">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <title>Read And Write</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
         
        </style>
    </head>

    
    <body>

        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/homePage') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>

        <div class="container">
        <div class="titleWelcome">
        <h1>ReadAndWArite</h1>
        </div>

        <form action="{{url($name ?? 'homePage')}}" class="input-group" method="get">
            <input type="text" name="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </form>

        <div class="categoryContent">
            @foreach ($categories as $c)
                <div class="category">
                    <a href="{{ url($c->name) }}"><img src="image/{{$c->image}}" alt="" width="10%">
                    <h1>{{$c->name}}</h1>
                    </a>
                </div>
            @endforeach
        </div>

    
    </div>

    
    </body>
</html>
