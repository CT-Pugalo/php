@extends('template')

@section('content')
    <div class="text-xl font-medium text-black bg-purple-300 h-16">
        <nav">
            <ul class="justify-center align-middle grid grid-cols-4 ">
                <li class="col-start-1 col-end-2"><a href="#">Menu</a></li>
                <li class="col-start-2 col-end-3"><a href="#">Home</a></li>
                <li class="col-start-3 col-end-4"><a href="#">Contact</a></li>
                <li class="col-start-4 col-end-5">
                    @guest
                    <img src="{{ asset('image/blankProfile.png') }}" alt="imageProfile">
                    <a href="{{ route('auth.login') }}">login</a>/<a href="#">register</a>
                    @endguest
                    @auth
                        <img src="{{ asset('image/')}} alt="imageProfile">
                        <a href="#">logout</a>
                    @endauth
                </li>
                </ul>
        </nav>
    </div>
    <div>
        <a href="{{ route('user.index') }}">Dashboard</a>
    </div>
@endsection
