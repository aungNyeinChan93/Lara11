<x-layout>
    <div class="container mx-auto">
        <div class="card my-4 px-3 bg-red-500 text-white rounded-md shadow-sm">
            <div class="card-header ">
                <h1>{{ $post->title }}</h1>
            </div>
            <div class="card-body grid grid-cols-2 gap-3">
                @if($post->image)
                <div class="w-100 ">
                    <img class="img-fluid rounded" src="{{ asset("/storage/".$post->image) }}" alt="img">
                </div>
                @endif
                <p>{{ $post->body }}</p>
            </div>
            <div class="card-footer">
                {{ $post->user->name }}
            </div>
        </div>
        <a class="btn btn-primary" href="{{ route("posts.index") }}"> Back</a>
    </div>
</x-layout>
