<x-layout>
    <x-slot:title>
        {{ $profile['name'] ?? 'anonymous' }}'s Profile
    </x-slot:title>

    @if($profile !== null)
    <h1>{{ $profile['name'] }}</h1>
    <h3>{{ $profile['email'] }}</h3>
    <h6>Joined At: {{ $profile['created_at']->diffForHumans() }}</h6>

    <x-showposts :posts="$profile['posts']" />

    @else
    <h1>No such a user or it is an annonymous user</h1>
    @endif
</x-layout>
