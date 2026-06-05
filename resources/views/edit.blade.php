<x-layout>
    <x-slot:title>
        Edit Post Page
    </x-slot:title>

    <div>
        <form action="/post/{{ $post->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <textarea placeholder="What is going in your mind?" maxlength="255" required class="form-control" name="content">{{ $post->content }}</textarea>
            </div>
            @error('content')
                <div class="m-3 p-2 border border-danger-subtle text-danger-emphasis bg-danger-subtle">
                    {{ $message }}
                </div>
            @enderror
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</x-layout>
