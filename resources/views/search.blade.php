<x-layout>
    <x-slot:title>
        Home Page
    </x-slot:title>
    <form method="POST" action="/search">
        <input type="text" name="keyword" placeholder="Search in posts!">
        <button type="submit">Search!</button>
    </form>
    <hr>
    @if(isset($results))
    <hr>
    <a href="/search?page={{ (isset($_GET['page']) && $_GET['page'] < 1) ? $_GET['page'] - 1 : 1 }}">
        <button class="btn btn-primary">Previous</button>
    </a>

    <x-showposts :posts="$results" />


    <a href="/search?page={{ (isset($_GET['page']) && $_GET['page'] < 1) ? $_GET['page'] - 1 : 1 }}"><button
            class="btn btn-primary">Next</button></a>
    @else
    <p>no such a result, start a search!</p>
    @endif
</x-layout>
