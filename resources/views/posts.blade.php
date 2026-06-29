<x-layout>
    <x-slot:title>
        Posts Page
    </x-slot:title>

    <div>
        @auth
            <form action="/post/" method="POST">
                @csrf
                <div class="mb-3">
                    <textarea placeholder="What is going in your mind?" maxlength="255" required class="form-control" name="content">{{ old('content') }}</textarea>
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
            <p>Textyy is a platform to post any text you want, just register with any nickname you would like and post whatever
                you want!</p>
            <p>Be nice and respectful! leave a great smell from your text here!</p>
            <p>have an account? <a href="{{ route('login') }}">Login</a> or you can <a href="{{ route('register') }}">join us</a> if you didn't yet!</p>
            <p>See what people wrote: <a href="/posts">Posts Page.</a></p>
            <hr>
        @endauth
    </div>

    <div class="text-break">
        @forelse ($posts as $post)
            <div class="border-bottom m-3">
                <p class="fs-5 fw-bold"> <a href="/user/{{ $post->user ? $post->user->id : '0' }}" >{{ $post->user ? $post->user->name : 'Anonymous' }} </a>::
                    <span class="fs-6">{{ $post->created_at->diffForHumans() }}</span>
                    @if($post->updated_at->gt($post->created_at->addSeconds(5)))
                    <span class="fs-6 fst-italic">Edited</span>
                    @endif
                </p>
                <p>{{ $post->content }}</p>
                <div class="mb-3 d-inline">
                    @can('update', $post)
                        <a href="/post/edit/{{ $post->id }}" class="d-inline text-success">Edit</a>
                    @endcan
                    @can('delete', $post)
                        <form class="d-inline" action="/post/{{ $post->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            :: <button type="submit" class="text-danger btn btn-link p-0"
                                onclick="return confirm('Are you sure you want to delete it? you can not retrive this action')"
                                >Delete</button>
                        </form>
                    @endcan
                </div>
            </div>
        @empty
            <p>No Posts yet! Be the first who starts the conversation</p>
        @endforelse
    </div>
</x-layout>
