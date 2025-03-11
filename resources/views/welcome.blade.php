<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'MediCall') }}</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body {
                font-family: 'Nunito', sans-serif;
                background-color: #f8fafc;
            }
            .welcome-section {
                height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            .welcome-content {
                text-align: center;
                padding: 2rem;
            }
        </style>
    </head>
    <body>
        <div class="welcome-section">
            <div class="welcome-content">
                <h1 class="display-4">Welcome to MediCall</h1>
                <p class="lead">Your healthcare solutions platform</p>
                
                <div class="mt-5">
                    @if (Route::has('login'))
                        <div class="d-flex justify-content-center gap-3">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="btn btn-primary">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-primary">Log in</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn btn-outline-primary">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
