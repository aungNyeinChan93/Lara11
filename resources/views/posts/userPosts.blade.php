<x-layout>
    <div class="container mx-auto">
        <div class="">
            <h3 class="text-red-300 text-start text-2xl text-uppercase bg-gray-600 p-3 rounded-sm shadow-sm">{{ $user->name }} posts</h3>
            <h2 class="p-2 bg-k-200 rounded-sm shadow-sm text-center text-black "> Total {{ ($user->posts()->count()    ) }} posts</h2>
                @foreach ($posts as $post)
                     <div class="card my-2 ">
                         <div class="card-header">
                             <h3>{{ $post->title }}</h3>
                         </div>
                         <div class="card-body">
                             <p>
                                 {{ $post->body }}
                             </p>
                         </div>
                       </div>
                @endforeach
                <a href="{{ route("posts.index") }}" class="text-blue-400 text-md p-3 my-2">Back</a>
        </div>
        <div>
            {{ $posts->links() }}
        </div>
    </div>
</x-layout>
