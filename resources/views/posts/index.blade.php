<x-layout>
    <div class="container">
        <div class="message">
            @if (session('post-update'))
                <div class="alert alert-danger">{{ session('post-update') }}</div>
            @endif
            @if (session('post-create'))
                <div class="alert alert-danger">{{ session('post-create') }}</div>
            @endif
            @if (session('post-delete'))
                <div class="alert alert-danger">{{ session('post-delete') }}</div>
            @endif
        </div>
        <div class="create">
            <a class="p-2 my-3 bg-green-500 rounded-md " href="{{ route('posts.create') }}"> Create Post</a>
        </div>
        @foreach ($posts as $post)
            <div class="card my-4">
                <div class="card-header flex justify-between ">
                    <h3 class="text-center text-capitalize text-green-600">{{ $post->id }} . {{ $post->title }}
                    </h3>
                    <h5 class="text-red-500 text-uppercase text-xl">{{ $post->user->name }}</h5>
                </div>
                <div class="card-body flex justify-between">
                    <p>{{ $post->body }}</p>
                    <div class="btn btn-group">
                        <a href="{{ route('posts.show', $post->id) }}" class="bg-yellow-300 p-1 mx-1 rounded-md px-2">
                            Detail</a>
                        @can('update', $post)
                            <a href="{{ route('posts.edit', $post->id) }}" class="bg-blue-300 p-1 mx-1 rounded-md px-2">
                                Edit</a>
                        @endcan
                        @can('delete', $post)
                            <form action="{{ route('posts.destroy', $post->id) }}" method="post"
                                class="bg-red-300 p-1 mx-1 rounded-md px-2">
                                @csrf
                                @method('delete')
                                <button type="submit"> Delete </button>
                            </form>
                        @endcan
                    </div>
                </div>
            </div>
        @endforeach
        {{ $posts->links() }}
    </div>
</x-layout>