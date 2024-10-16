<x-layout>
    <div class="container mx-auto">
        <div class="">
            <h2 class="p-2 bg-k-200 rounded-sm shadow-sm text-center text-black "> Total {{ count(Auth::user()->posts) }} posts</h2>
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
        </div>
        <div>
            {{ $posts->links() }}
        </div>
    </div>
</x-layout>
