@extends('template')

@section('titre')
Register
@endsection

@section('content')

<div class="w-full max-w-xs m-auto">
    <form class="px-8 pt-6 pb-8 mb-4 bg-white rounded" method="POST" action="{{ route('auth.registration') }}">
        @csrf
        <input type="hidden" name="email" value="NULL">
      <div class="mb-4">
        <label  class="block mb-2 text-sm font-bold text-gray-700" for="username">
          Username
        </label>
        <input class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="username" name="name" type="text" placeholder="Username" value="{{ old('login') }}" required>
      </div>
      <div class="mb-4">
        <label  class="block mb-2 text-sm font-bold text-gray-700" for="username">
          Email
        </label>
        <input class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="email" name="email" type="text" placeholder="user@host.com" value="{{ old('email') }}" required>
      </div>
      <div class="mb-6">
        <label class="block mb-2 text-sm font-bold text-gray-700" for="password">
          Password
        </label>
        <input class="w-full px-3 py-2 mb-3 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="password" name="password" type="password" placeholder="******************" required>
      </div>
      <div class="mb-6">
        <label class="block mb-2 text-sm font-bold text-gray-700" for="password">
          Confirm Password
        </label>
        <input class="w-full px-3 py-2 mb-3 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="passwordConf" type="password" name="password_confirmation" placeholder="******************" required>
      </div>
      <div class="flex items-center justify-center">
        <button class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline" type="submit">
          Register
        </button>
      </div>
    </form>
</div>

@endsection
