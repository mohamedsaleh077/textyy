<x-layout>
    <x-slot:title>
        Log in
    </x-slot:title>

    <div>
        <form action="/login" method="POST">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
            </div>
            @error('email')
                <div class="m-3 p-2 border border-danger-subtle text-danger-emphasis bg-danger-subtle">
                    {{ $message }}
                </div>
            @enderror
            @error('password')
                <div class="m-3 p-2 border border-danger-subtle text-danger-emphasis bg-danger-subtle">
                    {{ $message }}
                </div>
            @enderror
            <button type="submit" class="btn btn-primary">Login</button>
            <p>doesn't have an account? <a href="/login">signup</a>.</p>
        </form>
    </div>
</x-layout>
