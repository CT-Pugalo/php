@extends('template')

@section('titre')
Login
@endsection
@section('content')
<div>
    <form method="post" action="{{ url('user') }}">
        @csrf
        <label>Name
            <input type="text" name="name" value="{{ old('name') }}">
        </label>
        <label>Mot de passe
            <input type="password" name="password">
        </label>
    </form>
</div>
@endsection
