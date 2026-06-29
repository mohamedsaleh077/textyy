@props(['posts'])
<div class="text-break">
    @forelse ($posts as $post)
    <div class="border-bottom m-3">
        <p class="fs-5 fw-bold"> <a href="/user/{{ $post->user ? $post->user->id : '0' }}">{{ $post->user ?
                $post->user->name : 'Anonymous' }} </a>::
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
                    onclick="return confirm('Are you sure you want to delete it? you can not retrive this action')">Delete</button>
            </form>
            @endcan
        </div>
    </div>
    @empty
    <p>No Posts yet! Be the first who starts the conversation</p>
    @endforelse
</div>
