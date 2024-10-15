<x-layout>
    <div class="container mx-auto">
        <div class="card my-4 px-3 bg-red-500 text-white rounded-md shadow-sm">
            <div class="card-header">
                <h1>{{ $post->title }}</h1>
            </div>
            <div class="card-body">
                <p>{{ $post->body }}</p>
            </div>
            <div class="card-footer">
                {{ $post->user->name }}
            </div>
        </div>
        <a class="btn btn-primary" href="{{ route("posts.index") }}"> Back</a>
    </div>
</x-layout>
