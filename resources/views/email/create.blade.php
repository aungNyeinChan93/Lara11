<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Creted post</title>
</head>
<body>
    <div class="container">
        <h1>{{ $user->name }} have created {{ $post->title }}</h1>
        <p>{{ $post->body }}</p>
        <div>
            <img src="{{ $message->embed("storage/".$post->image) }}" alt="" style=" width:200px ; height:100px">
        </div>
    </div>
</body>
</html>
