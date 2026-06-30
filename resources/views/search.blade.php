<x-layout>
    <x-slot:title>
        search in posts
    </x-slot:title>
    <form method="GET" action="/search">
        <input type="text" name="keyword" placeholder="Search in posts!">
        <button type="submit">Search!</button>
    </form>
    <hr>
    @if(isset($results))
    <x-showposts :posts="$results" />
    @else
    <p>no such a result, start a search!</p>
    @endif
</x-layout>
