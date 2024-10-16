<x-layout>
    <div class="cotainer mx-auto p-10">
        <form action="{{ route("posts.store") }}" method="POST" enctype="multipart/form-data" class="bg-blue-200 py-2 px-4 rounded-lg shadow-sm">
            @csrf
            <div class="my-3">
                <input type="text" name="title" class="form-control" placeholder="title" value="{{ old("title") }}">
                @error("title")
                    <div class="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="my-3">
                <input type="text" name="body" class="form-control" placeholder="body" value="{{ old("body") }}">
                @error("body")
                <div class="alert">
                    {{ $message }}
                </div>
            @enderror
            </div>
            <div class="my-3">
                <input type="file" name="image" class="form-control" placeholder="image" value="{{ old("image") }}">
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
