<x-layout>
    <x-slot:title>
        Posts Page
    </x-slot:title>

    <div>
        @auth
        <form action="/post/" method="POST">
            @csrf
            <div class="mb-3">
                <textarea placeholder="What is going in your mind?" maxlength="255" required class="form-control"
                    name="content">{{ old('content') }}</textarea>
            </div>
            @error('content')
            <div class="m-3 p-2 border border-danger-subtle text-danger-emphasis bg-danger-subtle">
                {{ $message }}
            </div>
            @enderror
            @if (session('success'))
            <div class="m-3 p-3 border border-success-subtle text-success-emphasis bg-success-subtle">
                {{ session('success') }}
            </div>
            @endif
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        @else
        <h1>Welcome To Textyy!</h1>
        <p>Textyy is a platform to post any text you want, just register with any nickname you would like and post
            whatever
            you want!</p>
        <p>Be nice and respectful! leave a great smell from your text here!</p>
        <p>have an account? <a href="{{ route('login') }}">Login</a> or you can <a href="{{ route('register') }}">join
                us</a> if you didn't yet!</p>
        <p>See what people wrote: <a href="/posts">Posts Page.</a></p>
        <hr>
        @endauth
    </div>

    <hr>
    <a href="/posts?page={{ (isset($_GET['page']) && $_GET['page'] < 1) ? $_GET['page'] - 1 : 1 }}"><button
            class="btn btn-primary">Previous</button></a>

    <x-showposts :posts="$posts" />


    <a href="/posts?page={{ (isset($_GET['page']) && $_GET['page'] < 1) ? $_GET['page'] - 1 : 1 }}"><button
            class="btn btn-primary">Next</button></a>
</x-layout>
