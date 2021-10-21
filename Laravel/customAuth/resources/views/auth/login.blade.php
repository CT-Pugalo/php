@extends("app")
@section("content")
    <form method="post" action="{{ route('signIn') }}">
        @csrf
        <label>
            Login
            <input type="text" name="name" placeholder="login" required>
        </label>
        <label>
            email
            <input type="text" name="email" placeholder="email" required>
        </label>
        <label>
            Password
            <input type="password" name="password" placeholder="password" required>
        </label>
        <button type="submit">Sign in!</button>
    </form>
@endsection
