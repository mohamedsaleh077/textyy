<x-layout>
    <x-slot:title>
        Home Page
    </x-slot:title>
    <h1>Welcome To Textyy!</h1>
    <p>Textyy is a platform to post any text you want, just register with any nickname you would like and post whatever
        you want!</p>
    <p>Be nice and respectful! leave a great smell from your text here!</p>
    <p>have an account? <a href="{{ route('login') }}">Login</a> or you can <a href="{{ route('register') }}">join us</a> if you didn't yet!</p>
    <p>See what people wrote: <a href="/posts">Posts Page.</a></p>
</x-layout>