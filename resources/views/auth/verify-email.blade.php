<x-layout>
    <h1 class="p-2 my-2 bg-red-400 text-white rounded-sm" >Plesae verify your email through the email we send your {{ $user->email }} email</h1>
    <p class="my-2 text-xs">Don't get the email</p>
    <form action="{{ route("verification.send") }}" method="POST">
        @csrf
        <button class="bg-green-400 py-1 px-3 my-2 rounded-lg">Send again</button>
    </form>
</x-layout>
