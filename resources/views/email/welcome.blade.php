<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome mail</title>
</head>
<body>
    <div class="comtainer">
        <h1>Hello {{ $user->name }}</h1>

        <h3>{{ $post->title }}</h3>
        <p>
            {{ $post->body }}
        </p>
        <div>
            <img style="width: 200px; height: 100px" src="{{ $message->embed("storage/".$post->image) }}" alt="img">
        </div>
    </div>
</body>
</html>
