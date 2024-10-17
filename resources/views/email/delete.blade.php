<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Post Delete</title>
</head>
<body>
    <div class="container">
        <h1>{{ $user->name }} is deleted {{ $post->title }} post </h1>
        {{-- <img src="{{ $message->embed("storage/".$post->image) }}" alt="" style="width:200px;height:100px"> --}}
    </div>
</body>
</html>
