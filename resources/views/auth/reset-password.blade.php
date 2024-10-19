<x-layout>

    <div class="container">
        <div class="title">
            <h2>Reset Password Form</h2>
        </div>
        <div class="my-2">
            @if(session("status"))
                <div class="alert alert-success">{{ session("status") }}</div>
            @endif
        </div>
        <div class="px-4">
            <form action="{{ route("password.update") }}" method="POST">
                @csrf
                <div>
                    <input type="hidden" name="token" value="{{ $token }}">
                </div>
                <div class="my-3">
                    <input type="email" name="email" placeholder="email" class="input" value="{{ old("email") }}">
                    @error("email")
                    <div class="alert text-red-500 text-xs">{{ $message }}</div>
                    @enderror
                </div>
                <div class="my-3">
                    <input type="password" name="password" placeholder="password" class="input" value="{{ old("password") }}">
                    @error("password")
                    <div class="alert text-red-500 text-xs">{{ $message }}</div>
                    @enderror
                </div>
                <div class="my-3">
                    <input type="password" name="password_confirmation" placeholder="password_confirmation" class="input" value="{{ old("password_confirmation") }}">
                    @error("password_confirmation")
                    <div class="alert text-red-500 text-xs">{{ $message }}</div>
                    @enderror
                </div>
                <div class="my-4">
                    <input type="submit" value="submit" class="px-3 py-2 my-3 bg-green-500 rounded-lg">
                </div>
            </form>
        </div>
    </div>

</x-layout>
