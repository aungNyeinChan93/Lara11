<x-layout>
    <div class="container mx-auto">
        <form action="{{ route("Auth#login") }}"  method="POST" class="p-5 bg-blue-400 rounded-md">
            @csrf
            <div class="my-3">
                <input type="email" name="email" class="input" placeholder="email">
                @error("email")
                    <span class="text-xs text-red-600">{{ $message }}</span>
                @enderror
            </div>
            <div class="my-3">
                <input type="password" name="password" class="input" placeholder="password">
                @error("password")
                    <span class="text-xs text-red-600">{{ $message }}</span>
                @enderror
            </div>
            <div class="my-3">
                <input type="submit" value="Submit" class="input p-2 bg-green-400 my-2">
            </div>
        </form>
    </div>
</x-layout>
