<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($title) ? $title . ' - Textyy' : 'Textyy' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body style="background-color: #d6d6d6">
    <main class="container-md bg-light">
        <nav class="row p-2 align-items-center bg-primary-subtle">
            <div class="col fs-2 fw-bolder">
                <a href="/posts">Textyy</a>
            </div>
            <div class="col-md-auto row">
                @auth
                <div class="col align-middle align-self-center">
                    <a href="/user/{{  auth()->user()->id }}">{{ auth()->user()->name }}</a>
                </div>
                <div class="col-auto">
                    <form class="d-inline" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-secondary"
                            onclick="return confirm('Are you sure you want to logout?')">logout</button>
                    </form>
                    <a href="{{ route('search') }}"><button class="btn btn-secondary">Search</button></a>
                </div>
            </div>
            @else
            <div class="col-auto">
                <a href="{{ route('login') }}"><button class="btn btn-primary">Login</button></a>
                <a href="{{ route('register') }}"><button class="btn btn-secondary">Signup</button></a>
                <a href="{{ route('search') }}"><button class="btn btn-secondary">Search</button></a>
            </div>
            </div>
            @endauth
            </div>
        </nav>
        <article class="p-2">
            {{ $slot }}
        </article>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js"
        integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous">
        </script>
</body>

</html>
