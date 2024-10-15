<x-layout>
    <div class="container text-center p-5 text-2xl rounded-lg my-5 mx-auto bg-slate-500">
        <a href="{{ url('/auth/google/redirect') }}">Google</a>
        <a href="{{ url('/auth/github/redirect') }}">GitHub</a>
    </div>


    <form action="{{ route("test") }}" method="POST">
        @csrf
        <input type="text" name="text" placeholder="text" id="" class="input @error("text")
            ring-red-500
        @enderror">
        @error("text")
            <span>{{ $message }}</span>
        @enderror
        <button type="submit" class="bg-red-400 p-2 rounded-sm">Submit</button>
    </form>
</x-layout>
