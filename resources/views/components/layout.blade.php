<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Layout</title>
    @vite(['resources/css/app.css', 'resources/js/app.css'])
</head>

<body>
    <div class="">
        <nav class=" ">
            <ol class=" flex justify-between">

                <div class="div flex justify-start">
                    @guest
                        <li class="nav-link  ms-4 "><a href="/">Home</a></li>
                    @endguest
                    @auth
                        <li class="nav-link  ms-4 "><a href="{{ route('Home#dashboard') }}">Dashboard</a></li>
                        <li class="nav-link  ms-4 "><a href="{{ route('Home#dashboard') }}">About</a></li>
                        <li class="nav-link  ms-4 "><a href="{{ route('Home#dashboard') }}">Contact</a></li>
                    @endauth
                    <li class="nav-link  ms-4 "><a href="{{ route('posts.index') }}">Posts</a></li>

                    @auth
                        <li class="nav-link  ms-4 "><a href="{{ route('posts.myPosts') }}">My Posts</a></li>

                    @endauth
                </div>
                <div class=" flex justify-end">
                    @auth
                        <li class=" nav-link ms-4 ">
                            <form action="{{ route('Auth#logout') }}" method="POST">
                                @csrf
                                <button type="submit">Logout</button>
                            </form>
                        </li>
                    @endauth
                    @guest
                        <li class=" nav-link ms-4 "><a href="{{ route('Auth#loginPage') }}">Login</a></li>
                        <li class=" nav-link ms-4 "><a href="{{ route('Auth#registerPage') }}">Register</a></li>
                    @endguest
                </div>
            </ol>
        </nav>
        {{ $slot }}
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

</html>
