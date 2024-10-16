<x-layout>
    <div class="container mx-auto">
        <form enctype="multipart/form-data" action="{{ route("posts.update",$post->id) }}" method="POST" class="bg-blue-200 py-2 px-4 rounded-lg shadow-sm">
            @csrf
            @method("put")
            <div class="my-3">
                <input type="text" name="title" class="form-control" placeholder="title" value="{{ old("title") ?? $post->title }}">
                @error("title")
                    <div class="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="my-3">
                <input type="text" name="body" class="form-control" placeholder="body" value="{{ old("body") ?? $post->body }}">
                @error("body")
                <div class="alert">
                    {{ $message }}
                </div>
            @enderror
            </div>
            <div class="my-3">
                <input type="file" name="image" class="form-control" placeholder="image"">
                @error("image")
                <div class="alert">
                    {{ $message }}
                </div>
            @enderror
            </div>
            <div class="my-3">
                <input type="submit" value="Submit" class="bg-green-400 p-1 my-2 rounded-lg">
                <a href="{{ route("posts.index") }}" class=" px-2 py-1 mx-2 bg-gray-500 rounded-md"> Back </a>
            </div>

        </form>
    </div>
</x-layout>
